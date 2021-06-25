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
        /* The hero image */
#hero-image {
  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

#hero-image img{
  width: 400px;
  margin:0 auto;
  /* Use "linear-gradient" to add a darken background effect to the image (photographer.jpg). This will make the text easier to read */
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("photographer.jpg");

}
/* Place text in the middle of the image */
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("photographer.jpg");
}

#article-content {
  
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
          <a class="nav-link" aria-current="page" href="/">Rate Organization</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">I Pledge</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Economy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Timeline</a>
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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</script>
 <!-- $(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
}); -->
</script>

</html>
