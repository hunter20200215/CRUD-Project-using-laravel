@extends('layouts.app')

@section('content')
	<div class="admin-container">
		<div class="row">
			<div class="col col-md-8">
				<h3>Edit Post</h3>
				<form action="{{route('admin.posts.update', ['post' => $post])}}" method="post">
					@csrf
					@method('put')
					<div class="form-group">
					    <label for="subject">Category<span class="required">*</span></label>
					    <select class="custom-select custom-select-md" id="category_id" name="category_id">
						  @foreach($categories as $category)
						  	<option disabled="disabled">{{$category->title}}</option>
						  	@foreach($category->sub_categories as $sub_cat)
						  		<option value="{{$sub_cat->id}}" {{ $sub_cat->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
						  			{{$sub_cat->title}}
						  		</option>
						  	@endforeach
						  @endforeach
						</select>

				  	</div>
				  	<div class="form-group">
					    <label for="subject">Subject<span class="required">*</span></label>
					    <input type="text" class="form-control @error('subject') invalid @enderror" id="subject" aria-describedby="subjectHelp" placeholder="Enter Subject" name="subject" value="{{ old('subject', $post->subject) }}">
					    <small id="subjectHelp" class="form-text text-muted">Subject should be unique</small>
					    @error('subject')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror

				  	</div>
				  	<div class="form-group">
					    <label for="intro">Intro<span class="required">*</span></label>
					    <textarea class="form-control" id="intro" name="intro">{{ old('intro', $post->intro) }}</textarea>
				    	<small id="introHelp" class="form-text text-muted">Short Description should be less than 255 characters</small>

				    	@error('intro')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror

				  	</div>

				  	<div class="form-group">
					    <label for="content">Content<span class="required">*</span></label>
					    <textarea class="form-control" id="content" name="description[content]" rows="10">{{ old('description.content', $post->description->content) }}</textarea>
				    	
				    	@error('description.content')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror

				  	</div>
				  	
				  	
			  		<a href="{{route('admin.posts.index')}}" class="btn btn-secondary">Back</a>
			  		<button type="submit" class="btn btn-primary float-right">Save</button>
				  	
				  	
				</form>
			</div>
		</div>
		
	</div>
@endsection