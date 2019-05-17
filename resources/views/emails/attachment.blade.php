
	<div class="container">
	<img src="{!! asset('img/ACTIVE.png') !!}" width="50" height="50" style="margin-left: 50px;">

	<h4 class="warning" style="font-weight: bold; color: #ffc107; margin-left: 20px;">Hello, Customer,</h4>
	<h5>Welcome to ACTIVE SHOP</h5>
	
	<img src="{{$message->embed(storage_path('app/'.$path))}}" width="300">
	<h5>{{$title}}</h5>

	<a href="" class="btn btn-primary">Download</a>

	</div>

<style type="text/css">
	.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
</style>


