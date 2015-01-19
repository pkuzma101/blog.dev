$(document).ready(function() {
	// $('#exampleReveal').hide();
	$('#exampleTrigger').hover(
		function() {
			$('#exampleReveal').show();
		},
		function() {
			$('#exampleReveal').hide();
		}
	);

});