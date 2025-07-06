<?php

if (!function_exists('number_key')) {
  function number_key($key)
  {
    $CI = &get_instance();
    $page = ($CI->input->get('page')) ? $CI->input->get('page') : 1;
    return ($page - 1) * 10 + $key + 1;
  }
}

if (!function_exists('cycle')) {
  function cycle()
  {
    static $i;

    if (func_num_args() == 0) {
      $args = ['even', 'odd'];
    } else {
      $args = func_get_args();
    }
    return 'class="' . $args[($i++ % count($args))] . '"';
  }
}

if (!function_exists('menu_active')) {
  function menu_active($controller, $method = false, $class = 'active')
  {
    $CI = &get_instance();
    if ($method) {
      return ($CI->router->fetch_class() == $controller && $CI->router->fetch_method() == $method) ? 'class=' . $class : '';
    } else {
      return ($CI->router->fetch_class() == $controller) ? 'class=' . $class : '';
    }
  }
}

if (!function_exists('menu_front_active')) {
  function menu_front_active($controller, $method = false, $class = 'active')
  {
    $CI = &get_instance();
    if ($method) {
      return ($CI->router->fetch_class() == $controller && $CI->router->fetch_method() == $method) ? ' ' . $class : '';
    } else {
      return ($CI->router->fetch_class() == $controller) ? ' ' . $class : '';
    }
  }
}

if (!function_exists('get_option')) {
  function get_option($value, $text, $table, $condition = null, $lang = null)
  {
    $CI = &get_instance();
    $query = $CI->db->query("select * from $table $condition");
    foreach ($query->result() as $item) {
      $option[$item->{$value}] = $item->{$text};
    }
    return $option;
  }
}

if (!function_exists('get_lang_option')) {
  function get_lang_option($value, $text, $model, $condition = null, $lang = null)
  {
    $items = new $model;
    $items->get();
    foreach ($items as $item) {
      $option[$item->{$value}] = $item->{$text};
    }
    return $option;
  }
}

if (!function_exists('fix_file')) {
  function fix_file(&$files)
  {
    $names = ['name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1];

    foreach ($files as $key => $part) {
      // only deal with valid keys and multiple files
      $key = (string) $key;
      if (isset($names[$key]) && is_array($part)) {
        foreach ($part as $position => $value) {
          $files[$position][$key] = $value;
        }
        // remove old key reference
        unset($files[$key]);
      }
    }
  }
}

function get_string_between($string, $start, $end)
{
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) {
    return '';
  }
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return substr($string, $ini, $len);
}

