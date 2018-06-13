<!-- index.blade.php -->

@extends('master')
@section('content')  
<a href="{{ url('/crud') }}" class="btn btn-success go_home">Books List</a><br/><br/>
<a href="{{ url('/live_search') }}" class="btn btn-danger go_home">Books Search</a><br/><br/>
<a href="{{ url('/mylist') }}" class="btn btn-warning go_home">My Books</a><br/><br/>
<a href="{{ url('/crud/create') }}" class="btn btn-info go_home">Add New Book</a><br/><br/>
<a href="{{ url('/') }}" class="btn btn-primary go_home">Go Main</a>
<?php if(count($books) > 0){?>
<div class="container">		
	<h2 class="header_title"> Books Gallery </h2> 
	<p class="header_title">Click On Image and View Description</p>
    <div class="gallery">
        <?php
        foreach($books as $book){
			$imageThumbURL = '/uploads/users/'.$book["icon"];
			$imageURL = '/uploads/users/'.$book["icon"];
        ?>
		<a href="{{ asset('uploads/users/' . $book['icon']) }}" data-fancybox="group" data-caption="<?php echo "Title: ".$book["title"]."<br/>";  echo "Description: ".$book["description"]."<br/>"; ?>" >
			<img src="{{ asset('uploads/users/' . $book['icon']) }}"/>
		</a>			
        <?php }?>
    </div>
</div>
<?php }else{?>
	<p class="err_bg">No records found</p>
<?php }?>
@endsection
<!-- JS library -->
<link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}" ></script>
<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>