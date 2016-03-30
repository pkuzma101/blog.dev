$(document).ready(function() {

	var image_path = "";
	// console.log(image_path);

	function get_list(game_id) {
		$.ajax({
			url: 'url/get_characters.php?game_id=' + game_id,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				var body = $('div#ff' + game_id + '_body');
				// var article = body.parent();
				// article.prepend('');
				body.empty();
				$.each(data.characters, function(key, value) {
					body.append('<div class="card_block" id="' + value['id'] + '"></div>');
					$('#' + value['id']).append('<div class="char_card" id="card' + value['id'] + '"></div>');
					$('#card' + value['id']).append('<div class="card_row" id="top' + value['id'] + '"></div>');
					$('#top' + value['id']).append('<div class="col-3-8"><img src="' + value['image_path'] + '" /></div><div class="col-5-8" id="name' + value['id'] + '"></div></div>');
					$('#name' + value['id']).append('<h3 class="char_name">' + value['first_name'] + " " + value['last_name'] + '</h3>');
					$('#name' + value['id']).append('<h4 class="char_class">' + value['class'] + '</h4>');
					$('#card' + value['id']).append('<div class="card_row" id="bottom' + value['id'] + '"></div>');
					$('#bottom' + value['id']).append('<div class="col-4-8" id="spec' + value['id'] + '"></div><div class="col-4-8" id="weapon' + value['id'] + '"></div>');
					$('#spec' + value['id']).append('<span>Special Ability: ' + value['special_ability'] + '</span>');
					$('#weapon' + value['id']).append('<span>Weapon: ' + value['weapon'] + '</span>');
				});
			}
		});
		return false;
	}

	function create_modal(bool) {
		if (bool == 1) {
			var edit = bool;
		}

		// Empties contents of any previous modals
		$('.modal-title').empty();
	  $('.modal-body').empty();
	  $('.modal-footer').empty();
	  $('.modal-title').append($('<h3 />', {html: 'Add New Character'}));

	  $('.modal-body').append($('<form id="new_char_form"></form>'));
	  $('#new_char_form').append($('<div class="ff1"><label>First Name</label><input type="text" id="first_name" name="first_name" /></div>'));
	  $('#new_char_form').append($('<div class="ff1"><label>Last Name</label><input type="text" id="last_name" name="last_name" /></div>'));
	  $('#new_char_form').append($('<div><label>Class</label><input type="text" id="class" name="class" /></div>'));
	  $('#new_char_form').append($('<div><label>Special Ability</label><input type="text" id="special_ability" name="special_ability" /></div>'));
	  $('#new_char_form').append($('<div><label>Weapon</label><input type="text" id="weapon" name="weapon" /></div>'));
	  // $('#new_char_form').append($('<div><label>Upload Portrait</label><form id="image_form"><input type="file" id="image" name="image" /></form></div>'));
	  $('#new_char_form').append($('<div><button type="button" id="submit_btn" name="submit_btn">Save</button></div>'));

		// $('#image_form').on('submit', function(e) {
		// 	e.preventDefault();
		// 	var form_data = new FormData(this);

		// 	$.ajax({
		// 		url: 'url/insert_image.php',
		// 		type: 'post',

		// 	});
		// });
	}

	function add_character(game_id) {
	  create_modal();
	  $('#new_char_form').prepend($('<div><input type="hidden" id="game" name="game" value="' + game_id + '" /></div>'));
	  // remove first name and last name fields from FFI
	  if (game_id == 1) {
	  	$('.ff1').remove();
	  }

	  $('#submit_btn').click(function() {
	  	$.ajax({
	  		url: 'url/insert_character.php',
	  		type: 'post',
	  		data: {
	  			'first_name': $('#first_name').val(),
	  			'last_name': $('#last_name').val(),
	  			'class': $('#class').val(),
	  			'special_ability': $('#special_ability').val(),
	  			'weapon': $('#weapon').val(),
	  			// 'image': $('#image').val(),
	  			'image': '/projects/final_fantasy/images/blank_portrait.jpg',
	  			'game': $('#game').val()
	  		},
	  		dataType: 'json',
	  		success: function(data) {

	  			// get rid of modal
	  			$('#character_modal').modal('hide');

	  			// create new character card
	  			var body = $('div#ff' + game_id + '_body');
	  			body.append('<div class="card_block" id="' + data['id'] + '"></div>');
					$('#' + data['id']).append('<div class="char_card" id="card' + data['id'] + '"></div>');
					$('#card' + data['id']).append('<div class="card_row" id="top' + data['id'] + '"></div>');
					$('#top' + data['id']).append('<div class="col-3-8"><img src="' + data['image_path'] + '" /></div><div class="col-5-8" id="name' + data['id'] + '"></div></div>');
					$('#name' + data['id']).append('<h3 class="char_name">' + data['first_name'] + " " + data['last_name'] + '</h3>');
					$('#name' + data['id']).append('<h4 class="char_class">' + data['class'] + '</h4>');
					$('#card' + data['id']).append('<div class="card_row" id="bottom' + data['id'] + '"></div>');
					$('#bottom' + data['id']).append('<div class="col-4-8" id="spec' + data['id'] + '"></div><div class="col-4-8" id="weapon' + data['id'] + '"></div>');
					$('#spec' + data['id']).append('<span>Special Ability: ' + data['special_ability'] + '</span>');
					$('#weapon' + data['id']).append('<span>Weapon: ' + data['weapon'] + '</span>');
	  		},
	  		error: function(request, status, error) {
	  			console.log(status);
	  			console.log(error);
	  			console.log(request.responseText);
	  		}
	  	});
	  });
	  return false;
	}

	// gets list of characters from a particular game
	$('ul#tab_list li a').click(function() {
		var self = $(this);
		var game_id = self.attr('data-id');
		get_list(game_id);
	});

	// allows modal to insert new characters into database
	$('.character_add').click(function() {
		var game_id = $(this).attr('data-id');
		add_character(game_id);
	});

});