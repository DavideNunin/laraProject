<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Grp_11 | @yield('title', 'Home')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="{{ asset('images/TW.png') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
	    
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <script src="https://kit.fontawesome.com/33316bb77f.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        @show
        @section('scripts')
        @show
    </head>
    <body>
        @if( $home_type ?? '')
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

                @can('isAdmin')
                    @include('layouts/navadmin') 
                @endcan
   
            </div>

            <!-- end #menu -->
            
            <div id="content">
                        @yield('content')
            </div>

            <!-- end #content -->
            <div id="footer-section" class="footer-home pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 pt-5">
                            <h4 class="title-footer-home"> Se hai qualche dubbio, scrivici! </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pretium rhoncus maximus. <br> 
                                Mauris at purus nec velit elementum gravida eu porttitor magna. </p>
                         <a href="mailto:s1093366@studenti.unipvm.it" class="link-footer"> Scrivi qui! </a>

                         <div class="col-lg-8 mt-5">
                            <a href="{{asset('Documentazione_techweb.pdf')}}" class="link-doc"> <i class="fa-solid fa-file-lines"></i> Leggi la documentazione </a>
                         </div>
                        </div>
                        <div class="col-sm-6 pt-5">
                            <h6 class ="title-footer-home">Dove siamo? </h6>
                            <div id="map-container" class="z-depth-1-half map-container">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2889.9487942499004!2d13.5144063!3d43.5867829!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d80233dd931ef%3A0x161719e4f3f5daaf!2sUniversit%C3%A0%20Politecnica%20delle%20Marche%20-%20Facolt%C3%A0%20di%20Ingegneria!5e0!3m2!1sit!2sit!4v1652779818054!5m2!1sit!2sit" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> 
                                    </iframe>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <!-- end #footer -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
    </body>
</html>
