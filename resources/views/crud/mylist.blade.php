<!-- index.blade.php -->

@extends('master')
@section('content')
  <div class="container">
  <h2 class="header_title"> My Catalogue </h2>
    <a href="{{ url('/crud') }}" class="btn btn-primary go_home">Go Home</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>ISBN</th>
		<th>Created On  </th>
      </tr>
    </thead>
    <tbody>
      @foreach($cruds as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['description']}}</td>
        <td>{{$post['isbn']}}</td>
		<td>{{$post['created_at']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}" ></script>
<script type="text/javascript">
    $(document).ready(function() {
		$('#example').DataTable();
	} );
</script>

