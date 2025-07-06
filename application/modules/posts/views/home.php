<section id="news">
  <h1>News</h1>
  <div class="row">
    <?php foreach ($posts as $key => $post): ?>
    <div class="col-md-6 col-lg-4">
      <a class="news-card<?php echo $key > 2 ? ' d-none d-md-block' : ''; ?>" href="<?php echo $post->url(); ?>">
        <img class="img-max" src="<?php echo $post->thumbnail_path(); ?>">
        <div class="news-card-title">
          <?php echo $post->title; ?>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="text-center">
    <a class="button-gradient" href="news">All News</a>
  </div>
</section>