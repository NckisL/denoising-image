<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noise Reduction</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #3f51b5;
      padding: 25px;
      text-align: center;
      color: white;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    header img {
      height: 40px;
      vertical-align: middle;
      margin-right: 10px;
    }
    h1 {
      font-size: 24px;
      display: inline;
    }

    /* Batasi lebar konten utama */
    main {
      max-width: 1000px;
      background-color: white;
      margin: 40px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    h2 {
      font-size: 20px;
      color: #3f51b5;
      border-left: 5px solid #00bcd4;
      padding-left: 10px;
      margin-top: 30px;
      margin-bottom: 15px;
      font-weight: 600;
    }

    p, li {
      font-size: 16px;
      line-height: 1.7;
      text-align: justify;
    }

    ul {
      padding-left: 20px;
    }

    /* Optional: Transition Effects */
    section {
      transition: all 0.3s ease-in-out;
    }

    section:hover {
      transform: translateY(-2px);
    }
  </style>
</head>
<body>

  <header>
    <h1>Noise Reduction</h1>
  </header>

  <main>
  <section>
    <h2>Latar Belakang</h2>
    <p>
      Citra digital memiliki peran penting dalam berbagai bidang, seperti medis, pemetaan satelit, keamanan, dan rekayasa komputer. Namun, citra yang dihasilkan dari proses digitalisasi seringkali mengalami gangguan berupa noise, yang dapat menurunkan kualitas visual dan memengaruhi akurasi analisis lebih lanjut. Noise ini bisa muncul dalam berbagai bentuk, seperti salt and pepper, Gaussian, atau periodic noise, yang umumnya disebabkan oleh kesalahan perangkat atau gangguan saat transmisi data.
    </p>
    <p>
      Salah satu solusi untuk mengatasi masalah ini adalah dengan menggunakan teknik filtering, yang bertujuan mengurangi noise tanpa menghilangkan detail penting pada citra. Beberapa teknik yang umum digunakan adalah median filter, Gaussian filter, dan bilateral filter. Masing-masing teknik memiliki kelebihan tersendiri dalam menghadapi jenis noise tertentu; misalnya, median filter efektif untuk noise impulsif seperti salt and pepper, Gaussian filter cocok untuk noise yang tersebar merata, sedangkan bilateral filter mampu mereduksi noise sambil mempertahankan tepi objek.
    </p>
    <p>
      Meskipun teknik-teknik ini sudah banyak diterapkan, tantangan utama adalah memilih metode yang paling sesuai untuk kondisi tertentu agar kualitas citra tetap optimal. Oleh karena itu, penelitian ini bertujuan membandingkan kinerja median filter, Gaussian filter, dan bilateral filter dalam meningkatkan kualitas citra yang terkontaminasi noise. Evaluasi dilakukan menggunakan metrik PSNR (Peak Signal-to-Noise Ratio) dan MSE (Mean Squared Error) untuk menilai hasil pemrosesan. Diharapkan, hasil penelitian ini dapat memberikan rekomendasi metode filtrasi yang efektif untuk berbagai kebutuhan pengolahan citra digital.
    </p>
  </section>

  <section>
    <h2>Rumusan Masalah</h2>
    <ul>
      <li>Apakah terdapat perbedaan signifikan dalam kualitas citra yang dihasilkan oleh median filter, Gaussian filter, dan bilateral filter pada citra alami yang mengandung noise?</li>
      <li>Bagaimana penerapan median filter, Gaussian filter, dan bilateral filter dalam mengurangi noise pada citra alami untuk meningkatkan kualitas citra?</li>
      <li>Metode filtering manakah yang paling efektif dalam mereduksi berbagai jenis noise seperti salt and pepper, Gaussian, dan periodic noise?</li>
      <li>Sejauh mana masing-masing filter mampu mempertahankan detail penting pada citra setelah proses reduksi noise dilakukan?</li>
    </ul>
  </section>

  <section>
    <h2>Tujuan Penelitian</h2>
    <ul>
      <li>
        menganalisis dan membandingkan efektivitas dari tiga jenis filter median filter, Gaussian filter, dan bilateral filter.
      </li>
      <li>
        mengetahui sejauh mana setiap filter dapat mempertahankan kualitas dan detail citra setelah proses reduksi noise.
      </li>
      <li>
       memberikan rekomendasi mengenai teknik reduksi noise yang lebih efisien berdasarkan hasil eksperimen yang dilakukan.
      </li>
    </ul>
  </section>


  <section>
    <h2>Manfaat Penelitian</h2>
    <ul>
      <li>
        Memberikan wawasan yang lebih dalam tentang metode-metode pengolahan citra untuk reduksi noise, khususnya dalam konteks pengolahan citra digital yang mengandung berbagai jenis gangguan.
      </li>
      <li>
        Menjadi acuan bagi penelitian lebih lanjut dalam pengembangan teknik pengolahan citra yang lebih efisien dan efektif, baik dalam aplikasi medis, pengawasan, maupun bidang lainnya yang membutuhkan citra berkualitas tinggi.
      </li>
      <li>
        Memberikan solusi praktis bagi pengolahan citra dalam kondisi noise yang dapat meningkatkan kualitas citra yang lebih akurat dan tajam.
      </li>
    </ul>
  </section>

  </main>

</body>
</html>
