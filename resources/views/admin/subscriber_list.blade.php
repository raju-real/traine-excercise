@extends('admin.layouts.app')
@section('title','Subscribers');
@push('css')
@endpush

@section('content')
<div class="pagetitle">
	<div class="row">

		@include('layouts.alert')
		
		<div class="col-lg-6">
			<h1>
        Subscribers
        <span class="badge rounded-pill bg-info text-white">{{ $data->count() }}</span>
      </h1>
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
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Join Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $key => $value)
              <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $value->email ?? '' }}</td>
                <td>
                  @isset($value->created_at)
                    {{ date('Y-m-d', strtotime($value->created_at)) ?? '' }}
                  @else 
                    {{ "N/A" }}  
                  @endisset  
                </td>
                <td>
                  
                  <button type="button" class="btn btn-danger" onclick="deleteItem('delete-subscriber',{{ $value->id }})">
                    <i class="fa fa-trash"></i>
                  </button>

                  <form id="delete-subscriber-{{ $value->id }}" action="{{ route('admin.delete-subscriber',$value->id) }}" method="POST" style="display: none;">
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