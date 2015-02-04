$(document).ready(function() {
	$(".delete-btn").click(function() {
		var postId = $(this).data('post-id');
		$("#delete-form").attr('action', '/posts/' + postId);
		if(confirm('Are you sure you want to delete this post?')) {
			$("#delete-form").submit();
		}
	});

	// Tooltips
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	});

	// Parallax Scroll - Title Page
	$('#introSection').parallax({imageSrc: 'css/images/name3.png'});

	// Title Page Hover Functionality
	var featuredWorkSquare = $('.hoverSquare').hide();

	$('#mentrSquare').hover(
		function() {
			$('#mentrHoverSquare').fadeToggle("fast");
		},
		function() {
			$('#mentrHoverSquare').fadeToggle("fast");
		});

	$('#fantasySquare').hover(
		function() {
			$('#fantasyHoverSquare').fadeToggle("fast");
		},
		function() {
			$('#fantasyHoverSquare').fadeToggle("fast");
		});

	$('#whackSquare').hover(
		function() {
			$('#whackHoverSquare').fadeToggle("fast");
		},
		function() {
			$('#whackHoverSquare').fadeToggle("fast");
		});

	// Scroll down blog entries when they are clicked
		// $(".blog-entry").each(function() {
	 //        $(this).data('default-height', $(this).height());
	                
	 //        $(this).height('120');
	 //    });
	    
	 //    $(".blog-entry").click(function() {
	 //        var targetHeight = $(this).data('default-height');
	        
	 //        $(this).animate({
	 //            height: targetHeight
	 //        }, 1000);
	 //    });


});

