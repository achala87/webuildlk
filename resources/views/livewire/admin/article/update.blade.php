<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Article') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.article.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Article')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

            
            <!-- Title Input -->
            <div class='form-group'>
                <label for='inputtitle' class='col-sm-2 control-label'> {{ __('Title') }}</label>
                <input type='text' wire:model.lazy='title' class="form-control @error('title') is-invalid @enderror" id='inputtitle'>
                @error('title') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
               
            <!-- Content Input -->
            <div wire:ignore class='form-group'>
                <label for='inputeditor' class='col-sm-2 control-label'> {{ __('Content') }}</label>
                <textarea  wire:model.lazy='acontent' id="acontent"  rows="10"  class=""></textarea>
                @error('acontent') <div class='invalid-feedback'>{{ $message }}</div> @enderror
>
            </div>
            

            <!-- Image Input -->
            <div class='form-group'>
                <label for='inputimage' class='col-sm-2 control-label'> {{ __('Image') }}</label>
                <input type='file' wire:model='image' class="form-control-file @error('image') is-invalid @enderror" id='inputimage'>
                @if($image and !$errors->has('image') and $image instanceof \Livewire\TemporaryUploadedFile and (in_array( $image->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                    <a href="{{ $image->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow" src="{{ $image->temporaryUrl() }}" alt=""></a>
                @endif
                @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <div class='form-group'>
                <label for='seo_description' maxlength="250" class='col-sm-4 control-label'> {{ __('Search Engine Description') }}</label>
                <input type='text' id='seo_description' wire:model.lazy='seo_description' class="form-control @error('seo_description') is-invalid @enderror">
                @error('seo_description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <div class='form-group'>
                <label  for='seo_keywords' class='col-sm-4 control-label'> {{ __('Search Engine Keywords') }}</label>
                <input type='text' wire:model.lazy='seo_keywords'   id="seo_keywords" class="form-control @error('seo_keywords') is-invalid @enderror">
            </div>

            <div class='form-group'>
                <label for='category' class='col-sm-4 control-label'> {{ __('Category') }}</label>
                <input type='text' wire:model.lazy='category' id="category" class="form-control @error('category') is-invalid @enderror">
            </div>

            <div class='form-group'>
                <label for='slug' class='col-sm-4 control-label'> {{ __('Article URL') }}</label>
                <input type='text' onchange="converttoslug(this.value)" wire:model.lazy='slug' name="slug" id='slug'>
                @error('slug') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <div class='form-group'>
                <label for='language' class='col-sm-4 control-label'> {{ __('Article Language') }}</label>
               <select id="language" wire:model.lazy='language' name="language"> 
                <option value="en">English</option>
                <option value="si">Sinhala</option>
                <option value="tm">Tamil</option>
               </select>
            </div>
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.article.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
