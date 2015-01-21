$(document).ready(function() {
	// $('#exampleReveal').hide();
	$('#exampleTrigger').hover(
		function() {
			$('#exampleReveal').fadeIn("slow");
		},
		function() {
			$('#exampleReveal').fadeOut("slow");
		}
	);
});