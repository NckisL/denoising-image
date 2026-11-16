# Denoising Image
This is a web application for reducing noise in images. The user uploads an image, chooses a filter (Median, Gaussian, or Bilateral), and the application shows the filtered result next to a difference map that highlights what changed.

To help compare the filters, the application also calculates quality metrics between the uploaded image and the filtered result (MSE, PSNR, and F1-score), measures the filter's runtime, and gives a simple quality rating (High, Medium, or Low).

The web interface is built with PHP and Bootstrap, and the image processing runs in a separate Flask API using OpenCV.

## Features
Upload an image and apply a Median, Gaussian, or Bilateral filter
View the filtered image and a difference map
See MSE, PSNR, F1-score, and runtime for each filter
Get an automatic quality rating based on the metrics

## Tech Stack
Frontend: PHP, Bootstrap, JavaScript
Backend: Python, Flask, OpenCV, NumPy, scikit-learn, Matplotlib