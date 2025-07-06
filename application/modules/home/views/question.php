<form id="form-question" action="save" method="post">

<div class="wrap-bg page-question question-1 flex-align">

	<div class="q1-blow">
		<img src="assets/img/q1/blow.png" alt="">
	</div>
	<div class="q1-spoon">
		<img src="assets/img/q1/spoon.png" alt="">
	</div>

	<div class="question-content">

		<h1 class="head-global align-center mgtb">คุณเคยทาน
		<br /><span class="bold">โยเกิร์ตเมจิ บัลแกเรีย</span> 
		<br />หรือไม่?</h1>

		<ul class="list-unstyled list-answer list-radio mgtb">
			<li>
				<input type="radio" id="ans1_more_than_once_a_week" name="answer[1]" value="มากกว่า 1 ครั้งต่อสัปดาห์">
				<label for="qchoice1">มากกว่า 1 ครั้งต่อสัปดาห์</label>
			</li>
			<li>
				<input type="radio" id="ans1_once_a_week" name="answer[1]" value="สัปดาห์ละครั้ง">
				<label for="qchoice2">สัปดาห์ละครั้ง</label>
			</li>
			<li>
				<input type="radio" id="ans1_last_month" name="answer[1]" value="ทานเมื่อเดือนที่แล้ว">
				<label for="qchoice4">ทานเมื่อเดือนที่แล้ว</label>
			</li>
			<li>
				<input type="radio" id="ans1_never" name="answer[1]" value="ไม่เคยทาน">
				<label for="qchoice3">ไม่เคยทาน</label>
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q1_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->
</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-2_1 flex-align" style="display:none">

	<div class="star align-center">
		<img src="assets/img/q2-1/star.png" alt="">
	</div>
	<div class="flower align-center">
		<img src="assets/img/q2-1/flower.png" alt="">
	</div>

	<div class="question-content">

		<div class="bubble-1">
			<img src="assets/img/q2-1/bubble-2.png" alt="">
		</div>
		<div class="bubble-2">
			<img src="assets/img/q2-1/bubble-1.png" alt="">
		</div>
		<div class="bubble-3">
			<img src="assets/img/q2-1/bubble-2.png" alt="">
		</div>
		<div class="bubble-4">
			<img src="assets/img/q2-1/bubble-1.png" alt="">
		</div>
		<div class="bubble-5">
			<img src="assets/img/q2-1/bubble-2.png" alt="">
		</div>

		<h1 class="head-global align-center mgtb">ตอนนี้คุณทาน
		<br /><span class="bold">โยเกิร์ตหรือนมเปรี้ยว</span> 
		<br />ยี่ห้ออะไรอยู่?</h1>

		<ul class="list-unstyled list-answer list-radio white-small mgtb">
			<li>
				<input type="radio" id="ans_q2_1_meiji" name="answer[2_1]" value="เมจิ">
				<label style="color:#ff0000;">เมจิ</label>
			</li>
			<li>
				<input type="radio" id="ans_q2_1_dutchie" name="answer[2_1]" value="ดัชชี่">
				<label style="color:#04a1d5;">ดัชชี่</label>
			</li>
			<li>
				<input type="radio" id="ans_q2_1_yolida" name="answer[2_1]" value="โยลิดา">
				<label style="color:#1e3dde;">โยลิดา</label>
			</li>
			<li>
				<input type="radio" id="ans_q2_1_dutchmil_4in1" name="answer[2_1]" value="ดัชมิลล์ 4 in 1">
				<label style="color:#061f9c;">ดัชมิลล์ 4 in 1</label>
			</li>
			<li>
				<input type="radio" id="ans_q2_1_foremost" name="answer[2_1]" value="โฟร์โมสต์">
				<label style="color:#ff5f07;">โฟร์โมสต์</label>
			</li>
			<li>
				<input type="radio" id="ans_q2_1_thai_denmark" name="answer[2_1]" value="ไทย-เดนมาร์ค">
				<label style="color:#ba0c0c;">ไทย-เดนมาร์ค</label>
			</li>
			<li>
				<input type="radio" id="ans_q2_1_other" class="radio-other" name="answer[2_1]" value="อื่นๆ">
				<input type="text" id="" name="answer[2_1_other]" value="" placeholder="อื่นๆ....">
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q2_1_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-2_2 flex-align" style="display:none">

	<div class="question-content">

		<h1 class="head-global align-center mgtb">สาเหตุที่คุณไม่ทาน
		<br /><span class="bold">โยเกิร์ตเมจิ บัลแกเรีย</span> 
		<br />(ต่อเนื่อง) เพราะเหตุใด?</h1>

		<ul class="list-unstyled list-answer list-radio mgtb">
			<li>
				<span class="pop-tooltip q2-tooltip-1"><img src="assets/img/q2-2/tooltip-1.png"></span>
				<input type="radio" id="ans_q2_2_dislike_texture" name="answer[2_2]" value="ไม่ชอบเนื้อโยเกิร์ต">
				<label for="qchoice1">ไม่ชอบเนื้อโยเกิร์ต</label>
			</li>
			<li>
				<span class="pop-tooltip q2-tooltip-2 r"><img src="assets/img/q2-2/tooltip-2.png"></span>
				<input type="radio" id="ans_q2_2_dislike_taste" name="answer[2_2]" value="ไม่ชอบรสชาติ">
				<label for="qchoice2">ไม่ชอบรสชาติ</label>
			</li>
			<li>
				<span class="pop-tooltip q2-tooltip-3"><img src="assets/img/q2-2/tooltip-3.png"></span>
				<input type="radio" id="ans_q2_2_hardtobuy" name="answer[2_2]" value="หาซื้อยาก">
				<label for="qchoice3">หาซื้อยาก</label>
			</li>
			<li>
				<span class="pop-tooltip q2-tooltip-4 r"><img src="assets/img/q2-2/tooltip-4.png"></span>
				<input type="radio" id="ans_q2_2_other" class="radio-other" name="answer[2_2]" value="อื่นๆ">
				<input type="text" class="white" name="answer[2_2_other]" value="" placeholder="อื่นๆ....">
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q2_2_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-3 flex-align" style="display:none;">

	<div class="q3-fruit-1">
		<img src="assets/img/q3/fruit-1.png" alt="">
	</div>
	<div class="q3-fruit-2">
		<img src="assets/img/q3/fruit-2.png" alt="">
	</div>
	<div class="q3-fruit-3">
		<img src="assets/img/q3/fruit-3.png" alt="">
	</div>
	<div class="q3-fruit-4">
		<img src="assets/img/q3/fruit-4.png" alt="">
	</div>
	<div class="q3-fruit-5">
		<img src="assets/img/q3/fruit-5.png" alt="">
	</div>

	<div class="question-content">

		<h1 class="head-global align-center mgtb">ประเภทของ
		<br /><span class="bold">โยเกิร์ตเมจิ บัลแกเรีย</span> 
		<br />ที่คุณชอบทาน?</h1>

		<ul class="list-unstyled list-answer list-radio mgtb">
			<li>
				<span class="circle"><img src="assets/img/q3/circle-1.png" alt=""></span>
				<input type="radio" id="ans_q3_bottle" name="answer[3]" value="ขวด">
				<label for="qchoice1">ขวด</label>
			</li>
			<li>
				<span class="circle r"><img src="assets/img/q3/circle-2.png" alt=""></span>
				<input type="radio" id="ans_q3_cup" name="answer[3]" value="ถ้วย">
				<label for="qchoice2">ถ้วย</label>
			</li>
			<li>
				<span class="circle"><img src="assets/img/q3/circle-3.png" alt=""></span>
				<input type="radio" id="ans_q3_both" name="answer[3]" value="ขวดและถ้วย">
				<label for="qchoice3">ขวดและถ้วย</label>
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q3_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-3_1 flex-align" style="display:none;">

	<div class="q3_1-img-1">
		<img src="assets/img/q3-1/img-1.png" alt="">
	</div>
	<div class="q3_1-img-2">
		<img src="assets/img/q3-1/img-2.png" alt="">
	</div>
	<div class="q3_1-img-3">
		<img src="assets/img/q3-1/img-3.png" alt="">
	</div>
	<div class="q3_1-img-4">
		<img src="assets/img/q3-1/img-4.png" alt="">
	</div>

	<div class="question-content">
		<h1 class="head-global align-center mgtb"><span class="bold">แบบถ้วย : <span class="stick">รสชาติที่คุณทาน?</span></span><br /><small>(เลือกได้มากกว่า 1 ข้อ)</small></h1>
		<ul class="list-unstyled list-answer list-checkbox mgtb">
			<li>
				<input type="checkbox" id="ans_q3_1_natural" name="answer[3_1][]" value="รสธรรมชาติ">
				<label>รสธรรมชาติ</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q3_1_well_blended" name="answer[3_1][]" value="รสกลมกล่อม">
				<label>รสกลมกล่อม</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q3_1_honey" name="answer[3_1][]" value="รสน้ำผึ้ง">
				<label>รสน้ำผึ้ง</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q3_1_0fat" name="answer[3_1][]" value="สูตรไขมัน 0%">
				<label>สูตรไขมัน 0%</label>
			</li>
		</ul>
		<div class="align-center mgtb">
			<button type="button" id="btn_q3_1_next" class="btn-red">ต่อไป</button>
		</div>
	</div><!-- end .question-content -->
</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-3_2 flex-align" style="display:none;">

	<div class="q3_2-img-1">
		<img src="assets/img/q3-2/milk.png" alt="">
	</div>
	<div class="q3_2-img-2">
		<img src="assets/img/q3-2/blue.png" alt="">
	</div>
	<div class="q3_2-img-3">
		<img src="assets/img/q3-2/leaf.png" alt="">
	</div>
	<div class="q3_2-img-4">
		<img src="assets/img/q3-2/straw.png" alt="">
	</div>

	<div class="question-content">

		<h1 class="head-global align-center mgtb"><span class="bold">แบบขวด : <span class="stick">รสชาติที่คุณทาน?</span></span><br /><small>(เลือกได้มากกว่า 1 ข้อ)</small></h1>

		<ul class="list-unstyled list-answer list-checkbox mgtb">
			<li>
				<input type="checkbox" id="ans_q3_2_well_blended" name="answer[3_2][]" value="รสกลมกล่อม">
				<label>รสกลมกล่อม</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q3_2_wildberry" name="answer[3_2][]" value="รสไวลด์ เบอร์รี">
				<label>รสไวลด์ เบอร์รี</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q3_2_multigrain_honey" name="answer[3_2][]" value="รสมัลติเกรนผสมน้ำผึ้ง">
				<label>รสมัลติเกรนผสมน้ำผึ้ง</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q3_2_oatmix" name="answer[3_2][]" value="รสโอ๊ตผสมสตรอเบอร์รี">
				<label>รสโอ๊ตผสมสตรอเบอร์รี</label>
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q3_2_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-4 flex-align" style="display:none;">

	<div class="q4-img-1">
		<img src="assets/img/q4/img-1.png" alt="">
	</div>
	<div class="q4-img-2">
		<img src="assets/img/q4/img-2.png" alt="">
	</div>

	<div class="question-content">

		<h1 class="head-global align-center mgtb">
			คุณทาน
			<br /><span class="bold">โยเกิร์ตเมจิ บัลแกเรีย</span>
			<br />เพราะเหตุใด?
		</h1>

		<ul class="list-unstyled list-answer list-radio mgtb">
			<li>
				<span class="man"><img src="assets/img/q4/man-1.png" alt=""></span>
				<input type="checkbox" id="ans_q4_excrete" name="answer[4]" value="ขับถ่าย">
				<label>ขับถ่าย</label>
			</li>
			<li>
				<span class="man r"><img src="assets/img/q4/man-2.png" alt=""></span>
				<input type="checkbox" id="ans_q4_meal_replacement" name="answer[4]" value="แทนมื้ออาหาร">
				<label>แทนมื้ออาหาร</label>
			</li>
			<li>
				<span class="man"><img src="assets/img/q4/man-3.png" alt=""></span>
				<input type="checkbox" id="ans_q4_food_ingredient" name="answer[4]" value="ใ่ช้ประกอบอาหาร">
				<label>ใช้ประกอบอาหาร</label>
			</li>
			<li>
				<span class="man r"><img src="assets/img/q4/man-4.png" alt=""></span>
				<input type="checkbox" id="ans_q4_natural_ingredient" name="answer[4]" value="ผลิตจากวัตถุดิบธรรมชาติ">
				<label>ผลิตจากวัตถุดิบธรรมชาติ</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q4_other" class="radio-other" name="answer[4]" value="อื่นๆ">
				<input type="text" class="white" name="answer[4_other]" placeholder="อื่นๆ....">
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q4_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-5 flex-align" style="display:none;">

	<div class="q5-img-1">
		<img src="assets/img/q5/spiral.jpg" alt="">
	</div>

	<div class="question-content">
		<h1 class="head-global align-center mgtb">
			คุณทาน
			<br /><span class="bold">โยเกิร์ตเมจิ บัลแกเรีย</span>
			<br />ตอนไหน?
		</h1>

		<ul class="list-unstyled list-answer list-radio mgtb">
			<li>
				<span class="circle"><img src="assets/img/q5/circle-1.png" alt=""></span>
				<input type="checkbox" id="ans_q5_breakfast" name="answer[5]" value="แทนอาหารเช้า">
				<label style="background:#43bbf7;border-color:#43bbf7;">แทนอาหารเช้า</label>
			</li>
			<li>
				<span class="circle r"><img src="assets/img/q5/circle-2.png" alt=""></span>
				<input type="checkbox" id="ans_q5_lunch" name="answer[5]" value="แทนอาหารกลางวัน">
				<label style="background:#3b9dd1;border-color:#3b9dd1;">แทนอาหารกลางวัน</label>
			</li>
			<li>
				<span class="circle"><img src="assets/img/q5/circle-3.png" alt=""></span>
				<input type="checkbox" id="ans_q5_dinner" name="answer[5]" value="แทนอาหารเย็น">
				<label style="background:#327daa;border-color:#327daa;">แทนอาหารเย็น</label>
			</li>
			<li>
				<span class="circle r"><img src="assets/img/q5/circle-4.png" alt=""></span>
				<input type="checkbox" id="ans_q5_before_sleep" name="answer[5]" value="ก่อนนอน">
				<label style="background:#1c4064;border-color:#1c4064;">ก่อนนอน</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q5_other" class="radio-other" name="answer[5]" value="อื่นๆ">
				<input type="text" class="white" name="answer[5_other]" placeholder="อื่นๆ....">
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q5_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-6 flex-align" style="display:none;">

	<div class="q6-img-1">
		<img src="assets/img/q6/people-red.png" alt="">
	</div>
	<div class="q6-img-2">
		<img src="assets/img/q6/people-blue.png" alt="">
	</div>
	<div class="q6-img-3">
		<img src="assets/img/q6/people-yellow.png" alt="">
	</div>
	<div class="q6-img-4">
		<img src="assets/img/q6/dog.png" alt="">
	</div>

	<div class="question-content">
		<h1 class="head-global align-center mgtb">คุณซื้อ<span class="bold">โยเกิร์ต</span><span class="stick">ให้ใครทาน?</span></h1>

		<ul class="list-unstyled list-answer list-radio mgtb">
			<li>
				<input type="checkbox" id="ans_q6_self_consumed" name="answer[6]" value="ซื้อทานเอง">
				<label>ซื้อทานเอง</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q6_family" name="answer[6]" value="ให้ครอบครัว">
				<label>ให้ครอบครัว</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q6_self_family" name="answer[6]" value="ทานเองและให้ครอบครัว">
				<label>ทานเองและให้ครอบครัว</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q6_others" name="answer[6]" value="ซื้อให้คนอื่นๆ ทาน">
				<label>ซื้อให้คนอื่นๆ ทาน</label>
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q6_next" class="btn-red">ต่อไป</button>
		</div>

		<div><br /><br /><br /></div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-7 flex-align" style="display:none;">

	<div class="q7-img-1">
		<img src="assets/img/q7/img-1.png" alt="">
	</div>
	<div class="q7-img-2">
		<img src="assets/img/q7/img-2.png" alt="">
	</div>
	<div class="q7-img-3">
		<img src="assets/img/q7/cart.png" alt="">
	</div>

	<div class="question-content">


		<h1 class="head-global align-center mgtb">ปกติคุณไปซื้อ<span class="bold">โยเกิร์ต</span>ที่ไหน <span class="bold">บ่อยที่สุด?</span></h1>

		<ul class="list-unstyled list-answer half btn-small list-radio clearafter">
			<li>
				<input type="checkbox" id="ans_q7_7eleven" name="answer[7]" value="7-ELEVEN">
				<label style="background:#0aae45;border-color:#0aae45;">7-ELEVEN</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_familymart" name="answer[7]" value="Family Mart">
				<label style="background:#27a9d0;border-color:#27a9d0;">Family Mart</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_topsdaily" name="answer[7]" value="Tops Daily">
				<label style="background:#ecce00;border-color:#ecce00;">Tops Daily</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_minibigc" name="answer[7]" value="Mini Big C">
				<label style="background:#75be43;border-color:#75be43;">Mini Big C</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_bigc" name="answer[7]" value="Big C">
				<label style="background:#75be43;border-color:#75be43;">Big C</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_lotusexpress" name="answer[7]" value="Lotus Express">
				<label style="background:#009460;border-color:#009460;">Lotus Express</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_lotusexpress" name="answer[7]" value="Tesco Lotus">
				<label style="background:#009460;border-color:#009460;">Tesco Lotus</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_villamarket" name="answer[7]" value="Villa Market">
				<label style="background:#1f2f53;border-color:#1f2f53;">Villa Market</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_foodland" name="answer[7]" value="Foodland">
				<label style="background:#e11837;border-color:#e11837;">Foodland</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_tops" name="answer[7]" value="Tops">
				<label style="background:#ecce00;border-color:#ecce00;">Tops</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_maxvalue" name="answer[7]" value="Max Value">
				<label style="background:#eb3390;border-color:#eb3390;">Max Value</label>
			</li>
			<li>
				<input type="checkbox" id="ans_q7_gourmetmarket" name="answer[7]" value="Gourmet">
				<label style="background:#a1002b;border-color:#a1002b;">Gourmet</label>
			</li>
			<li class="full">
				<input type="checkbox" id="ans_q7_other" class="radio-other" name="answer[7]" value="อื่นๆ">
				<input type="text" class="white" name="answer[7_other]" placeholder="อื่นๆ....">
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q7_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-8 flex-align" style="display:none;">

	<div class="q8-img-1">
		<img src="assets/img/q8/spoon.png" alt="">
	</div>

	<div class="q8-img-2">
		<img src="assets/img/q8/img-1.png" alt="">
	</div>
	<div class="q8-img-3">
		<img src="assets/img/q8/img-2.png" alt="">
	</div>
	<div class="q8-img-4">
		<img src="assets/img/q8/img-3.png" alt="">
	</div>

	<div class="question-content">

		<h1 class="head-global align-center mgtb"><span class="stick">เราอยากให้คุณ</span>
		<span class="stick">ลองเสนอรสชาติ</span>
		<span class="bold stick">โยเกิร์ตเมจิ บัลแกเรีย</span>
		ในแบบที่คุณต้องการและ
		บอกว่าอยากทานคู่กับอะไร
		เพราะอะไร?  
		</h1>

		<ul class="list-unstyled list-answer">
			<li>
				<input type="text" id="ans_q8_favors" class="white" name="answer[8_favor]" value="" placeholder="รสชาติที่ต้องการ...">
			</li>
			<li>
				<input type="text" id="ans_q8_consume_with" class="white" name="answer[8_with]" value="" placeholder="ทานคู่กับ...">
			</li>
			<li>
				<input type="text" id="ans_q8_why" class="white" name="answer[8_why]" value="" placeholder="เพราะอะไร...">
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" id="btn_q8_next" class="btn-red">ต่อไป</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->

