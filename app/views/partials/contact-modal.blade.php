<!-- "Contact Me" Modal -->

<div class="modal fade" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="contact-list">Contact Me</h2>
            </div>
            <div class="modal-body">
                <p class="contact-list"><em>Phone</em></p>
                <p class="contact-list">317-407-5789</p>
                <p class="contact-list"><em>Email</em></p>
                <p class="contact-list">{{ HTML::mailto('kuzma.paul@gmail.com', 'kuzma.paul@gmail.com') }}</p>
                <p class="contact-list"><em>Address</em></p>
                <p class="contact-list">5639 N. Meridian St., Indianapolis, IN 46208</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>