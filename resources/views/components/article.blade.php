<div class="articlescomponent">
<div class="content"> 

<p>Inside the article component</p>

@isset($articles)

@foreach($articles as $article)
    <h1 class="title">{{ $article->title }}</h1>
  
    <p><b>Posted:</b> {{ $article->created_at->diffForHumans() }}</p>
    <p><b>Category:</b> {{ $article->category }}</p>
    <p><b>Author:</b> {{ $article->user->name }}</p>
    <p>{!! nl2br(e($article->acontent)) !!}</p>
@endforeach
@endisset

</div>
</div>