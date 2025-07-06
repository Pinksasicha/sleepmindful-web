//MODULE: core
$(document).ready(function() {
	Core.init();
});

var Core = function() {
	var	assetVersion = null,
		highlighted = {
			'className': 'highlight',
			'color': '#f09'
		};

	function init() {
		attachNewWindowLinks();
		attachSharingWindowLinks();
		attachScrollToLinks();
		attachTextAreaResizeListener();
		attachWindowResizeListener();
		attachSearchControls();
		attachToolTipControls();
		attachDebuggingControls();
	}

	/**
	 * Opens links with rel="newWindow" in a new window
	 * @visibility private
	 */
	function attachNewWindowLinks() {
		$('a[rel~="newWindow"]').click(function(e) {
			e.preventDefault();
			window.open($(this).attr('href'));
		});
	}

	function attachSharingWindowLinks() {
		$("a[rel~='sharing']").click(function(e) {
			e.preventDefault();
			window.open(
				$(this).attr('href'),
				'sleepioSharing',
				'location=1,status=0,scrollbars=1,width=550,height=400'
			);
		});
	}

	/**
	 * When clicking on an internal link with class "scrollTo", scroll to anchor
	 * Default speed is 1000ms (1 second)
	 * Speed can be adjusted by setting data-scroll-speed attribute to desired number of milliseconds
	 */
	function attachScrollToLinks() {
		if (!Device.isMobile) {
			$('a.scrollTo').click(function(e) {
				e.preventDefault();
				var	$this = $(this),
					scrollSpeed = 1000;
				if (typeof($this.data('scroll-speed')) !== 'undefined') {
					scrollSpeed = $this.data('scroll-speed');
				}
				$.scrollTo($(this).attr('href'), scrollSpeed, {axis: 'y'});
			});
		}
	}

	/**
	* Resize a textarea when text lines grow beyond size
	* @visibility private
	*/
	function attachTextAreaResizeListener() {
		$('textarea.autoGrow').autoGrow();
	}

	/**
	* Fires when window is resized
	* @visibility private
	*/
	function attachWindowResizeListener() {
		$(window).resize(function() {
			/* Keeps the opened transport controls at the bottom of the window */
			if ($('#profControls').is(':visible')) {
				$('#tabPanel').css({top:($(window).height()-65)});
			}

			var $page = $('#page');
			if ($page.find('.exitButton').is(':visible')) {
				$page.css({top:($(window).height()-65)});
			}

			if ($('#profMovie').is(':visible')) {
				Course.updateMovieSize();
			}
		});
	}

	function attachSearchControls() {
		/* default / zero-length behavior on search */
		$('#searchQuery')
			.focusin(function() {
				$('#searchGo').removeAttr('disabled').removeClass('disabled');
			})
			.focusout(function() {
				if ($(this).val() == '') {
					$('#searchGo').attr('disabled', 'disabled').addClass('disabled');
				}
			});

		/* ignore search if set to default text */
		$('#searchGo').click(function(e) {
			if ($('#searchQuery').val() == $('#searchLabel').html()) {
				e.preventDefault();
			}
		});
	}

	function attachToolTipControls() {
		$('html')
			.unbind('click')
			.click(function() {
				$('.toolTipText').hide(100);
			});

		$('.toolTip').each(function() {
			var $this = $(this);
			$this.unbind('click');
			$this.click(function(e) {
				e.preventDefault();
				e.stopPropagation();
				var	toolTipText = $this.children('.toolTipText'),
					currentlyVisible = toolTipText.is(':visible');
				$('.toolTipText').hide(100);
				if (!currentlyVisible) {
					toolTipText.show(100, function() {
						if (typeof document.getSelection == 'function') {
							document.getSelection().removeAllRanges();
						}
					});
				}
			});
		});
	}

	function attachDebuggingControls() {
		var $debugging = $('.debugging');
		$debugging.mouseenter(function(){
			$debugging.find('dl').show();
			$debugging.fadeTo(500, .9);
		});

		$debugging.mouseleave(function(){
			$debugging.find('dl').hide();
			$debugging.fadeTo(500, .3);
		});
	}

	function highlight(selector, useClass) {
		var $selector = $(selector);
		if (Device.isMobile) {
			var origBgColor = $selector.css('background-color');

			if (useClass) {
				$selector.addClass(highlighted.className);
			}
			else {
				$selector.css({backgroundColor: highlighted.color});
			}
			setTimeout(function() {
				if (useClass) {
					$selector.removeClass(highlighted.className);
				}
				else {
					$selector.css({backgroundColor: origBgColor});
				}
			}, 1000);
		}
		else {
			$selector.effect('highlight', {color: highlighted.color}, 500, function() {
				$selector.effect('highlight', {color: highlighted.color}, 500);
			});
		}
	}

	function updateTextField(selector, text, highlightText) {
		$(selector).val(text.replace(/<br>/g,'\n'));
		if (highlightText != false) {
			highlight(selector);
		}
	}

	/**
	 *
	 * @param formId
	 * @param [successFunction]
	 * @param [clickFunction]
	 */
	function attachFormControls(formId, successFunction, clickFunction) {
		var $form = $('#' + formId),
			$submitButton = $form.find('button[type=submit]:visible:first'),
			$throbber = $form.find('.throbber');

		if ($form.length && $submitButton.length) {
			$throbber.hideOpacity();
			$form.submit(function(e) {
				e.preventDefault();

				if (typeof(clickFunction) == 'function') {
					clickFunction(this);
				}

				$submitButton.attr('disabled', 'disabled').addClass('disabled');
				$throbber.fadeInOpacity(200);
				$form.find('li').removeClass('error');
				$form.find('.errorMessage').empty();
				$form.find('.successMessage').empty();
				$.post(
					$form.attr('action'),
					$form.serialize() + '&ajax=true',
					function(data) {
						if (data) {
							var done = function() {
								if (data.success) {
									if (typeof(successFunction) == 'function') {
										successFunction(data, function() {$submitButton.removeAttr('disabled').removeClass('disabled')});
									}
									else {
										$submitButton.removeAttr('disabled').removeClass('disabled');
										$.each(data.successes, function(successGrouping, successValues) {
											var $successGrouping = $('#' + successGrouping + 'Success');
											$successGrouping.addClass('success');
											$.each(successValues, function() {
												$successGrouping.append($('<li>').append(this.toString()));
											});
										});
									}
								}
								else {
									$submitButton.removeAttr('disabled').removeClass('disabled');
									$.each(data.errors, function(errorGrouping, errorValues) {
										var $errorGrouping = $('#' + errorGrouping + 'Error');
										$errorGrouping.closest('li').addClass('error');
										$.each(errorValues, function() {
											$errorGrouping.append($('<li>').append(this.toString()));
										});
									});
								}
							};

							if ($throbber.length != 0)
								$throbber.fadeOutOpacity(200, done);
							else
								done();
						}
					},
					'json'
				);
			});
		}
	}

	/*
	Workaround functions for fixing nasty reload-button-autocomplete interaction in firefox
	Should listen on 'pageshow' and 'unload' events respectively
	https://bugzilla.mozilla.org/show_bug.cgi?id=443289
	*/
	function pageShowHandler() {
		if (window.addEventListener) {
			window.addEventListener('unload', UnloadHandler, false);
		}
	}

	function unloadHandler() {
		if (window.removeEventListener) {
			window.removeEventListener('unload', UnloadHandler, false);
		}
	}

	return {
		assetVersion: assetVersion,
		init: init,
		attachToolTipControls: attachToolTipControls,
		highlight: highlight,
		updateTextField: updateTextField,
		attachFormControls: attachFormControls,
		pageShortHandler: pageShowHandler,
		unloadHandler: unloadHandler
	}
}();

