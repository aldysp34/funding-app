<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Login</title>
        @include('layouts.partials.head')
    </head>
    
    <body class="layout-app layout-sticky-subnav has-drawer-opened">

        @include('layouts.partials.loader')
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page-content">

                <div class=" pt-32pt pt-sm-64pt pb-32pt">
                    <div class="container-fluid page__container">
                        <form action="{{ route('login') }}"
                              class="col-md-5 p-0 mx-auto" method="POST">
                        @csrf
                            <div class="form-group">
                                <label class="form-label"
                                       for="email">Email:</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your email address ...">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="password">Password:</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your Password ...">
                                
                            </div>
                            <div class="text-center">
                                <button class="btn btn-accent" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>

        </div>
            @include('layouts.partials.footer-scripts')
    </body>
</html>