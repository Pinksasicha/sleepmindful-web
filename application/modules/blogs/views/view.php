<div id="news-detail-page">
  <div class="container">

    <img class="img-cover" src="<?php echo $blog->banner_path(); ?>" alt="<?php echo $blog->title; ?>">
    <h1><?php echo $blog->title; ?>
    </h1>
    <div class="content-meta">
      <div class="author">
        <img src="assets/images/icon-writing.png" alt="Writing Icon">
        <?php echo date('d M Y', strtotime($blog->created)); ?>
      </div>
      <div class="share-tool">
        <a class="facebook-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($blog->permanent_url()); ?>">
          <img src="assets/images/icon-facebook.png" alt="Facebook Icon">
        </a>
        <a class="twitter-share" href="http://twitter.com/share?url=<?php echo urlencode($blog->permanent_url()); ?>&text=<?php echo urlencode($blog->title); ?>">
          <img src="assets/images/icon-twitter.png" alt="Twitter Icon">
        </a>
      </div>
    </div>
    <div class="news-content">
      <?php echo $blog->detail; ?>
    </div>
    <div class="news-relate">
      <h2><span>Related Stories</span></h2>
      <section id="blog">
        <div class="row">
          <?php foreach ($blogs as $blog): ?>
          <div class="col-lg-4">
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
      </section>
    </div>
  </div>
</div>