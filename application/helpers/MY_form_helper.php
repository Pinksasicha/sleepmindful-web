<?php
// --------------------------------------------------------------------
/**
 * Drop-down Menu
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @param	string
 * @return	string
 */

function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '',$default_value = FALSE)
{
	if ( ! is_array($selected))
	{
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if (count($selected) === 0)
	{
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name]))
		{
			$selected = array($_POST[$name]);
		}
	}

	if ($extra != '') $extra = ' '.$extra;

	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

	$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";

	$form .= ($default_value) ? '<option value="">'.$default_value."</option>\n" : '';

	foreach ($options as $key => $val)
	{
		$key = (string) $key;

		if (is_array($val))
		{
			$form .= '<optgroup label="'.$key.'">'."\n";



			foreach ($val as $optgroup_key => $optgroup_val)
			{
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			}

			$form .= '</optgroup>'."\n";
		}
		else
		{
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

			$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
		}
	}

	$form .= '</select>';

	return $form;
}



function form_checkbox($data = '', $value = '', $checked = FALSE, $extra = '')
{
	$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);

	if (is_array($data) AND array_key_exists('checked', $data))
	{
		$checked = $data['checked'];

		if ($checked == FALSE)
		{
			unset($data['checked']);
		}
		else
		{
			$data['checked'] = 'checked';
		}
	}

	if ($checked == $value)
	{
		$defaults['checked'] = 'checked';
	}
	else
	{
		unset($defaults['checked']);
	}

	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}

function form_year($name,$selected)
{
	$years = array_combine(range(1900,date('Y')),range(1900,date('Y')));
	krsort($years);
	return form_dropdown($name,$years,$selected,'',' ');
}

function form_month($name,$selected)
{
	$months = array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
	return form_dropdown($name,$months,$selected,'',' ');
}

function form_date($name,$selected)
{
	$dates = array_combine(range(1,31),range(1,31));
	return form_dropdown($name,$dates,$selected,'',' ');
}

function form_guest($name,$person_per_step,$selected = '')
{
	$options[0] = 'Choose';
	$limit = round(4 * $person_per_step * 1.2);
	for($i=1;$i<=$limit;$i++)
	{
		if($i==1)
		{
			$options[$i] = $i.' adult';
		}
		else
		{
			$options[$i] = $i.' adults';
		}

	}
	return form_dropdown($name,$options,$selected,'class="mySelect3"');
}

function form_guest_available($name,$limit,$selected = '')
{
	$options[0] = 'Choose';
	for($i=1;$i<=$limit;$i++)
	{
		if($i==1)
		{
			$options[$i] = $i.' adult';
		}
		else
		{
			$options[$i] = $i.' adults';
		}
	}
	return form_dropdown($name,$options,$selected,'class="mySelect3"');
}

function form_month_trip($name,$selected = '')
{
	for($i=1;$i<=4;$i++)
	{
		$options[date('n-Y',strtotime('+'.$i.' months'))] = date('F Y',strtotime('+'.$i.' months'));
	}
	return form_dropdown($name,$options,$selected,'','Month');
}

function option($obj, $value, $text)
{
	return $obj->get()->all_to_assoc($value, $text);
}

function form_lang_input($name = '', $values = '', $extra = '', $index=null)
{
	$langs = langs();
	$input = '';
	foreach($langs as $key => $lang)
	{
		$active = ($key=='en')?'active':'';
		if($index !== null){
			$input .= form_input('item_array['.$index.'][lang]['.$key.']['.$name.']',@$values[$key], $extra."class='tab-pane ".$key." ".$active."'");
		} else {
			$input .= form_input('lang['.$key.']['.$name.']',@$values[$key], $extra."class='tab-pane ".$key." ".$active."'");
		}
	}
	return '<div class="tab-content">'.$input.'</div>';
}

function form_lang_textarea($name = '', $values = '', $extra = '', $index=null)
{
	$langs = langs();
	$input = '';
	foreach($langs as $key => $lang)
	{
		$active = ($key=='en')?'active':'';
		if($index !== null){
			$input .= form_textarea('item_array['.$index.'][lang]['.$key.']['.$name.']',@$values[$key], $extra."class='tab-pane ".$key." ".$active."'");
		} else {
			$input .= form_textarea('lang['.$key.']['.$name.']',@$values[$key], $extra."class='tab-pane ".$key." ".$active."'");
		}
	}
	return '<div class="tab-content">'.$input.'</div>';
}

function form_lang_editor($name = '', $values = '', $extra = '')
{
	$langs = langs();
	$input = '';
	foreach($langs as $key => $lang)
	{
		$active = ($key=='en')?'active':'';
		$input .= '<div class="tab-pane '.$key.' '.$active.'">';
		$input .= form_textarea('lang['.$key.']['.$name.']',@$values[$key], $extra." class='editor'");
		$input .= '</div>';
	}
	return '<div class="tab-content">'.$input.'</div>';
}

function form_editor($name = '', $values = '', $extra = '')
{
    return form_textarea($name,$values, $extra." class='editor'");
}

?>