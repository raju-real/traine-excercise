@if(Request::is('admin*'))
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}" style="background: {{ Request::is('admin/dashboard') ? 'chartreuse' : '' }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.coach.index') }}" style="background: {{ Request::is('admin/coach') ? 'chartreuse' : '' }}">
        <i class="fa fa-users"></i>
        <span>Coach</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.languages.index') }}" style="background: {{ Request::is('admin/languages') ? 'chartreuse' : '' }}"> 
        <i class="fa fa-language"></i>
        <span>Language</span>
      </a>
    </li>
  </ul>
@endif