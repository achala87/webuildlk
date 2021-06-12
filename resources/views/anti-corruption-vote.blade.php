@section('title', 'Vote for corruption free politicians')
@section('page_description', 'Vote for corruption free politicians in Sri Lanka, reject corruption and sand together. As Sri Lankan citizens we must force corruption out of parilament even if it means rejecting the traditional political parties and politicians. Pledge with us to do your duty to stand for justice and meritocracy.')
@section('page_keywords', 'Vote for corruption free politicians, Fight corruption in Sri Lanka, Citizens united for a corruption free Sri Lanka')
@section('page_author', 'BuildLK')
<x-app-layout>

    <div class="container mt-3"><i>BuildLk is a citizen initiative to sustainably develop a corruption free Sri Lanka</i></div>
 

      <div class="sitecontent"> 
      <div class="row"> 
      <div class="col-md-12" style="margin:0px auto; width: 100%; margin-top:1rem; text-align:center;">
      <div class="bg-white overflow-hidden shadow-sm p-6 bg-white border-b border-gray-200">
        
        <div class="title">
          <h1 class="h1class">Let us reform and rebuild the nation together.</h1> 
        </div>

       @if (session('sucessrating'))
      <div class="alert alert-success">
      {{ session('sucessrating') }}
      </div>@endif
      @if (session('failrating'))
      <div class="alert alert-danger">
      {{ session('failrating') }}
      </div>@endif

        

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('make-pledge', app()->getLocale()) }}" method="post" id="rate_org" name="rate_org" enctype="multipart/form-data">
            @csrf
            <p>We need one more person to join us... you.</p>
            <ul class="list-group">            
                @foreach($pledges as $pledge)
                <li class="list-group-item">
                <p style="color:black; font-size:0.9rem; padding:0px;"> {{$pledge->pledge}}</p>
                  I make this pledge: <input type="checkbox" name="pledge[]" value="{{$pledge->pledge_id}}" />
                   {{$pledge->hash_tags}}
                   <button type="button" class="glyphicon fltrightbtn pledgebtn" onClick="popup(this)" id="{{$pledge->pledge_id}}">
                  <b>Learn more: &#9432; </b></button> 
                </li>
                <div id="popupmsg{{$pledge->pledge_id}}" style="display:none;"> {!! $pledge->description !!}</div>
                @endforeach
        
                </ul>

                <x-button class="ml-3" style="margin:1rem;">
                    {{ __('Submit') }}
                </x-button>
            </form>
        </div>
        
        <!-- Pledge 1 against 225 -->
        <div id="modal" class="modal">
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <div id="popupc"> </div>
        </div></div>

    </div></div></div></div>
    </x-app-layout>        

<script>
var popupmsg = "";
function popup(e){
  popupmsg = document.getElementById("popupmsg"+e.id+"").innerHTML;

  document.getElementById("popupc").innerHTML = "";
  document.getElementById("popupc").innerHTML = popupmsg;
  modal.style.display = "block";
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

