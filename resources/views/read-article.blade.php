<x-article-layout>     
@section('title', $article->title)
@section('page_description', $article->seo_description)
@section('page_keywords', $article->seo_keywords)
@section('slug', Request::url() )
@section('author', $article->user->name)
@section('publied',  $article->created_at)
@section('modified', $article->modified_at)

<div class="container">

  @isset($article)
  <article class="page" itemscope itemtype="http://schema.org/CreativeWork">
  <meta itemprop="headline" content="{{$article->title}}">
  <meta itemprop="description" content="{{ $article->seo_description}}">
  <meta itemprop="dateModified" content="{{$article->modified_at}}">

  <div class="row">
    <div id="categories" class="col-sm-8">
      @foreach($categories as $cat)
        <a href="#"><span class="badge" style="color:#000;">{{ $cat }} </span></a>
      @endforeach
    </div>
    <div id="categories" class="col-sm-4" justify="right">
      
    </div>
  </div>
  <div class="row">
    <div id="hero-image" class="col-sm-12">
      <img src="/storage/{{ $article->image }}"  loading="lazy">
    </div>
  </div>
  <div class="row">
    <div id="hero-text" class="col-sm-12">
      <h1>{{ $article->title }}</h1>
          <p> Posted: {{ $article->created_at->diffForHumans() }} </p>
          <p> Author: {{ $article->user->name }} </p>
          <p> {!! nl2br(e($article->seo_description)) !!} </p>
    </div>
  </div>

  <div class="row">
    <div id="article-content" class="col-sm-12">
      {!! $article->acontent !!}
    </div>
  </div>
      
  </article>
      
  @endisset
  <div class="row">
    <div id="article-content" class="col-sm-12">
      <a href="#" class="previous">&laquo; Previous</a>
      <a href="#" class="next">Next &raquo;</a>
  </div>
  </div>
   
</div>

</x-article-layout>
