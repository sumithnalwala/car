@extends('dashboard.homemaster')

@section('title','manufacrurer')

@section('custome_css')
@endsection('custome_css')

@section('container')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Car Manufacturer</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Manufacturer</li>
								</ol>
							</nav>
						</div>
					
					</div>
				</div>


				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Enter Car Manufacturer  Detail</h4>
							 <p class="mb-30 font-14">
							 	 @if ($errors->any())
							      <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							              <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							      </div><br />
							    @endif
							    @if(session()->get('success'))
							    <div class="alert alert-success">
							      {{ session()->get('success') }}  
							    </div><br />
							  @endif
							  <div id="form-error" class="alert alert-danger" style="display:none">

							  </div><br />
							 </p>						
						</div>
					</div>
					<form method="post" action="{{ route('manufacturerpost') }}" id="manufecturer_add_form">
						    @csrf
						<div class="form-group ">
						    <div class="row">							
							<label class="col-md-2">Manufacturer</label>
							<input class="form-control col-md-3" type="text" id="manufecturer_name" name="manufecturer_name" placeholder="Manufacturer name" data-error="Please Enter Manufecturer Name " value="{{ old('manufecturer_name') }}">
							<div class="col-md-1"></div>
							<input class="form-control btn btn-outline-primary col-md-3" type="submit" name="Add" >		
						    </div>
						</div>
					</form>

				</div>
				<!-- horizontal Basic Forms End -->
			</div>
			@include('dashboard.footer') 
		</div>
	</div>
@endsection('container')

@section('custome_js')
<script src="{{asset('customejs/manufacturer.js')}}"></script>
@endsection('custome_js')