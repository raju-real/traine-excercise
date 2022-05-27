@extends('admin.layouts.app')
@section('title','Coach');
@push('css')
@endpush

@section('content')
<div class="pagetitle">
	<div class="row">

		@include('layouts.alert')
		
		<div class="col-lg-6">
			<h1>Coach Files</h1>
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
                <th scope="col">Language</th>
                <th scope="col">File Title</th>
                <th scope="col">File</th>
              </tr>
            </thead>
            <tbody>
              @foreach($files as $key => $value)
              <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $value->language->name ?? '' }}</td>
                <td>{{ $value->file_name ?? '' }}</td>
                <td>
                  {{ substr($value->file_path,15) ?? '' }}
                  <a href="{{ asset($value->file_path) }}" target="_blank" class="btn btn-info btn-sm">
                    <i class="fa fa-play"></i>
                  </a>
                  {{-- <input type="button" value="PLAY"  onclick="playAudio({{ 'file_'. $value->id }})">
                <audio id="{{ 'file_'.$value->id }}" src="{{ asset($value->file_path) }}"></audio>
                  <button type="button" class="btn btn-info btn-sm" onclick="playAudio()"><i class="fa fa-play"></i></button>
                  <button type="button" class="btn btn-primary btn-sm" onclick="playAudio()"><i class="fa fa-pause"></i></button> --}}
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

@push('js')
  <script type="text/javascript">
    function playAudio(file) {

      var audio = document.getElementById(file);
      console.log(audio)
      audio.getAttribute("src").play();
      audio.src.play();
    }
  </script>
@endpush