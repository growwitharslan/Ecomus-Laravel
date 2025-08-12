@extends('layouts.admin')
@section('content')
<div class="wrapper wrapper-content animated fadeIn">
	<div class="row">
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Users</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{ App\Models\User::count() }}</h1>
					<div class="stat-percent font-bold text-primary"><a href=""><span class="label label-primary">View</span></a></div>
					<small>Users</small>
				</div>
			</div>
		</div>		
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Products</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{ App\Models\product::count() }}</h1>
					<div class="stat-percent font-bold text-primary"><a href=""><span class="label label-primary">View</span></a></div>
					<small>Products</small>
				</div>
			</div>
		</div>		
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Categories</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{ App\Models\category::count() }}</h1>
					<div class="stat-percent font-bold text-primary"><a href=""><span class="label label-primary">View</span></a></div>
					<small>Categories</small>
				</div>
			</div>
		</div>		
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Orders</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{ App\Models\orders::count() }}</h1>
					<div class="stat-percent font-bold text-primary"><a href=""><span class="label label-primary">View</span></a></div>
					<small>Orders</small>
				</div>
			</div>
		</div>		
	</div>
</div>
@endsection