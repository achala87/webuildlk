<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Organization_Reviews')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Organization_Reviews')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(config('easy_panel.crud.organization_reviews.create'))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.organization_reviews.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Organization_Reviews') ]) }}</a>
                        </div>
                        @endif
                        @if(config('easy_panel.crud.organization_reviews.search'))
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
                        <td style='cursor: pointer' wire:click="sort('description')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'description') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'description') fa-sort-amount-up ml-2 @endif'></i> {{ __('Description') }} </td>
                        <td style='cursor: pointer' wire:click="sort('created_at')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'created_at') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'created_at') fa-sort-amount-up ml-2 @endif'></i> {{ __('Date') }} </td>
                        <td style='cursor: pointer' wire:click="sort('organization_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'organization_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'organization_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Organization Title') }} </td>
                        <td style='cursor: pointer' wire:click="sort('created_by_user_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'created_by_user_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'created_by_user_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('User Name') }} </td>
                        
                        @if(config('easy_panel.crud.organization_reviews.delete') or config('easy_panel.crud.organization_reviews.update'))
                        <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($organization_reviewss as $organization_reviews)
                        @livewire('admin.organization_reviews.single', ['organization_reviews' => $organization_reviews], key($organization_reviews->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $organization_reviewss->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
