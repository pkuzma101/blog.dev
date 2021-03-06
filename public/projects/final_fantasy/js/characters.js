$(document).ready(function() {

	var char_id;
  var deletion;
  	
	function get_list(game_id) {
		$.ajax({
			url: 'get_characters.php?game_id=' + game_id,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				var body = $('div#ff' + game_id + '_body');
				body.empty();
				$.each(data.characters, function(key, value) {
					body.append('<div class="card_block" id="' + value['id'] + '"></div>');
					$('#' + value['id']).append('<div class="char_card" id="card' + value['id'] + '" data-id="' + value['id'] + '"></div>');
					$('#card' + value['id']).append('<div class="card_row" id="top' + value['id'] + '"></div>');
					$('#top' + value['id']).append('<div class="col-3-8"><a href="#/" class="portrait" data-toggle="modal" data-target="#character_modal"><img src="' + value['image_path'] + '" id="portrait' + value['id'] + '" /></a></div><div class="col-5-8" id="name' + value['id'] + '"></div></div>');
					$('#name' + value['id']).append('<h3 class="char_name">' + value['first_name'] + " " + value['last_name'] + '</h3>');
					$('#name' + value['id']).append('<h4 class="char_class">' + value['class'] + '</h4>');
					$('#card' + value['id']).append('<div class="card_row" id="bottom' + value['id'] + '"></div>');
					$('#bottom' + value['id']).append('<div class="col-4-8" id="spec' + value['id'] + '"></div><div class="col-4-8" id="weapon' + value['id'] + '"></div>');
					$('#spec' + value['id']).append('<span>Special Ability: ' + value['special_ability'] + '</span>');
					$('#weapon' + value['id']).append('<span>Weapon: ' + value['weapon'] + '</span>');
          $('#card' + value['id']).append('<div class="bottom_row"><a class="edit_btn" data-id="' + value['id'] + '" href="#/" data-toggle="modal" data-target="#character_modal">Edit</a><a class="delete_btn" data-id="' + value['id'] + '" href="#/">Delete</a></div>');
				});

        // remove all delete buttons after one deletion
        if (deletion == 1) {
          $('a.delete_btn').hide();
        }

        // code for changing portraits
				$('a.portrait').click(function() {
					char_id = $(this).parent().parent().parent().attr('data-id');
					change_portrait(char_id);
				});

        // code to bring up edit modal
        $('a.edit_btn').click(function() {
          char_id = $(this).attr('data-id');
          edit_character(char_id);
        });

        // code for deleting cards
        $('a.delete_btn').click(function() {
          char_id = $(this).attr('data-id');
          delete_character(char_id);
        });
			}
		});
		// return false;
	}

	function create_modal(bool) {
		if (bool == 1) {
			var edit = bool;
		} else if (bool == 2) {
			var img = bool;
		}

		// Empties contents of any previous modals
		$('.modal-title').empty();
	  $('.modal-body').empty();
	  $('.modal-footer').empty();

	  // creates modal for changing portraits
	  if (img) {
	  	$('.modal-title').append($('<h3 />', {html: 'Change Portrait'}));
	  	$('.modal-body').append($('<form />', {id: 'image_form'}));
	  	$('#image_form').append($('<div><label>Add Portrait</label><input type="file" id="image" name="image" /></div>'));
	  	$('#image_form').append($('<div><button type="submit" id="submit_image" name="submit_image">Save</button></div>'));
	  } else {

		  // creates modal for adding a character
		  $('.modal-title').append($('<h3 />', {html: (edit ? 'Edit Character' : 'Add New Character')}));
		  $('.modal-body').append($('<form />', {id: 'new_char_form'}));
		  $('#new_char_form').append($('<div class="ff1"><label>First Name</label><input type="text" id="first_name" name="first_name" /></div>'));
		  $('#new_char_form').append($('<div class="ff1 ff2 ff10"><label>Last Name</label><input type="text" id="last_name" name="last_name" /></div>'));
		  $('#new_char_form').append($('<div class="ff5"><label>Class</label><input type="text" id="class" name="class" /></div>'));
		  $('#new_char_form').append($('<div class="ff2 ff5"><label>Special Ability</label><input type="text" id="special_ability" name="special_ability" /></div>'));
		  $('#new_char_form').append($('<div class="ff5"><label>Weapon</label><input type="text" id="weapon" name="weapon" /></div>'));
		  $('#new_char_form').append($('<div><button type="button" id="submit_btn" name="submit_btn">Save</button></div>'));
		}

    if (edit) {
      var fname;
      var lname;
      var spec;
      var char_class;
      var weapon;
      var game;

      $.ajax({
        url: 'get_one_character.php?id=' + char_id,
        type: 'get',
        dataType: 'json',
        success: function(data) {
          fname = data['first_name'];
          lname = data['last_name'];
          char_class = data['class'];
          spec = data['special_ability'];
          weapon = data['weapon'];
          game = data['game'];

          adjust_for_game(game);

          // insert values for the edit modal
          $('input#first_name').val(fname);
          $('input#last_name').val(lname);
          $('input#class').val(char_class);
          $('input#special_ability').val(spec);
          $('input#weapon').val(weapon);
        }
      });
      return false;
  	}
  }

	// function that makes a new character card
	function add_character(game_id) {
	  create_modal();
	  $('#new_char_form').prepend($('<div><input type="hidden" id="game" name="game" value="' + game_id + '" /></div>'));

	  adjust_for_game(game_id);

	  // AJAX call for a new character into the database
	  $('#submit_btn').click(function() {
	  	$.ajax({
	  		url: 'insert_character.php',
	  		type: 'post',
	  		data: {
	  			'first_name': $('#first_name').val(),
	  			'last_name': $('#last_name').val(),
	  			'class': $('#class').val(),
	  			'special_ability': $('#special_ability').val(),
	  			'weapon': $('#weapon').val(),
	  			'image': '/projects/final_fantasy/images/blank_portrait.jpg',
	  			'game': $('#game').val()
	  		},
	  		dataType: 'json',
	  		success: function(data) {

	  			// get rid of modal
	  			$('#character_modal').modal('hide');
          save_chime();

	  			// create new character card
	  			var body = $('div#ff' + game_id + '_body');
          $(body).empty();
          get_list(game_id);
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

  // removes input fields based on which game is having a character added
  function adjust_for_game(game_id) {
    if (game_id == 1) {
      $('.ff1').addClass("invisible");
    } else if (game_id == 2) {
      $('.ff2').addClass("invisible");
    } else if (game_id == 3) {
      $('.ff3').addClass("invisible");
    } else if (game_id == 5) {
      $('.ff5').addClass("invisible");
    } else if (game_id == 10) {
      $('.ff10').addClass("invisible");
    }
  }

	// function that changes a card portrait
	function change_portrait(char_id) {
		create_modal(2);
		$('#image_form').prepend($('<input type="hidden" id="char_id" name="char_id" value="' + char_id + '" />'));

    $('#image_form').on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: 'insert_image.php',
        type: 'post',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          $('#character_modal').modal('hide');
          save_chime();
          $("img#portrait" + data['id']).replaceWith('<img id="portrait' + data['id'] + '" src="' + data['image_path'] + '" />');
        },
        error: function(request, status, error) {
          console.log(status);
          console.log(error);
          console.log(request.responseText);
        }
      });
    }));
    return false;
	}

  function delete_character(char_id) {
    var question = confirm("Delete this character?");
    if (question == true) {
      $.ajax({
        url: 'delete_character.php?id=' + char_id,
        type: 'post',
        dataType: 'json',
        success: function(data) {
          $('div#' + data['id']).remove();
          deletion = 1;

          // remove all delete buttons after one deletion
          if (deletion == 1) {
            $('a.delete_btn').hide();
          }
        },
        error: function(request, status, error) {
          console.log(status);
          console.log(error);
          console.log(request.responseText);
        }
      });
    } else {
      return false;
    }
  }

  function edit_character(char_id) {
    create_modal(1);
    
    // ajax call for editing a character
    $('#submit_btn').click(function() {
      $.ajax({
        url: 'edit_character.php?id=' + char_id,
        type: 'post',
        data: {
          'first_name': $('#first_name').val(),
          'last_name': $('#last_name').val(),
          'class': $('#class').val(),
          'special_ability': $('#special_ability').val(),
          'weapon': $('#weapon').val(),
        },
        dataType: 'json',
        success: function(json) {
          $('#character_modal').modal('hide');
          $('#name' + json['id']).closest('h3').replaceWith('<h3 class="char_name">' + json['first_name'] + " " + json['last_name'] + '</h3><h4 class="char_class">' + json['class'] + '</h4>');
          $('#spec' + char_id).children().replaceWith('<span>Special Ability: ' + json['special_ability'] + '</span>');
          $('#weapon' + char_id).children().replaceWith('<span>Weapon: ' + json['weapon'] + '</span>');
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

  function save_chime() {
    var save_chime = $('#save_chime')[0];
    save_chime.play();
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