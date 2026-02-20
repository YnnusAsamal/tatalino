
<?php $__env->startSection('content'); ?>
<style>
  body {
    font-family: 'Oswald', sans-serif;
    background: #f1f2f7;
    color: #797979;
    padding: 0;
    margin: 0;
    font-size: 13px;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
  }

  header {
    text-align: center;
    padding: 2rem 1rem 1rem;
  }

  header h1 {
    font-size: 2.5rem;
    color: #2E7D32;
    margin: 0;
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
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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

  #particles-js {
    pointer-events: none;
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 0;
    top: 0;
    left: 0;
  }

  .modal {
    z-index: 1050 !important;
  }

  .modal-backdrop {
    z-index: 1040 !important;
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

  .carousel .card {
    transition: transform 0.3s ease;
}
.carousel .card:hover {
    transform: scale(1.03);
}
</style>

<div id="particles-js"></div>

<div class="container-fluid p-0">
  <header>
    <h1>Tinta’t Talino</h1>
    <p>THE CCNHS PORTAL FOR WORDS AND WONDER</p>
  </header>

  <section class="navigation mb-3">
    <?php if(auth()->guard()->check()): ?>
      <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
          <li class="nav-item"><a class="nav-link text-dark" href="<?php echo e(route('studentposts.index')); ?>">Home</a></li>|
          <li class="nav-item"><a class="nav-link text-dark" href="<?php echo e(route('essays.index')); ?>">Essays</a></li>|
          <li class="nav-item"><a class="nav-link text-dark" href="<?php echo e(route('collections.index')); ?>">Collections</a></li>|
          <li class="nav-item"><a class="nav-link text-dark" href="">Explore</a></li>|
          <li class="nav-item"><a class="nav-link text-dark" href="<?php echo e(route('publish.index')); ?>">Publish</a></li>|
          <li class="nav-item"><a class="nav-link text-dark" href="">About</a></li>|
          <li class="nav-item"><a class="nav-link text-dark" href="">Contact</a></li>
      </ul>
    <?php endif; ?>
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
          <?php $__currentLoopData = $featuredPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card">
            <img src="<?php echo e(asset('public/assets/posts/' . $featuredPost->image)); ?>" alt="">
            <strong><?php echo e($featuredPost->title); ?></strong>
            <p><?php echo e($featuredPost->users->name); ?></p>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <!-- <div class="card">
            <img src="https://picsum.photos/150/100?2" alt="">
            <strong>Echoes of Silence</strong>
            <p>Armando Jose</p>
          </div>
          <div class="card">
            <img src="https://picsum.photos/150/100?3" alt="">
            <strong>The Silent Fiano</strong>
            <p>Katrina Dillera</p>
          </div> -->
        </div>
      </section>

    <section class="essays py-4">
    <h3 class="mb-4">Latest Essays</h3>

    <div id="essayCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <?php $__currentLoopData = $essays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $essay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                
                <div class="card mx-auto shadow"
                     style="max-width: 600px; cursor:pointer;"
                     data-bs-toggle="modal"
                     data-bs-target="#essayModal-<?php echo e($essay->id); ?>">

                    <img src="<?php echo e(asset('public/assets/posts/' . $essay->image)); ?>"
                         class="card-img-top"
                         style="height:300px; object-fit:cover;"
                         alt="Essay Image">

                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo e($essay->title); ?></h5>
                        <p class="text-muted mb-0"><?php echo e($essay->users->name); ?></p>
                    </div>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="essayModal-<?php echo e($essay->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo e($essay->title); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <?php if($essay->image): ?>
                            <img src="<?php echo e(asset('public/assets/posts/' . $essay->image)); ?>"
                                 class="img-fluid mb-3">
                            <?php endif; ?>
                            <p><strong>Author:</strong> <?php echo e($essay->users->name); ?></p>
                            <div><?php echo $essay->content; ?></div>
                        </div>
                        <div class="modal-footer">
                            <small class="text-muted">
                                Published: <?php echo e($essay->created_at->format('F d, Y')); ?>

                            </small>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#essayCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#essayCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>
    </div>

    <aside class="sidebar">
      <div class="writer">
        <?php $__currentLoopData = $writer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $writers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
          <div class="card-body">
             <?php
                $images = json_decode($writers->profile->image ?? '[]', true);
                $profileImage = $images[0] ?? null;
            ?>
            <?php if($profileImage): ?>
                <img src="<?php echo e(asset('public/assets/userprofiles/' . $profileImage)); ?>" alt="Profile Image" class="rounded-profile me-3" style="width: 50px; height: 50px; border: 2px solid #FBC02D;">
            <?php else: ?>
                <div class="rounded-profile me-3" style="width: 50px; height: 50px; background-color: #ddd;"></div>
            <?php endif; ?>
            <h4>Writer of the Month</h4>
            <p><strong><?php echo e($writers->name); ?></strong></p>
            <p><?php echo e($writers->profile->bio); ?></p>
            <a href="#">Learn More</a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="news">
        <div class="card">
          <div class="card-body">
            <h4>Literary Event</h4>
            <p>Join us for a literary workshop on November 20</p>
            <button>Learn More</button>
          </div>
        </div>
        
      </div>
    </aside>
  </main>

  <div class="submit">
    <a href="<?php echo e(route('studentposts.create')); ?>">Submit Your Work</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/studentposts/index.blade.php ENDPATH**/ ?>