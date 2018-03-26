@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<h3>{{$product->title}}</h3>
						</div>

						<div class="col-md-12">
							<span class="btn btn-danger btn-xs">{{$product->category->name}}</span>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2" style="margin-right: 2%;">
							<img src="{{ asset('storage/'.$product->imagePath) }}" class="img-thumbnail" width="250" height="300">
						</div>

						<div class="col-md-8">
							<p>{{$product->description}}</p>
							<p>Test</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10">
							<h4 style="color: red;">Rp {{number_format($product->price)}}</h4>
						</div>

						<div class="col-md-2 col-md-offset-10">
							<a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Buy</a>
							<a href="#" class="btn btn-success"><i class="fas fa-chevron-circle-left"></i> Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection