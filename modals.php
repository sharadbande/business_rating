<!-- Business Modal -->
<div class="modal fade" id="businessModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="businessForm">
                <div class="modal-header">
                    <h5 class="modal-title">Business</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="business_id_hidden">
                    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
                    <input type="text" name="address" class="form-control mb-2" placeholder="Address">
                    <input type="text" name="phone" class="form-control mb-2" placeholder="Phone">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Rating Modal -->
<div class="modal fade" id="ratingModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="ratingForm">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Rating</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="business_id" id="business_id">

                    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                    <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>

                    <div id="ratyInput"></div>
                    <input type="hidden" name="rating" id="ratingValue">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this business?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>
 