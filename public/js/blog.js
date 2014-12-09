$(document).ready(function() {

	$(".blog-entry").click(function() {
		$(this).animate({
			height: 'auto'
		});
	});

	$(".delete-btn").click(function() {
		var postId = $(this).data('post-id');
		$("#delete-form").attr('action', '/posts/' + postId);
		if(!confirm('Are you sure you want to delete this post?')) {
			$("#delete-form").submit();
		}
	});

	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	});

});

