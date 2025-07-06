<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CodeIgniter Media Helpers
 *
 * Manage media file for codeigiter template.
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Sikarin Engkased
 */

// --------------------------------------------------------------------

/**
 * js_datepicker
 *
 * return media file for datepicker
 *
 * @access	public
 * @param	string
 * @return	str
 */
if ( ! function_exists('js_datepicker'))
{
	function js_datepicker($selector=".datepicker")
	{
		$js = '<link rel="stylesheet" href="media/js/date_input/date_input.css" type="text/css" media="screen" />';
		$js .= '<script type="text/javascript" src="media/js/date_input/jquery.date_input.js"></script>';
		$js .= '<script type="text/javascript" src="media/js/date_input/jquery.date_input.th_TH.js"></script>';
		$js .= '<script type="text/javascript">
					$(function(){
						$("input.datepicker").date_input();
					});
				</script>';
		return $js;
	}
}

// --------------------------------------------------------------------

/**
 * set_notify
 *
 * set notify Bar
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	str
 */
if(!function_exists('set_notify'))
{
	function set_notify($type,$msg)
	{
		$config = array(
			'notify' => TRUE,
			'type' => $type,
			'msg' => $msg
		);
		$CI =& get_instance();
		$CI->session->set_flashdata($config);
	}
}

// --------------------------------------------------------------------

/**
 * js_notify
 *
 * Display notify Bar
 *
 * @access	public
 * @return	str
 */
if(!function_exists('js_notify'))
{
	function js_notify()
	{
		$CI =& get_instance();
		if($CI->session->flashdata('notify'))
		{
			$js = '<link rel="stylesheet" href="media/js/jnotify/css/jNotify.jquery.css" type="text/css" media="screen" />';
		    $js .= '<script type="text/javascript" src="media/js/jnotify/js/jNotify.jquery.min.js"></script>';
		    $js .= '<script type="text/javascript">
		    				$(function () {

								 j'.ucfirst($CI->session->flashdata('type')).'(
		\''.$CI->session->flashdata('msg').'\',
		{
		  autoHide : true, // added in v2.0
		  clickOverlay : true, // added in v2.0
		  MinWidth : 250,
		  TimeShown : 3000,
		  ShowTimeEffect : 200,
		  HideTimeEffect : 200,
		  LongTrip :20,
		  HorizontalPosition : \'center\',
		  VerticalPosition : \'top\',
		  ShowOverlay : true,
   		  ColorOverlay : \'#000\',
		  OpacityOverlay : 0.3,
		});

							});
						</script>';
			return $js;
		}
	}
}

// --------------------------------------------------------------------

/**
 * js_notify
 *
 * Display notify Bar
 *
 * @access	public
 * @return	str
 */
if(!function_exists('js_alert'))
{
	function js_alert()
	{
		$CI =& get_instance();
		if($CI->session->flashdata('notify'))
		{
		    $js = '<script type="text/javascript">
		    				$(function () {
		alert(\''.$CI->session->flashdata('msg').'\');
							});
						</script>';
			return $js;
		}
	}
}


// --------------------------------------------------------------------

/**
 * js_lightbox
 *
 * Display Lightbox
 *
 * @access	public
 * @return	str
 */
if(!function_exists('js_lightbox'))
{
	function js_lightbox()
	{
		$js = '<link rel="stylesheet" href="media/js/prettyPhoto/prettyPhoto.css" type="text/css" media="screen" />';
		$js .= '<script type="text/javascript" src="media/js/prettyPhoto/jquery.prettyPhoto.js"></script>';
		    $js .= '<script type="text/javascript">
		    				$(function () {
						  		$("a[rel^=lightbox]").prettyPhoto({theme:\'facebook\',social_tools:false,allow_resize: false,deeplinking: false});
							});
						</script>';
			return $js;

	}
}

// --------------------------------------------------------------------

/* End of file media_helper.php */
/* Location: ./application/helpers/media_helper.php */