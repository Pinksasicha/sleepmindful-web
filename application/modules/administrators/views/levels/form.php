<h1>ระดับผู้ใช้งาน</h1>
<form method="post" action="users/admin/levels/save/<?php echo $level->id?>" id="form" >
<table class="form">
	
	<tr>
		<th>ระดับผู้ใช้งาน</th>
		<td><?php echo form_input('level',$level->level)?></td>
	</tr>
	<tr>
		<th>สิทธิการเข้าถึง</th>
		<td>
			<input type="radio" name="view" value="1" <?php echo ($level->view==1)?'checked="checked"':'' ?>> ทุกหน่วยงาน<br />
			<input type="radio" name="view" value="2" <?php echo ($level->view==2)?'checked="checked"':'' ?>> หน่วยงานตัวเอง
		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<?php echo form_submit('',lang('btn_submit'),'class="button"')?>
			<?php echo form_button('',lang('btn_back'),'class="button" onclick="window.location = \'users/admin/levels\'"')?>
		</td>
	</tr>
</table>
</form>

