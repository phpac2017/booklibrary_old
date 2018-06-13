<!-- index.blade.php -->
<?php //echo $user_id;exit;?>
@extends('master')
@section('content')
<div class="container">  
	<h2 class="header_title"> List of Books </h2>  
	<a href="{{ url('/crud/show') }}" class="btn btn-success go_home">Books Gallery</a><br/><br/><br/><br/>
	<a href="{{ url('/live_search') }}" class="btn btn-danger go_home">Books Search</a><br/><br/><br/><br/>
	<a href="{{ url('/mylist') }}" class="btn btn-warning go_home">My Books</a><br/><br/><br/><br/>
	<a href="{{ url('/crud/create') }}" class="btn btn-info go_home">Add New Book</a><br/><br/><br/><br/>
	<a href="{{ url('/') }}" class="btn btn-primary go_home">Go Main</a>
	<?php if(count($cruds) > 0){?>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>ISBN</th>
			<th>Image</th>
			<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cruds as $post)
			<tr>
				<td>{{$post['id']}}</td>
				<td>{{$post['title']}}</td>
				<td>{{$post['description']}}</td>
				<td>{{$post['isbn']}}</td>
				<td><img src="{{ url('/') }}/uploads/users/{{$post['icon']}}" height="50" width="50"/></td>	
				<?php if($user_id == 1 || $post['user_id'] == $user_id) {?>		
					<td><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
				<?php }?>
				<?php if($user_id == 1 || $post['user_id'] == $user_id) {?>
					<td>
					<form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
					{{csrf_field()}}
					<input name="_method" type="hidden" value="DELETE">
					<button class="btn btn-danger" type="submit">Delete</button>
					</form>
					</td>
				<?php }?>
				<?php if($post['user_id'] != $user_id) {?>
					<td><a href="{{action('CRUDController@addToCatalogue', $post['id'])}}" class="btn btn-success">Add To My Catalogue</a></td>
				<?php }?>
			</tr>
		@endforeach
		</tbody>
	</table>  
	<?php }else{?>
		<p class="err_bg">No records found</p>
	<?php }?>
</div>
@endsection
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />