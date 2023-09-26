<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="https://www.showroomafrica.com/" class="brand-link">
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
        <a href="#" class="d-block"> {{ Auth::user()->email }} </a>
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
          <a href="{{ route('popup.index') }}" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
            <p>
              Pop-up
            </p>
          </a>
        </li>
        <li class="nav-header">BANNIERE</li>
        <li class="nav-item">
          <a href="{{ route('banner.index') }}" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
            <p>
              Banniere
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-building"></i>
            <p>
              ENTREPRISES
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                  Categories
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sub-category.index') }}" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>
                  Sous-Categories
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('entreprise.index') }}" class="nav-link">
                <i class="nav-icon far fa-building"></i>
                <p>
                  Entreprise
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('annonce.index') }}" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Les annonces
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pharmacie-garde.index') }}" class="nav-link">
                <i class="nav-icon fas fa-clinic-medical"></i>
                <p>
                  Les pharmacies de garde
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('magazine.index') }}" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Les magazines
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('publiereportage.index') }}" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                  Les publireportages
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('service.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                  Présentation de l'entreprise
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('image.index') }}" class="nav-link">
                <i class="nav-icon fas fa-image"></i>
                <p>
                  Images de service
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('partenaire.index') }}" class="nav-link">
                <i class="nav-icon fas fa-handshake"></i>
                <p>
                  Partenaires des entreprises
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('horaire.index') }}" class="nav-link">
                <i class="nav-icon fas fa-clock"></i>
                <p>
                  Horaire
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('gallerie.index') }}" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>
                  Gallerie Image
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('devis.index') }}" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Devis
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('blog.index') }}" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
                <p>
                  Blog
                </p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              LES SLIDERS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('slider1.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Slider 1
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('slider2.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Slider 2
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('slider3.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Slider 3
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sliderhaut.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Slider Latéral Haut
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sliderbas.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Slider Latéral Bas
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sliderrecherche.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Slider Recherche
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sliderlh.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Recherche Latéral Haut
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sliderlb.index') }}" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>
                  Recherche Latéral Bas
                </p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-header">LES MEDIAS</li>
        <li class="nav-item">
          <a href="{{ route('mini-spot.index') }}" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
            <p>
              Mini-Spot
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('reportage.index') }}" class="nav-link">
            <i class="nav-icon fab fa-youtube"></i>
            <p>
              Reportage
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-globe"></i>
            <p>
              PAYS & VILLE
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pays.index') }}" class="nav-link">
                <i class="nav-icon far fa-flag"></i>
                <p>
                  Pays
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ville.index') }}" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>
                  Ville
                </p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>
              PARAMETRE
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('parametre.index') }}" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                  Pamètre
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Admin
                </p>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>