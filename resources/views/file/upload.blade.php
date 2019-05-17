@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-6 col-md-offset-4">
			<div class="card" style="width: 18rem;">
		  	
		  <div class="card-body">
		    <h5 class="card-title">File Upload</h5>
				<form action="{{ route('uploadfile')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<input type="file" name="file[]" multiple>
					</div>
					<button type="submit" class="btn btn-outline-primary">Upload</button>
					<a href="{{ route('viewfile')}}" class="btn btn-outline-dark">Back</a>
				</form>
		  </div>
</div>{{--  card end --}}
		</div>
	</div>
</div>{{-- container end --}}

@endsection


   