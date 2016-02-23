function address_modal(person_id) {

	// Empties contents of any previous modals
  $('.modal-title').empty();
  $('.modal-body').empty();
  $('.modal-footer').empty();
  $('.modal-title').append($('<h3 />', {html: 'Edit Address'}));

  if (person_id) {
  	var p_id = person_id;
  }

  $.ajax({
  	url: '/projects/address/single_address.php',
  	type: 'get',
  	data: {
  		'id': person_id
  	},
  	dataType: 'json',
  	success: function(data) {
  		console.log(data);
  		$('.modal-body').append($('<form />', {id: 'edit_address_form'}));
  		$('#edit_address_form').append($('<div />').append($('<label />' {html: 'First Name: '})).append($('<input />', {id: 'fname', name: 'fname', type: 'text'})));
  	}
  });
}