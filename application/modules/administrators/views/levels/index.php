<h1>Level</h1>
<div class="search">
	<form method="get">
		<label>Level: </label><input type="input" name="name" value="<?php echo @$_GET['name'] ?>" />
		<input type="submit" value="ค้นหา" class="button" />
	</form>
</div>
<?php echo $levels->pagination()?>
<table class="list">
	<tr>
		<th>Level</th>
		<th width="50"><!--<?php echo anchor('users/admin/levels/form',lang('btn_add'),'class="btn"')?>--></th>
	</tr>
	<?php foreach($levels as $level):?>
	<tr <?php echo cycle()?>>

		<td><?php echo $level->level ?></td>
		<td>
			<?php echo anchor('users/admin/levels/form/'.$level->id,lang('btn_edit'),'class="btn"')?>
			<!--<?php echo anchor('users/admin/levels/delete/'.$level->id,lang('btn_delete'),'class="btn" onclick="return confirm(\''.lang('confirm_delete').'\')"')?>-->
		</td>
	</tr>
	<?php endforeach?>
</table>
<?php echo $levels->pagination()?>

