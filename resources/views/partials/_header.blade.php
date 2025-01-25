

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Heure d'ouverture: Lun - Mar : 6.00 am - 10.00 pm, Dimanche Fermé </small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>cliniquevisionvalide@gmail.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+228 92573030</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="{{route('index')}}" class="navbar-brand p-0">
            <img class="w-100" src="{{asset('assets/img/logo.png')}}" alt="Image">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{route('index')}}" class="nav-item nav-link active">Accueil</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">A propos</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('about')}}" class="dropdown-item">Nos objectis</a>
                        <a href="{{route('team')}}" class="dropdown-item">Notre équipe</a>
                        <a href="{{route('appointment')}}" class="dropdown-item">Programmes</a>
                    </div>
                </div>
                <a href="{{route('service')}}" class="nav-item nav-link">Services</a>
                <a href="{{route('shop')}}" class="nav-item nav-link">Boutique</a>
                <a href="{{route('activite')}}" class="nav-item nav-link">Pathologie</a>

                <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{route('appointment')}}" class="btn btn-primary py-2 px-4 ms-3">Prendre rendez-vous</a>

            <a href="{{route('admin.dashboard')}}" target="_blank" class="btn btn-primary py-2 px-4 ms-3"><i class="fa fa-cog me-2"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

