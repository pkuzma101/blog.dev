function address_modal(person_id) {

	// Empties contents of any previous modals
  $('.modal-title').empty();
  $('.modal-body').empty();
  $('.modal-footer').empty();
  $('.modal-title').append($('<h3 />', {html: 'Edit Address'}));

  if (person_id) {
  	var p_id = person_id;
  }

  var edit_params = "function_name=edit_address";
  var url = "http://paulkuzmadev.com/projects/address/db.php";

  $.ajax({
  	url: '/projects/address/single_address.php',
  	type: 'get',
  	data: {
  		'id': p_id
  	},
  	dataType: 'json',
  	success: function(data) {
  		$('.modal-body').append($('<form />', {id: 'edit_address_form'}));
  		$('#edit_address_form').append($('<input />', {type: 'hidden', value: data.person_id, id: 'person_id', name: 'person_id'}));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'First Name: '})).append($('<input />', {type: 'text', id: 'fname', name: 'fname', value: data.fname})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'Last Name: '})).append($('<input />', {type: 'text', id: 'lname', name: 'lname', value: data.lname})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'Street: '})).append($('<input />', {type: 'text', id: 'street', name: 'street', value: data.street})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'City: '})).append($('<input />', {type: 'text', id: 'city', name: 'city', value: data.city})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'State: '})).append($('<input />', {type: 'text', id: 'state', name: 'state', value: data.state})));
  		$('#edit_address_form').append($('<div />').append($('<label />', {html: 'Zip: '})).append($('<input />', {type: 'text', id: 'zip', name: 'zip', value: data.zip})));
  		// $('#edit_address_form').append($('<div />').append($('<button />', {html: 'Submit', type: 'submit', class: 'address_modal_btn', id: 'edit_submit'})).append($('<button data-dismiss="modal" class="address_modal_btn">Cancel</button>'})));
      $('#edit_address_form').append($('<div><button type="submit" class="address_modal_btn" id="edit_submit" name="edit_submit">Submit</button><button data-dismiss="modal" class="address_modal_btn">Cancel</button></div>'));

  		$('#edit_address_form').on('submit', function() {
  			var params = edit_params + "&" + $(this).serialize();

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var person_id = $('#person_id').val();
        var street = $('#street').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var zip = $('#zip').val();

        $.ajax({
          url: url,
          type: 'post',
          data: params,
          dataType: 'json',
          success: function(data) {
            alert(data);
            // console.log($('tr#' + json.person_id).children());
            $('tr#' + data.person_id).children().empty();
          }
        });
        return false;
  			
  		});
      // $('#edit_address_form').submit();
      // $('#edit_address_form').off('submit');
  	}
  });
}