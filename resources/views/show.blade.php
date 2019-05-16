@extends('layout')

@section('content')
	@foreach($posts as $post)
		<p>{{$post->name}}<p>
		{{$post->detail}}
	@endforeach
@endsection