<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                @yield('content-header')
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="page-section">
        @yield('content-section')
    </div>
</div>

<footer class="js-fix-footer footer border-top-2">
    <div></div>
    <div class="container-fluid page__container page-section d-flex flex-column">
        <a href="https://www.bekasikab.go.id/">
            <p class="text-70 brand mb-24pt">
                <img class="brand-icon"
                        src="{{asset('assets/images/kabBekasi.svg')}}"
                        width="30"
                        alt="Huma"> Pemerintah Kabupaten Bekasi
            </p>
        </a>
        
        <p class="text-50 small mb-0">Copyright 2019 &copy; All rights reserved.</p>
    </div>
</footer>
<div></div>