@extends('dashboard/layout/master')
@section('content')
	

<div class="main-panel">
	<div class="content-wrapper">
	  <div class="row">
		
		
		<div class="col-lg-12 grid-margin stretch-card">
		  <div class="card">
			<div class="card-body">
			  <h4 class="card-title">Manage Category</h4>
				<a href="{{route('category.create')}}"> 
				<button class="btn btn-outline-success btn-fw">
					Add Category
			  </button>
			</a>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>
						Category Image
					  </th>
					  <th>
						Category Name
					  </th>
					  
					  <th>
						Setting
					  </th>
					</tr>
				  </thead>
				  <tbody>
						@foreach ($categories as $category)
					<tr>
					  <td class="py-1">
						<img src="{{asset($category->category_img)}}" alt="image"/>
					  </td>
					  <td>
						{{$category->category_name}}
					  </td>
					  <td>
						<form action="{{route('category.destroy',$category->id)}}" method="post">
							<a href="{{route('category.edit',$category->id)}}" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="mdi mdi-lead-pencil iconStyle iconE"></i></a>

								@csrf
								@method('Delete')
							<button data-toggle="tooltip" title="Trash" class="trashIcon"><i class="mdi mdi-delete-forever iconStyle iconeD"></i></button>
							</form>
					  </td>
					</tr>
					@endforeach

				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>



@endsection
