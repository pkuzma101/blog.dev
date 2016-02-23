function address_modal(person_id) {

	// Empties contents of any previous modals
  $('.modal-title').empty();
  $('.modal-body').empty();
  $('.modal-footer').empty();
  $('.modal-title').append($('<h3 />', {html: 'Edit Address'}));

  if (person_id) {
  	var p_id = person_id;
  }

  console.log(person_id);
}