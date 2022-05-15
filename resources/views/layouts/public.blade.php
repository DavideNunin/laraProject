<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>Grp_11 | @yield('title', 'Home')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
	    <script src="https://kit.fontawesome.com/33316bb77f.js" crossorigin="anonymous"></script>


    </head>
    <body>
            
            <div id="header">
                
                @include('layouts/navpublic', ['nav_type' => '1'])   
            
            </div>

            <!-- end #menu -->
            
            <div id="content">
                        @yield('content')
            </div>

            <!-- end #content -->
            <section id="footer-section" class="footer-home">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 mt-5">
                            <h4 class="title-footer-home"> Se hai qualche dubbio, scrivici! </h4>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="text-home"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pretium rhoncus maximus. <br> Mauris at purus nec velit elementum gravida eu porttitor magna. </h4>
                        </div>
                        <div class="col-sm-12 mt-3 mb-5">
                            <h6 class="text-home"> <a href="#"> Scrivi qui! </a> </h4>
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