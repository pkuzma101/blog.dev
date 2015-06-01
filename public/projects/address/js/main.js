$(document).ready(function() {
	$('#address-add').bind('click', function() {
		openAddAddress();
		return false;
	});
	var params = "functionName=getAddresses";
	var addParam = "functionName=addAddress";
	var editParam = "functionName=editAddress";
	var deleteParam = "functionName=deleteAddress";
	var url = "http://blog.dev/projects/address/address_book.php";

	// AJAX request
	$.ajax({ 
		url: url,
		type: "POST",
		data: params,
		cache: false,
		dataType: "json",
		success: function(data) {
			var html = "";
			if(data.addresses.length == 0) {
				html = "There are no entries found.";
			} else {
				var address_id;
				html = "<table id='address-table'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Street></th><th>City</th><th>State</th><th>ZIP</th><th>Actions</th>";
				$.each(data.addresses,function(key,address) {
					$.each(address,function(address_key,value) {
						if(address_key == "id") {
							html += '<tr id=address-'+value+'>';
						} 

						html += '<td>';
						html += '</td>';
					});
					html += "<td>"
					+ " <a href='#' class='address-edit'>Edit</a>"
					+ " <a href='#' class='address-delete'>Delete</a>"
					+ "</td>";
					html += "</tr>";
				});
				html += "</table>";
			}
			$("addresses").append(html);
		}
	});

	function openAddAddress() {
		if($('#person_id').length > 0) {
			$('#person_id').remove();
		}
		// Set modal title
		$('#dialog-form fieldset').show();
		$('#dialog-form #delete-confirm').hide();
		$('#dialog-form').attr('title', 'New Address');
		$('#fname').val("");
		$('#lname').val("");
		$('#street').val("");
		$('#city').val("");
		$('#state').val("");
		$('#zip').val("");
		dialog = $("dialog-form").dialog({
			autoOpen: true,
			modal: true,
			resizable: false,
			buttons: {
				"Add Address": function() {
					addAddress();
					dialog.dialog('close');
				},
				Cancel: function() {
					dialog.dialog('close');
				}
			},
			close: function() {

			}
		});
	}

	function addAddress() {
		$('#dialog-form').on('submit', function() {
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var street = $('#street').val();
			var city = $('#city').val();
			var state = $('#state').val();
			var zip = $('#zip').val();
			
		});
	}

});