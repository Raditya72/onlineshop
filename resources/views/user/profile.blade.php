@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-md-4">
			<div class="panel-heading">
				<h3>Profile</h3>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<center><img class="img-thumbnail " src="{{ asset('storage/'.auth()->user()->avatar) }}" width="200" height="200"></center>
						</div>

						<div class="col-md-12">
							<div class="panel-body"></div>
						</div>

						<div class="col-md-12">
							<p><b>Name :</b> {{ old('name') ?? auth()->user()->name }}</p>
						</div>

						<div class="col-md-12">
							<p><b>Email :</b> {{ old('email') ?? auth()->user()->email }}</p>
						</div>

							<div class="panel-body"></div>

					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel-heading">
				<h3>Change Profile</h3>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="form-horizontal">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<div class="form-group has-feedback{{ $errors->has('avatar') ? ' has-error' : '' }}">
							<label class="col-md-2 control-label">Image</label>
							<div class="col-md-8">
								<input type="file" name="avatar" class="form-control" value="" accept="image/*"></input>
								@if ($errors->has('avatar'))
								<span class="help-block">
									<p>{{ $errors->first('avatar') }}</p>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-md-2 control-label">Name</label>
							<div class="col-md-8">
								<input type="text" placeholder="Name" name="name" class="form-control" value="{{ old('name') ?? auth()->user()->name }}"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 control-label">
								<input type="submit" class="btn btn-success" value="Save"></input>
								<a href="" class="btn btn-primary">Kembali</a>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>


	</div>	
</div>
@endsection