<div id="news-detail-page">
  <div class="container">

    <img class="img-cover" src="<?php echo $post->banner_path(); ?>" alt="<?php echo $post->title; ?>">
    <h1><?php echo $post->title; ?>
    </h1>
    <div class="content-meta">
      <div class="author">
        <img src="assets/images/icon-writing.png" alt="Writing Icon">
        <?php echo date('d M Y', strtotime($post->created)); ?>
      </div>
      <div class="share-tool">
        <a class="facebook-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($post->permanent_url()); ?>">
          <img src="assets/images/icon-facebook.png" alt="Facebook Icon">
        </a>
        <a class="twitter-share" href="http://twitter.com/share?url=<?php echo urlencode($post->permanent_url()); ?>&text=<?php echo urlencode($post->title); ?>">
          <img src="assets/images/icon-twitter.png" alt="Twitter Icon">
        </a>
      </div>
    </div>
    <div class="news-content">
      <?php echo $post->detail; ?>
    </div>
    <div class="news-relate">
      <h2><span>Related Stories</span></h2>
      <section id="news">
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
      </section>
    </div>
  </div>
</div>