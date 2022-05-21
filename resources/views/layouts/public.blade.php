<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        
        <title>Grp_11 | @yield('title', 'Home')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
	    
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <script src="https://kit.fontawesome.com/33316bb77f.js" crossorigin="anonymous"></script>

    </head>
    <body>
        @if( ! $home_type ?? '')
            <section class="image-home">
        @endif
            <div id="header">
                @guest
                    @include('layouts/navpublic')
                @endguest  

                @can('isLocatore')
                    @include('layouts/navlocatore') 
                @endcan

                @can('isLocatario')
                    @include('layouts/navlocatario') 
                @endcan
   
            </div>

            <!-- end #menu -->
            
            <div id="content">
                        @yield('content')
            </div>

            <!-- end #content -->
            <section id="footer-section" class="footer-home">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 mt-5">
                            <h4 class="title-footer-home"> Se hai qualche dubbio, scrivici! </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pretium rhoncus maximus. <br> 
                                Mauris at purus nec velit elementum gravida eu porttitor magna. </p>
                         <a href="#"> Scrivi qui! </a>
                        </div>
                        <div class="col-sm-6 mt-5">
                            <h6 class ="title-footer-home">Dove siamo? </h6>
                            <div id="map-container" class="z-depth-1-half map-container" style="height: 500px">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2889.9487942499004!2d13.5144063!3d43.5867829!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d80233dd931ef%3A0x161719e4f3f5daaf!2sUniversit%C3%A0%20Politecnica%20delle%20Marche%20-%20Facolt%C3%A0%20di%20Ingegneria!5e0!3m2!1sit!2sit!4v1652779818054!5m2!1sit!2sit" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> 
                                    </iframe>
                            </div>
                        </div>  
                    </div>
                </div>
            </section>
            <!-- end #footer -->

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
    </body>
</html>