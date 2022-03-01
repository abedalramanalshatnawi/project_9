@extends('dashboard/layout/master')

@section('content')
	
<div class="main-panel">        
	<div class="content-wrapper">
	  <div class="row">
		
		
		<div class="col-12 grid-margin stretch-card">
		  <div class="card">
			<div class="card-body">
			  <h4 class="card-title">Manage Category</h4>
			  
			  <form class="forms-sample" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
				  <label for="category_name">Category Name</label>
				  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="category_name">
				</div>
				<div class="form-group">
				  <label>Category Image</label>
				  <input type="file" name="category_img" class="file-upload-default">
				  <div class="input-group col-xs-12">
					<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" name="">
					<span class="input-group-append">
					  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
					</span>
				  </div>
				</div>
				<button type="submit" name="submit" class="btn btn-primary mr-2">Add</button>
			  </form>
			</div>
		  </div>
		</div>

	  </div>
	</div>


@endsection