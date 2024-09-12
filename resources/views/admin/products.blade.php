@push('styles')
<link href="{{ asset('admin_assets/css/plugins/ladda/ladda-themeless.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.0/ladda.min.css" integrity="sha512-ErqLOKlca4eyyHE/Kl6PVKK3sIuCzi17hm+QQ6n4jVczFz2MruewoZjvjZnU8k+MDGtVZknbTp1Dd7zguSe5aw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="wrapper wrapper-content animated fadeIn">
		<div class="d-flex justify-content-between">
			<h2>Products</h2>
			<button class="btn btn-primary" style="margin-block: 10px;" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
		</div>
		@if(session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> {{session('success')}}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@elseif(session('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong> {{session('error')}}.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		<div class="ibox-content">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover dataTables-example" id="tickersTable">
					<thead>
						<tr>
							<th>Sr No.</th>
							<th>Product Name</th>
							<th>Product Image</th>
							<th>Price</th>
							<th>Status</th>
							<th class="">Actions</th>
						</tr>
					</thead>
					<tbody id="ihub-news-records">
						@foreach($products as $product)
						<tr class="gradeX" style="cursor: pointer;">
							<td>{{$loop->iteration}}</td>
							<td>{{ $product->name }}</td>
							<td><img width="40px" src="{{ asset('uploads/products/' . $product->image) }}" alt=""></td>
							<td>{{ $product->price }}$</td>
							<td>
								@if($product->available == 1)
								<span class="badge bg-success">Available</span>
								@else
								<span class="badge bg-danger">Out of Stock</span>
								@endif
							</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm edit__button" id="edit_button" data-bs-toggle="modal" data-bs-target="#editProductModal" data-id="{{ $product->id }}">
									<i class="fa fa-edit"> </i> Edit
								</button>
								<button type="button" class="btn btn-danger btn-sm btn_delete" data-id="{{ $product->id }}" data-text="Are You Sure to delete this Product?">
									<i class="fa fa-trash"></i> Delete
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label for="productName" class="form-label">Product Name</label>
						<input type="text" value="{{ old('name') }}" name="name" class="@error('name') is-invalid @enderror form-control" id="productName" required>
						@error('name')
						<p class="invalid-feedback">{{ $message }}</p>
						@enderror
					</div>
					<div class="mb-3">
						<label for="productImage" class="form-label">Product Image</label>
						<input type="file" name="image" class="@error('image') is-invalid @enderror form-control" id="productImage" required>
					</div>
					<div class="mb-3">
						<label for="productPrice" class="form-label">Price</label>
						<input type="number" name="price" value="{{ old('price') }}" class="@error('price') is-invalid @enderror form-control" id="productPrice" required>
						@error('price')
						<p class="invalid-feedback">{{ $message }}</p>
						@enderror
					</div>
					<div class="mb-3">
						<label for="productDescription" class="form-label">Description</label>
						<textarea name="description" value="{{ old('description') }}" id="" class="@error('description') is-invalid @enderror form-control" style="width: 100%; resize: none;"></textarea>
						@error('description')
						<p class="invalid-feedback">{{ $message }}</p>
						@enderror
					</div>
					<div class="mb-3">
						<label for="productStatus" class="form-label">Status</label>
						<select value="{{ old('available') }}" name="available" class="form-select" id="productStatus" required>
							<option value="1">Available</option>
							<option value="0">Unavailable</option>
						</select>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save Product</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" id="edit_modalbox_body">
		</div>
	</div>
</div>


@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admin_assets/js/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/plugins/ladda/ladda.jquery.min.js') }}"></script>
<script>
	$(document).ready(function() {
		//                                                                             SHOW USING AjaX
		$(document).on("click", ".edit__button", function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: "{{ url('/admin/products/show') }}",
				type: 'POST',
				dataType: 'json',
				data: {
					"_token": "{{ csrf_token() }}",
					'id': id
				},
				success: function(status) {
					$("#edit_modalbox_body").html(status.response);
					$("#editProductModal").modal('show');
				}
			});
		});
		//                                                       UPDATE USING AJAX

		$(document).on("click", "#update_product", function() {
			var btn = $(this).ladda();
			btn.ladda('start');
			var formData = new FormData($("#edit_product_form")[0]);
			$.ajax({
				url: "/admin/products/update",
				type: 'POST',
				data: formData,
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				success: function(status) {
					if (status.msg == 'success') {
						toastr.success(status.response, "Success");
						setTimeout(function() {
							location.reload();
						}, 500);
					} else if (status.msg == 'error') {
						btn.ladda('stop');
						toastr.error(status.response, "Error");
					} else if (status.msg == 'lvl_error') {
						btn.ladda('stop');
						var message = "";
						$.each(status.response, function(key, value) {
							message += value + "<br>";
						});
						toastr.error(message, "Error");
					}
				}
			});
		});


		//                                                                       DELETE using AjaX
		$(document).on("click", ".btn_delete", function() {
			var id = $(this).data("id");
			var alerttext = $(this).data("text");
			Swal.fire({
				title: 'Are you sure?',
				text: alerttext,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "{{ url('/admin/products/delete') }}",
						type: 'post',
						data: {
							"_token": "{{ csrf_token() }}",
							'id': id,
						},
						dataType: 'json',
						success: function(status) {
							if (status.msg == 'success') {
								Swal.fire({
									title: "Success!",
									text: status.response,
									icon: "success"
								}).then(() => {
									location.reload();
								});
							} else if (status.msg == 'error') {
								Swal.fire("Error", status.response, "error");
							}
						}
					});
				}
			});
		});
	})
</script>
@endpush