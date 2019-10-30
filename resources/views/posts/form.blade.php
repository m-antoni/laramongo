@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			@if($data ?? '')
				<form action="{{ route('post.update', $data->_id)}}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Title:</label>
						<input type="text" id="title" class="form-control" name="title" value="{{ $data->title}}">
					</div>
					<div class="form-group">
						<label>Body:</label>
						<textarea id="body" class="form-control" name="body" rows="4">{{$data->body}}</textarea>
					</div>
					<button class="btn btn-dark">Update</button>
				</form>
			@else
				<form action="{{ route('post.save')}}" method="post">
					@csrf
					<div class="form-group">
						<label>Title:</label>
						<input type="text" id="title" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label>Body:</label>
						<textarea id="body" class="form-control" name="body" rows="4"></textarea>
					</div>
					<button class="btn btn-dark">Submit</button>
				</form>
			@endif
		</div>
	</div>
</div>

@endsection