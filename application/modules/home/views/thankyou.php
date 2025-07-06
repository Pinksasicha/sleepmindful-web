<script>
$(function(){
	$('.block-loading').show();
	resetAnimateThankyou();
});
$(window).bind("load",function(){
	$('.block-loading').fadeOut();
	beginAnimateThankyou();
});
</script>

<div class="wrap-bg page-question question-thankyou flex-align">

	<div class="thankyou-img-1">
		<img src="assets/img/thankyou/img-1.png" alt="">
	</div>
	<div class="thankyou-img-2">
		<img src="assets/img/thankyou/img-2.png" alt="">
	</div>

	<div class="question-content">

		<h1 class="head-global align-center mgtb">ขอบคุณที่ร่วมสนุก
		<span class="stick">กับกิจกรรมของ</span>
		<span class="stick bold">โยเกิร์ตเมจิ บัลแกเรีย</span>นะคะ</h1>

		<div class="align-center mgtb">
			<button type="button" class="btn-share" onClick="shareURL('<?php echo base_url(); ?>')"><i class="fab fa-facebook-f"></i> Share</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->
<script>
function logCustomEvent(name,value) {
	if (typeof appboy !== 'undefined') {
		if (typeof value !== 'undefined') {
	    	appboy.logCustomEvent(name,value);
    	} else {
	    	appboy.logCustomEvent(name);
    	}
	}
	if (typeof value !== 'undefined') {
    	console.log("appboy.logCustomEvent('" + name + "','" + value +"')");
	} else {
    	console.log("appboy.logCustomEvent('" + name + "')");
	}
}

function brazeReady() {
	logCustomEvent('page_thankyou');
}
</script>