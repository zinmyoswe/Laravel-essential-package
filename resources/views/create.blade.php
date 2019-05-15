@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-6 offset-md-3">
		@if($message = Session::get('danger'))
			<div class="alert alert-danger">
				<strong>{{$message}}</strong>
			</div>
		@endif
		<form action="{{ action('PostController@store')}}" method="post">
			@csrf
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" placeholder="Name" class="form-control">
			</div>

			<div class="form-group">
				<label>Detail</label>
				<textarea name="detail" placeholder="..." class="form-control"></textarea>
			</div>

			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" placeholder="Author" class="form-control">
			</div>
			<button class="btn btn-outline-primary" type="submit">Save</button>
		</form>
	</div>
</div>

@endsection