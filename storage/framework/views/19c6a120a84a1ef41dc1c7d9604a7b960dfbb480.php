
<?php $__env->startSection('content'); ?>
<style>
  body{
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

  .card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2E7D32;  /* Changed to match your green */
    margin-bottom: 0.5rem;
}

.read-more {
    display: inline-block;
    font-size: 0.85rem;
    color: #2E7D32;           /* Green text */
    border: 1px solid #2E7D32; /* Green border */
    padding: 0.3rem 0.7rem;
    border-radius: 4px;
    text-decoration: none;
    transition: background 0.2s, color 0.2s;
}

.read-more:hover {
    background-color: #2E7D32;  /* Green background on hover */
    color: #fff;                 /* White text on hover */
}
</style>
<div id="particles-js"></div>
<div class="container-fluid p-0">
  <header>
    <h1>Tinta’t Talino</h1>
    <p>THE CCNHS PORTAL FOR WORDS AND WONDER</p>
  </header>

  <section class="navigation">
      <?php if(auth()->guard()->check()): ?>
        <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
           
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?php echo e(route('studentposts.index')); ?>">Home</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Essays</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo e(route('collections.index')); ?>">Collections</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Explore</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo e(route('publish.index')); ?>">Publish</a>
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
    <?php else: ?>

    <?php endif; ?>

  </section>
  <hr>

  <main class="container">
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row">
          <div class="col mb-3">
            <div class="card" onclick="window.location='<?php echo e(route('collections.show', $category->id)); ?>'">
              <div class="card-body">
                  <h5 class="card-title"><?php echo e($category->name); ?> - <?php echo e($category->subcategory); ?></h5>
                  <p class="card-text"><?php echo e($category->posts_count); ?> <?php echo e(Str::plural('Post', $category->posts_count)); ?></p>
                  <span class="read-more">Read More</span>
              </div>
            </div>
              <!-- <div class="card p-3" onclick="window.location='<?php echo e(route('collections.show', $category->id)); ?>'">
                  <h5 class="card-title"><?php echo e($category->name); ?> - <?php echo e($category->subcategory); ?></h5>
                  <p class="card-text"><?php echo e($category->posts_count); ?> <?php echo e(Str::plural('Post', $category->posts_count)); ?></p>
                  <span class="read-more">Read More</span>
              </div> -->
          </div>
          
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </main>

  <!-- <div class="submit">
    <a href="<?php echo e(route('studentposts.create')); ?>">Submit Your Work</a>
  </div> -->
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/collections/index.blade.php ENDPATH**/ ?>