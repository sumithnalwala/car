@extends('dashboard.homemaster')

@section('title','car model list')

@section('custome_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/media/css/jquery.dataTables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/media/css/dataTables.bootstrap4.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/media/css/responsive.dataTables.css') }}">
@endsection('custome_css')

@section('container')
    <div class="pre-loader"></div>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Car Model List</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Car List</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Sr.</th>
	                                <th>Model Number</th>
									<th>Manufacturer</th>
									<th>Registration Number</th>
									<th>first Photo</th>
									<th>second Photo</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($model_detail))
								<?php $sr =1;?>
								@foreach($model_detail as $value)
								<tr>
									<td class="table-plus">{{ $sr }}</td>
									<td>{{ $value->model_number }}</td>
									<td>{{ $value->name }}</td>
									<td>{{ $value->register_no }}</td>
									<td>
										<img src="{{ url('/') }}/uploads/{{ $value->photo_1 }}" alt="" class="circle" style="width: 31%;">
									</td>
									<td>
									    <img src="{{ url('/') }}/uploads/{{ $value->photo_2 }}" alt="" class="circle" style="width: 31%;">	
									</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{{ url('/') }}/cardetails/{{ $value->id }}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{{ url('/') }}/cardupdate/{{ $value->id }}"><i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" onclick="return confirm('Are you sure you want to delete?');" href="{{ url('/') }}/cardelete/{{ $value->id }}"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<?php $sr++;?>
								@endforeach
								@else
								<tr>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
			</div>
			@include('dashboard.footer') 
		</div>
	</div>
	
@endsection('container')

@section('custome_js')
    <script src="{{asset('src/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/dataTables.responsive.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/responsive.bootstrap4.js')}}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{ asset('src/plugins/datatables/media/js/button/dataTables.buttons.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/button/buttons.bootstrap4.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/button/buttons.print.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/button/buttons.html5.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/button/buttons.flash.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/button/pdfmake.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/media/js/button/vfs_fonts.js')}}"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
@endsection('custome_js')