<div class="wrap-bg page-question question-complete flex-align" style="display:none;">

	<div class="qcomplete-img-1">
		<img src="assets/img/q-complete/img-1.png" alt="">
	</div>
	<div class="qcomplete-img-2">
		<img src="assets/img/q-complete/img-2.png" alt="">
	</div>
	<div class="qcomplete-img-3">
		<img src="assets/img/q-complete/img-3.png" alt="">
	</div>

	<div class="question-content">

		<h1 class="head-global2 align-center mgtb">เย้! คุณตอบ Poll ของเราครบแล้ว !!</h1>

		<p class="subhead-global align-center">แค่กรอกข้อมูลก็มีสิทธิ์ได้รับรางวัลจาก
		โยเกิร์ตเมจิ บัลแกเรียแล้วค่ะ</p>

		<p class="subhead-global2 align-center">ประกาศผลผ่านเพจ 
			<span class="bold">MeijiYoghurtThailand</span> 
			<span class="stick">และ <span class="bold">MeijiBulgariaYoghurt</span></span> 
			<span class="stick">20 กรกฎาคม 2561</span> นะคะ</p>

		<ul class="list-unstyled list-answer">
			<li>
				<input type="text" id="" class="white" name="firstname" value="" placeholder="ชื่อ...">
			</li>
			<li>
				<input type="text" id="" class="white" name="lastname" value="" placeholder="นามสกุล...">
			</li>
			<li>
				<input type="text" id="" class="white" name="email" value="" placeholder="อีเมล...">
			</li>
			<li>
				<input type="text" id="" class="white" name="telephone" value="" placeholder="เบอร์โทร...">
			</li>
			<li>
				<input type="text" id="" class="white datepicker" name="birthdate" value="" placeholder="วันเกิด...">
			</li>
		</ul>

		<div class="align-center mgtb">
			<button type="button" class="btn-red">ส่งคำตอบ</button>
		</div>

	</div><!-- end .question-content -->

