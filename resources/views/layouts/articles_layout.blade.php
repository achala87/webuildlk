<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('page_description')">
        <meta name="keywords" content="@yield('page_keywords')">
        <meta name="author" content="@yield('author')">

        <meta name="twitter:card" content="summary" />
        <!-- <meta name="twitter:site" content="@flickr" /> -->
        <meta name="twitter:title" content="@yield('slug')" />
        <meta name="twitter:description" content="@yield('page_description')" />
        <!-- <meta name="twitter:image" content="https://farm6.staticflickr.com/5510/14338202952_93595258ff_z.jpg" /> -->

        <meta property="fb:app_id" content="1234567890" /> 
        <meta property="og:type" content="article" /> 
        <meta property="og:url" content="@yield('slug')" /> 
        <meta property="og:title" content="@yield('title')" /> 
        <!-- <meta property="og:image"           content="https://scontent-sea1-1.xx.fbcdn.net/hphotos-xap1/t39.2178-6/851565_496755187057665_544240989_n.jpg" />  -->
        <meta property="og:description" content="@yield('page_description')" />

        <meta property='article:author' content="@yield('author')" />
        <meta property='article:publisher' content='https://wwww.buildlk.com' />
        <meta property='article:published_time' content="@yield('published')" />
        <meta property='article:modified_time' content="@yield('modified')" />
        <meta property='article:tag' content="@yield('seo_keywords')" />
        <meta property='og:site_name' content='Build Sri Lanka' />

        <link rel="canonical" href="@yield('slug')">
        <meta name="msvalidate.01" content="4BE9A236252D15311B31D1EA103EE632" />
                
        <title>@yield('title')</title>
                
        <!-- http://t.co/dKP3o1e -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
       

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-NCEW4KDEWZ"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-NCEW4KDEWZ');

          
        </script>

<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "BuildLK",
      "url": "https://buildlk.com/articles",
      "sameAs": ["https://twitter.com/buildlk","https://facebook.com/buildlk"]
    }
  </script>



<style>

 /* Timeline CSS */
 /*  Code By Webdevtrick ( https://webdevtrick.com )  */
@import url("https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap");
html {
  box-sizing: border-box;
}

a{
  text-decoration:none;
  background-color:transparent;
}

*,
*::before,
*::after {
  box-sizing: inherit;
}

body {
  font-family: "Nunito Sans", sans-serif;
  line-height: 1.5;
}

.wrapper {
  margin: 0 auto;
  padding: 0 16.66% 50px;
  width: 100%;
}

article {
  position: relative;
  max-width: 980px;
  margin: 0 auto;
}

.navigations {
  position: fixed;
  z-index: 99;
  top: 0;
  transition: top 0.3s ease-out;
}
.navigations ul {
  list-style: none;
  list-style-position: inside;
  margin: 15px 0;
}
.navigations ul li {
  margin: 15px 0;
  padding-left: 0;
  list-style-type: none;
  color: #bfc1c3;
  border-bottom: 1px dotted rgba(0, 0, 0, 0.3);
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.navigations ul li.active {
  font-weight: bold;
  color: #f94125;
  border-bottom: 1px dotted transparent;
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}
.navigations ul li:hover {
  color: #000;
}

  /* Timeline CSS */

 /* The hero image */
#hero-image {
  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  display:block;
  margin-top:1em;
  margin-bottom:0;
  width:100%;
  height: 302px;
  margin:0 auto;
}

#hero-image img{
  height: 300px;
  margin:0 auto;
}
/* Place text in the middle of the image */
#hero-text {
  text-align: center;
  font-size: 1em;
  top: 1%;
  padding: 1%;
  width: 80%;
  color: white;
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("photographer.jpg");
  display:block;
  margin:0 auto;
}

#hero-text h1{
  font-size: 1.2em;
}

#article-content {
  display:block;
  margin-top:2em;
  margin-bottom:2em;
  width:80%;
  height: auto;
  margin:0 auto;
}

.previous {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

a{
  background-color: #f1f1f1;
  color: black;
}

        </style>
        
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            <main>
            @isset($slot)
                {{ $slot }}  
            @endisset
            </main>
        </div>

  <nav class="navbar fixed-bottom navbar-expand-sm navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('list-organizations', app()->getLocale() ) }}">Rate Organization</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('anti-corruption', app()->getLocale()) }}">I Pledge</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('value-added-economy', app()->getLocale()) }}">Economy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('centralized-cities-environment', app()->getLocale()) }}">Environment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('articles', app()->getLocale()) }}">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('national-timeline-srilanka', app()->getLocale()) }}">Timeline</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('national-dashboard-srilanka', app()->getLocale()) }}">Dashboard</a>
        </li>
        <!-- <li class="nav-item dropup">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Dropup</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown10">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
  </div>
</nav>

    </body>

 <script src="{{ asset('js/app.js') }}" defer></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<script>


  //  Code By Webdevtrick ( https://webdevtrick.com ) 
$(() => {
  let stickyTop = 0,
  scrollTarget = false;

  let timeline = $('.navigations'),
  items = $('li', timeline),
  singleSECs = $('.sections .singleSEC'),
  offsetTop = parseInt(timeline.css('top'));

  const TIMELINE_VALUES = {
    start: 190,
    step: 30 };


  $(window).resize(function () {
    timeline.removeClass('fixed');

    stickyTop = timeline.offset().top - offsetTop;

    $(window).trigger('scroll');
  }).trigger('resize');

  $(window).scroll(function () {
    if ($(window).scrollTop() > stickyTop) {
      timeline.addClass('fixed');
    } else {
      timeline.removeClass('fixed');
    }
  }).trigger('scroll');

  items.find('span').click(function () {
    let li = $(this).parent(),
    index = li.index(),
    singleSEC = singleSECs.eq(index);

    if (!li.hasClass('active') && singleSEC.length) {
      scrollTarget = index;

      let scrollTargetTop = singleSEC.offset().top - 80;

      $('html, body').animate({ scrollTop: scrollTargetTop }, {
        duration: 400,
        complete: function complete() {
          scrollTarget = false;
        } });

    }
  });

  $(window).scroll(function () {
    let viewLine = $(window).scrollTop() + $(window).height() / 3,
    active = -1;

    if (scrollTarget === false) {
      singleSECs.each(function () {
        if ($(this).offset().top - viewLine > 0) {
          return false;
        }

        active++;
      });
    } else {
      active = scrollTarget;
    }

    timeline.css('top', -1 * active * TIMELINE_VALUES.step + TIMELINE_VALUES.start + 'px');

    items.filter('.active').removeClass('active');

    items.eq(active != -1 ? active : 0).addClass('active');
  }).trigger('scroll');
});
</script>

</html>
