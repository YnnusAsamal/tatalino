@extends('layouts.student')
@section('content')
<style>
  body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Oswald', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 13px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
  }

   #particles-js {
        pointer-events: none;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: -1; /* IMPORTANT */
        top: 0;
        left: 0;
        background: #ffffff; /* white background */
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
<div id="particles-js"></div>
<div class="container-fluid p-0">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="float-start">Category: {{ $category->name }}</h3>
        <a href="{{ route('collections.index') }}" class="btn btn-outline-secondary btn-sm float-end">Back to Collections</a>
      </div>
    </div>

    <div class="row mt-3">
        @foreach($posts as $post)
        <div class="col mb-3">
              <div class="card mb-3 shadow">
              <div class="card-header d-flex align-items-center">
                  @php
                      $images = json_decode($post->users->profile->image ?? '[]', true);
                      $profileImage = $images[0] ?? null;
                  @endphp
                  @if($profileImage)
                      <img src="{{ asset('public/assets/userprofiles/' . $profileImage) }}" alt="Profile Image" class="rounded-profile me-3" style="width: 50px; height: 50px; border: 2px solid #FBC02D;">
                  @else
                      <div class="rounded-profile me-3" style="width: 50px; height: 50px; background-color: #ddd;"></div>
                  @endif

                  <div>
                      <strong>{{ $post->users->name ?? 'NA' }}</strong><br>
                      <small class="text-muted">{{ $post->created_at->diffForHumans() ?? 'NA' }}</small><br>
                      <small class="text-muted"><span class="badge bg-secondary ">{{ optional($post->category)->name ?? 'Uncategorized' }}</span></small>
                  </div>
                  <div class="float-right ms-auto">
                      @if($post->status === 'Published')
                          <span class="badge bg-success">Published</span>
                      @else
                              <span class="badge bg-warning text-dark">Draft</span>
                      @endif
                  </div>
              </div>

              <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <div class="position-relative">
                      <div class="post-content text-dark" id="post-content-{{ $post->id }}">
                          {!! $post->content !!}
                      </div>

                      <button 
                          class="btn btn-link p-0 see-more-btn d-none" 
                          id="toggle-btn-{{ $post->id }}"
                          onclick="toggleContent({{ $post->id }})">
                          See More
                      </button>
                  </div>

                  @if($post->image)
                      <img src="{{ asset('public/assets/posts/' . $post->image) }}" alt="Post Image" class="img-fluid rounded mt-3" style="max-width: 100%; height: auto;">
                  @endif
              </div>

              <div class="card-footer d-flex gap-2">
                  @php
                      $likedUsers = $post->likes->map(function($like) {
                          return $like->user->name ?? '';
                      })->implode(', ');
                  @endphp

                  <form action="{{ route('post.like', $post->id) }}" method="POST">
                      @csrf
                      <button 
                          class="btn btn-sm btn-outline-danger"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          title="{{ $likedUsers ?: 'No likes yet' }}">
                          ❤️ {{ $post->likes->count() }}
                      </button>
                  </form>
                  <button class="btn btn-outline-primary btn-sm flex-grow-1">💬 Comment</button>
              </div>
          </div>
            <!-- <div class="card p-3">
                <div class="card-header">

                </div>
                <h5>{{ $post->title }}</h5>
                <p>{{ Str::limit($post->body, 100) }}</p>
                <a href="{{ route('studentposts.show', $post->id) }}" class="btn btn-sm btn-primary">Read More</a>
            </div> -->
        </div>
        @endforeach
    </div>
  </div>


  <div class="submit">
    <a href="{{ route('studentposts.create') }}">Submit Your Work</a>
  </div>
</div>

<script>
particlesJS("particles-js", {
  "particles": {
    "number": { "value": 70 },
    "size": { "value": 3 },
    "color": { "value": "#a855f7" },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#c084fc",
      "opacity": 0.4
    },
    "move": { "speed": 2 }
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

@endsection
