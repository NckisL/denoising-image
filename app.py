from flask import Flask, request, jsonify
from flask_cors import CORS
import os
import cv2
import numpy as np
import math
from werkzeug.utils import secure_filename
import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
from sklearn.metrics import f1_score
import time

app = Flask(__name__)
CORS(app)

UPLOAD_FOLDER = os.path.join('static', 'uploads')
FILTERED_FOLDER = os.path.join('static', 'filtered')
DIFFMAP_FOLDER = os.path.join('static', 'diffmaps')

for folder in [UPLOAD_FOLDER, FILTERED_FOLDER, DIFFMAP_FOLDER]:
    os.makedirs(folder, exist_ok=True)

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['FILTERED_FOLDER'] = FILTERED_FOLDER
app.config['DIFFMAP_FOLDER'] = DIFFMAP_FOLDER

def compute_mse(img1, img2):
    return np.mean((img1.astype("float") - img2.astype("float")) ** 2)

def compute_psnr(img1, img2):
    mse = compute_mse(img1, img2)
    if mse == 0:
        return float('inf')
    PIXEL_MAX = 255.0
    return 20 * math.log10(PIXEL_MAX / math.sqrt(mse))

def evaluate_quality(psnr, f1_score, mse):
    if psnr > 30 and f1_score > 0.95 and mse < 100:
        return "Sangat Bagus (High)"
    elif 20 < psnr <= 30 and f1_score > 0.85 and mse < 500:
        return "Bagus (Medium)"
    else:
        return "Kurang Bagus (Low)"

@app.route('/upload', methods=['POST'])
def upload():
    if 'image' not in request.files:
        return jsonify({'error': 'No file part'}), 400

    file = request.files['image']
    if file.filename == '':
        return jsonify({'error': 'No selected file'}), 400

    filename = secure_filename(file.filename)
    save_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
    file.save(save_path)

    return jsonify({'path': f'/static/uploads/{filename}'}), 200

@app.route('/apply_filter', methods=['POST'])
def apply_filter():
    try:
        data = request.get_json()
        image_path = data.get('image_path', '').lstrip('/')
        filter_type = data.get('filter', '').lower()

        full_path = os.path.join('.', image_path)
        if not os.path.exists(full_path):
            return jsonify({'error': 'File not found'}), 400

        base_name = os.path.splitext(os.path.basename(image_path))[0]
        filtered_filename = f'filtered_{filter_type}_{base_name}.png'
        filtered_path = os.path.join(app.config['FILTERED_FOLDER'], filtered_filename)

        diffmap_filename = f'diffmap_{filter_type}_{base_name}.png'
        diffmap_path = os.path.join(app.config['DIFFMAP_FOLDER'], diffmap_filename)

        img = cv2.imread(full_path)
        if img is None:
            return jsonify({'error': 'Invalid image file'}), 400
        gray_original = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

        start_time = time.time()
        if filter_type == 'median':
            filtered = cv2.medianBlur(img, 5)
        elif filter_type == 'gaussian':
            filtered = cv2.GaussianBlur(img, (5, 5), 1.5)
        elif filter_type == 'bilateral':
            filtered = cv2.bilateralFilter(img, 9, 75, 75)
        else:
            return jsonify({'error': 'Unknown filter'}), 400
        runtime = (time.time() - start_time) * 1000

        cv2.imwrite(filtered_path, filtered)
        gray_filtered = cv2.cvtColor(filtered, cv2.COLOR_BGR2GRAY)

        mse_val = compute_mse(gray_original, gray_filtered)
        psnr_val = compute_psnr(gray_original, gray_filtered)

        _, bin_orig = cv2.threshold(gray_original, 128, 1, cv2.THRESH_BINARY)
        _, bin_filt = cv2.threshold(gray_filtered, 128, 1, cv2.THRESH_BINARY)
        f1 = f1_score(bin_orig.flatten(), bin_filt.flatten(), zero_division=1)

        diff_map = cv2.absdiff(gray_original, gray_filtered)
        plt.figure(figsize=(6, 6))
        plt.imshow(diff_map, cmap='hot')
        plt.title(f"Difference Map: {filter_type.capitalize()} Filter")
        plt.axis('off')
        plt.tight_layout()
        plt.savefig(diffmap_path)
        plt.close()

        quality_text = evaluate_quality(psnr_val, f1, mse_val)

        return jsonify({
            'filtered_image': f'/static/filtered/{filtered_filename}',
            'diff_image': f'/static/diffmaps/{diffmap_filename}',
            'mse': round(mse_val, 2),
            'psnr': round(psnr_val, 2),
            'f1_score': round(f1, 4),
            'runtime': round(runtime, 4),
            'quality': quality_text
        }), 200

    except Exception as e:
        return jsonify({'error': f'Internal server error: {str(e)}'}), 500

if __name__ == '__main__':
    app.run(debug=True, port=5000)
