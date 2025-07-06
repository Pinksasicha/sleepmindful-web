<section id="contact-map">
	<div class="container-fluid p-0">
		<div class="row m-0 align-items-center">
			<div class="col-lg-8 p-0">
				<div class="map-iframe"><iframe src="https://maps.google.com/maps?q=<?php echo setting('latitude'); ?>,<?php echo setting('longitude'); ?>&hl=es;z=14&amp;output=embed" width="100%" height="450" frameborder="0" style="border:0;line-height:0;padding-bottom: 0;margin-bottom: 0" allowfullscreen></iframe></div>
			</div>
			<div class="col-lg-4 p-4">
				<div class="map-detail">
					<h3><img src="assets/images/marker.png" class="img-fluid"> ที่อยู่</h3>
					<h5>บริษัท มุ่งพัฒนาอินเตอร์เนชันเเนล จำกัด (มหาชน)</h5>
					<ul class="list-unstyled">
						<li>
							<?php echo nl2br(setting('address')); ?>
						</li>
					</ul>
					<h5>
						ศูนย์ผู้เชี่ยวชาญด้านผลิตภัณฑ์
					</h5>
					<ul class="list-unstyled tel">
						<li>
							เบอร์ติดต่อ <br>
							0-2020-8989
						</li>
					</ul>
					<h5>Pigeon Little Moments Club</h5>
					<ul class="list-unstyled tel">
						<li>
							เบอร์ติดต่อ <br>
							0-2646-2899
						</li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
</section>
<section class="section-content" id="contact-form">
	<form id="form-contact" action="contact-us/save" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<h3 class="text-center">Contact Form</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row mt-5">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" name="name" class="form-control form-control-lg" id="c-Name" placeholder="ชื่อ-สกุล">
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control form-control-lg" id="c-Email" placeholder="E-mail">
							</div>
							<div class="form-group">
								<input type="tel" name="telephone" class="form-control form-control-lg" id="c-Tel" placeholder="โทรศัพท์">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<select name="title" class="form-control form-control-lg" id="c-Topic">
									<option value="หัวข้อที่สอบถาม">หัวข้อที่สอบถาม</option>
									<option value="หัวข้อที่สอบถาม1">หัวข้อที่สอบถาม1</option>
									<option value="หัวข้อที่สอบถาม2">หัวข้อที่สอบถาม2</option>
								</select>
							</div>
							<div class="form-group">
								<textarea name="message" id="c-Detail" rows="3" placeholder="รายละเอียด" class="form-control form-control-lg" style="height: 112px"></textarea>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-lg-4 offset-lg-4">
							<button type="submit" class="btn btn-lg btn-submit btn-block">Send</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>
<script>
$(function(){	
    
    <?php if($this->session->flashdata('thankyou')): ?>
    swal({
        title: "ขอบคุณค่ะ",
        text: "ระบบได้บันทึกข้อมูลของคุณเรียบร้อยแล้วค่ะ",
        type: "success",
        confirmButtonColor: "#EB1C24",
        confirmButtonText: "ตกลง"
    });
    <?php endif; ?>
    
	$('#form-contact').submit(function(){
		var name = $.trim($('#form-contact input[name="name"]').val());
        var email = $.trim($('#form-contact input[name="email"]').val());
        var telephone = $.trim($('#form-contact input[name="telephone"]').val());
        var message = $.trim($('#form-contact textarea[name="message"]').val());
		
		if(name == "") {
            prettyAlert('กรุณากรอกชื่อ-สกุลค่ะ',$('#form-contact input[name="name"]'));
            return false;
		} 
		
		if(email=="") {
            prettyAlert('กรุณากรอกอีเมลค่ะ',$('#form-contact input[name="email"]'));
            return false;
        }

        if(!email.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i)) {
            prettyAlert('กรุณากรอกอีเมลให้ถูกต้อง',$('#form-contact input[name="email"]'));
            return false;
        }
        
        if(telephone == "") {
            prettyAlert('กรุณากรอกเบอร์โทรศัพท์ค่ะ',$('#form-contact input[name="telephone"]'));
            return false;
        }
        
        if(!telephone.match(/^(0\d{8,9})$/)) {
		    prettyAlert('กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้องค่ะ',$('#form-contact input[name="telephone"]'));
		    return false;
	    }  
        
        if(message == "") {
            prettyAlert('กรุณากรอกรายละเอียดค่ะ',$('#form-contact textarea[name="message"]'));
            return false;
        } 
	})
})
</script>