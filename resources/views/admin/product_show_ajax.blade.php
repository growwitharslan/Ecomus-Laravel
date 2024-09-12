<div class="modal-header">
    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="edit_product_form" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" id="editProductId" value="{{ $product['id'] }}">
            <label for="editProductName" class="form-label">Product Name</label>
            <input type="text" value="{{ $product['name'] }}" name="name" class="form-control" id="editProductName" required>
        </div>
        <div class="mb-3">
            <label for="editProductDescription" class="form-label">Product Description</label>
            <input type="text" value="{{ $product['Description'] }}" name="description" class="form-control" id="editProductDescription" required>
        </div>
        <div class="mb-3">
            <label for="editProductImage" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="image" id="editProductImage">
            <img src="{{asset('uploads/products/'. $product['image'])}}" alt="Product Image" style="width: 100px; height: auto;">
        </div>
        <div class="mb-3">
            <label for="editProductPrice" class="form-label">Price</label>
            <input type="number" value="{{ $product['price'] }}" name="price" class="form-control" id="editProductPrice" required>
        </div>
        <div class="mb-3">
            <label for="editProductStatus" class="form-label">Status</label>
            <select class="form-select" id="editProductStatus" name="available" required>
                <option value="1" {{ $product['status'] == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="0" {{ $product['status'] == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary " id="update_product">Update Product</button>
</div>