</div><!-- end .wrap-bg -->
</form>

<script>
$(function(){
	$('.block-loading').show();
	resetAnimateQ1();
});
$(window).bind("load",function(){
	$('.block-loading').fadeOut();
	beginAnimateQ1();
});
</script>

<script>
var path = window.location.pathname;
var pathName = path.substring(0, path.lastIndexOf('/') + 1);
function prettyAlert(msg,focus) {
	alert(msg);
}	

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
	appboy.changeUser('<?php echo $facebook['id']; ?>');
	console.log("appboy.changeUser('<?php echo $facebook['id']; ?>')");
	logCustomEvent('page_question');
}

$(function(){	
	
	$('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: false,
        language: 'th', 
        autoclose: true,            
        thaiyear: true              
    });
    
    var regExp = /[0-9]/i;
	$('input[name="telephone"]').on('keydown keyup', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode == 8 || (keyCode >= 35 && keyCode <= 40)) { 	        
			return;
	    }

		var value = String.fromCharCode(e.which) || e.key;
		if (!regExp.test(value)) {
			e.preventDefault();
			return false;
		}
	});
	
	$('.question-1 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[1]"]:checked').attr('id');
		
		var answer = $('input[name="answer[1]"]:checked');
		if (answer.length > 0) {
			$('.question-1').hide();
			$('.question-2_1').show();
			logCustomEvent(answerEvent);
			logCustomEvent(btnEvent);

			resetAnimateQ2();
			beginAnimateQ2();

		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-2_1 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[2_1]"]:checked').attr('id');
		var answerOther = $.trim($('input[name="answer[2_1_other]"]').val());
		
		var answer1 = $('input[name="answer[1]"]:checked');
		var answer2 = $('input[name="answer[2_1]"]:checked');
		if (answer2.length > 0) {
			if((answer2.val()=='อื่นๆ') && (answerOther=="")) {
				alert('กรุณาใส่คำตอบค่ะ');
			} else {
				$('.question-2_1').hide();
				if ((answer1.val()=='มากกว่า 1 ครั้งต่อสัปดาห์') || (answer1.val()=='สัปดาห์ละครั้ง')) {
					$('.question-3').show();
					resetAnimateQ3();
					beginAnimateQ3();
				} else {
					$('.question-2_2').show();
					resetAnimateQ2_2();
					beginAnimateQ2_2();
				}
				if(answer2.val()=='อื่นๆ') {
					logCustomEvent(answerEvent,answerOther);
				} else {
					logCustomEvent(answerEvent);
				}
				logCustomEvent(btnEvent);				
			}
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-2_2 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[2_2]"]:checked').attr('id');
		var answerOther = $.trim($('input[name="answer[2_2_other]"]').val());
		
		
		
		var answer1 = $('input[name="answer[1]"]:checked');
		var answer2 = $('input[name="answer[2_2]"]:checked');
		if (answer2.length > 0) {
			if((answer2.val()=='อื่นๆ') && (answerOther=="")) {
				alert('กรุณาใส่คำตอบค่ะ');
			} else {
				$('.question-2_2').hide();
				if (answer1.val()=='ไม่เคยทาน') {
					$('.question-complete').show();
					resetAnimateComplete();
					beginAnimateComplete();
				} else {
					$('.question-3').show();
					resetAnimateQ3();
					beginAnimateQ3();
				}
				if(answer2.val()=='อื่นๆ') {
					logCustomEvent(answerEvent,answerOther);
				} else {
					logCustomEvent(answerEvent);
				}
				logCustomEvent(btnEvent);
			}
			
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-3 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[3]"]:checked').attr('id');
		
		var answer = $('input[name="answer[3]"]:checked');
		if (answer.length > 0) {
			$('.question-3').hide();
			if (answer.val()=='ขวด'){
				$('.question-3_2').show();

				resetAnimateQ3_2();
				beginAnimateQ3_2();

			} else if (answer.val()=='ถ้วย') {
				$('.question-3_1').show();

				resetAnimateQ3_1();
				beginAnimateQ3_1();
			} else if (answer.val()=='ขวดและถ้วย') {
				$('.question-3_2').show();

				resetAnimateQ3_2();
				beginAnimateQ3_2();
			}
			logCustomEvent(answerEvent);
			logCustomEvent(btnEvent);
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-3_1 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		
		var answer = $('input[name="answer[3_1][]"]:checked');
		if (answer.length > 0) {
			$('.question-3_1').hide();
			$('.question-4').show();
			
			resetAnimateQ4();
			beginAnimateQ4();

			$('input[name="answer[3_1][]"]:checked').each(function(){
				logCustomEvent($(this).attr('id'));
			})
			logCustomEvent(btnEvent);
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-3_2 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		
		var answer3 = $('input[name="answer[3]"]:checked');
		var answer32 = $('input[name="answer[3_2][]"]:checked');
		if (answer32.length > 0) {
			$('.question-3_2').hide();
			if (answer3.val()=='ขวดและถ้วย') {
				$('.question-3_1').show();

				resetAnimateQ3_1();
				beginAnimateQ3_1();
			} else {
				$('.question-4').show();

				resetAnimateQ4();
				beginAnimateQ4();
			}
			$('input[name="answer[3_2][]"]:checked').each(function(){
				logCustomEvent($(this).attr('id'));
			})
			logCustomEvent(btnEvent);
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-4 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[4]"]:checked').attr('id');
		var answerOther = $.trim($('input[name="answer[4_other]"]').val());
		
		var answer = $('input[name="answer[4]"]:checked');
		if (answer.length > 0) {
			if((answer.val()=='อื่นๆ') && (answerOther=="")) {
				alert('กรุณาใส่คำตอบค่ะ');
			} else {
				$('.question-4').hide();
				$('.question-5').show();
				resetAnimateQ5();
				beginAnimateQ5();
				if(answer.val()=='อื่นๆ') {
					logCustomEvent(answerEvent,answerOther);
				} else {
					logCustomEvent(answerEvent);
				}
				logCustomEvent(btnEvent);
			}
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-5 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[5]"]:checked').attr('id');
		var answerOther = $.trim($('input[name="answer[5_other]"]').val());
		
		var answer = $('input[name="answer[5]"]:checked');
		if (answer.length > 0) {
			if((answer.val()=='อื่นๆ') && (answerOther=="")) {
				alert('กรุณาใส่คำตอบค่ะ');
			} else {
				$('.question-5').hide();
				$('.question-6').show();

				resetAnimateQ6();
				beginAnimateQ6();
				if(answer.val()=='อื่นๆ') {
					logCustomEvent(answerEvent,answerOther);
				} else {
					logCustomEvent(answerEvent);
				}
				logCustomEvent(btnEvent);
			}
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-6 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[6]"]:checked').attr('id');
		
		var answer = $('input[name="answer[6]"]:checked');
		if (answer.length > 0) {
			$('.question-6').hide();
			$('.question-7').show();
			resetAnimateQ7();
			beginAnimateQ7();
			logCustomEvent(answerEvent);
			logCustomEvent(btnEvent);
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-7 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		var answerEvent = $('input[name="answer[7]"]:checked').attr('id');
		var answerOther = $.trim($('input[name="answer[7_other]"]').val());
		
		var answer = $('input[name="answer[7]"]:checked');
		if (answer.length > 0) {
			if((answer.val()=='อื่นๆ') && (answerOther=="")) {
				alert('กรุณาใส่คำตอบค่ะ');
			} else {
				$('.question-7').hide();
				$('.question-8').show();
				resetAnimateQ8();
				beginAnimateQ8();
				if(answer.val()=='อื่นๆ') {
					logCustomEvent(answerEvent,answerOther);
				} else {
					logCustomEvent(answerEvent);
				}
				logCustomEvent(btnEvent);
			}
		} else {
			alert('กรุณาเลือกคำตอบค่ะ');
		}
	})
	
	$('.question-8 .btn-red').click(function(){
		var btnEvent = $(this).attr('id');
		
		var answer_favor = $.trim($('.question-8 input[name="answer[8_favor]"]').val());
		var answer_with = $.trim($('.question-8 input[name="answer[8_with]"]').val());
		var answer_why = $.trim($('.question-8 input[name="answer[8_why]"]').val());
		
		if(answer_favor == "") {
            prettyAlert('กรุณากรอกรสชาติที่ต้องการค่ะ',$('.question-8 input[name="answer[8_favor]"]'));
            return false;
        } 
        
        if(answer_with == "") {
            prettyAlert('กรุณากรอกทานคู่กับค่ะ',$('.question-8 input[name="answer[8_with]"]'));
            return false;
        } 
        
        if(answer_why == "") {
            prettyAlert('กรุณากรอกเพราะอะไรค่ะ',$('.question-8 input[name="answer[8_why]"]'));
            return false;
        } 
        
        $('.question-8').hide();
		$('.question-complete').show();

		resetAnimateComplete();
		beginAnimateComplete();

		logCustomEvent($('.question-8 input[name="answer[8_favor]"]').attr('id'),answer_favor);
		logCustomEvent($('.question-8 input[name="answer[8_with]"]').attr('id'),answer_with);
		logCustomEvent($('.question-8 input[name="answer[8_why]"]').attr('id'),answer_why);
		logCustomEvent(btnEvent);
	})
	
	$('.question-complete .btn-red').click(function(){
		var firstname = $.trim($('.question-complete input[name="firstname"]').val());
		var lastname = $.trim($('.question-complete input[name="lastname"]').val());
		var telephone = $.trim($('.question-complete input[name="telephone"]').val());
		var email = $.trim($('.question-complete input[name="email"]').val());
		var birthdate = $.trim($('.question-complete input[name="birthdate"]').val());
				
		if(firstname == "") {
            prettyAlert('กรุณากรอกชื่อค่ะ',$('.question-complete input[name="firstname"]'));
            return false;
        } 
        
        if(lastname == "") {
            prettyAlert('กรุณากรอกนามสกุลค่ะ',$('.question-complete input[name="lastname"]'));
            return false;
        }     
        
        if(telephone == "") {
            prettyAlert('กรุณากรอกเบอร์โทรศัพท์ส่วนตัวค่ะ',$('.question-complete input[name="telephone"]'));
            return false;
        }
        
        if(!telephone.match(/^(0\d{8,9})$/)) {
		    prettyAlert('กรุณากรอกเบอร์โทรศัพท์ส่วนตัวให้ถูกต้องค่ะ',$('.question-complete input[name="telephone"]'));
		    return false;
	    }  
        
        if(email=="") {
            prettyAlert('กรุณากรอกอีเมลค่ะ',$('.question-complete input[name="email"]'));
            return false;
        }

        if(!email.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i)) {
            prettyAlert('กรุณากรอกอีเมลให้ถูกต้อง',$('.question-complete input[name="email"]'));
            return false;
        }
        
        if(birthdate == "") {
            prettyAlert('กรุณากรอกวันเกิดค่ะ',$('.question-complete input[name="birthdate"]'));
            return false;
        } 
        logCustomEvent('firstname',firstname);
        logCustomEvent('lastname',lastname);
        logCustomEvent('telephone',telephone);
        logCustomEvent('email',email);
        logCustomEvent('birthdate',birthdate);
		$('#form-question')[0].submit();
	})
})	
</script>