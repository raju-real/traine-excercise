@extends('admin.layouts.app')
@section('title','Dashboard')
@push('css')
@endpush

@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
  {{-- <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav> --}}
</div><!-- End Page Title -->
<section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Subscribers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-users"></i>
                    </div>
                    <div class="ps-3">
                      <h6>10</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-user"></i>
                    </div>
                    <div class="ps-3">
                      <h6>15</h6>
                    </div>
                  </div>
                </div>


              </div>
            </div><!-- End Revenue Card --> 

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Coach</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-users"></i>
                    </div>
                    <div class="ps-3">
                      <h6>18</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Languages</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-language"></i>
                    </div>
                    <div class="ps-3">
                      <h6>5</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Today Registered Users</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(App\User::all() as $user)
                      <tr>
                        <th scope="row"><a href="#">{{ $loop->index + 1 }}</a></th>
                        <td>{{ $user->name ?? '' }}</td>
                        <td>{{ $user->email ?? '' }}</td>
                        <td>{{ $user->mobile ?? ''  }}</td>
                        {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
          </div>
        </div>
      </div>
    </section>
@endsection

@push('js')
@endpush