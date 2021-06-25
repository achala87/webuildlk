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

  <article class="blog-post">

  <article class="page" itemscope itemtype="http://schema.org/CreativeWork">
  <meta itemprop="headline" content="{{$article->title}}">
  <meta itemprop="description" content="{{ $article->seo_description}}">
  <meta itemprop="dateModified" content="{{$article->modified_at}}">


    <div id="hero-image" class="hero-image">
      <img src="/storage/{{$article->image}}"  height="300" loading="lazy">
      <div class="hero-text">
      <h1>{{ $article->title }}</h1>
            <p> Posted: {{ $article->created_at->diffForHumans() }} </p>
            <p> Author: {{ $article->user->name }} </p>
            <p> {!! nl2br(e($article->seo_description)) !!} </p>
      </div>
    </div>

    <div id="article-content" class="w3-container w3-content w3-justify w3-center w3-padding-64" style="max-width:800px" >
    {!! $article->acontent !!}
    </div>
      
    </article>
      
        @endisset
   
</div>

</x-article-layout>
