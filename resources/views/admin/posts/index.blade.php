@extends('layouts.app')

@section('content')
	<div class="admin-container">
		<a href="{{ route('admin.posts.create') }}" class="btn">Create</a>

		<table id="posts_tb" class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Subject</th>
					<th scope="col">Introduction</th>
					<th scope="col">Catetory</th>
					<th scope="col">User</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>

				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<th scope="row">{{$loop->iteration}}</td>
					<td>{{$post->subject}}</td>
					<td>{{$post->intro}}</td>
					<td>{{$post->category->title}}</td>
					<td>{{$post->owner->name}}</td>
					<td>
						<a href="{{route('admin.posts.edit', ['post' => $post])}}">Edit</a>
					</td>
					<td>
						<form action="{{route('admin.posts.destroy', ['post' => $post])}}" method="post">
						@csrf
						<input type="submit" name="_method" value="delete">
						</form>	
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
