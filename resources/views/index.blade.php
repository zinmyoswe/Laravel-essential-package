@extends('layout')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{$message}}</p>
	</div>
@endif

<div class="row">
	<div class="col-md-12">
		<h1>Laravel CRUD</h1>
		<a href="{{ action('PostController@create')}}" class="btn btn-outline-primary">Add Data</a>
		<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th width="160">Name</th>
					<th>Detail</th>
					<th>Author</th>
					<th width="230">Action</th>
				</tr>
				@foreach($posts as $post)
				<tr>
					<td>{{ $post->id}}</td>
					<td>{{ $post->name}}</td>
					<td>{{ $post->detail}}</td>
					<td>{{ $post->author}}</td>
					<td>
						<form action="{{action('PostController@destroy', $post->id)}}" method="post">
							<a href="{{action('PostController@show', $post->id)}}" class="btn btn-outline-primary">Show</a>
							<a href="{{action('PostController@edit', $post->id)}}" class="btn btn-outline-warning">Edit</a>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-outline-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
		</table>
	</div>
</div>

@endsection