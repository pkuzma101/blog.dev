$(document).ready(function() {
	$(".delete-btn").click(function() {
		var postId = $(this).data('post-id');
		$("#delete-form").attr('action', '/posts/' + postId);
		if(confirm('Are you sure you want to delete this post?')) {
			$("#delete-form").submit();
		}
	});

	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	});

	$(".blog-entry").each(function() {
        $(this).data('default-height', $(this).height());
                
        $(this).height('80');
    });
            
    $(".blog-entry").click(function() {
        var targetHeight = $(this).data('default-height');
        
        $(this).animate({
            height: targetHeight
        }, 1000);
    });

});

