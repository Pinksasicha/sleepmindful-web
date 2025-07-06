<section id="highlight-header">
    <img src="<?php echo $banner->image_path(); ?>" class="img-fluid d-none d-sm-block">
    <img src="<?php echo $banner->mobile_image_path(); ?>" class="img-fluid d-block d-sm-none">
</section>
<section id="activity-section" class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="assets/images/activity/activity-txt.png" class="img-fluid">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-10 offset-lg-1">
                <div class="row hover01">
                    <?php foreach($activities as $activity): ?>
                    <div class="col-lg-4">
                        <div class="activiy-box">
                            <figure>
                                <a href="activity/view/<?php echo $activity->id; ?>"><img src="<?php echo $activity->thumbnail_path(); ?>" class="img-fluid"></a>
                            </figure>
                            <h4><?php echo $activity->title; ?></h4>
                            <p>
                            <?php echo $activity->intro(); ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="scroller-status"  style="display:none;">
                    <div class="infinite-scroll-request loader-ellips">
                        <div id="loading" class="text-center scroller-status"><img src="assets/images/ajax-loader.gif" alt="loading"></div>
                    </div>
                    <p class="infinite-scroll-last text-center">End of content</p>
                    <p class="infinite-scroll-error"></p>
                </div>
                <?php if($activities->paged->total_pages > 1): ?>
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-wh btn-lg btn-block btn-load">อ่านต่อ</button>
                    </div>
                </div>
                <p class="pagination">
                    <a class="pagination__next" href="<?php echo base_url(); ?>activity?page=<?php echo $activities->paged->next_page; ?>">Next page</a>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script>
$(function(){
    $('.hover01').infiniteScroll({
        path: '.pagination__next',
        append: '.hover01 .col-lg-4',
        status: '.scroller-status',
        hideNav: '.pagination',
        debug: false,
        loadOnScroll: false,
        button: '.btn-load'
    });  
})
</script>