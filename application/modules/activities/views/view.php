<style type="text/css">
.ekko-lightbox-nav-overlay {
    display: flex !important;
    pointer-events: none;
}
.ekko-lightbox-nav-overlay a {
    pointer-events: auto;
}
</style>
<section id="highlight">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="assets/images/activity/activity-txt.png" class="img-fluid">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <img src="<?php echo $activity->banner_path(); ?>" class="img-fluid highlight-img">
            </div>
        </div>
    </div>
</section>
<section id="activity-section" class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-12 text-right">
            <a class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($activity->permanent_url()); ?>"><strong>Share</strong> <img src="assets/images/icon-share.png" class="img-fluid"></a> <a class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($activity->permanent_url()); ?>"><img src="assets/images/icon-fb.png" class="img-fluid"></a> <a href="line://msg/text/<?php echo urlencode($activity->permanent_url()); ?>" target="_blank"><img src="assets/images/icon-line.png" class="img-fluid"></a>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center"><?php echo $activity->title; ?></h4>
                        <?php echo $activity->detail; ?>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <section id="activity-slide">
                            <div class="owl-carousel owl-theme">
                                <?php foreach($medias as $media): ?>
                                <div class="item">
                                    <a href="<?php echo ($media->type=='image')?$media->image_path():$media->youtube; ?>" data-toggle="lightbox" data-gallery="activity-gallery" data-type="<?php echo $media->type; ?>">
                                        <img src="<?php echo $media->thumbnail_path(); ?>" class="img-fluid">
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
$(document).ready(function(){
    $('.fb-share').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
    });

    $("#activity-slide .owl-carousel").owlCarousel({
        loop:true,
        items:2	,
        margin:10,
        video:true,
        autoplay:true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        responsive:{
            768:{
                items:4	
            }
        }
    });
    
});
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
        alwaysShowClose: true,
        leftArrow: '<img src="assets/images/activity/arrow-left.png" class="img-fluid">',
        rightArrow: '<img src="assets/images/activity/arrow-right.png" class="img-fluid">'
    });
});
</script>