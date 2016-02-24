<?php
require '../../../config.address.php';

?>

<html>
	<head>
		<title>Address Book</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Architects+Daughter' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/address.css">
	</head>
	<body>
		<a href="/portfolio" class="btn btn-default" id="back">Back</a>

		<section id="address_book_page">

			<article id="whole_book">
				<div id="title">
		      <h2>Addresses <a href="#/" id="address-add" data-toggle="modal" data-target="#address_modal"><span id="plus_sign">&#43;</span></a></h2>
		    </div>

		    <table id="address_book">
		    	<tr>
		    		<th>Name</th>
		    		<th>Street</th>
		    		<th>City</th>
		    		<th>State</th>
		    		<th>Zip</th>
		    		<th>Actions</th>
		    	</tr>
		    </table>
	  	</article>

	  </section>

	  <?php

	  include('address_modal.php');

	  ?>

	  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="js/address_modal.js"></script>
		<script>
		$(document).ready(function() {

			var get_params = "function_name=get_addresses";
			var add_params = "function_name=add_address";
			var edit_params = "function_name=edit_address";
			var delete_params = "function_name=delete_address";

			var page = document.URL;

			if (page == "http://blog.dev/projects/address/address_book.php") {
				var url = "http://blog.dev/projects/address/db.php";
			} else {
				var url = "http://paulkuzmadev.com/projects/address/db.php";
			}

			$.ajax({
				url: url,
				type: 'get',
				data: get_params,
				dataType: 'json',
				success: function(data) {
					$.each(data, function(key, value) {
						$.each(value, function(k, v) {
							$('#address_book').append('<tr id="' + v.person_id + '"><td>' + v.fname + " " + v.lname + '</td><td>' + v.street + '</td><td>' + v.city + '</td><td>' + v.state + '</td><td>' + v.zip + '</td><td><a href="#/" class="address_edit" onclick="address_modal(' + v.person_id + ')" data-toggle="modal" data-target="#address_modal"><img src="images/pencil.png" /></a><a href="#/" class="address_delete" data_id="' + v.person_id + '"><img src="images/cancel.png" /></a></td></tr>');
						});
					});

					$('.address_delete').click(function() {
						var question = confirm("Delete this entry?");
						if (question == true) {
							var del_id = $(this).attr("data_id");
							console.log(del_id);
							$.ajax({
								url: '/delete_address.php?id=' + del_id,
								type: 'post',
								// data: {
								// 	'id': del_id
								// },
								dataType: 'json',
								success: function(json) {
									$('tr#' + del_id).remove();
								}
							});
						} else {
							return false;
						}
					});
				}
			});
			
      $('#new_address_form').on('submit', function() {
      	var fname = $('#fname').val();
        var lname = $('#lname').val();
        var street = $('#street').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var zip = $('#zip').val();

        var params = add_params + "&" + $(this).serialize();

      	$.ajax({
      		url: url,
      		type: 'post',
      		data: params,
      		dataType: 'json',
      		success: function(data) {
      			$('#address_book').append('<tr id="' + data.person_id + '"></tr><td>' + data.fname + " " + data.lname + '</td><td>' + data.street + '</td><td>' + data.city + '</td><td>' + data.state + '</td><td>' + data.zip + '</td><td><a href="#/" class="address_edit" onclick="address_modal(' + data.person_id + ')" data-toggle="modal" data-target="#address_modal"><img src="images/pencil.png" /></a><a href="#/" class="address_delete" data_id="' + data.person_id + '"><img src="images/cancel.png" /></a></td></tr>');
      		}
      	});
      });

		});
		</script>
	</body>
</html>