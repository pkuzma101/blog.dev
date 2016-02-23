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
  		$('.modal-body').append($('<form />', {id: 'edit_address_form'}));
  		$('#edit_address_form').append($('<input />', {type: 'hidden', value: data.person_id}));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'First Name: '})).append($('<input />', {type: 'text', id: 'fname', name: 'fname', value: data.fname})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'Last Name: '})).append($('<input />', {type: 'text', id: 'lname', name: 'lname', value: data.lname})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'Street: '})).append($('<input />', {type: 'text', id: 'street', name: 'street', value: data.street})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'City: '})).append($('<input />', {type: 'text', id: 'city', name: 'city', value: data.city})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'State: '})).append($('<input />', {type: 'text', id: 'state', name: 'state', value: data.state})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'Zip: '})).append($('<input />', {type: 'text', id: 'zip', name: 'zip', value: data.zip})));
  		$('#edit_address_form').append($('<div />').append($('<button />', {html: 'Submit', type: 'submit', class: 'address_modal_btn', id: 'edit_submit'})).append($('<button data-dismiss="modal" />', {html: 'Cancel', type: 'button', class: 'address_modal_btn'})));

  		$('#edit_address_form').on('submit', function() {

  		});
  	}
  });
}