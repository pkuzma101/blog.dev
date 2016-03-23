$(document).ready(function() {
	function get_list(game_id) {
		$.ajax({
			url: 'url/get_characters.php?game_id=' + game_id,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				console.log(data);
				console.log(data.characters);
				var body = $('div#ff' + game_id + '_body');
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

	$('ul#tab_list li a').click(function() {
		var self = $(this);
		var game_id = self.attr('data-id');
		get_list(game_id);
	});

});