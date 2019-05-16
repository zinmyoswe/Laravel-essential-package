@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
	<div class="col-md-6 offset-md-3">
	@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@foreach($posts as $post)
		<form action="{{ action('PostController@update',$post->id)}}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$post->name}}">
			</div>

			<div class="form-group">
				<label>Detail</label>
				<textarea name="detail"  class="form-control">{{$post->detail}}</textarea>
			</div>

			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" value="{{$post->author}}" class="form-control">
			</div>
			<button class="btn btn-outline-warning" type="submit">Update</button>
			<a href="{{action('PostController@index')}}" class="btn-outline-light">Back</a>
		</form>
		@endforeach
	</div>
</div>
</div>{{-- container end --}}
@endsection