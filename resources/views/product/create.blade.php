@extends('layouts.app')
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
<style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 150px;
        height: 200px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }

      #result {
        margin-top: 10px;
        width: 900px;
      }

      #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
      }
    </style>
	<!-- <button id="button-click-me" type="buttton">click me!</button> -->
@section('content')
    <div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h3>Post Product</h3>
			<div class="panel panel-default">
			<div class="panel-body"></div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
					<div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
						<label class="col-md-3 control-label">Title</label>
						<div class="col-md-8">
							<input type="text" placeholder="Nama Product" name="title" class="form-control" value="" placeholder="{{ old('title') }}" required autofocus></input>
							@if ($errors->has('title'))
								<span class="help-block">
									<strong>{{ $errors->first('title') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group has-feedback{{ $errors->has('price') ? ' has-error' : '' }}">
						<label class="col-md-3 control-label">Price (Rp)</label>
						<div class="col-md-8">
							<input type="number" placeholder="Price" name="price" class="form-control" value=""></input>
							@if ($errors->has('price'))
								<span class="help-block">
									<p>{{ $errors->first('price') }}</p>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" >Category</label>
						<div class="col-md-8">
						<select name="category_id" id="" class="form-control" style="padding: 1px; height: 4%;">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
						</select>
					</div>
					</div>




					<div class="form-group has-feedback{{ $errors->has('description') ? ' has-error' : '' }}">
						<label class="col-md-3 control-label">Gambar</label>
						<div class="col-md-8">
							<div class="image-editor validate">
						        
						        <div class="cropit-preview"></div>
						        <!-- <input type="range" class="cropit-image-zoom-input"> -->
						        <br>
						        <input type="hidden" name="image-data" class="hidden-image-data" />
						        <input type="file" name="imagePath" class="cropit-image-input" accept="image/*">
						        @if ($errors->has('imagePath'))
								<span class="help-block">
									<p>{{ $errors->first('imagePath') }}</p>
								</span>
							@endif
						    </div>
						</div>
					</div>
					<!--  -->

  					 <div class="form-group has-feedback{{ $errors->has('description') ? ' has-error' : '' }}">
						<label class="col-md-3 control-label">Deskripsi</label>
						<div class="col-md-8">
							<textarea class="form-control" cols="4" rows="8" name="description"></textarea>
							@if ($errors->has('description'))
								<span class="help-block">
									<p>{{ $errors->first('description') }}</p>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8 control-label pull-left">
							<input type="submit" class="btn btn-success" value="Save"></input>
							<a href="{{route('home')}}" class="btn btn-primary">Kembali</a>
						</div>
					</div>
					
				</form>


				 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
					<script  type="text/javascript" src="{{asset('js/cropit.js')}}"></script>
					<script type="text/javascript">
					      $(function() {
					        $('.image-editor').cropit();
					        console.log(cropit);

					        $('form').submit(function() {
					        	alert('aaa');
					          // Move cropped image data to hidden input
					          var imageData = $('.image-editor').cropit('export');
					          $('.hidden-image-data').val(imageData);

					          // Print HTTP request params
					          var formValue = $(this).serialize();
					          alert(formValue);
					          $('#result-data').text(formValue);

					          // Prevent the form from actually submitting
					          return false;
					        });
					      });
					</script>

				
</div>
</div>
</div>
</div>
</div>

@endsection
<!-- @section('customscript') -->


