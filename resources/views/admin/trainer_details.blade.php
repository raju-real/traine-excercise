@extends('admin.layouts.app')
@section('title','Coach Details');
@push('css')
@endpush

@section('content')
<div class="pagetitle">
	<div class="row">

		@include('layouts.alert')
		
		<div class="col-lg-6">
			<h1>Coach Details</h1>
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
          <!-- Table with stripped rows -->
          <table class="table table-bordered mt-2">
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">
                  @if($data->image != null && file_exists($data->image))
                    <img src="{{ asset($data->image) }}" class="img-responsive" style="height: 50px;width: 50px;border-radius: 50px;">
                  @else 
                    <img src="{{ asset('assets/img/avator.jpg') }}" class="img-responsive" style="height: 50px;width: 50px;border-radius: 50px;">
                  @endif
                </th>
              </tr>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">{{ $data->name ?? '' }}</th>
              </tr>
              <tr>
                <th scope="col">Email</th>
                <th scope="col">{{ $data->email ?? '' }}</th>
              </tr>
              <tr>
                <th scope="col">Mobile</th>
                <th scope="col">{{ $data->mobile ?? '' }}</th>
              </tr>
              <tr>
                <th scope="col">Files</th>
                <th>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Language</th>
                        <th>File Title</th>
                        <th>File</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data->tutorials as $tutorial)
                        <tr>
                          <td>{{ $tutorial->language->name ?? '' }}</td>
                          <td>{{ $tutorial->file_name ?? '' }}</td>
                          <td>
                            {{ substr($tutorial->file_path,15) ?? '' }}
                            <a href="{{ asset($tutorial->file_path) }}" target="_blank" class="btn btn-info btn-sm">
                              <i class="fa fa-play"></i>
                            </a>
                          </td>
                        </tr>
                      @endforeach  
                    </tbody>
                  </table>
                </th>
              </tr>
            
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
@endsection