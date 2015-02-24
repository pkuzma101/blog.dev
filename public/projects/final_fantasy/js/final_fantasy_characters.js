$(document).ready(function() {
	$('#finalFantasyPage').parallax({imageSrc: '/projects/final_fantasy/images/background_wallpaper.jpg'});
	
	function moveSound() {
		var cursorChime = document.getElementById('move-sound');
			cursorChime.load();
			cursorChime.play();			
	}

	function saveSound() {
		var saveChime = document.getElementById('save-sound');
		saveChime.load();
		saveChime.play();
	}

	var pageButton = document.getElementById('pageButton');

	var submitButton = document.getElementById('submit-button');

	pageButton.addEventListener('click', moveSound);

	submitButton.addEventListener('click', saveSound);

});

