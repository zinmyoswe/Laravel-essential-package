@extends('layouts.app')

@section('content')

<div class="container">
	@if(session('success'))
		<div class="alert alert-success">
			<strong>{{session('success')}}</strong>
		</div>
	@endif
	@guest
		
	@else
	<p>
		<a href="{{route('formfile')}}" class="btn btn-outline-primary">Upload File</a>
	</p>
	@endguest

	<div class="row">
		
			@foreach($files as $file)
			<div class="col-md-3" style="margin: 5px;">
			<div class="card" style="width: 18rem; ">
		  <img src="{{Storage::url($file->path)}}" class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title">{{$file->title}}</h5>
		    <p class="card-text">{{$file->created_at->diffForHumans()}}</p>
		      <form action="{{ route('deletefile', $file->id)}}" method="post">
		      	@csrf
		      	@method('DELETE')
		      	@guest
					
		      	@else
						      	<button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
		      	@endguest
	
		      	<a href="{{ route('downloadfile', $file->id)}}" class="btn btn-outline-primary"><i class="fa fa-download"></i></a>
		      	<a href="{{ route('emailfile',$file->id)}}" class="btn btn-outline-dark"><i class="fa fa-envelope"></i></a>
		      </form>
		  </div>
		</div> {{-- card end --}}
		</div>
		@endforeach
		
	</div>
</div>{{-- container end --}}

@endsection


   