/*********************************************************
 *										makeBold
 * Wrapper for addFormatting function -- creates bold text
 *********************************************************/
function makeBold(element, button)
{
	addFormatting(element, '*', '*', button);
}

/*********************************************************
 *										makeItalic
 * Wrapper for addFormatting function -- creates italic text
 *********************************************************/
function makeItalic(element, button)
{
	addFormatting(element, '_', '_', button);
}

/*********************************************************
 *										addFormatting
 * Add formatting tags around a selected piece of text
 *********************************************************/
function addFormatting(element, startdelimiter, enddelimiter, button)
{
	var objElement = document.getElementById(element);
	var objButton;
	objElement.focus();
	/* IE */
	if (document.selection && document.selection.createRange)
	{
		/* Text selected, wrap it in delimiters */
		if (document.selection.createRange().text.length != 0)
		{
			document.selection.createRange().text = startdelimiter + document.selection.createRange().text + enddelimiter;
		}
		/* No text selected, so "open" and "close" tags (and change button state) */
		else
		{
			objButton = document.getElementById(button);
			objButton.style.color == 'green' ? objElement.value = objElement.value + enddelimiter : objElement.value = objElement.value + startdelimiter;
			objButton.style.color == 'green' ? objButton.style.color = 'black' : objButton.style.color = 'green';
			objElement.focus();
		}
	}
	/* MOZILLA/GECKO */
	else if (objElement.selectionStart || objElement.selectionStart == '0')
	{
		/* Text selected, wrap it in delimiters */
		if (objElement.selectionStart - objElement.selectionEnd != 0)
		{
			var strBefore = objElement.value.substring(0, objElement.selectionStart);
			var strSelected = objElement.value.substring(objElement.selectionStart, objElement.selectionEnd);
			var strAfter = objElement.value.substring(objElement.selectionEnd, objElement.value.length);

			strSelected = startdelimiter + strSelected + enddelimiter;

			objElement.value = strBefore + strSelected + strAfter;
		}
		/* No text selected, so "open" and "close" tags (and change button state) */
		else
		{
			objButton = document.getElementById(button);
			objButton.style.color == 'green' ? objElement.value = objElement.value + enddelimiter : objElement.value = objElement.value + startdelimiter;
			objButton.style.color == 'green' ? objButton.style.color = 'black' : objButton.style.color = 'green';
			objElement.focus();
		}
	}
}


