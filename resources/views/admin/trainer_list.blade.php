@extends('admin.layouts.app')
@section('title','Coach');
@push('css')
@endpush

@section('content')
<div class="pagetitle">
	<div class="row">

		@include('layouts.alert')
		
		<div class="col-lg-6">
			<h1>
        Coach
        <span class="badge rounded-pill bg-info text-white">{{ $trainers->count() }}</span>
      </h1>
		</div>
		<div class="col-lg-6 right-side">
          <a href="{{ route('admin.coach.create') }}" class="btn btn-primary" >
          	<i class="fa fa-plus-circle"></i>
            Add New
          </a>
          
		</div>
	</div>
</div><!-- End Page Title -->
<hr>
<section class="section height-60">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Files</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($trainers as $key => $value)
              <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>
                  @if($value->image != null && file_exists($value->image))
                    <img src="{{ asset($value->image) }}" class="img-responsive" style="height: 50px;width: 50px;border-radius: 50px;">
                  @else 
                    <img src="{{ asset('assets/img/avator.jpg') }}" class="img-responsive" style="height: 50px;width: 50px;border-radius: 50px;">
                  @endif  
                </td>
                <td>{{ $value->name ?? '' }}</td>
                <td>{{ $value->email ?? '' }}</td>
                <td>{{ $value->mobile ?? '' }}</td>
                <td>
                  <a href="{{ route('admin.coach-files', $value->id) }}" class="btn btn-primary btn-sm">Files</a>
                </td>
                <td>
                  <a href="{{ route('admin.coach.show', $value->id) }}" class="btn btn-info">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="{{ route('admin.coach.edit', $value->id) }}" class="btn btn-success">
                    <i class="fa fa-edit"></i>
                  </a>

                  <button type="button" class="btn btn-danger" onclick="deleteItem('delete-trainer',{{ $value->id }})">
                    <i class="fa fa-trash"></i>
                  </button>

                  <form id="delete-trainer-{{ $value->id }}" action="{{ route('admin.coach.destroy',$value->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection