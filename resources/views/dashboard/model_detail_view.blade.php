@extends('dashboard.homemaster')

@section('title','model')

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
								<h4>Car Model Details </h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Car Model view</li>
								</ol>
							</nav>
						</div>
					
					</div>
				</div>


				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<form method="post"  id="form-view" autocomplete="off" enctype="multipart/form-data">
						    @csrf
					     <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Model Number</label>
                            <div class="col-sm-12 col-md-4">
                                <input class="form-control" name="model_number"  id="model_number" value="{{ $model_detail->model_number }}" type="text" placeholder="model Number" data-error="Please Enter Model Number " required readonly>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Manufacturer</label>
                            <div class="col-sm-12 col-md-4">
                            <select class="custom-select2 form-control" id="manufacturer" name="manufacturer" data-error="Please Enter Model Number" style="width: 100%; height: 38px;" required disabled>
                                <optgroup label="Car Manufacturer Name">
                                	<option value="">select</option>
                                	@if(!empty($manufacturer)) 
                                    @foreach ($manufacturer as $value)
    <option value="{{ $value->id }}" selected="<?php ($value->name == $model_detail->name)?'selected':''?>">{{ $value->name }}</option>
                                    @endforeach
                                    @endif
                                </optgroup>
                            </select>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Colour</label>
                            <div class="col-sm-12 col-md-4">
                               <input class="form-control" name="colour"  id="colour"  value="{{ $model_detail->colour }}" type="text" placeholder="color" data-error="Please Enter Colour of Model " required readonly>
                            </div>
                             <label class="col-sm-12 col-md-2 col-form-label">Manufacture Year</label>
                            <div class="col-sm-12 col-md-4">
                            <input class="form-control " name="manufacturer_year" id="manufacturer_year" value="{{ $model_detail->year }}" placeholder="Manufacture year" type="text" data-error="Please Enter Manufacturing year" required readonly>
                            </div>           
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Ragistration Number</label>
                            <div class="col-sm-12 col-md-4">
                               <input class="form-control" name="register_number"  id="register_number" type="text"  value="{{ $model_detail->register_no }}" placeholder="Registration Number" data-error="Please Enter Registation Number" required readonly>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Note</label>
                            <div class="col-sm-12 col-md-4">
                            <textarea  class="form-control " name="note" id="note" value="{{ $model_detail->note }}" data-error="Please Enter Note" placeholder="Note" required readonly>{{ $model_detail->note }}</textarea>
                            </div>           
                        </div>
                        <div class="form-group row">      
                            <label class="col-sm-12 col-md-2 col-form-label">first picture</label>
                            <div class="col-sm-12 col-md-4">
                            <img src="{{ url('/') }}/uploads/{{ $model_detail->photo_1 }}" alt="" class="circle" >    
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">second picture</label>
                            <div class="col-sm-12 col-md-4">
                            <img src="{{ url('/') }}/uploads/{{ $model_detail->photo_2 }}" alt="" class="circle" >   
                            </div>                  
                        </div>
                        <div class="form-group row">      
                            <label class="col-sm-12 col-md-2 col-form-label">Quantity</label>
                            <div class="col-sm-12 col-md-4">
                            <input class="form-control" type="text" id="quantity" name="quantity" value="{{ $model_detail->quantity }}" placeholder="" data-error="Please Enter quantity" required readonly>
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
<script src="{{asset('customejs/model.js')}}"></script>
@endsection('custome_js')