/*
 * Add custom functionality to Date object
 */
Date.prototype.monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
Date.prototype.dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

Date.prototype.yyyymmdd = function() {
	var yyyy = this.getFullYear().toString();
	var mm = (this.getMonth()+1).toString();
	var dd  = this.getDate().toString();
	return yyyy + '-' + (mm[1]?mm:"0"+mm[0]) + '-' + (dd[1]?dd:"0"+dd[0]);
};

Date.prototype.ddMonthYyyy = function() {
	var mm = this.getMonth();
	var yyyy = this.getFullYear().toString();
	var dd  = this.getDate().toString();

	return dd + ' ' + this.monthNames[mm] + ' ' + yyyy;
};

Date.prototype.dayddMonth = function() {
	var day = this.dayNames[this.getDay()].substr(0,3);
	var dd = this.getDate().toString();
	var Month = this.monthNames[this.getMonth()];

	return day + ' ' + dd + ' ' + Month;
};

Date.prototype.time12hour = function() {
	var hours = this.getHours();
	var minutes = this.getMinutes();
	var ampm = hours >= 12 ? 'PM' : 'AM';
	hours = hours % 12;
	hours = hours ? hours : 12;
	minutes = minutes < 10 ? '0'+minutes : minutes;

	return hours + ':' + minutes + ' ' + ampm;
};

/**
 * <= IE8 compability
 */

if (!Array.prototype.indexOf) {
	Array.prototype.indexOf = function(elt /*, from*/){
		var len = this.length >>> 0;

		var from = Number(arguments[1]) || 0;
		from = (from < 0) ? Math.ceil(from) : Math.floor(from);
		if (from < 0)
			from += len;

		for (; from < len; from++) {
			if (from in this && this[from] === elt)
				return from;
		}
		return -1;
	};
}

if (typeof Array.prototype.forEach !== 'function') {
	Array.prototype.forEach = function(callback, context) {
	  	for (var i = 0; i < this.length; i++) {
			callback.apply(context, [ this[i], i, this ]);
		}
	};
}


//MODULE: public
$(document).ready(function() {
	Public.init();
});

var Public = function() {
	function init() {
		attachLoginControls();
		attachMeetTheProfControls();
		attachInstantSleepTestControls();
		attachAtWorkRequestDemoControls();
		attachAtWorkSleepTestControls();
		attachEmbedVideoControls();
		attachTestYourSleepControls();
	}

	/**
	* Bind panel toggle to login controls
	* @visibility private
	*/
	function attachLoginControls() {
		$('.login p, .loginAlias').click(function() {
			$('.login').toggleClass('open').find('input[type!=hidden]:first').focus();
		});

	}

	function attachMeetTheProfControls() {
		$('#meetTheProfName')
			.bind('keypress', function(e) {
				if (e.which == 13) {
					e.preventDefault();
					meetTheProf();
					$('#meetTheProfName').select();
					return false;
				}
				return true;
			});

		$('#meetTheProfButton')
			.unbind('click')
			.click(function(e) {
				e.preventDefault();
				meetTheProf();
			});

		$('#sleepioExit').click(function(e) {
			e.preventDefault();
			Course.hidePublicProf('/onboarding-sleep-test/');
		});
	}

	function attachInstantSleepTestControls() {
		/* un-check siblings when clicking on "none of the above" checkbox */
		$('#instantSleepTestForm').find('input:checkbox').unbind('click').click(function() {
			var $this = $(this);
			if ($this.hasClass('noneAbove')) {
				if ($this.is(':checked')) {
					$this.closest('li').siblings().find('input:checkbox').removeAttr('checked');
				}
			}
			else {
				$this.closest('li').siblings().find('input:checkbox.noneAbove').removeAttr('checked');
			}
		});

		Core.attachFormControls('instantSleepTestForm', function(data) {
			if (data.reference) {
				window.location.href = '/instant-sleep-test/result/' + data.reference + '/';
			}
		});

		Core.attachFormControls('instantSleepTestResultForm', function(data) {
			if (data.reference) {
				window.location.href = '/instant-sleep-test/session/' + data.reference + '/';
			}
		});
	}

	function attachAtWorkRequestDemoControls() {
		Core.attachFormControls('atWorkRequestDemoForm');
	}

	function attachAtWorkSleepTestControls() {
		/* un-check siblings when clicking on "none of the above" checkbox */
		$('#atWorkSleepTestForm').find('input:checkbox').unbind('click').click(function() {
			var $this = $(this);
			if ($this.hasClass('noneAbove')) {
				if ($this.is(':checked')) {
					$this.closest('li').siblings().find('input:checkbox').removeAttr('checked');
				}
			}
			else {
				$this.closest('li').siblings().find('input:checkbox.noneAbove').removeAttr('checked');
			}
		});

		Core.attachFormControls('atWorkSleepTestForm', function(data) {
			if (data.reference) {
				window.location.href = '/work/result/' + data.reference + '/';
			}
		});
	}

	function attachEmbedVideoControls() {
		$('.embedVideoThumbnail').click(function(e) {
			e.preventDefault();
			var $this = $(this),
				trackedEventString = $this.attr("data-tracked-event");
			if (trackedEventString) {
				var trackedEvent = Tracking.parseTrackedEventString(trackedEventString);
				Tracking.addEvent(trackedEvent['name'], trackedEvent['properties']);
			}
			playEmbedVideo($this.data('video-id'));
		});

		var $body = $('body');
		$body.on('click', '#embedVideoClose', function(e) {
			e.preventDefault();
			$('#embedVideo, #embedVideoCurtain').fadeTo(1000, 0);
			setTimeout(function() {
				$('#embedVideo').children().remove();
				$('#embedVideoCurtain').remove();
			}, 1000);
		});

		$body.on('click', '#embedVideoCurtain', function(e) {
			e.preventDefault();
			$('#embedVideoClose').click()
		});

		$body.on('mouseenter', '#embedVideoClose', function() {
			$(this).css({opacity:1});
		});

		$body.on('mouseleave', '#embedVideoClose', function() {
			$(this).css({opacity:0.5});
		});
	}

	/**
	 * Attaches resize handler to homepage "test your sleep" teaser panel
	 */
	function attachTestYourSleepControls() {
		var	$window = $(window),
			$testYourSleep = $('#testYourSleep'),
			$header = $('header');

		$window.on('resize', function() {
			//N.B. - subtracting 1 in height calculation is for iOS adjacent color div fix in header
			$testYourSleep.css({
				'width': $window.width() + 'px',
				'height': $window.height() - ((2 * $header.outerHeight()) - 1)  + 'px',
				'padding-bottom': $header.outerHeight() + 'px'
			});
		});

		$window.trigger('resize');
	}

	/**
	 * resolves inputted user name and sets up flash movie
	 */
	function meetTheProf() {
		var	$meetTheProfName = $('#meetTheProfName'),
			$meetTheProfForm = $meetTheProfName.parents('form'),
			$button = $meetTheProfForm.find('button'),
			$throbber = $meetTheProfForm.find('.throbber');

		Course.fakePlayMovie();
		Tracking.addEvent('clicked on meet the prof go', {'source':'tour'});
		$meetTheProfName.removeClass('default').removeClass('error');
		if ($meetTheProfName.val().length > 0) {
			_gaq.push(['_trackEvent', 'meetTheProf', 'nameEntered', $meetTheProfName.val()]);

			$button.attr('disabled', 'disabled').addClass('disabled');
			$throbber.fadeInOpacity(200);
			$.post(
				'/getname/',
				$meetTheProfName.serialize(),
				function(data) {
					if (data && data.nameReference) {
						_gaq.push(
							['_trackEvent', 'meetTheProf', 'namePlayed', data.nameReference],
							['_trackEvent', 'meetTheProf', 'goClicked']
						);
						Course.movieVars.slideReference = Course.movieVars.slideReferenceBase + '/INJECT/name/' + data.nameReference;
					}
					else {
						Course.movieVars.slideReference = Course.movieVars.slideReferenceBase + '/INJECT/name/generic';
					}
					if ($.QueryString['forceHtml5'] != 'true') {
						$('#profFlash').replaceWith('<div id="profHtml"></div>');
						swfobject.embedSWF('/swf/Sleepio.swf?v=' + Core.assetVersion, 'profHtml', '100%', '100%', '10.0.0', '/swf/expressInstall.swf', Course.movieVars, Course.flashParams, Course.flashAttributes, function() {Course.setUpFlash();});
					}
					$('#meetTheProfName').blur();

					Course.showPublicProf({'name': data.nameReference});
					setTimeout(function() {
						$throbber.fadeOutOpacity(200, function() {
							$button.removeAttr('disabled').removeClass('disabled');
						});

					}, 2000);
				},
				'json'
			);
		}
		else {
			$meetTheProfName.val('');
			$meetTheProfName.addClass('error');
		}
	}

	function attachSuitableForMeControls() {
		var $suitableForMeForm = $('#suitableForMeForm');

		/* un-check siblings when clicking on "none of the above" checkbox */
		$suitableForMeForm.find('input:checkbox').unbind('click').click(function() {
			var $this = $(this);
			if ($this.hasClass('noneAbove')) {
				if ($this.is(':checked')) {
					$this.closest('li').siblings().find('input:checkbox').removeAttr('checked');
				}
			}
			else {
				$this.closest('li').siblings().find('input:checkbox.noneAbove').removeAttr('checked');
			}
		});

		$('#suitableForMeButton').unbind('click').click(function(e) {
			e.preventDefault();
			var	testResult = 'success',
				validated = true,
				$suitableForMeError = $('#suitableForMeError');

			$suitableForMeError.hide();
			$suitableForMeForm.find('li').removeClass('error');

			if ($('input:radio[name=howLong]:checked').val() == undefined) {
				$('input:radio[name=howLong]').parents('li').addClass('error');
				validated = false;
			}
			if ($('input:checkbox[name="difficulty[]"]:checked').val() == undefined) {
				$('input:checkbox[name="difficulty[]"]').parents('li').addClass('error');
				validated = false;
			}

			if ($('input:radio[name=makeChanges]:checked').val() == undefined) {
				$('input:radio[name=makeChanges]').parents('li').addClass('error');
				validated = false;
			}

			if ($('input:radio[name=healthy]:checked').val() == undefined) {
				$('input:radio[name=healthy]').parents('li').addClass('error');
				validated = false;
			}

			if ($('input:checkbox[name="status[]"]:checked').val() == undefined) {
				$('input:checkbox[name="status[]"]').parents('li').addClass('error');
				validated = false;
			}

			if (validated) {
				if (
					$('#statusPregnant').is(':checked') ||
					$('#statusShiftWorker').is(':checked') ||
					$('#statusUnder16').is(':checked') ||
					$('#statusFallAsleep').is(':checked') ||
					$('#healthyNo').is(':checked')
				) {
					testResult = 'unsuitable';
				}
				else {
					if ($('#makeChangesNo').is(':checked')) {
						testResult = 'changesUnwilling';
					}
					else {
						if (
							$('#howLongNot').is(':checked') ||
								$('#difficultyNone').is(':checked')
							) {
							testResult = 'noProblem';
						}
					}
				}
				Course.movieVars.slideReference = Course.movieVars.slideReferenceBase + '/INJECT/testResult/' + testResult;
				var apiRequestValues;
				if ($.QueryString['forceHtml5'] != 'true') {
					$('#profFlash').replaceWith('<div id="profHtml"></div>');
					swfobject.embedSWF('/swf/Sleepio.swf?v=' + Core.assetVersion, 'profHtml', '100%', '100%', '10.0.0', '/swf/expressInstall.swf', Course.movieVars, Course.flashParams, Course.flashAttributes, function() {Course.setUpFlash();});
				}
				Course.fakePlayMovie();
				apiRequestValues = {'testResult': testResult};
				Course.showPublicProf(apiRequestValues);
			}
			else {
				$suitableForMeError.fadeIn(200);
			}
		});
	}

	function playEmbedVideo(videoId) {
		var videoContent = '<div id="embedVideo"><div id="embedVideoClose"></div><iframe src="//player.vimeo.com/video/' + videoId + '?title=0&byline=0&portrait=0&color=330033&autoplay=1" width="912" height="513" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
		$('header').after(videoContent);
		var curtainContent = '<div id="embedVideoCurtain"></div>';
		$('body').append(curtainContent);
		window.setTimeout(function() {
			$('#embedVideoCurtain').css({opacity: 0.9});
			$('#embedVideo').css({
				opacity: 1,
				marginTop: $(document).scrollTop()
			});
			$('#embedVideoClose').css({opacity: 0.5});
		}, 0);
		_gaq.push(['_trackEvent', 'embedVideo', 'openedLightBox', videoId.toString()]);
	}

	return {
		init: init,
		meetTheProf: meetTheProf,
		attachSuitableForMeControls: attachSuitableForMeControls
	}
}();


