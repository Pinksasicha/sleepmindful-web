<?php
if ( ! function_exists('mysql_to_th'))
{
	function mysql_to_th($datetime,$format = 'S' ,$time = FALSE,$nodate = FALSE)
	{
		if($datetime == '0000-00-00' || $datetime=='')return false;
		if($format == 'F')
		{
			$month_th = array( 1 =>'มกราคม',2 => 'กุมภาพันธ์',3=>'มีนาคม',4=>'เมษายน',5=>'พฤษภาคม',6=>'มิถุนายน',7=>'กรกฏาคม',8=>'สิงหาคม',9=>'กันยายน',10=>'ตุลาคม',11=>'พฤศจิกายน',12=>'ธันวาคม');
		}
		else
		{
			$month_th = array( 1 =>'ม.ค.',2 => 'ก.พ.',3=>'มี.ค.',4=>'เม.ย',5=>'พ.ค.',6=>'มิ.ย',7=>'ก.ค.',8=>'ส.ค.',9=>'ก.ย.',10=>'ต.ค.',11=>'พ.ย.',12=>'ธ.ค.');
		}

		$datetime = mysql_to_unix($datetime);

		$r = date('d', $datetime).' '.$month_th[date('n', $datetime)].' '.(date('Y', $datetime) + 543);

		if($time)
		{
				$r .= ' - '.date('H', $datetime).':'.date('i', $datetime);
		}

		return $r;
	}
}

if ( ! function_exists('month_th'))
{
	function month_th($month)
	{
		$month_array = array('January','February','March','April','May','June','July','August','September','October','November','December');
		return $month_array[$month-1];
	}
}

if ( ! function_exists('year_th'))
{
	function year_th($year)
	{
		return $year + 543;
	}
}

if ( ! function_exists('mysql_to_relative'))
{
	function mysql_to_relative($datetime){
		$timestamp = mysql_to_unix($datetime);
		$difference = time() - $timestamp;
		$periods = array('Seconds','Minutes','Hour','Day','Week','Month','Year','Ten Years');
		$lengths = array('60','60','24','7','4.35','12','10');

		if ($difference >= 0)
		{
			$ending = "ago";
		}
		else
		{
			$difference = -$difference;
			$ending = "to go";
		}
		for($j = 0; $difference >= $lengths[$j]; $j++)
		{
			$difference /= $lengths[$j];
		}
		$difference = round($difference);
		$text = "$difference $periods[$j]$ending";
		return $text;
	}
}
if ( ! function_exists('m2h'))
{
	function m2h($mins)
	{
            if ($mins < 0) {
                $min = Abs($mins);
            } else {
                $min = $mins;
            }
            $H = Floor($min / 60);
            $M = ($min - ($H * 60)) / 100;
            $hours = $H +  $M;
            if ($mins < 0) {
                $hours = $hours * (-1);
            }
            $expl = explode(".", $hours);
            $H = $expl[0];
            if (empty($expl[1])) {
                $expl[1] = 00;
            }
            $M = $expl[1];
            if (strlen($M) < 2) {
                $M = $M . 0;
            }
            $hours = $H . "." . $M;
            return $hours;
    }
}

function DB2Date($date){
    $unix_date=mysql_to_unix($date);
	return ($unix_date!='943894800')?date('d/m/Y',$unix_date):'';
}

function Date2DB($date){
	if(($date!="")&&($date != '0000-00-00')){
		//list($date,$time) = explode(" ",$Dt);
		list($d,$m,$y) = explode("/",$date);
		return ($y-543)."-".$m."-".$d;
	}else{ return ''; }
}

if ( ! function_exists('fb_to_mysql'))
{
	function fb_to_mysql($date)
	{
		if(($date!="")&&($date != '0000-00-00')){
		list($m,$d,$y) = explode("/",$date);
		return $y."-".$m."-".$d;
	}else{ return $date; }
	}
}

function date_range($strDateFrom,$strDateTo)
{
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}

function tryplers_date($mysql_date = null,$length = 0)
{
	$date = ($mysql_date)?mysql_to_unix($mysql_date):time();
	if($length)
	{
		$date =  strtotime('+'.$length.' days',$date);
	}
	return date('D, F j, Y', $date);
}

function tryplers_short_date($mysql_date = null,$length = 0)
{
	$date = ($mysql_date)?mysql_to_unix($mysql_date):time();
	if($length)
	{
		$length = ($length>=0)?'+'.$length:$length;
		$date =  strtotime($length.' days',$date);
	}
	return date('D, M j Y', $date);
}

function short_date($mysql_date = null,$length = 0)
{
    $date = ($mysql_date)?mysql_to_unix($mysql_date):time();
    if($length)
    {
        $date =  strtotime('+'.$length.' days',$date);
    }
    return date('d M y', $date);
}

function my_date_diff($strDate1,$strDate2)
{
	return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}

function mysql_date($mysql_date,$format = 'd/m/Y H:i:s')
{
    if($mysql_date=='0000-00-00 00:00:00')
    {
        return FALSE;
    }
    return date($format,mysql_to_unix($mysql_date));
}

function day_array($mysql_date = null,$length = 0)
{
    $date = ($mysql_date)?mysql_to_unix($mysql_date):time();
    for($i=0;$i<$length;$i++)
    {
        $unix_date =  strtotime('+'.$i.' days',$date);
        $day[] = strtolower(date('l', $unix_date));
    }
    return array_unique($day);
}


?>