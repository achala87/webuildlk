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
    <meta itemprop="headline" content="Commercial Support for Jitsi Meet">
    <meta itemprop="description" content="Installation, Configuration &amp; Customization">
    <meta itemprop="dateModified" content="May 05, 2018">


    <div id="hero-image" class="hero-image">
      <img src="/storage/{{$article->image}}"  width="700" height="500" loading="lazy">
      <div class="hero-text">
      <h1>{{ $article->title }}</h1>
            <p> Posted: {{ $article->created_at->diffForHumans() }} </p>
            <p> Author: {{ $article->user->name }} </p>
            <p> {!! nl2br(e($article->seo_description)) !!} </p>
      </div>
    </div>

    <div class="article-body">
    {{ $article->acontent }}
    </div>
      
    </article>
      
        @endisset
   
</div>

</x-article-layout>
