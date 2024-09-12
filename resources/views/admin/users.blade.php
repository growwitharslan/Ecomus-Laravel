@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="wrapper wrapper-content animated fadeIn">
		<div class="d-flex justify-content-between">
			<h2>Users</h2>
			<!-- <button class="btn btn-primary" style="margin-block: 10px;" data-bs-toggle="modal" data-bs-target="#addProductModal">Add User</button> -->
		</div>

		<div class="ibox-content">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover dataTables-example" id="tickersTable">
					<thead>
						<tr>
							<th>Sr No.</th>
							<th>User Name</th>
							<th>Email</th>
							<th class="">Actions</th>
						</tr>
					</thead>
					<tbody id="ihub-news-records">
						@foreach($users as $user)
						<tr class="gradeX" style="cursor: pointer;">
							<td>{{$loop->iteration}}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td class="">
								<button type="button" class="btn btn-primary btn-sm edit__button" id="edit_button" data-bs-toggle="modal" data-bs-target="#editProductModal" data-id="{{ $user->id }}">
									<i class="fa fa-edit"> </i> Edit
								</button>
								<button type="button" class="btn btn-danger btn-sm btn_delete" data-id="{{ $user->id }}" data-text="Are You Sure to delete this user?">
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
<!-- <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addProductModalLabel">Add User</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- Add your form fields here -->
<!-- <form>
					<div class="mb-3">
						<label for="productName" class="form-label">User Name</label>
						<input type="text" class="form-control" id="productName" required>
					</div>
					<div class="mb-3">
						<label for="productImage" class="form-label">Email</label>
						<input type="file" class="form-control" id="productImage" required>
					</div>
					<div class="mb-3">
						<label for="productPrice" class="form-label">Price</label>
						<input type="number" class="form-control" id="productPrice" required>
					</div>
					<div class="mb-3">
						<label for="productStatus" class="form-label">Status</label>
						<select class="form-select" id="productStatus" required>
							<option value="Available">Available</option>
							<option value="Unavailable">Unavailable</option>
						</select>
					</div>
				</form> -->
<!-- </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save Product</button>
			</div>
		</div>
	</div>
</div> -->

<!-- Edit USER Modal -->
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
	$(document).on("click", ".edit__button", function() {
		var id = $(this).attr('data-id');
		$.ajax({
			url: "{{ url('/admin/users/show') }}",
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

	$(document).on("click", "#update_category", function() {
		var btn = $(this).ladda();
		btn.ladda('start');
		var formData = new FormData($("#edit_product_form")[0]);
		$.ajax({
			url: "/admin/users/update",
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
					url: "{{ url('/admin/user/delete') }}",
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
</script>
@endpush