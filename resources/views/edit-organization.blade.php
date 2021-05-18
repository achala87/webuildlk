@section('title', 'Edit Organization')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6"> Edit organization</div> 
     
   </x-slot>

    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        You are editing {{ $organization->title }}
        </h2> </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
            <div class="container mt-4">
   
    <form id="add-todo" method="post" action="{{ route('update-organization', app()->getLocale() ) }}"> 
      @csrf
      
      <input type="hidden" name="id" class="form-control" value="{{ $organization->id }}" id="formGroupExampleInput">

      <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input type="text" disabled name="title" class="form-control" id="formGroupExampleInput" placeholder="Please enter title" value="{{ $organization->title }}">
        <span class="text-danger">{{ $errors->first('title') }}</span>
      </div> 

      <div class="form-group">
        <label for="formGroupExampleInput">Description</label>
        <input type="text" name="description" class="form-control" id="formGroupExampleInput" placeholder="Please enter ta brief description" value="{{ $organization->description }}">
        <span class="text-danger">{{ $errors->first('description') }}</span>
      </div> 

      <div class="form-group">
        <label for="message">District * </label>
        <select class="browser-default custom-select" name="district" id="district">
        
        <option {{ ($organization->district) == 'Colombo' ? 'selected' : '' }} value="Colombo">Colombo</option>
        <option {{ ($organization->district) == 'Kandy' ? 'selected' : '' }} value="Kandy">Kandy</option>
        <option {{ ($organization->district) == 'Gampaha' ? 'selected' : '' }} value="Gampaha">Gampaha</option>
        <option {{ ($organization->district) == 'Kaluthara' ? 'selected' : '' }} value="Kaluthara">Kaluthara</option>
      
        <option {{ ($organization->district) == 'Jaffna' ? 'selected' : '' }} value="Jaffna">Jaffna</option>
        <option {{ ($organization->district) == 'Matale' ? 'selected' : '' }} value="Matale">Matale</option>
        <option {{ ($organization->district) == 'Kegalle' ? 'selected' : '' }} value="Kegalle">Kegalle</option>
        <option {{ ($organization->district) == 'Kurunegala' ? 'selected' : '' }} value="Kurunegala">Kurunegala</option>
        <option {{ ($organization->district) == 'Ratnapura' ? 'selected' : '' }} value="Ratnapura">Ratnapura</option>

        <option {{ ($organization->district) == 'Galle' ? 'selected' : '' }} value="Galle">Galle</option>
        <option {{ ($organization->district) == 'Matara' ? 'selected' : '' }} value="Matara">Matara</option>
        <option {{ ($organization->district) == 'Hambantota' ? 'selected' : '' }} value="Hambantota">Hambantota</option>
        <option {{ ($organization->district) == 'Badulla' ? 'selected' : '' }} value="Badulla">Badulla</option>
        <option {{ ($organization->district) == 'Monaragala' ? 'selected' : '' }} value="Monaragala">Monaragala</option>

        <option {{ ($organization->district) == 'Ampara' ? 'selected' : '' }} value="Ampara">Ampara</option>
        <option {{ ($organization->district) == 'Trincomalee' ? 'selected' : '' }} value="Trincomalee">Trincomalee</option>
        <option {{ ($organization->district) == 'Mannar' ? 'selected' : '' }} value="Mannar">Mannar</option>
        <option {{ ($organization->district) == 'Mullaitivu' ? 'selected' : '' }} value="Mullaitivu">Mullaitivu</option>
        <option {{ ($organization->district) == 'Vavuniya' ? 'selected' : '' }} value="Vavuniya">Vavuniya</option>

        <option {{ ($organization->district) == 'Puttalam' ? 'selected' : '' }} value="Puttalam">Puttalam</option>
        <option {{ ($organization->district) == 'Nuwara Eliya' ? 'selected' : '' }} value="Nuwara Eliya">Nuwara Eliya</option>
        <option {{ ($organization->district) == 'Kilinochchi' ? 'selected' : '' }} value="Kilinochchi">Kilinochchi</option>
        <option {{ ($organization->district) == 'Polonnaruwa' ? 'selected' : '' }} value="Polonnaruwa">Polonnaruwa</option>
        <option {{ ($organization->district) == 'Anuradhapura' ? 'selected' : '' }} value="Anuradhapura">Anuradhapura</option>
        <select>
        <span class="text-danger">{{ $errors->first('district') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Organization Type *</label>
        <select class="browser-default custom-select" name="org_type" id="org_type">
        <option {{ ($organization->org_type) == 'Government' ? 'selected' : '' }} value="Government">Government</option>
        <option {{ ($organization->org_type) == 'Semi-Government' ? 'selected' : '' }} value="Semi-Government">Semi-Government</option>
        <option {{ ($organization->org_type) == 'Public-Private' ? 'selected' : '' }} value="Public-Private">Public-Private Partnership</option>
        <option {{ ($organization->org_type) == 'Private' ? 'selected' : '' }} value="Private">Private</option>
        <select>
        <span class="text-danger">{{ $errors->first('org_type') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Emails</label>
        <textarea class="form-control" name="emails" placeholder="sample_mail: sample_mail_1@sample.com, ">{{ $organization->emails }}</textarea>
        <span class="text-danger">{{ $errors->first('emails') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Contact Numbers</label>
        <textarea class="form-control" name="district" placeholder="Sample contact 1: 0771234567, Sample contact 2: 0771234568, ">{{ $organization->contact_numbers }}</textarea>
        <span class="text-danger">{{ $errors->first('contact_numbers') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Address</label>
        <textarea class="form-control" name="address" placeholder="full address would be helpful to correctly identify organization but not mandatory">{{ $organization->address }}</textarea>
        <span class="text-danger">{{ $errors->first('address') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Reporting/ Related Ministry</label>
        <textarea class="form-control" name="related_ministry" placeholder="if applicable ministry reporting to, if a ministry leave blank">{{ $organization->related_ministry }}</textarea>
        <span class="text-danger">{{ $errors->first('related_ministry') }}</span>
      </div>

      <!-- <div class="form-group">
        <label for="message">Upload photos</label>
        <textarea class="form-control" name="photos" placeholder="Photos">{{ $organization->photos }}</textarea>
        <span class="text-danger">{{ $errors->first('photos') }}</span>
      </div> -->

      <div class="form-group">
       <button type="submit" class="btn btn-success" id="btn-send">Submit</button>
      </div>
    </form>
 
    </div>
        </div>
    </div>
</x-app-layout>