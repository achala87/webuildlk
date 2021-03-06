<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

    </head>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" />
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
float:left;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
transition: 0.3s;
border-radius: 5px; /* 5px rounded corners */
}

/* On mouse-over, add a deeper shadow */
.card:hover {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container2 {
padding: 2px 16px;
overflow-y: scroll;
}
</style>


    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- @include('layouts.navigation') -->

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-2 px-6 sm:px-8 lg:px-28">
                  {{ $header }}
                </div>
            </header> @endisset

            <div class='content'>
              @yield('content') {{-- This will show the rendered view data --}}
          </div>
        </div>
    </body>

</html>
