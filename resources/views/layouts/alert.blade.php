
@if(Session::has('message'))
        <div class="alert alert-{{ Session::get('type') }} bg-{{ Session::get('type') }} text-light border-0 alert-dismissible fade show" role="alert">
        	<strong>{{ Session::get('message') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif