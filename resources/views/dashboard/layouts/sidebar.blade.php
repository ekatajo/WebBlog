<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="map"></span>
           - Dashboard
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="coffee"></span>
           - My Coffee
          </a>
        </li>
      
      </ul>
       
      {{-- List Admin --}}
      @can('admin')
      <small class="sidebar-heading d-flex justify-content-beetwen align-items-center px-3 mt-5 mb-1 text-muted"><span>Administrasi</span></small> 
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
            <span data-feather="box"></span>
            - Posting Categories
          </a>
        </li>
      </ul>
      @endcan
      
      <center>
        <a href="/" class="btn btn-dark btn-sm my-5">Kembali</a>
      </center>
    </div>
  </nav>