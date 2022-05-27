@if(Request::is('admin*'))
  <ul class="sidebar-nav" id="sidebar-nav">

    @php
      $seg_1 = Request::segment(1);
      $seg_2 = Request::segment(2);
      $segment = $seg_1.'/'.$seg_2;
    @endphp

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
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.users') }}" style="background: {{ Request::is('admin/users') ? 'chartreuse' : '' }}"> 
        <i class="fa fa-users"></i>
        <span>Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.subscribers') }}" style="background: {{ Request::is('admin/subscribers') ? 'chartreuse' : '' }}"> 
        <i class="fa fa-user"></i>
        <span>Subscribers</span>
      </a>
    </li>
  </ul>
@endif