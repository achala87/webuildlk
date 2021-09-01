 @extends('layouts.admin')

 <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6">D-Add organization</div> 
     
   </x-slot>

    @section('content')
      <div class="container">
        <table class="table" >
          <thead class="thead-dark">
            <tr>
              <th scope="col">Model</th>
              <th scope="col">Action</th>
              <th scope="col">User</th>
              <th scope="col">Time</th>
              <th scope="col">Old Values</th>
              <th scope="col">New Values</th>
            </tr>
          </thead>
          <tbody id="audits">
            @foreach($audits as $audit)
              <tr>
                <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
                <td>{{ $audit->event }}</td>
                <td>{{ $audit->user->name }}</td>
                <td>{{ $audit->created_at }}</td>
                <td>
                  <table class="table">
                    @foreach($audit->old_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
                <td>
                  <table class="table">
                    @foreach($audit->new_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    @endsection