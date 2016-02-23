<div class="modal fade" id="address_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Add Address</h3>
      </div>
      <div class="modal-body">
        <div class="modal-form-body">
        	<form id="new_address_form">
        		<div>
        			<label>First Name: </label>
        			<input type="text" id="fname" name="fname" placeholder="John">
        		</div>
        		<div>
        			<label>Last Name: </label>
        			<input type="text" id="lname" name="lname" placeholder="Doe">
        		</div>
        		<div>
        			<label>Street: </label>
        			<input type="text" id="street" name="street" placeholder="1234 Example St.">
        		</div>
        		<div>
        			<label>City: </label>
        			<input type="text" id="city" name="city" placeholder="Somewheresville">
        		</div>
        		<div>
        			<label>State: </label>
        			<input type="text" id="state" name="state" placeholder="IN" maxlength="2" style="width: 25px;">
        		</div>
        		<div>
        			<label>First Name: </label>
        			<input type="number" id="zip" name="zip" placeholder="45454" maxlength="5" style="width: 55px;">
        		</div>
        		<div>
        			<button type="submit" class="address_modal_btn" id="new_address_submit" name="new_address_submit">Submit</button>
        			<button type="button" class="address_modal_btn" id="cancel_button" data-dismiss="modal">Cancel</button>
        		</div>
        	</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="address_modal_save">Submit</button>
        <button type="button" class="btn btn-default" id="address_modal_cancel" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->