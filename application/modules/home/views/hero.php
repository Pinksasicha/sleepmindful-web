<section id="hero">
  <div class="row no-gutters">
    <div class="col-lg-6">
      <div class="content">
      <div class="container" style="bottom: 20px;position: relative;">
      <img src="assets/images/Desktop/SleepMindFul_Banner.png" alt="SleepMindFul_Banner" width="120" class="center">
      </div>
        <h2>EXCELLENT HEALTH CARE SERVICES</h2>

        <h1>WELCOME TO<br>
          SLEEPMINDFUL</h1>

        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="siema">
        <?php foreach ($img as $image):?>
          <div><img class="img-img-responsive" width="100%" height="552" src="<?php echo "uploads/banner/".$image->image;?>" /></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<script src="assets/js/siema.min.js"></script>
<script>
const mySiema = new Siema({
  duration: 500,
  loop: true,
});

// listen for keydown event
setInterval(() => mySiema.next(), 3000)
</script>