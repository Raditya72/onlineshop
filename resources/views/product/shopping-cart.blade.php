@extends('layouts.app')
	<style type="text/css">
		.increment{
			background-color: white;
			border: 1px #d7d7d7 solid;
			padding: 4.8%;
			color: black;

		}

		.increment:hover{
			color: black;
		}

		.qty-increment{
			width: 25%;
			padding: 3%;
			border: 1px #d7d7d7 solid;
		}

		.hapus-cart a{
			color: gray;

		}

		.hapus-cart a:hover{
			color: black;
			text-decoration: none; 
		}

	</style>
@section('content')
@if(Session::has('cart'))
<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-md-offset">
	        <div class="row">
	    	    <!-- <h2>Checkout</h2>
	    	    <div style="">
		    	    <button class="btn btn-sm btn-danger pull-right">Delete All</button>
	    	    </div> -->

	        </div>
	            <br>

	            <div class="panel panel-default">
	            	
	            <div class="panel-heading" style="height: 40px; width: 100%;">
	            <div class="row">
	            	<div class="col-md-5">
	                	<label><h4 style="position: relative; bottom: 10px;">Product</h4></label>

	                	<div class="pull-right">
	                	<div class="row">
	                		<p>Harga Satuan</p>
	                	</div>

	                	</div>
	            	</div>

	            	<div class="col-md-2">

	                	<div class="pull-right">
	                	<div class="row">
	                		<p>Kuantitas</p>
	                	</div>

	                	</div>
	            	</div>

	            	<div class="col-md-2">

	                	<div class="pull-right">
	                	<div class="row">
	                		<p>Total Harga</p>
	                	</div>

	                	</div>
	            	</div>

	            </div>
                </div>
	            </div>

	            @foreach ($products as $product)
	            <div class="panel panel-default">
                	<div class="panel-heading" style="height: 50px;">
                	<label><h4>{{ $product['item']['title'] }}</h4></label>

                	<div class="pull-right">
                	<div class="row">
                		<div class="col-md-2">
                			<form class="" action="" method="post">
                			
                			<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ???')"><i class="fas fa-trash-alt"></i> Delete</button>
                		</form>
                		</div>
                	</div>

                	</div>
                	</div>

               		<div class="panel-body">
               			<div class="row" >
	               			<div class="col-md-4">
			               		<img src="{{ asset('storage/'.$product['item']['imagePath']) }}" width="100" height="100" style="float: left; margin-right: 2%;">
			               		<p>{{$product['item']['description']}}</p>
	               			</div>
	               				<div style="width: 100%; margin-top: 2%;">
			               			<div class="col-md-2">
					               		<p>Rp {{ number_format($product['price']) }}</p>
			               			</div>

			               			<div class="col-md-2 form-horizontal qty">
					               		<a href="" class="increment"><i class="fas fa-minus"></i></a>
					               		<input type="text" class="qty-increment" value="{{ $product['qty'] }}" style="text-align: center;"></input>
					               		<a href="" class="increment"><i class="fas fa-plus"></i></a>
			               			</div>

			               			<div class="col-md-2">
					               		<p style="color: red;">Rp {{ number_format($totalPrice) }}</p>
			               			</div>

	               				</div>
	               			</div>
		                </div>
		            </div>
	            @endforeach
		        <div class="row">
		        	<div class="col-md-12">
		        		<div class="panel panel-default">
		        			<div class="panel-body">
			        				<label><h2>Total</h2></label>
			        				<h3 class="pull-right" style="color: red">Rp {{ number_format($totalPrice) }}</h3>
			        				<div class="row">
			        					<div class="col-md-12">
			        						<a href="#" class="btn btn-primary pull-right"><i class="fas fa-shopping-cart"></i> Checkout</a>
			        					</div>	
			        				</div>
		        			</div>
		        		</div>
		        	</div>
		        </div>
	        </div>

	        

	        @else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>No Items in Cart!</strong>
			</div>
		</div>
		@endif
	    </div>
</div>

<!-- <h3><center>Iki list ku mana list mu</center></h3>
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge">{{ $product['qty'] }}</span>
							<strong>{{ $product['item']['title'] }}</strong>
							<span class="label label-success">{{ $product['price'] }}</span>
							<div class="btn-group">
								<button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Menu cok <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Ngilangno 1 biji</a></li>
									<li><a href="#">Ngilangno kabeh</a></li>
								</ul>
							</div>	
						</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<button type="button" class="btn btn-success">Dituku su ojo di delok tok</button>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>No Items in Cart!</strong>
			</div>
		</div>
	@endif -->

@endsection