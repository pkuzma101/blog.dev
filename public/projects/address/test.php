<?php
require '../../../config.address.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Ajax Address Book</title>

<link rel="stylesheet" href="js/jquery-ui-1.11.4.custom/jquery-ui.min.css">

<style>
  table {
    border-collapse:collapse;
    border:1px solid;
  }
  table td,table th {
    padding:10px;
    border:1px solid;
  }
</style>
</head>

<body>
  <div id='addresses'>
    <h2>Addresses <a href="#" id="address-add"><img src='http://decoart.com/img/add.png' /></a></h2>
  </div>
  <div id='contacts'>

  </div>
  <div title="" style="display:none">
    <form id="dialog-form">
      <fieldset>
        <label for="fname">First Name *</label>
        <input type="text" name="fname" id="fname" value="" class="text ui-widget-content ui-corner-all" required>
        <br />
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" value="" class="text ui-widget-content ui-corner-all">
        <br />
        <label for="street">Street</label>
        <input type="text" name="street" id="street" value="" class="text ui-widget-content ui-corner-all">
        <br />
        <label for="city">City</label>
        <input type="text" name="city" id="city" value="" class="text ui-widget-content ui-corner-all">
        <br />
        <label for="state">State</label>
        <input type="text" name="state" id="state" value="" class="text ui-widget-content ui-corner-all">
        <br />
        <label for="zip">Zip</label>
        <input type="text" name="zip" id="zip" value="" class="text ui-widget-content ui-corner-all">
        <br />
        
        <!-- Allow form submission with keyboard without duplicating the dialog button -->
        <input type="submit" id="submit-btn" tabindex="-1" style="position:absolute; top:-1000px">
      </fieldset>
      <div id="delete-confirm">
        Are you sure you want to delete this project?
      </div>
    </form>
  </div>

  <script type="text/javascript" src="/projects/address/js/jquery.min.js"></script>
  <script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#address-add').bind('click', function(){
        openAddAddress();
        return false;
      });
      $(document).on('click', '.address-edit', function(){
        var address_id = $(this).parent().parent().children(':nth-child(1)').text();
        var name = $(this).parent().parent().children(':nth-child(2)').text();
        var description = $(this).parent().parent().children(':nth-child(3)').text();
        var color = $(this).parent().parent().children(':nth-child(4)').children(':nth-child(2)').text();
        openEditAddress(address_id, fname, lname, street, city, state, zip);
        return false;
      });
      $(document).on('click', '.address-delete', function(){
        var person_id = $(this).parent().parent().children(':nth-child(1)').text();
        openDeleteAddress(person_id);
        return false;
      });
      //FEEL FREE TO MODIFY PARAMS AS NECESSARY
      var params = "functionName=getAddresses";
      var addParam = "functionName=addAddress";
      var editParam = "functionName=editAddress";
      var deleteParam = "functionName=deleteAddress";
      //DO NOT CHANGE THE URL
      var url = "http://blog.dev/projects/address/ajax.php";
      
      //INITIATE AJAX REQUEST
      $.ajax({
        url: url,
        type: "POST",
        data: params,
        cache: false,
        dataType: "json",
        success: function(data) {
          var html = "";
          if (data.addresses.length == 0) {
            html = "There are no addresses found";
          }
          else {
            var address_id;
            html = "<table id='addresses-table'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Street</th><th>City</th><th>State</th><th>ZIP</th><th>Actions</th>";
            $.each(data.addresses,function(key,address) {
              //html += "<tr>";
              $.each(address,function(address_key,value) {
                if (address_key == "person_id"){
                  html += '<tr id=address-'+value+'>';
                }
                html += "<td>";
                // else{
                html += value;
                // }
                html += "</td>";
              });
              html += "<td>"
              + "  <a href='#' class='address-edit'><img src='http://decoart.com/img/edit.png'/></a>"
              + "  <a href='#' class='address-delete'><img src='http://decoart.com/img/delete.png'/></a>"
              + "</td>";
              html += "</tr>";
            });
            html += "</table>";
          }
          $("#contacts").append(html);
        }
      });
      
      /*
     *  This function opens up the jQuery modal dialog box based off of the dialog-form
     *  The name field should be required
     */
      function openAddAddress() {
        if ($('#address_id').length > 0){
          $('#address_id').remove();
        }
        //SET THE TITLE TO BE USED ON THE POPUP
        $('#dialog-form fieldset').show();
        $('#dialog-form #delete-confirm').hide();
        $("#dialog-form").attr("title","Create new address");
        $('#fname').val("");
        $('#lname').val("");
        $('#street').val("");
        $('#city').val("");
        $('#state').val("");
        $('#zip').val("");
        dialog = $( "#dialog-form" ).dialog({
          autoOpen: true,
          modal: true,
          resizable: false,
          buttons: {
            "Add Address": function(){
              addAddress();
              dialog.dialog('close');
            },
            Cancel: function() {
              dialog.dialog( "close" );
            }
          },
          close: function() {
            
          }
        });
      }
      
      /*
     *  This contains an AJAX call to the server to actually save the new project to the database
     */
      
      function addAddress() {
        // console.log('add Address');
        $('#dialog-form').on('submit',function() {
          var fname = $('#fname').val();
          var lname = $('#lname').val();
          var street = $('#street').val();
          var city = $('#city').val();
          var state = $('#state').val();
          var zip = $('#zip').val();
          if(fname == '') {
            // console.log('name does not exist');
            alert("Please fill out Name");
          } else {
            var params = addParam + "&" + $(this).serialize();
            $.ajax({
              url: url,
              type: "POST",
              data: params,
              cache: false,
              dataType: 'json',
              success: function(data) {
                // console.log(data);
                var html = "";
                html += '<tr id="address-'+data.person_id+'">';
                html += '<td>';
                html += data.person_id;
                html += '</td>';
                html += '<td>';
                html += data.fname;
                html += '</td>';
                html += '<td>';
                html += data.lname;
                html += '</td>';
                html += '<td>';
                html += data.street;
                html += '</td>';
                html += '<td>';
                html += data.city;
                html += '</td>';
                html += '<td>';
                html += data.state;
                html += '</td>';
                html += '<td>';
                html += data.zip;
                html += '</td>';
                html += '<td>';
                html += "<a href='#' class='address-edit'><img src='http://decoart.com/img/edit.png'/></a>"
                html += " <a href='#' class='address-delete'><img src='http://decoart.com/img/delete.png'/></a>"
                html += '</td>';
                html += '</tr>';
                $('#contacts #addresses-table').children().after(html);
              }
            });
          }
          return false;
        });
        $('#dialog-form').submit();
        $('#dialog-form').off('submit');
      }
      
      /*
     *  This function opens up the jQuery modal dialog box to edit a project
     *  The name field should be required
     */
      function openEditAddress(person_id, fname, lname, street, city, state, zip) {
        var html = '<input type="hidden" value="'+person_id+'" name="person_id" id="person_id" />';
        if ($('#address_id').length > 0) {
          $('#address_id').remove();
        }
        $('#dialog-form fieldset').prepend(html);
        $('#fname').val(fname);
        $('#lname').val(lname);
        $('#street').val(street);
        $('#city').val(city);
        $('#state').val(state);
        $('#zip').val(zip);
        //SET THE TITLE TO BE USED ON THE POPUP
        $('#dialog-form fieldset').show();
        $('#dialog-form #delete-confirm').hide();
        $("#dialog-form").attr("title","Edit Address");
        dialog = $( "#dialog-form" ).dialog({
          autoOpen: true,
          modal: true,
          resizable: false,
          buttons: {
            "Edit Address": function(){
              editAddress();
              dialog.dialog('close');
            },
            Cancel: function() {
              dialog.dialog( "close" );
            }
          },
          close: function() {
            
          }
        });
      }
      
      /*
     *  This contains an AJAX call to the server to actually update the new project in the database
     */
      function editAddress(person_id, fname, lname, street, city, state, zip) {
        $('#dialog-form').on('submit',function() {
          var params = editParam + "&" + $(this).serialize();
          // console.log(params);
          $.ajax({            
            url: url,
            type: "POST",
            data: params,
            cache: false,
            dataType: 'json',
            success: function(data) {
              $('#address-'+data.person_id).children(':nth-child(2)').text(data.fname);
              $('#address-'+data.person_id).children(':nth-child(3)').text(data.lname);
              $('#address-'+data.person_id).children(':nth-child(4)').text(data.street);
              $('#address-'+data.person_id).children(':nth-child(5)').text(data.city);
              $('#address-'+data.person_id).children(':nth-child(6)').text(data.state);
              $('#address-'+data.person_id).children(':nth-child(7)').text(data.zip);
            }
          });
          return false;
        });
        $('#dialog-form').submit();
        $('#dialog-form').off('submit');
      }
      
      /*
     *  This function opens up the jQuery dialog box to confirm deleting a project
     *  This should not contain a form, rather just be a simple confirm box
     */
      function openDeleteAddress(person_id) {
        var html = '<input type="hidden" value="'+person_id+'" name="person_id" id="person_id" />';
        if ($('#person_id').length > 0) {
          $('#person_id').remove();
        }
        $('#dialog-form fieldset').prepend(html);
        $("#dialog-form").attr("title","Delete Address");
        $('#dialog-form fieldset').hide();
        $('#dialog-form #delete-confirm').show();
        dialog = $( "#dialog-form" ).dialog({
          autoOpen: true,
          modal: true,
          resizable: false,
          buttons: {
            "Delete Address": function(){
              deleteAddress();
              dialog.dialog('close');
            },
            Cancel: function() {
              dialog.dialog( "close" );
            }
          },
          close: function() {
            
          }
        });       
      }
      
      /*
     *  This contains an AJAX call to the server to actually delete the project from the database
     */
      function deleteAddress() {
        $('#dialog-form').on('submit',function() {
          var params = deleteParam + "&" + $(this).serialize();
          // console.log(params);
          $.ajax({            
            url: url,
            type: "POST",
            data: params,
            cache: false,
            dataType: 'json',
            success: function(data) {
              $('#address-'+data.person_id).remove();
            }
          });
          return false;
        });
        $('#dialog-form').submit();
        $('#dialog-form').off('submit');
      }
    });
  </script>
</body>
</html>