function group_card($key, $group, $margin = true)
{
  ?>
<?php if ($margin): ?>
<div class="group-box">
    <?php else: ?>
    <div class="group-box" style="margin:0 auto; float:none;">
        <?php endif; ?>
        <?php if ($group->you_save() <> 0): ?>
        <?php if ($key % 2 == 0): ?>
        <div id="label_left"><img src="img/content/content_col3/label_left.png">
            <h6 class="h6_right" style="width:46px;"><i class="cc-key" style="margin-right:3px;">THB</i><i class="cc-value" data-value="<?php echo $group->you_save(); ?>"><?php echo $group->you_save(); ?></i></h6>
        </div>
        <?php else: ?>
        <div id="label_left"><img src="img/content/content_col3/label_right.png">
            <h6 class="h6_left" style="width:46px;"><i class="cc-key" style="margin-right:3px;">THB</i><i class="cc-value" data-value="<?php echo $group->you_save(); ?>"><?php echo $group->you_save(); ?></i></h6>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php if ((my_date_diff(date('Y-m-d'), $group->close_date) < 0) || ($group->status <> 'open')): ?>
        <div class="overly"></div>
        <?php else: ?>
        <div style="display:none;" class="overly"></div>
        <?php endif; ?>
        <div class="pic">
            <a target="_blank" href="hotel/<?php echo $group->hotel->slug; ?>"><img src="uploads/hotels/group/<?php echo $group->hotel->thumbnail; ?>"></a>
        </div>
        <table width="100%">
            <thead>
                <tr>
                    <th width="70%"><a target="_blank" href="hotel/<?php echo $group->hotel->slug; ?>"><span title="<?php echo $group->hotel->name; ?>" style="color:#313131; font:bold 15px Arial; width:200px; height:20px; display:block; overflow:hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $group->hotel->name; ?></span></a></th>
                    <th width="30%" style="text-align:right;">
                        <img src="img/content/content_col3/start.png" width="10" height="12" class="star">
                        <img src="img/content/content_col3/start.png" width="10" height="12" class="star">
                        <img src="img/content/content_col3/start.png" width="10" height="12" class="star">
                        <img src="img/content/content_col3/start.png" width="10" height="12" class="star">
                        <img src="img/content/content_col3/start.png" width="10" height="12" class="star last">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">
                        <div style="position:relative; padding-bottom:10px;">
                            <p style="color:#717171; font:bold 12px Arial; font-smooth:always; line-height:20px;">
                                <img class="icon" src="img/content/content_col3/checkin.png"> <a style="color:#717171;" target="_blank" href="destination/<?php echo $group->hotel->destination->slug; ?>"><?php echo $group->hotel->destination->name; ?></a> <br />
                                <img class="icon" src="img/content/content_col3/date.png"> <?php echo short_date($group->start_date) . ' - ' . short_date($group->end_date); ?>
                            </p>
                            <div style="position:absolute; top:0; right:0; text-align:right;">
                                <span class="from" style="font:bold 12px Arial; line-height:15px;">Now</span>
                                <!-- <span class="tooltip-left" style="color:#f78b00; font:bold 14px Arial; cursor:pointer;" title="The current price per night of the <br /> standard room type for this group."><img class="right_img" src="img/content/content_col3/from.png" width="14" height="14"/></span> -->
                                <br />
                                <span class="unit"><i class="cc-key">THB</i></span>
                                <span class="amount pink"><i class="cc-value cc-number" data-value="<?php echo $group->average_price(); ?>"><?php echo number_format($group->average_price(), 0); ?></i></span><br />
                                <span style="color:#979797; font:bold 12px Arial;">/night</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="book">
            <table width="100%">
                <!--thead-->
                <tr>
                    <td style="float:left; line-height:13px;">
                        <span class="font_book">People</span>
                    </td>
                    <td style="float:right; line-height:13px; text-align:right;">
                        <span class="font_book">Price</span>
                    </td>
                </tr>
                <!--/thead-->
                <!--tbody-->
                <tr>
                    <td colspan="2" align="center">
                        <div class="powerbar">
                            <div class="powerbar-container">
                                <div class="bluebar" style="width:<?php echo $group->powerbar_percent(); ?>%;">
                                    <div class="arrow"></div>
                                </div>
                            </div>
                        </div><!-- End Bar -->
                    </td>
                </tr>
                <tr>
                    <td style="float:left; line-height:15px;">
                        <span class="font_book2" style="color:#a4a4a4;">
                            <span style="color:#696969; display:inline-block; width:15px; text-align:right;"><?php echo $group->total_person; ?> </span>
                            <span class="font_book2" style="padding:0; font-size:12px;">going
                                <!--
<span>
                                    <img class="social" src="img/content/content_col3/arrow_hover.png">
                                    <img id="left_arrow" src="img/content/tooltip_img/left_arrow.png">
                                    <img src="img/content/tooltip_img/1.jpg">
                                    <img src="img/content/tooltip_img/2.jpg">
                                    <img src="img/content/tooltip_img/3.jpg">
                                    <img src="img/content/tooltip_img/1.jpg">
                                    <img src="img/content/tooltip_img/2.jpg">
                                    <img src="img/content/tooltip_img/3.jpg">
                                    <img src="img/content/tooltip_img/1.jpg">
-->
                                <!--img src="img/content/tooltip_img/end.jpg"-->
                                <!--
<img id="right_arrow" src="img/content/tooltip_img/right_arrow.png">
                                    </span>
-->
                            </span>
                        </span>
                        <br />
                        <span class="font_book2">
                            <span style="color:#696969; display:inline-block; width:15px; text-align:right;"><?php echo $group->person_per_step * 4 - $group->total_person; ?> </span>
                            <span class="font_book2" style="padding:0; font-size:12px;">spaces available </span>
                        </span>
                    </td>
                    <td style="float:right; line-height:15px; text-align:right;">
                        <?php if ($group->average_price() == $group->standard_price()): ?>
                        <span class="font_book2">other sites <span style="color:#696969;"><i class="cc-key">THB</i><i class="cc-value cc-number" data-value="<?php echo $group->standard_price(); ?>"><?php echo number_format($group->standard_price(), 0); ?></i></span></span><br />
                        <?php else: ?>
                        <span class="font_book2"><span style="font-size:12px;">other sites</span> <span style="color:#696969;"><i class="cc-key">THB</i><i class="cc-value cc-number" data-value="<?php echo $group->standard_price(); ?>"><?php echo number_format($group->standard_price(), 0); ?></i></span></span><br />
                        <?php endif; ?>
                        <span class="font_book2"><span style="font-size:12px;">max group</span>  <span style="color:#696969;"><i class="cc-key">THB</i><i class="cc-value cc-number" data-value="<?php echo $group->possible_price(); ?>"><?php echo number_format($group->possible_price(), 0); ?></i></span></span>
                    </td>
                </tr>
                <!--/tbody-->
            </table>
        </div>
        <div class="clearfix"></div>
        <div style="text-align:center;">
            <p>Time left to book</p>
            <?php if ((my_date_diff(date('Y-m-d'), $group->close_date) < 0) || ($group->status <> 'open')): ?>
            <p style="font:bold 18px Arial; padding-top:5px; margin-bottom:4px;"><span>00:00:00</span></p>
            <?php else: ?>
            <p style="font:bold 18px Arial; padding-top:5px; margin-bottom:4px;"><span class="close_date" data-date="<?php echo $group->close_date; ?>"></span></p>
            <?php endif; ?>
            <div class="clearfix"></div>
            <a target="_parent" href="booking/group/<?php echo $group->id; ?>"><img src="img/content/button/book.jpg" /></a>
        </div>
        <div class="clearfix"></div>
    </div><!-- End 1 -->
    <?php
}
