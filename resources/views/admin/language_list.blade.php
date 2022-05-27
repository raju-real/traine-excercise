@extends('admin.layouts.app')
@section('title','Language');
@push('css')
@endpush

@section('content')
<div class="pagetitle">
	<div class="row">

		@include('layouts.alert')
		
		<div class="col-lg-6">
			<h1>
        Language
        <span class="badge rounded-pill bg-info text-white">{{ $results->count() }}</span>
      </h1>
		</div>
		<div class="col-lg-6 right-side">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#languageAdd">
          	<i class="fa fa-plus-circle"></i>
            Add New
          </button>
          <div class="modal fade" id="languageAdd" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add New Language</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('admin.languages.store') }}" method="POST" id="add-new-language">
                  	@csrf
                  	<div class="form-group left-side">
                  		<label class="label-text" for="name">Language Name</label>
                  		<input type="text" name="name" value="{{ old('name') ?? '' }}" class="form-control @error('name') is-invalid @enderror" placeholder="Language Name">
                  		@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  	</div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="submitForm('add-new-language')">Save</button>
                </div>
              </div>
            </div>
          </div><!-- End Basic Modal-->
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
                <th scope="col">Language Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $key => $data)
              <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $data->name ?? '' }}</td>
                <td>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#languageEdit-{{ $data->id }}">
                    <i class="fa fa-edit"></i>
                  </button>
                  <div class="modal fade" id="languageEdit-{{ $data->id }}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Language</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.languages.update',$data->id) }}" method="POST" id="edit-language">
                            @csrf
                            @method('PUT')
                            <div class="form-group left-side">
                              <label class="label-text" for="name">Language Name</label>
                              <input type="text" name="name" value="{{ $data->name ?? '' }}" class="form-control @error('name') is-invalid @enderror" placeholder="Language Name">
                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-info" onclick="submitForm('edit-language')">Update</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-danger" onclick="deleteItem('delete-language',{{ $data->id }})">
                    <i class="fa fa-trash"></i>
                  </button>

                  <form id="delete-language-{{ $data->id }}" action="{{ route('admin.languages.destroy',$data->id) }}" method="POST" style="display: none;">
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