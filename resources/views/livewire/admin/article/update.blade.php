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
                <label for='inputacontent' class='col-sm-2 control-label'> {{ __('Content') }}</label>
                <textarea  wire:model.lazy='acontent' id="acontent" >
                {{ $this->acontent }}
                </textarea>
                @error('acontent') <div class='invalid-feedback'>{{ $message }}</div> @enderror

            </div>
            

            <!-- Image Input -->
            <div class='form-group'>
                <label for='inputimage' class='col-sm-2 control-label'> {{ __('Image') }}</label>
                <input type='file' wire:model='image' class="form-control-file @error('image') is-invalid @enderror" id='inputimage'>
                @if($image and !$errors->has('image') and $image instanceof \Livewire\TemporaryUploadedFile and (in_array( $image->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                    <a href="{{ $image->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow" src="{{ $image->temporaryUrl() }}" alt=""></a>
                @endif
                @if($image)
                <a href=""><img width="200" height="200" class="img-fluid shadow" src="/storage/{{ $image }}" alt=""></a>
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
               @error('language') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            

        </div>

        <div class="card-footer">
            <button type="submit" id="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.article.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>

<script>

$(document).ready(function() {
    $('#category').tagsInput({
    interactive: true,
    placeholder: 'Add upto 2 categories',
    minChars: 3,
    maxChars: 40, // if not provided there is no limit
    limit: 2, // if not provided there is no limit
    width: 'auto', // standard option is 'auto'
    height: 'auto', // standard option is 'auto'
    hide: true,
    delimiter: [',',';'], // or a string with a single delimiter
    autocomplete: {
                source: [
                    'Politics', 'War', 'Reconcilliation', 'Peace', 'Economy', 'Environment', 'Corruption', 'Legal Reform', 'National Policy', ' Governance', 'Military', 'Police', 'Law and Order', 'Law', 'History', 'Art and Culture', 'Music', 'Entertainment', 'buildLK', 'RTI'
                ]
	}, 
    unique: true,
    removeWithBackspace: true,
    });

  

    $('#seo_keywords').tagsInput({
    interactive: true,
    placeholder: 'Add upto 10 search engine keywords',
    minChars: 3,
    maxChars: 30, // if not provided there is no limit
    limit: 10, // if not provided there is no limit
    validationPattern: new RegExp('^[a-zA-Z]+$'), // a pattern you can use to validate the input
    width: 'auto', // standard option is 'auto'
    height: 'auto', // standard option is 'auto'
    hide: true,
    delimiter: [',',';'], // or a string with a single delimiter
    unique: true,
    removeWithBackspace: true,
    });

    document.querySelector('#submit').addEventListener('click', () => {  
               
        @this.set('category', $( "#category" ).val());
        @this.set('seo_keywords', $( "#seo_keywords" ).val());
        @this.set('acontent', tinyMCE.activeEditor.getContent());

    });
});


    function converttoslug(title){
        //alert('2');
        old = document.getElementById("slug").value;
        document.getElementById("slug").value = slugify(old);
        //alert('3');
    }

    // Slugify a string
function slugify(str)
{
    str = str.replace(/^\s+|\s+$/g, '');

    // Make the string lowercase
    str = str.toLowerCase();

    // Remove accents, swap ñ for n, etc
    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆÍÌÎÏŇÑÓÖÒÔÕØŘŔŠŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇíìîïňñóöòôõøðřŕšťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to   = "AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    // Remove invalid chars
    str = str.replace(/[^a-z0-9 -]/g, '') 
    // Collapse whitespace and replace by -
    .replace(/\s+/g, '-') 
    // Collapse dashes
    .replace(/-+/g, '-'); 

    return str;
}


tinymce.init({
      selector: '#acontent',
      height: 500,
      plugins: 'preview casechange image formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments image casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'BuildLK',
      images_upload_handler: function (blobinfo, success, failure){
          var xhr, formdata;
          xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', '{{ route('upload-image') }}');
          var token = '{{ csrf_token() }}';
          xhr.setRequestHeader("X-CSRF-Token", token);
          xhr.onload = function(){
              var json;
              if(xhr.status !=  200){
                  failure('HTTP Error: '+ xhr.status);
                  return;
              }
              json = JSON.parse(xhr.responseText);
              if(!json || typeof json.location != 'string'){
                  failure('Invalid JSON: '+ xhr.responseText);
                  return;
              }
              success(json.location);
          };
          formData = new FormData();
          formData.append('file', blobinfo.blob(), blobinfo.filename());
          xhr.send(formData);
      },
      
   });


</script>
