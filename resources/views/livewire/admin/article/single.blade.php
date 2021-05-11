<tr x-data="{ modalIsOpen : false }">
    <td> {{ $article->title }} </td>
    <td><a target="_blank" href="{{ asset($article->image) }}"><img class="rounded-circle img-fluid" width="50" height="50" src="{{ asset($article->image) }}" alt="image"></a></td>
    <td> {{ $article->created_at }} </td>
    <td> {{ $article->user->name }} </td>    
    @if(config('easy_panel.crud.article.delete') or config('easy_panel.crud.article.update'))
        <td>

            @if(config('easy_panel.crud.article.update'))
                <a href="@route(getRouteName().'.article.update', ['article' => $article->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(config('easy_panel.crud.article.delete'))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Article') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Article') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
