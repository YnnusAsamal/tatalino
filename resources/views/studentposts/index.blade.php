@extends('layouts.student')
@section('content')
<style>
  body {
    font-family: Georgia, serif;
    background-color: #fdfaf3;
    color: #2E7D32 !important;
  }

  header {
    text-align: center;
    padding: 2rem 1rem 1rem;
  }

  header h1 {
    font-size: 2.5rem;
    margin: 0;
    color: #2E7D32;
  }

  header p {
    font-size: 0.9rem;
    margin-top: 0.5rem;
    color: #444;
    letter-spacing: 1px;
  }

  .featured {
    background: url('https://picsum.photos/1200/400?grayscale') no-repeat center/cover;
    padding: 3rem 2rem;
    color: #fff;
    text-align: left;
    position: relative;
    margin-bottom: 2rem;
  }

  .featured h2 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
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
    padding: 0.6rem 1.2rem;
    font-size: 1rem;
    cursor: pointer;
  }

  main.container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 1.5rem;
    padding: 1rem 2rem;
  }

  section.works, section.essays {
    margin-bottom: 2rem;
  }

  h3 {
    color: #1d3928;
    margin-bottom: 1rem;
  }

  .works-grid, .essays-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 1rem;
  }

  .card {
    background: #f3f0e7;
    padding: 1rem;
    text-align: center;
    border-radius: 6px;
  }

  .card img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 4px;
    margin-bottom: 0.5rem;
  }

  .card strong {
    display: block;
    margin-top: 0.3rem;
    font-size: 0.95rem;
  }

  .card p {
    font-size: 0.85rem;
    color: #333;
    margin: 0;
  }

  .sidebar {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
  }

  .writer, .news, .poems {
    background: #f8f6f1;
    padding: 1rem;
    border-radius: 6px;
  }

  .writer img, .poems img {
    width: 100%;
    border-radius: 6px;
    margin-bottom: 0.5rem;
  }

  .writer h4 {
    margin: 0.5rem 0 0.2rem;
  }

  .writer a {
    color: #8b4c0f;
    text-decoration: none;
    font-size: 0.9rem;
  }

  .news button {
    margin-top: 0.8rem;
    background: #c8962d;
    border: none;
    color: white;
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    cursor: pointer;
  }

  .submit {
    text-align: center;
    margin: 2rem 0 3rem;
  }

  .submit a {
    background: #c8962d;
    color: white;
    font-size: 1.1rem;
    border: none;
    padding: 0.8rem 2rem;
    cursor: pointer;
    border-radius: 4px;
  }

  @media (max-width: 768px) {
    main.container {
      grid-template-columns: 1fr;
    }

    header h1 {
      font-size: 2rem;
    }

    .featured h2 {
      font-size: 1.5rem;
    }
  }
</style>

<div class="container-fluid p-0">
  <header>
    <h1>Tinta’t Talino</h1>
    <p>THE CCNHS PORTAL FOR WORDS AND WONDER</p>
  </header>

  <section class="navigation">
      @auth
        <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
           
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('studentposts.index') }}">Home</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Essays</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Collections</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Explore</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ route('studentposts.show', auth()->user()->id) }}">Publish</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">About</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Contact</a>
            </li>
        </ul>
    @else
        <!-- <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('register') }}">Register</a>
            </li>
        </ul> -->
    @endauth

  </section>
  <hr>
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
    <a href="{{ route('studentposts.create') }}">Submit Your Work</a>
  </div>
</div>

@endsection
