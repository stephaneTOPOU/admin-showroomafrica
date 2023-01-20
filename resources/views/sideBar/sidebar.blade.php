<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('assets/dist/img/favicon.ico') }}" alt="Showroomafrica Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Showroomafrica</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="{{ route('home') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li> 
        <li class="nav-header">POP-UP</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
            <p>
              Pop-up
            </p>
          </a>
        </li>
        <li class="nav-header">ENTREPRISES</li>
        <li class="nav-item">
          <a href="{{ route('category') }}" class="nav-link">
            <i class="nav-icon fas fa-th-large"></i>
            <p>
              Categories
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('subcategory') }}" class="nav-link">
            <i class="nav-icon fas fa-city"></i>
            <p>
              Sous-Categories
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('entreprise') }}" class="nav-link">
            <i class="nav-icon far fa-building"></i>
            <p>
              Entreprise
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('service') }}" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Services
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
            <p>
              Images de service
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
            <p>
              Horraire
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Gallerie Image
            </p>
          </a>
        </li>
        <li class="nav-header">LES SLIDERS</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider 1
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider 2
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider 3
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider Latéral Haut
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider Latéral Bas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider Recherche
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider Recherche Latéral Haut
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Slider Recherche Latéral Bas
            </p>
          </a>
        </li>
        <li class="nav-header">LES MEDIAS</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
            <p>
              Mini-Spot
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fab fa-youtube"></i>
            <p>
              Reportage
            </p>
          </a>
        </li>
        <li class="nav-header">PAYS & VILLE</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-flag"></i>
            <p>
              Pays
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-city"></i>
            <p>
              Ville
            </p>
          </a>
        </li>
        <li class="nav-header">PARAMETRE</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              Pamètre
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Admin
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>