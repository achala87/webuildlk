
@section('title', 'Read Article')
@section('page_description', 'Citizen patriot gathering to develop a corruption free and sustainable sri lanka. This page lists articles written by buildlk contributors.')
@section('page_keywords', 'sri lanka, corruption free, fight corruption sri lanka, new politicial vision for sri lanka')
@section('author', 'Achala Arunalu')

<x-article-layout>
       
      <div class="container"> 
      
      <div class="row">    
        <div class="col-xs-8 col-xs-offset-2">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Contains</a></li>
                      <li><a href="#its_equal">It's equal</a></li>
                      <li><a href="#greather_than">Greather than ></a></li>
                      <li><a href="#less_than">Less than < </a></li>
                      <li class="divider"></li>
                      <li><a href="#all">Anything</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
	</div>


      
      <div class="row"> 
      <div class="col-md-12" style="margin:0px auto; width: 100%; margin-top:0.5rem; text-align:center;">
      <div class="bg-white overflow-hidden shadow-sm p-1 bg-white border-b border-gray-200">
        
      
      <div class="container col-xxl-8 px-4 py-0">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-1">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="/webuildlk-logo.png" class="d-block mx-lg-auto img-fluid" alt="logo" width="300" height="200" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">United for Sri Lanka</h1>
        <p class="lead">Professionals and academia share tangible activities and processeses to develop a peaceful, properous, healthy, sustainably developed  and vibrant nation free of corruption we proudly call Sri Lanka.</p>
       
      </div>
    </div>
  </div>

<?php $checkFeatured = 0 ?>

        @isset($articles)
        <!-- <div class="mt-10 max-w-xl mx-auto"> -->
        <div class="row mb-2">
        <?php $articleImg; ?>
        @foreach($articles as $article)
        <?php $articleImg = ""; ?>
          @isset($article->category)
          @foreach(json_decode($article->category) as $tag)
            
           <?php $articleImg = !empty($article->image) ? "/storage/".$article->image : "/storage/image/buildlklogo.jpg" ?>

            @if($tag == "featured")
            <div class="col-md-6 ">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static bg-dark">
            <strong class="d-inline-block mb-2 text-primary"></strong>
            <h3 class="mb-0 text-white">{{ $article->title }}</h3>
              
              <div class="mb-1 text-muted">Posted: {{ $article->created_at->diffForHumans() }}</div>
              <div class="mb-1 text-muted">Author: {{ $article->user->name }}</div>
              <p class="card-text mb-auto">{!! nl2br(e($article->seo_description)) !!}</p>
              <a href="{{ url(app()->getLocale()."/read-article/{$article->slug}")  }}" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="150" height="175" src="{{!! $articleImg !!}}" role="img" focusable="false">
          </div>
        </div>
        </div>
            <?php $checkFeatured = 1 ?>
            @break
            @endif
        @endforeach  
        @endisset
        
        @if($checkFeatured == 0)
        <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary"></strong>
            <h3 class="mb-0">{{ $article->title }}</h3>
              
              <div class="mb-1 text-muted">Posted: {{ $article->created_at->diffForHumans() }}</div>
              <div class="mb-1 text-muted">Author: {{ $article->user->name }}</div>
              <p class="card-text mb-auto">{!! nl2br(e($article->seo_description)) !!}</p>
              <a href="{{ url(app()->getLocale()."/read-article/{$article->slug}")  }}" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="150" height="175" src="{{ $articleImg }}" role="img" focusable="false">
          </div>
        </div>
        </div>
        @endif
        <?php $checkFeatured = 0 ?>
        @endforeach
        </div>
        @endisset
     </x-article-layout>
