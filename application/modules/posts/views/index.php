<div class="container">
  <?php echo Modules::run('home/hero'); ?>
  <section id="news" class="pb-5">
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
    <?php echo $posts->pagination(); ?>
  </section>
</div>