<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Article')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Article')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(config('easy_panel.crud.article.create'))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.article.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Article') ]) }}</a>
                        </div>
                        @endif
                        @if(config('easy_panel.crud.article.search'))
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td style='cursor: pointer' wire:click="sort('title')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'title') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'title') fa-sort-amount-up ml-2 @endif'></i> {{ __('Title') }} </td>
                        <td style='cursor: pointer' wire:click="sort('image')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'image') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'image') fa-sort-amount-up ml-2 @endif'></i> {{ __('Image') }} </td>
                        <td style='cursor: pointer' wire:click="sort('created_at')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'created_at') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'created_at') fa-sort-amount-up ml-2 @endif'></i> {{ __('Created_at') }} </td>
                        <td> {{ __('User Name') }} </td>
                        
                        @if(config('easy_panel.crud.article.delete') or config('easy_panel.crud.article.update'))
                        <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($articles as $article)
                        @livewire('admin.article.single', ['article' => $article], key($article->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $articles->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
