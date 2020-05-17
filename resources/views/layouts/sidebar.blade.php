<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <i class="fas fa-birthday-cake"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> 28 Resep Kue Mudah dan Praktis </div>
  </a>
  <hr class="sidebar-divider">
  <li class="nav-item active">
    <a class="nav-link" href="{{ url('home') }}">
      <i class="fas fa-home"></i>
      <span> Home </span>
    </a>
  </li>
  @if ( Auth::user()->role == 'admin')
    <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-database"></i>
        <span> Master Data </span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ url('post') }}"> Post </a>
        </div>
      </div>
    </li>
  @endif
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>