<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Filter Citra</title>
  <style>
    .container {
      display: flex;
      flex-direction: column;
      gap: 30px;
      padding: 30px 20px;
    }

    .top-panel {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .column {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 320px;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .column:hover {
      transform: scale(1.02);
    }

    .column h2 {
      font-size: 18px;
      margin-bottom: 15px;
      color: #3f51b5;
    }

    .image-box {
      background-color: #f0f0f0;
      border: 2px dashed #ccc;
      border-radius: 8px;
      width: 100%;
      height: 280px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .image-box img {
      max-width: 100%;
      max-height: 100%;
      border-radius: 5px;
      object-fit: contain;
    }

    input[type="file"] {
      margin-top: 10px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      background-color: #f9f9f9;
      cursor: pointer;
      width: 100%;
    }

    .metrics {
      text-align: left;
      font-size: 14px;
      padding: 5px 10px;
    }

    .metrics p {
      margin: 4px 0;
    }

    @media (max-width: 900px) {
      .top-panel {
        flex-direction: column;
        align-items: center;
      }
    }

    /* Loading indicator */
    .loading-text {
      font-size: 14px;
      color: #666;
      font-style: italic;
      margin-top: 5px;
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- Panel Gambar Asli -->
    <div class="top-panel">
      <div class="column">
        <h2>Gambar Asli</h2>
        <div class="image-box" id="original-image-box">
          <img id="original-image" src="" alt="Gambar Asli" style="display: none;" />
        </div>
        <input type="file" id="upload-image" accept="image/*" />
        <div id="upload-status" class="loading-text"></div>
      </div>
    </div>

    <!-- Panel Hasil Filter -->
    <div class="top-panel" id="filter-panel"></div>
  </div>

  <script>
    const baseURL = 'http://localhost:5000';
    const filters = ['median', 'gaussian', 'bilateral'];
    const filterNames = {
      median: 'Median Filter',
      gaussian: 'Gaussian Filter',
      bilateral: 'Bilateral Filter'
    };

    let uploadedPath = '';

    document.getElementById('upload-image').addEventListener('change', async function (event) {
      const file = event.target.files[0];
      if (!file) return;

      const uploadStatus = document.getElementById('upload-status');
      uploadStatus.textContent = 'Mengupload gambar...';

      const formData = new FormData();
      formData.append('image', file);

      try {
        const res = await fetch(baseURL + '/upload', {
          method: 'POST',
          body: formData
        });

        const data = await res.json();

        if (!res.ok) {
          throw new Error(data.error || 'Gagal upload gambar');
        }
        if (!data.path) throw new Error('Tidak ada path gambar yang diterima');

        uploadedPath = data.path;

        // Tampilkan gambar asli
        const originalImg = document.getElementById('original-image');
        originalImg.src = baseURL + uploadedPath + '?t=' + Date.now();
        originalImg.style.display = 'block';

        // Reset panel filter dan status
        document.getElementById('filter-panel').innerHTML = '';
        uploadStatus.textContent = '';

        // Terapkan filter satu-satu secara berurutan
        for (const filter of filters) {
          uploadStatus.textContent = `Menerapkan filter: ${filterNames[filter]}...`;
          await applyFilter(filter);
        }

        uploadStatus.textContent = 'Selesai menerapkan filter semua.';
      } catch (err) {
        console.error(err);
        alert('Terjadi kesalahan saat mengupload gambar:\n' + err.message);
        document.getElementById('upload-status').textContent = '';
      }
    });

    function createFilterColumn(title, filteredUrl, diffUrl, psnr, mse, f1, runtime, quality) {
      const column = document.createElement('div');
      column.className = 'column';

      column.innerHTML = `
        <h2>${title}</h2>
        <div class="image-box"><img src="${filteredUrl}" alt="Hasil ${title}" /></div>
        <div class="image-box"><img src="${diffUrl}" alt="Peta Perbedaan ${title}" /></div>
        <div class="metrics">
          <p><strong>PSNR:</strong> ${psnr}</p>
          <p><strong>MSE:</strong> ${mse}</p>
          <p><strong>F1-Score:</strong> ${f1}</p>
          <p><strong>Runtime:</strong> ${runtime} ms</p>
          <p><strong>Kualitas Gambar:</strong> ${quality}</p>
        </div>
      `;

      document.getElementById('filter-panel').appendChild(column);
    }

    async function applyFilter(filterType) {
      try {
        const res = await fetch(baseURL + '/apply_filter', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            image_path: uploadedPath,
            filter: filterType
          })
        });

        const data = await res.json();

        if (!res.ok) {
          throw new Error(data.error || `Gagal menerapkan filter ${filterType}`);
        }

        if (!data.filtered_image || !data.diff_image) {
          throw new Error("Data gambar hasil filter tidak lengkap");
        }

        const filteredUrl = baseURL + data.filtered_image + '?t=' + Date.now();
        const diffUrl = baseURL + data.diff_image + '?t=' + Date.now();

        createFilterColumn(
          filterNames[filterType],
          filteredUrl,
          diffUrl,
          data.psnr ?? '-',
          data.mse ?? '-',
          data.f1_score ?? '-',
          data.runtime ?? '-',
          data.quality ?? '-'
        );

      } catch (err) {
        console.error(err);
        alert(`Gagal menerapkan filter: ${filterType}\n${err.message}`);
      }
    }
  </script>

</body>
</html>
