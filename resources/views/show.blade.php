@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($posts as $post)
		<p>{{$post->name}}<p>
		{{$post->detail}}
	@endforeach
	</div>{{-- container end --}}
@endsection