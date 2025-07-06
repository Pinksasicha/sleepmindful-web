<section id="aboutus">
  <h1 class="d-block d-lg-none">About us</h1>
  <div class="swiper-container d-block d-lg-none">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="card shadow rounded">
          <div class="card-body">
            <img class="icon" src="assets/images/icon-doctor.png" alt="Icon Doctor">
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
          </div>
          <img class="card-img-bottom" src="assets/images/about-thumbnail-1.jpg" alt="">
        </div>
      </div>
      <div class="swiper-slide">
        <div class="card shadow rounded">
          <div class="card-body">
            <img class="icon" src="assets/images/icon-heart.png" alt="Icon Heart">
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
          </div>
          <img class="card-img-bottom" src="assets/images/about-thumbnail-2.jpg" alt="">
        </div>
      </div>
      <div class="swiper-slide">
        <div class="card shadow rounded">
          <div class="card-body">
            <img class="icon" src="assets/images/icon-medical-result.png" alt="Icon Medical Result">
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
          </div>
          <img class="card-img-bottom" src="assets/images/about-thumbnail-3.jpg" alt="">
        </div>
      </div>
      <div class="swiper-slide">
        <div class="card shadow rounded">
          <div class="card-body">
            <img class="icon" src="assets/images/icon-smartphone.png" alt="Icon Smartphone">
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
          </div>
          <img class="card-img-bottom" src="assets/images/about-thumbnail-4.jpg" alt="">
        </div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <div class="d-none d-lg-block">
    <div class="row display-flex">
      <div class="col-lg-4">
        <h1>About us</h1>
      </div>

      <!-- loop -->
      <?php foreach ($aboutus1 as $aboutus):?>
      <div class="col-lg-4">
        <div class="about-img-right">
          <img class="img-max" src="<?php echo "uploads/aboutus/".$aboutus->image;?>" alt="">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="about-body">
          <img class="icon" src="assets/images/icon-doctor.png" alt="Icon Doctor">
          <p class="card-text">
          <?php echo $aboutus->content;?>
          </p>
          <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
        </div>
      </div>
      <?php endforeach;?>
      <!-- end loop -->
      <?php foreach ($aboutus2 as $aboutus):?>
      <div class="col-lg-4">
        <div class="about-img-bottom">
          <img class="img-max" src="<?php echo "uploads/aboutus/".$aboutus->image;?>" alt="">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="about-body">
          <img class="icon" src="assets/images/icon-medical-result.png" alt="Icon Medical Result">
          <p class="card-text">
          <?php echo $aboutus->content;?>
          </p>
          <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
        </div>
      </div>
      <?php endforeach;?>
      <?php foreach ($aboutus3 as $aboutus):?>
      <div class="col-lg-4">
        <div class="about-img-bottom">
          <img class="img-max" src="<?php echo "uploads/aboutus/".$aboutus->image;?>" alt="">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="about-body">
          <img class="icon" src="assets/images/icon-heart.png" alt="Icon Heart">
          <p class="card-text">
          <?php echo $aboutus->content;?>
          </p>
          <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
        </div>
      </div>
      <?php endforeach;?>
      <?php foreach ($aboutus4 as $aboutus):?>
      <div class="col-lg-4">
        <div class="about-img-top">
          <img class="img-max" src="<?php echo "uploads/aboutus/".$aboutus->image;?>" alt="">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="about-body">
          <img class="icon" src="assets/images/icon-smartphone.png" alt="Icon Smartphone">
          <p class="card-text">
          <?php echo $aboutus->content;?>
          </p>
          <a class="readmore" href=""><img src="assets/images/icon-plus.png" alt="Icon Plus">READ MORE</a>
        </div>
      </div>
      <?php endforeach;?>

    </div>
  </div>
</section>