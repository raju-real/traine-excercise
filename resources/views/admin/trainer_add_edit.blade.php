@extends('admin.layouts.app')
@section('title','Coach');
@push('css')
@endpush

@section('content')
<div class="pagetitle">
	<div class="row">

		@include('layouts.alert')
		
		<div class="col-lg-6">
			<h1>{{ $title ?? 'Coach' }}</h1>
		</div>
		<div class="col-lg-6 right-side">
          
		</div>
	</div>
</div><!-- End Page Title -->
<hr>
<section class="section height-60">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <br>
          <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($data)
              @method('PUT')
            @endisset
            <div class="row">
              <div class="form-group col-lg-4">
                <label class="label-text">Name</label>
                <input type="text" name="name" value="{{ $data->name ?? old('name') ?? '' }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
              </div>
              <div class="form-group col-lg-4">
                <label class="label-text">Email</label>
                <input type="text" name="email" value="{{ $data->email ?? old('email') ?? '' }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
              </div>
              <div class="form-group col-lg-4">
                <label class="label-text">Mobile</label>
                <input type="text" name="mobile" value="{{ $data->mobile ?? old('mobile') ?? '' }}" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile">
              </div>

              <div class="form-group col-lg-4">
                <label class="label-text">Image</label>
                <input type="file" name="image" class="form-control">
              </div>
              <br>
              <div class="row mt-3">
                <label>Coach Files</label>
                <hr>
                <table id="coachFile" class="table table-bordered table-striped table-sm text-nowrap" width="100%">
                  <thead>
                    <tr>
                      <th>Language</th>
                      <th>File Title</th>
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($data))
                      @foreach($data->tutorials as $tutorial)
                      <tr>
                        <td>
                          <select name="languages[]" class="form-control col-md-4">
                            <option value="{{ $tutorial->language_id }}">
                              {{ $tutorial->language->name }}
                            </option>
                            @foreach($languages as $language)
                              <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <input type="text" name="file_name[]" value="{{ $tutorial->file_name }}" class="form-control" placeholder="File Title">
                        </td>
                        <td>
                          <input type="file"  value="{{ $tutorial->language_id }}" name="files[]" class="form-control col-md-4">
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm mt-1 col-md-4" onclick="deleteRow(this)">
                              <i class="fa fa-trash"></i>
                            </button>
                        </td>
                      </tr>
                      @endforeach
                    @else
                      <tr>
                        <td>
                          <select name="languages[]" class="form-control col-md-4">
                            <option value="">Select Language</option>
                            @foreach($languages as $language)
                              <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <input type="text" name="file_name[]" value="" class="form-control" placeholder="File Title">
                        </td>
                        <td>
                          <input type="file" name="files[]" class="form-control col-md-4">
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm mt-1 col-md-4" onclick="deleteRow(this)">
                              <i class="fa fa-trash"></i>
                            </button>
                        </td>
                      </tr>
                    @endif
                  </tbody>
                </table>
                <button id="classAddBtn" type="button" class="btn btn-primary btn-sm col-md-2">
                  Add More
                </button>
              </div>

              <div class="row">
                <div class="form-group col-lg-4 mt-4">
                <button type="submit" class="btn btn-info">{{ isset($data) ? 'Update' : 'Submit' }}</button>
              </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('js')
  <script type="text/javascript">
    $('#classAddBtn').click(function(){
      $.ajax({
          method: 'GET',
          url: "{{ route('admin.coach-file-div') }}",
          success: function(response){
            console.log(response)
              $("#coachFile").find("tbody").append(response);
              
          }
      });
    });

    function deleteRow(btn) {
      var row = btn.parentNode.parentNode;
      row.parentNode.removeChild(row);
    }
  </script>
@endpush