//MODULE: device
$(document).ready(function() {
	Device.init();
});

var Device = function() {
	var siteView = 'full';
	var userAgent = '';

	var isMobile = false;
	var isPhone = false;

	function init() {
		setSiteView();
		setUserAgent();
		checkIsMobile();
		checkIsPhone();
	}

	function setSiteView() {
		if (
			window.location.pathname.indexOf('/mobile') == 0 ||
			window.location.pathname.indexOf('/jawbone') == 0
		) {
			Device.siteView = 'mobile';
		}
		return true;
	}

	function setUserAgent() {
		Device.userAgent = (navigator.userAgent||navigator.vendor||window.opera);
	}

	/**
	 * Determine if user is using a mobile device
	 * If on a mobile site AND viewing the full site , display a header bar and add a body class
	 */
	function checkIsMobile() {
		if (/android|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(ad|hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|playbook|silk/i.test(Device.userAgent)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(Device.userAgent.substr(0,4))) {
			Device.isMobile = true;
			if (Device.siteView == 'full' && !$('body').hasClass('noMobile')) {
				$('footer').append('<a id="forceMobile" href="/site/mobile/">Visit the mobile version</a>');
				$('body').addClass('onMobile');
			}
		}
		return true;
	}

	/**
	 *Determine if user is using a phone
	 */
	function checkIsPhone() {
		if (/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(Device.userAgent)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(Device.userAgent.substr(0,4))) {
			Device.isPhone = true;
		}
		return true;
	}

	/**
	 * Determing if browser can play HTML video
	 * @return {Boolean}
	 */
	function canPlayHTMLVideo() {
		return (document.createElement('video').canPlayType);
	}

	/**
	 * Redirect to mobile site if:
	 * you've specifically requested the mobile site (via a set cookie)
	 * -OR-
	 * you're on a phone and haven't specifically requested the full site
	 */
	function redirectIfPhone() {
		/*
		redirect to mobile site if viewing from phone
		(if viewing from tablet, view templates add "View mobile site" bar at top, but don't redirect)
		*/
		var forceSiteView = $.cookie('forceSiteView');
		if (forceSiteView == 'mobile' || Device.isPhone) {
			if (forceSiteView != 'full') {
				window.location.href = '/mobile/';
			}
		}
		return true;
	}

	return {
		siteView: siteView,
		userAgent: userAgent,
		isMobile: isMobile,
		isPhone: isPhone,
		init: init,
		redirectIfPhone: redirectIfPhone,
		canPlayHTMLVideo: canPlayHTMLVideo
	}
}();


//MODULE: tracking
$(document).ready(function() {
	Tracking.init();
});

var Tracking = function() {
	function init() {
		processEventTrackingCookies();
		processHeapEvent();
	}

	/**
	 * Sets cookie with event tracking string
	 * @param trackedEvent
	 * 	to pass event properties, use the following syntax
	 * 	setEventCookie("eventName|'property1Name':'property1Value','property2Name':'property2Value'");
	 */
	function setEventCookie(trackedEvent) {
		$.cookie('trackedEvent', trackedEvent, {path: '/', secure: true});
	}

	/**
	 * Sends tracked events stored in cookie to Tracking.addEvent. Function is
	 * triggered by <externalTrigger> on each slide load per slide.php
	 */
	function processHeapEvent() {
		var trackedEventString = $.cookie('trackedEvent');
		if (trackedEventString) {
			var trackedEvent = Tracking.parseTrackedEventString(trackedEventString);
			Tracking.addEvent(trackedEvent['name'], trackedEvent['properties']);
			Tracking.setEventCookie(null);
		}
	}

	/**
	 * Sends tracked events stored in cookie to Tracking.addEvent
	 */
	function processEventTrackingCookies() {
		var trackedEventString = $.cookie('trackedEvent');
		if (trackedEventString) {
			var trackedEvent = Tracking.parseTrackedEventString(trackedEventString);
			Tracking.addEvent(trackedEvent['name'], trackedEvent['properties']);
			Tracking.setEventCookie(null);
		}
	}

	/**
	 * Converts data-tracked-event notation to object for Tracking.addEvent
	 * @param trackedEventString string in following format:
	 * 		eventName|'property1Name':'property1Val','property2Name':'property2Val'
	 * @return {Object} object of format:
	 * 		{
	 * 			name: eventName
	 * 			properties: {
	 * 				property1Name: property1Val,
	 * 				property2Name: property2Val
	 * 			}
	 * 		}
	 */
	function parseTrackedEventString(trackedEventString) {
		var trackedEventArr = trackedEventString.split('|'),
			trackedEvent = {},
			eventName,
			eventProperties;

		eventName = trackedEventArr[0];
		if (trackedEventArr[1]) {
			eventProperties = $.parseJSON('{' + trackedEventArr[1].replace(/'/g,"\"") + '}');
		}
		trackedEvent['name'] = eventName;
		trackedEvent['properties'] = eventProperties;
		return trackedEvent;
	}

	/**
	 * Tracks an event
	 * @param {String} eventName
	 * @param {Object.<string, string>} [properties] associative array of event properties
	 */
	function addEvent(eventName, properties) {
		if (typeof(heap) === 'object' && typeof(heap.track) === 'function') {
			if (properties === undefined) {
				properties = {}
			}
			properties.platform = 'web';
			heap.track(eventName, properties);
		}
	}

	/**
	 * Tracks an event for oubound
	 * @param {String} eventName
	 * @param {Object.<string, string>} [properties] associative array of event properties
	 */
	function addOutboundEvent(eventName, properties) {
		if (typeof(outbound) === 'object' && typeof(outbound.track) === 'function') {
			outbound.track(eventName, properties);
		}
	}

	/**
	 * Identifies a user in Heap Analytics
	 * @param {String} uniqueID
	 */
	function identifyHeapUser(uniqueId) {
		if (typeof(heap) === 'object' && typeof(heap.identify) === 'function') {
			heap.identify(uniqueId);
		}
	}

	/**
	 * Add a single property to a user
	 * This property will be appended to all tracking requests made on the same device (cookie-based)
	 * @param {string} name - name (key) of property to set
	 * @param {string|number|boolean} value - value of property to set
	 * @param {boolean} [immutable=false] - if true, this property can only be set once; defaults to FALSE
	 * @example
	 * Tracking.addUserProperty('plan', 'course');
	 * Tracking.addUserProperty('age', 21);
	 */
	function addUserProperty(name, value) {
		var property = {};
		property[name] = value;
		if (typeof(heap) === 'object' && typeof(heap.identify) === 'function') {
			heap.addUserProperties(property);
		}
	}

	/**
	 * Add a set of properties to a user
	 * @param {Object.<string, string|number|boolean>} properties - associative array of key-value pair properties to set
	 * @param {boolean} [immutable=false] - if true, this property can only be set once; defaults to FALSE
	 * @example
	 * Tracking.addUserProperties({"plan": "course", "age": 21});
	 */
	function addUserProperties(properties) {
		if (typeof(heap) === 'object' && typeof(heap.identify) === 'function') {
			heap.addUserProperties(properties);
		}
	}

	return {
		init: init,
		setEventCookie: setEventCookie,
		processHeapEvent: processHeapEvent,
		parseTrackedEventString: parseTrackedEventString,
		addEvent: addEvent,
		addOutboundEvent: addOutboundEvent,
		identifyHeapUser: identifyHeapUser,
		addUserProperty: addUserProperty,
		addUserProperties: addUserProperties
	}
}();


//MODULE: google
"use strict";

function Google() {
	this.signInElementIdentifier = '#google-sso';
	this.$signInElement = null;

	this.options = {
		// invoking list of Google accounts all time
		prompt: 'select_account'
	};

	this.clientId = null;
	this.user = null;
	this.auth2 = null;
}

/**
 * Load Gapi Auth2 module
 */
Google.prototype.load = function() {
	var self = this;
	gapi.load('auth2', function() {
		self.init();
	});
}

/**
 * Initialization of Google autentication
 */
Google.prototype.init = function() {
	var self = this;
	if (!this.clientId) {
		return;
	}

	// initialize auth2 with client ID
	this.auth2 = gapi.auth2.init({ client_id: this.clientId });

	// get notification when user change google sign in status
	this.auth2.isSignedIn.listen(function(isSignedIn) {
		self.signedInChangeHandler(isSignedIn);
	});

	// getting SSO button reference and attaching sign in action to SSO button
	this.$signInElement = $(this.signInElementIdentifier);
	this.$signInElement.click(function() {
		// we are setting up success callback to null, because we dont need to
		// know when its success. This has been cought by this.oauth2.isSignedIn
		// listener adn that will trigger signedInHandler
		self.auth2.signIn(self.options).then(null, function(err) {
			self.errorHandler(err);
		});
	});
}

/**
 * Handler for handling user signed in change
 * @param  {Boolean} isSignedIn
 */
Google.prototype.signedInChangeHandler = function(isSignedIn) {
	var self = this;

	// if user is signed in to google and as well to Sleepio we need to attach
	// logout action to logout link
	if (isSignedIn) {
		$('a#logout').click(function() {
			self.logout();
		});
	}

	// if user is signed in to google and is not logged in to sleepio
	// we need to invoke autentication and log user in
	if (isSignedIn && this.$signInElement.length > 0) {;
		this.signedInHandler(this.auth2.currentUser.get());
	}
}

/**
 * Logging out from Google app
 * @return {[type]} [description]
 */
Google.prototype.logout = function() {
	this.auth2.signOut();
}

/**
 * Sign in handler triggered after success auth
 * @param  {Object} user google user instance
 */
Google.prototype.signedInHandler = function(user) {
	var self = this;

	this.user = user;

	var data = this.$signInElement.data() || {};
	data.platform = "web"
	data.token = this.user.getAuthResponse().id_token;

	$.ajax({
		type: "POST",
		url: "/api/v2.0/oauth2/google/",
		data: JSON.stringify(data),
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		success: function(res) {
			res = res || { data: {} };
			var redirectTo = res.data.redirect;
            // if no redirect is passed, redirects to /overview/
            // for all pages except for /articles/
            if (redirectTo)
                window.location = redirectTo;
            else if (window.location.pathname.indexOf('/articles/') == 0)
                window.location.reload();
            else
                window.location = '/overview/';
		},
		error: function(err) {
			self.errorHandler(err);
		}
	});
};

/**
 * Error handler
 * @param  {Object} err
 */
Google.prototype.errorHandler = function(err) {
	var res = JSON.parse(err.responseText) || {
		meta: {
			message: 'Internal server error.'
		}
	};

	// Homepage login popup
	if ($('.loginPopup').length) {
		if ($('.login .loginAction .error').length) {
			$('.login .loginAction .error').html(res.meta.message);
		}
		else {
			$('.login .loginAction').prepend(
				$('<div />').addClass('error errorMessage')
						    .html(res.meta.message)
			)
		}
		$('.login').addClass('open');
	}

	// All variations of sign up (customer and S@W)
	$signUpStartError = $('#createAccountError');
	if ($signUpStartError.length) {
		$signUpStartError.parent().addClass('error');
		$signUpStartError.html($('<li />').html(res.meta.message));
	}

	// on any kind of error we need to sign up user from Google SSO for our app
	if (this.user && this.user.isSignedIn() && this.auth2) {
		this.logout();
	}
};


