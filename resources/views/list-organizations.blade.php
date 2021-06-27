<x-app-layout>@section('title', 'View Organization Rating')
<div class="container mt-3"><i>Rating organizations helps them improve services.</i></div>
       
      <div class="sitecontent"> 
      <div class="row"> 
      <div class="col-md-12" style="margin:0px auto; width: 100%; margin-top:1rem; text-align:center;">
      <div class="bg-white overflow-hidden shadow-sm p-6 bg-white border-b border-gray-200">
        
      <div class="title">
        <h1 class="h1class">Select an organization to add a rating</h1>
      </div>
      
         <p>If you 'search' and still can't find the organization you want to rate, 
         <a href="{{ route('add-organization', app()->getLocale()) }}">Create organization</a> and add your review rating</p>

            @if(Session::has('sucessrating'))
               <div class="alert alert-success">
               {{ Session::get('sucessrating')}}
               </div>
            @endif

            @if(Session::has('success'))
               <div class="alert alert-success">
               {{ Session::get('success')}}
               </div>
            @endif

            <table class="table table-bordered display"style="width:100%" id="laravel-datatable-crud">
               <thead>
                  <tr>
                     <!-- <th>Id</th> -->
                     <th>Title</th>
                     <th>District</th>
                     <!-- <th>Rating</th> -->
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
    
   </div></div></div></div>       
   </x-app-layout>
    

<script>
     $(document).ready( function () {
      $('#laravel-datatable-crud').DataTable({
           processing: true,
           serverSide: true,
           responsive: true,
          ajax: {
            url: "{{ route('list-organizations', app()->getLocale()) }}",
            type: 'GET',
           },
           columns: [
                    { data: 'title', name: 'title' },
                    { data: 'district', name: 'district', width: "10%" },
                    { data: 'action', name: 'action', width: "25%" }
                 ]
       });
     });
 
   </script>