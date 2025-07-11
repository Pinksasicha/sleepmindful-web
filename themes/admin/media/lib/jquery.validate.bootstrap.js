$(function(){
	jQuery.validator.setDefaults({
		errorPlacement: function(error, element) {
// if the input has a prepend or append element, put the validation msg after the parent div
if(element.parent().hasClass('input-prepend') || element.parent().hasClass('input-append')) {
	error.insertAfter(element.parent());	
// else just place the validation message immediatly after the input
} else {
	error.insertAfter(element);
}
},
onfocusout: false,
onkeyup: false,
errorElement: "small", // contain the error msg in a small tag
wrapper: "div", // wrap the error message and small tag in a div
ignore: ":hidden, [readonly='readonly']",
highlight: function(element) {
$(element).closest('.control-group').addClass('error'); // add the Bootstrap error class to the control group
},
success: function(element) {
$(element).closest('.control-group').removeClass('error'); // remove the Boostrap error class from the control group
}
});
})