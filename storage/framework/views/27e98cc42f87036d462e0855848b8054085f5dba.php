
<?php $__env->startSection('content'); ?>
<head>
     <title>Tinta’t Talino</title>
  <style>
    body {
      font-family: Georgia, serif;
      margin: 0;
      padding: 0;
      background-color: #fdfaf3;
      color: #2c2c2c;
    }

    header {
      text-align: center;
      padding: 2rem 1rem 1rem;
    }
    header h1 {
      font-size: 2.5rem;
      margin: 0;
      color: #1d3928;
    }
    header p {
      font-size: 0.9rem;
      letter-spacing: 1px;
      margin: 0.5rem 0;
      color: #444;
    }

    .featured {
      background: url('https://picsum.photos/1200/400?grayscale') no-repeat center/cover;
      padding: 4rem 2rem;
      color: #fff;
      text-align: left;
      position: relative;
    }
    .featured h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    .featured p {
      font-size: 1rem;
      max-width: 500px;
    }
    .featured button {
      margin-top: 1rem;
      background: #c8962d;
      color: #fff;
      border: none;
      padding: 0.7rem 1.5rem;
      font-size: 1rem;
      cursor: pointer;
    }

    .container {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 2rem;
      padding: 2rem;
    }

    .works, .essays {
      margin-bottom: 2rem;
    }
    h3 {
      margin-bottom: 1rem;
      color: #1d3928;
    }
    .works-grid, .essays-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 1rem;
    }
    .card {
      background: #f3f0e7;
      padding: 1rem;
      text-align: center;
    }
    .card img {
      width: 100%;
      height: 100px;
      object-fit: cover;
      margin-bottom: 0.5rem;
    }
    .card p {
      margin: 0;
      font-size: 0.85rem;
      color: #333;
    }
    .card strong {
      display: block;
      margin-top: 0.3rem;
    }

    .sidebar {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }
    .writer {
      text-align: center;
      background: #f8f6f1;
      padding: 1rem;
    }
    .writer img {
      width: 100%;
      border-radius: 4px;
      margin-bottom: 0.5rem;
    }
    .writer h4 {
      margin: 0.5rem 0;
    }
    .writer a {
      color: #8b4c0f;
      text-decoration: none;
      font-size: 0.9rem;
    }
    .news, .poems {
      background: #f8f6f1;
      padding: 1rem;
    }
    .news button {
      margin-top: 1rem;
      background: #c8962d;
      border: none;
      color: white;
      padding: 0.5rem 1rem;
      cursor: pointer;
    }

    .submit {
      text-align: center;
      margin: 2rem 0;
    }
    .submit button {
      background: #c8962d;
      color: white;
      font-size: 1.2rem;
      border: none;
      padding: 1rem 2rem;
      cursor: pointer;
    }
  </style>
</head>
<div class="container-fluid mt-3">

<body>
  <header>
    <h1>Tinta’t Talino</h1>
    <p>THE CCNHS PORTAL FOR WORDS AND WONDER</p>
  </header>

  <section class="featured">
    <h2>Featured Work of the Month</h2>
    <p>A mesmerizing poem on the beauty of nature and the human spirit</p>
    <button>Read More</button>
  </section>

  <main class="container">
    <div>
      <section class="works">
        <h3>Featured Student Works</h3>
        <div class="works-grid">
          <div class="card">
            <img src="https://picsum.photos/150/100?1" alt="">
            <strong>The Painful Journey</strong>
            <p>Jean Dautin</p>
          </div>
          <div class="card">
            <img src="https://picsum.photos/150/100?2" alt="">
            <strong>Echoes of Silence</strong>
            <p>Armando Jose</p>
          </div>
          <div class="card">
            <img src="https://picsum.photos/150/100?3" alt="">
            <strong>The Silent Fiano</strong>
            <p>Katrina Dillera</p>
          </div>
        </div>
      </section>

      <section class="essays">
        <h3>Latest Essays</h3>
        <div class="essays-grid">
          <div class="card">
            <img src="https://picsum.photos/150/100?4" alt="">
            <strong>The Power of Perseverance</strong>
            <p>John C.</p>
          </div>
          <div class="card">
            <img src="https://picsum.photos/150/100?5" alt="">
            <strong>The Act of Storytelling</strong>
            <p>Katrina T.</p>
          </div>
        </div>
      </section>
    </div>

    <aside class="sidebar">
      <div class="writer">
        <img src="https://picsum.photos/200/200?woman" alt="">
        <h4>Writer of the Month</h4>
        <p><strong>Anna Santos</strong></p>
        <p>Join us for a literary workshop on November 20.</p>
        <a href="#">Learn More</a>
      </div>

      <div class="news">
        <h4>Literary Event</h4>
        <p>Join us for a literary workshop on November 20</p>
        <button>Learn More</button>
      </div>

      <div class="poems">
        <h4>Poems of Hope</h4>
        <img src="https://picsum.photos/120/150?book" alt="">
      </div>
    </aside>
  </main>

  <div class="submit">
    <button>Submit Your Work</button>
  </div>
</body>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/studentposts/index.blade.php ENDPATH**/ ?>