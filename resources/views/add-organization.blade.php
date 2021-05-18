@section('title', 'Add Organization')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6"> Add organization</div> 
     
   </x-slot>

    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Add a new organization and rate it's performance
        </h2> </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
            <div class="container mt-4">
   <!-- Validation Errors -->
   <x-auth-validation-errors class="mb-4" :errors="$errors" />
   
    <form id="add-todo" method="post" action="{{ route('post-organization', app()->getLocale()) }}"> 
      @csrf

      <div class="form-group">
        <label for="title">Organization Title *</label>
        <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Please enter title">
        <span class="text-danger">{{ $errors->first('title') }}</span>
      </div> 

      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" id="formGroupExampleInput" placeholder="Please enter ta brief description">
        <span class="text-danger">{{ $errors->first('description') }}</span>
      </div> 

      <div class="form-group">
        <label for="district">District * </label>
        <select name="district" id="district" class="form-control m-bot15">
          <option selected value="-">Select district</option>
          
          <option value="Colombo">Colombo</option>
          <option value="Kandy">Kandy</option>
          <option value="Gampaha">Gampaha</option>
          <option value="Kaluthara">Kaluthara</option>

          <option value="Jaffna">Jaffna</option>
          <option value="Matale">Matale</option>
          <option value="Kegalle">Kegalle</option>
          <option value="Kurunegala">Kurunegala</option>
          <option value="Ratnapura">Ratnapura</option>

          <option value="Galle">Galle</option>
          <option value="Matara">Matara</option>
          <option value="Hambantota">Hambantota</option>
          <option value="Badulla">Badulla</option>
          <option value="Monaragala">Monaragala</option>

          <option value="Ampara">Ampara</option>
          <option value="Trincomalee">Trincomalee</option>
          <option value="Mannar">Mannar</option>
          <option value="Mullaitivu">Mullaitivu</option>
          <option value="Vavuniya">Vavuniya</option>

          <option value="Puttalam">Puttalam</option>
          <option value="Nuwara Eliya">Nuwara Eliya</option>
          <option value="Kilinochchi">Kilinochchi</option>
          <option value="Polonnaruwa">Polonnaruwa</option>
          <option value="Anuradhapura">Anuradhapura</option>
        </select>
        <span class="text-danger">{{ $errors->first('district') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Organization Type *</label>
        <select class="browser-default custom-select" name="org_type" id="org_type">
        <option selected>Select type</option>
        <option value="Government">Government</option>
        <option value="Semi-Government">Semi-Government</option>
        <option value="Public-Private">Public-Private Partnership</option>
        <option value="Private">Private</option>
        <select>
        <span class="text-danger">{{ $errors->first('org_type') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Emails</label>
        <textarea class="form-control" name="emails" placeholder="sample_mail: sample_mail_1@sample.com, "></textarea>
        <span class="text-danger">{{ $errors->first('emails') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Contact Numbers</label>
        <textarea class="form-control" name="contact_numbers" placeholder="Sample contact 1: 0771234567, Sample contact 2: 0771234568, "></textarea>
        <span class="text-danger">{{ $errors->first('contact_numbers') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Address</label>
        <textarea class="form-control" name="address" placeholder="full address would be helpful to correctly identify organization but not mandatory"></textarea>
        <span class="text-danger">{{ $errors->first('address') }}</span>
      </div>

      <div class="form-group">
        <label for="message">Reporting/ Related Ministry</label>
        <textarea class="form-control" name="related_ministry" placeholder="if applicable ministry reporting to, if a ministry leave blank"></textarea>
        <span class="text-danger">{{ $errors->first('related_ministry') }}</span>
      </div>

      <!-- <div class="form-group">
        <label for="message">Upload photos</label>
        <textarea class="form-control" name="photos" placeholder="if applicable ministry reporting to, if a ministry leave blank"></textarea>
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