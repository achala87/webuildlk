@section('title', 'Edit Organization')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6">Infromation and rating of organizations in Sri Lanka</div> 
     
   </x-slot>

    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Infromation and reviews of {{ $organization->title }}
        </h2> </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
            <div class="container mt-4">

      <div>
        <label>Title: </label>
        <span class="label info">{{ $organization->title }}</span>
      </div> 

      <div class="label info">
        <label>Description: </label>
        <span class="label info">{{ $organization->description }} </span>
      </div> 

      <div class="label">
        <label>District: </label>
        <span class="label info">{{ $organization->district }}</span>
      </div>

      <div class="label">
        <label>Organization Type: </label>
        <span class="label info"> {{ $organization->org_type }} </span>
      </div>

      <div class="label">
        <label>Emails: </label>
        <span class="label info">{{ $organization->emails }}</span>
      </div>

      <div class="label">
        <label>Contact Numbers: </label>
        <span class="label info">{{ $organization->contact_numbers }}</span>
      </div>

      <div class="label">
        <label>Address: </label>
        <span class="label info">{{ $organization->address }}</span>
      </div>

      <div>
        <label>Reporting/ Related Ministry: </label>
        <span class="label info">{{ $organization->related_ministry }}</span>
      </div>


    </div>
        </div>
    </div>
</x-app-layout>