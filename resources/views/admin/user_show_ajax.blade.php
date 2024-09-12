<div class="modal-header">
    <h5 class="modal-title" id="editProductModalLabel">Edit USER</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="edit_product_form" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" id="editProductId" value="{{ $user['id'] }}">
            <label for="editProductName" class="form-label">User Name</label>
            <input type="text" value="{{ $user['name'] }}" name="name" class="form-control" id="editProductName" required>
        </div>
        <div class="mb-3">
            <label for="editProductName" class="form-label">User Email</label>
            <input type="email" value="{{ $user['email'] }}" name="email" class="form-control" id="editProductName" required>
        </div>
        
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary " id="update_category">Update Category</button>
</div>