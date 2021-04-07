@section('title', 'Organizations')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6"> Manage organizations</div> 
       <div class="col-md-6"> <a href="{{ url('add-organization') }}" class="text-center btn btn-success mb-1">Create organization</a></div> 
   </x-slot>

    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Select an organization to view details or add a report
        </h2> </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @if (session('success-rating'))
            <div class="alert alert-success">
            {{ session('success-rating') }}
            </div>
            @endif
            <div class="container mt-4">
            
            <table class="table table-bordered" id="laravel-datatable-crud">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Title</th>
                     <th>District</th>
                     <th>Rating</th>
                     <th>Description</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>


            </div>
        </div>
    </div>
</x-app-layout>

<script>
     $(document).ready( function () {
      $('#laravel-datatable-crud').DataTable({
           processing: true,
           serverSide: true,
          ajax: {
            url: "{{ url('list-organizations') }}",
            type: 'GET',
           },
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'district', name: 'district' },
                    { data: 'avg_rating', name: 'avg_rating' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action' }
                 ]
       });
     });

     $('body').on('click', '.deleteOrganization', function () {
 
        var org_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
          $.ajax({
              type: "get",
              url: "{{ url('delete-organization') }}"+'/'+org_id,
              success: function (data) {
              var oTable = $('#laravel-datatable-crud').dataTable(); 
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
       }
    });   
  
   </script>