@extends('layouts.app')

@section('content')

<div class="container">
@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{$message}}</p>
	</div>
@endif


<div class="row">
	<div class="col-lg-6"><h1>Laravel CRUD</h1></div>
	<div class="col-lg-4">
		<form action="/search" method="get" class="form-inline">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search..." aria-label="Search" style="width: 250px">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>

      

	</div>

	<div class="col-lg-2 text-right"><a href="{{ action('PostController@create')}}" class="btn btn-outline-primary">Add Data</a></div>
</div>
<div class="row">
	<div class="col-md-12">
		
		<form method="post">
	@csrf
	@method('DELETE')
	<button formaction="/deleteall" type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete All selected</button>
	<br><br>
		<table class="table table-bordered">
				<tr>
					<th><input type="checkbox" class="selectall"></th>
					<th width="160">Name</th>
					<th>Detail</th>
					<th>Author</th>
					<th width="230">Action</th>
				</tr>
				@foreach($posts as $post)
				<tr>
					<td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $post->id}}"></td>
					<td><b>{{ $post->name}}</b></td>
					<td>{{ $post->detail}}</td>
					<td>{{ $post->author}}</td>
					<td>
				
							<a href="{{action('PostController@show', $post->id)}}" class="btn btn-outline-primary">Show</a>
							<a href="{{action('PostController@edit', $post->id)}}" class="btn btn-outline-warning">Edit</a>
							<button formaction="{{action('PostController@destroy', $post->id)}}" type="submit" class="btn btn-outline-danger">Delete</button>
						
					</td>
				</tr>
				@endforeach
			
		</table>
		</form>
		{{$posts->links()}}
	</div>
</div>
</div>{{-- container end --}}
<script type="text/javascript">
	$('.selectall').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
		$('.selectall2').prop('checked', $(this).prop('checked'));
	})
	$('.selectall2').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
		$('.selectall').prop('checked', $(this).prop('checked'));
	})
	$('.selectbox').change(function(){
		var total = $('.selectbox').length;
		var number = $('.selectbox:checked').length;
		if(total == number){
			$('.selectall').prop('checked',true);
			$('.selectall2').prop('checked',true);
		}else{
			$('.selectall').prop('checked',false);
			$('.selectall2').prop('checked',false);
		}
	})
</script>
@endsection


   