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
		    		<th>State</th>
		    		<th>Zip</th>
		    		<th>Actions</th>
		    	</tr>
		    </table>
	  	</article>

	  </section>

	  <div class="modal fade" id="address_modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title">Modal title</h3>
		      </div>
		      <div class="modal-body">
		        <div class="modal-form-body"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" id="activity-modal-save">Submit</button>
		        <button type="button" class="btn btn-default" id="activity-modal-cancel" data-dismiss="modal">Close</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

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
					console.log(data);
					$.each(data, function(key, value) {
						$.each(value, function(k, v) {
							console.log(v.person_id);
							$('#address_book').append('<tr id="' + v.person_id + '"></tr><td>' + v.fname + " " + v.lname + '</td><td>' + v.street + '</td><td>' + v.state + '</td><td>' + v.zip + '</td><td><a href="#/" class="address_edit" data_id="' + v.person_id + '"><img src="images/pencil.png" /></a><a href="#/" class="address_delete" data_id="' + v.person_id + '"><img src="images/cancel.png" /></a></td></tr>');
						});
					});
				}
			});
			
      

		});
		</script>
	</body>
</html>