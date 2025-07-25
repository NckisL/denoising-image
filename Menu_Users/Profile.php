<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prediksi Kesehatan janin</title>
    <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 30px 20px;
    }

    .title {
      text-align: center;
      color: #007BFF;
      font-size: 2.8em;
      font-weight: 700;
      margin-bottom: 30px;
    }

    .card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      padding: 30px;
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-4px);
    }

    .card h2 {
      color: #007BFF;
      font-size: 1.8em;
      margin-bottom: 20px;
      text-align: center;
    }

    .Paragraf {
      margin-bottom: 16px;
      line-height: 1.8;
      font-size: 1.1em;
      text-align: justify;
    }

    .creator-section {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .creator {
      display: flex;
      align-items: center;
      background-color: #f9f9f9;
      padding: 15px 20px;
      border-radius: 10px;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07);
      transition: transform 0.2s;
    }

    .creator:hover {
      transform: scale(1.02);
    }

    .creator img {
      width: 75px;
      height: 75px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 20px;
      border: 2px solid #007BFF;
    }

    .creator-info {
      display: flex;
      flex-direction: column;
    }

    .creator-info strong {
      font-size: 1.2em;
      color: #333;
    }

    .creator-info span {
      font-size: 0.95em;
      color: #666;
    }

    @media (max-width: 600px) {
      .creator {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      .creator img {
        margin-right: 0;
        margin-bottom: 10px;
      }

      .creator-info {
        align-items: flex-start;
      }
    }
    </style>
</head>
<body>

<div class="container">
    <h1 class="title">Prediksi Kesehatan Janin</h1>

    <div class="card">
        <h2>Tentang Aplikasi</h2>
        <div class="Paragraf">
            Aplikasi ini merupakan sistem berbasis web yang dirancang untuk meningkatkan kualitas citra digital dengan mengurangi noise menggunakan tiga teknik filtering: <strong>Median Filter</strong>, <strong>Gaussian Filter</strong>, dan <strong>Bilateral Filter</strong>. Citra digital sering mengalami gangguan noise seperti salt and pepper, Gaussian noise, dan periodic noise, yang dapat menurunkan akurasi analisis visual, terutama dalam bidang seperti medis, pemetaan, dan keamanan.
        </div>
        <div class="Paragraf">
            Filter median sangat efektif dalam menghilangkan noise impulsif seperti salt and pepper, sedangkan Gaussian filter lebih cocok untuk noise yang tersebar secara normal. Bilateral filter memiliki keunggulan dalam menghaluskan citra sambil tetap mempertahankan tepi objek, menjadikannya ideal untuk aplikasi yang membutuhkan pelestarian detail.
        </div>
        <div class="Paragraf">
            Aplikasi ini membandingkan ketiga teknik filter tersebut berdasarkan kualitas hasil yang diukur dengan dua metrik evaluasi utama, yaitu <strong>PSNR (Peak Signal-to-Noise Ratio)</strong> dan <strong>MSE (Mean Squared Error)</strong>. Tujuan akhirnya adalah untuk mengidentifikasi filter mana yang paling efektif dalam mempertahankan kualitas citra setelah proses reduksi noise dilakukan.
        </div>
    </div>

    <div class="card">
        <h2>Pembuat Website</h2>
        <div class="creator-section">
            <div class="creator">
                <img src="assets/Pembuat 1.png" alt="Yohani">
                <div class="creator-info">
                    <strong>Yohanes Saputra</strong>
                    <span>412022009</span>
                </div>
            </div>
            <div class="creator">
                <img src="assets/Pembuat 2.png" alt="Hinaa">
                <div class="creator-info">
                    <strong>Henokh Eleazar</strong>
                    <span>412022015</span>
                </div>
            </div>
            <div class="creator">
                <img src="assets/Pembuat 3.jpg" alt="Nama3">
                <div class="creator-info">
                    <strong>Nicholas Agustinus</strong>
                    <span>412022014</span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
