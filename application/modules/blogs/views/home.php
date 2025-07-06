<section id="blog">
  <h1>Blog</h1>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php foreach ($blogs as $blog): ?>
      <div class="swiper-slide">
        <div class="card shadow">
          <img class="img-max shadow rounded" src="<?php echo $blog->thumbnail_path(); ?>" alt="<?php echo $blog->title; ?>">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $blog->title; ?>
            </h5>
            <p class="card-text">
              <?php echo $blog->intro(); ?>
            </p>
            <a class="readmore" href="<?php echo $blog->url(); ?>"><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <div class="text-center">
    <a class="button-gradient" href="blog">All Blog</a>
  </div>
</section>