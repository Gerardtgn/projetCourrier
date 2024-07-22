<!doctype html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Gestionnaire de courrier</title>
      <link rel="shortcut icon" type="image/png" href="images/logos/favicon.png" />
      {{-- <link rel="stylesheet" href="../css/styles.min.css" /> --}}
    </head>

    @vite([
        'resources/css/app.css', 
        'resources/js/app.js',
        'resources/css/app.css', 
        'resources/js/app.js',
        'resources/css/styles.min.css',
        'resources/css/simple-bar.css',
        'resources/css/icons/tabler-icons/tabler-icons.css',
        'resources/libs/jquery/dist/jquery.min.js',
        'resources/libs/bootstrap/dist/js/bootstrap.bundle.min.js',
        'resources/js/sidebarmenu.js',
        'resources/js/app.min.js',
        'resources/libs/apexcharts/dist/apexcharts.min.js',
        'resources/libs/simplebar/dist/simplebar.js',
        'resources/js/dashboard.js',
        'resources/vendor/fontawesome-free/css/all.min.css',
        'resources/vendor/datatables/dataTables.bootstrap4.min.css',
        'resources/vendor/datatables/jquery.dataTables.min.js',
        'resources/vendor/datatables/dataTables.bootstrap4.min.js',
        'resources/js/demo/datatables-demo.js',
        ])

    <body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar" style="">
          <!-- Sidebar scroll-->
          <div style="position: relative;">
            <div class="brand-logo d-flex align-items-center justify-content-center">
              <a href="./index.html" class="text-nowrap logo-img">
              <img src="{{ asset('images/profile/poster.png') }}" width="50" height="50" alt=""/> <span style="font-size:12px; text-transform:uppercase;">Gestionnaire de courriers</span>
              </a>
              <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
              </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
              <ul id="sidebarnav">
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Tableau de bord</span>
                  </a>
                </li>

                <li class="sidebar-item">
                    <div class="dropdown">
                            <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-download"></i>
                                Enregistrer un courrier
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'arrivee'])}}">Courrier arrivée</a></li>
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'depart'])}}">Courrier départ</a></li>
                            </ul>
                    </div>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('courrier_depart') }}" aria-expanded="false">
                    <span>
                      <i class="fas fa-envelope"></i>
                    </span>
                    <span class="hide-menu">Courriers départ</span>
                  </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('courrier_arrivee') }}" aria-expanded="false">
                      <span>
                        <i class="fas fa-envelope"></i>
                      </span>
                      <span class="hide-menu">Courriers arrivée</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                      <span>
                        <i class="fas fa-archive"></i>
                      </span>
                      <span class="hide-menu">Archives</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <div class="dropdown">
                            <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                
                                <i class="fas fa-users"></i>
                                Gérer les utilisateurs
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'arrivee'])}}">Afficher un utilisateur</a></li>
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'depart'])}}">Ajouter un utilisateur</a></li>
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'arrivee'])}}">Modifier un utilisateur</a></li>
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'depart'])}}">Supprimer un utilisateur</a></li>
                            </ul>

                    </div>
                </li>

                <li class="sidebar-item">
                    <div class="dropdown">
                            <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-building"></i>
                                Gérer les services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'arrivee'])}}">Afficher les services</a></li>
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'depart'])}}">Ajouter un service</a></li>
                                <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'depart'])}}">Supprimer un service</a></li>
                            </ul>

                    </div>
                </li>


              </ul>

            </nav>
            <!-- End Sidebar navigation -->
            <div style="position:fixed; bottom:5px; left:0;">
            <a href="">Gestionnaire de courrier-2024</a>
            </div>
          </div>
          <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
          <!--  Header Start -->
          <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
              <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                  <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <!--<a class="nav-link nav-icon-hover"  href="{{ route('afficheaffectation')}}"-->
                    <!--<i class="ti ti-bell-ringing"></i>-->
                    <a class="btn btn-primary" href="{{route('afficheaffectation')}}">Notifications</a>
                    <div class="notification bg-primary rounded-circle"></div>
                </li>
              </ul>
              <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                  <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <span>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}, {{ Auth::user()->role}}</span>
                      <img src="../images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                      <div class="message-body">
                        <a href="{{route('profile.edit')}}" class="d-flex align-items-center gap-2 dropdown-item" >
                          <i class="ti ti-user fs-6"></i>
                          <p class="mb-0 fs-3">Mon Profile</p>
                        </a>

                        <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Me deconnecter</a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
          </header> <br><br>
          <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                  <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                      <div style="display:flex;justify-content:center;">
                         @yield('content') 
                      </div>
                  </div>
              </div>
          </div>
          <!--  Header End -->
      
        </div>
      </div>
             
          <!--  Header End -->
      @stack('script')
      
</body>
 </html>

