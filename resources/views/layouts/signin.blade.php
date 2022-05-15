<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>Grp_11 | @yield('title', 'Login or Register')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
	    <script src="https://kit.fontawesome.com/33316bb77f.js" crossorigin="anonymous"></script>


    </head>
    <body>
        
        <section class="wrapper-login">
            @include('layouts/navpublic', ['nav_type' => '2'])
            <!-- end #menu -->
            
            <div id="content-access">
                <div class="container-access">
                        @yield('content')
                </div>
            </div>
        </div>

            <!-- end #content -->
        </section   >
            <!-- end #footer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>