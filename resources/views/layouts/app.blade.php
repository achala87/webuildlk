<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('page_description')">
        <meta name="keywords" content="@yield('page_keywords')">
        <meta name="author" content="@yield('page_author')">
        
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" />
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-NCEW4KDEWZ"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-NCEW4KDEWZ');
        </script>
        
        <style>
        /* CUSTOM STYLES APRIL 2020 ACHALA */

.h1class { color: #114982; font-size: 1.2rem; font-weight: 600; width:100%; line-height: 1.4rem; margin: 0 auto; text-align: center; text-transform: uppercase;  }
h2 { color: #114982;  font-size: 1.2rem; font-weight: 800; line-height: 36px; margin: 0 0 24px; text-align: center; }
.h2class { color: #114982; font-family: 'Raleway',sans-serif; font-size: 0.9rem; font-weight: 800; line-height: 1.2rem; margin: 5px; 0 8px; text-align: center; }
p { color: #114982;  font-size: 0.9rem; font-weight: 500; line-height: 1.2rem; margin: 1.2rem 0 1rem; }

.pclass { margin-top:1rem; color:#000; text-align: justify; text-justify: inter-word; }
.h3class{font-size:0.9rem;font-weight: 600;}

.sitecontent{width: 90%; margin:0 auto;}

.list-group { width: 100%; margin:0 auto;  }
.list-group-item { left: 0px; float:left; text-align:left;}
.fltrightbtn {float:right; font-size:0.9rem;}

ol.d {list-style-type: decimal; text-align: left;  font-size:0.85rem; line-height: 1.2rem;}
ol.q {list-style-type: lower-roman; margin-left:1.5rem; font-size:0.75rem; line-height: 1.2rem;}

/* popups  */
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #888;
  width: 75%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.card {
  /* Add shadows to create the "card" effect */
  width:330px;
  height:300px;
  margin-left:1.2em;
  margin-top:1em;
  /* float:left; */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px; /* 5px rounded corners */
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

@media screen and (max-width: 425px) {
  .cards {
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
  .card {
    width: 100%;
    margin-top: 18px;
    border-radius: 5px;
  }

  .container2 {
    width: 100%;
    padding: 0px;
    overflow-y: scroll;
}
}

/* Add some padding inside the card container */
.container2 {
  padding: 2px 16px;
  overflow-y: scroll;
  margin:0 auto;
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%;
  margin-top:2px;
}

        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-2 px-6 sm:px-8 lg:px-28">
                  {{ $header }}
                </div>

                
            </header> @endisset

            <!-- Page Content -->
            <main>
            @if(session('success'))
                        <div style="width: 80%; margin:0 auto;" class="alert alert-success">
                            {!! session('success') !!}
                        </div>
            @endif

            @isset($slot)
                {{ $slot }}  @endisset
            </main>
        </div>
    </body>

<!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
