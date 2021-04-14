<style>
#rate_org {
  background-color: #ffffff;
  margin: 100px auto;
  padding-top: 40px;
  padding-bottom: 40px;
  width: 80%;
  min-width: 300px;
}


input {
  padding: 5px;
  width: 100%;
  font-size: 0.9rem;
  border: 1px solid #aaaaaa;
}

form .error {
  color: #ff0000;
}

/* END WIZARD SLIDER */

/*RATING SLIDER */

/* previews of uploads */
.preview_row {
  display: flex;
}

.preview_column {
  flex: 33.33%;
  padding: 5px;
}

.rating{
  width:60%;
  margin-left: 10px;
  margin-right: 10px;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s
}

#rate_org label{ font-size:0.9rem; padding-top:8px;}
#rate_org input{  font-size:0.9rem; margin-top:2px; padding-top:2px;}
#rate_org span{  font-size:0.8rem; margin-top:2px; padding-top:2px;}
</style>

@section('title', 'Rate organization')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6 ml-4">Rate organization</div> 
     
   </x-slot>

  <div class="sitecontent"> 
  <div class="row"> 
  <div class="col-md-12" style="margin:0px auto; width: 100%; margin-top:1rem; text-align:center;">
  <div class="bg-white overflow-hidden shadow-sm p-6 bg-white border-b border-gray-200">
    
    <div class="title">
      <h1 class="h1class">You are rating {{ $organization->title }}</h1>
    </div>

      @if (session('failrating'))
      <div class="alert alert-danger">
      {{ session('failrating') }}
      </div>
      @endif
        <p style="text-align:center; margin-top:1rem; font-size:0.8rem;">This process would take <span style="color:#678736; font-weight:bold;"> ~3 minitues </span>. Feedback of people, processes, services and products helps organizations improve quality. 
        <!-- Button trigger modal for information popup -->
        <button type="button" onclick="showmodal();" class="glyphicon" id="myBtn">
        <b>How this works: &#9432; </b> 
        </button></p>
        
        <form action="/add_org_rating" method="post" style="margin: -50px auto;" id="rate_org" name="rate_org" enctype="multipart/form-data">
                    @csrf
        <label for="description">Describe why you are rating this organization *</label>
        <input type="text" placeholder="" id="description" name="description">
        <input type="hidden" id="tokenid" name="tokenid" value="{{ $tokenid }}">

        <label>When did you encounter this experience*</label>
        <div class="row">
        <div class="col-md-6">
        From:<input type="date" id="from" onchange="copyDateFromToTo(this.value)" name="from" placeholder="from">
        </div>
        <div class="col-md-6">
        To:<input type="date" class="extrafields" onchange="date_diff_days()" id="to" name="to" placeholder="to">
        </div></div>   

        <label for="officers">Department, Designation/ Names of officers involed* </label>
        <input type="text" id="officers" name="officers" placeholder="i.e. [Services unit, Admin officer: Ruwan Danapala]">

        <div class="row">
        <div class="col-md-6">
        <label for="service_requested">Services you requested from this organization*</label>
        <input type="text" id="service_requested" name="service_requested" placeholder="">
        </div>
        <div class="col-md-6">
        <label for="service_recieved">Services you recived from this organization*</label>
        <input type="text" id="service_recieved" name="service_recieved" placeholder="">
        </div></div>

        <label>Rate organization *</label>

        <div class="slidecontainer">

        <div class="row">
        <div class="col-md-6">
          <small>Poor</small>
          <input type="range" class="rating" min="0" max="100" value="00" class="slider" id="service_quality" name="service_quality">
          <small>Very Good</small><br/>
          <span style="align:center">Service quality: <span id="rating1"></span></span>
        </div>
        <div class="col-md-6">
        <small>Poor</small> 
          <input type="range" class="rating" min="0" max="100" value="00" class="slider" id="process_clarity" name="process_clarity">
          <small>Very Good</small><br/>
          <span style="align:center">Guidance and Information on Process: <span id="rating2"></span></span>
        </div></div>

        <div class="row">
        <div class="col-md-6">
        <small> Poor</small>
          <input type="range" class="rating" min="0" max="100" value="00" class="slider" id="efficiency_timeliness" name="efficiency_timeliness">
          <small> Very Good </small><br/>
          <span>Punctuality and Efficiency: <span id="rating3"></span></span>
          </div>
          
          <div class="col-md-6">
          
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="admin" name="admin" onclick="corruption()" value="admin">
          <label class="form-check-label" for="admin"><small>Administrative</small></label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="executive" name="executive" onclick="corruption()" value="executive">
          <label class="form-check-label" for="executive"><small>Executive</small></label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="political" name="political" onclick="corruption()" value="political" >
          <label class="form-check-label" for="political"><small>Political</small></label>
        </div>
        <br/>
          <span>Corruption, Bribery, Malpractices: <span id="rating4"></span>/100</span>
          </div></div>
      

        <div class="row">
        <div class="col-md-6">
        <label for="no_days">Number of days taken to provide service </label>
        <input type="text" placeholder="" id="no_days" name="no_days" class="extrafields">
        </div>
        <div class="col-md-6">
        <label for="reference_no">Reference numbers of your file/ recipt if any</label>
        <input type="text" id="reference_no" name="reference_no" placeholder="" class="extrafields">
        </div></div>

        <label for="evidence">Evidence upload [not mandatory]</label>

        <div class="row">
          <div class="col-md-4">
          <input type="file" name="evidence[]" id="evidence" placeholder="Choose files" multiple > </div>
          <div class="col-md-8">
          <input type="button" id="evidence_submit" value='Upload' class="btn" style="width:6rem; background-color:#e5e7eb"></div></div>
          @error('evidence')
          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
          <!-- Preview -->

        <div  id='preview' class="preview_row"> </div>

        <br>
        <label for="msg_to_org">Message to organization </label>
        <input type="text" placeholder="" id="msg_to_org" name="msg_to_org" class="extrafields">
        <br>
        <label for="send_user_information_to_authorities">Send this rating to the organization with all information I have shared here. <a id="ratingterms" onclick="showmodal();" href="#">(Subject to terms and conditions)</a></label>
        <input type="checkbox" id="send_user_information_to_authorities" name="send_user_information_to_authorities" value="1">
        <br>
        <label for="correct_information">I confirm the above information is true and correct to the best of my knowledge</label>
        <input type="checkbox" checked id="correct_information" name="correct_information" value="1">

        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit" >

        </form>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>How this works.</h3>
    
    1. You report <br>
    2. Volunteers review the report <br>
    3. Volunteers submits reports for each organization <br>
    4. We send a copy of reports to higher authorities if relavant. <br><br>

    * Our process is entirely voluntary and may not be active on some occasions. 
  </div>
</div>

<!-- end top divs -->
</div></div></div></div>
</x-app-layout>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function showmodal() {
  modal.style.display = "block";
}

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


<script>

 //update the number of days value if it is null
//  function updateNoDays(){ //console.log("2");
//  if(document.getElementById("no_days").value == "" || "NaN"){
//     date_diff_days();
//   }
//  }

// date functions
function copyDateFromToTo(dt){
  document.getElementById("to").value = dt;
  date_diff_days();
}

function date_diff_days(){
dt1 = new Date(document.getElementById("from").value);
dt2 = new Date(document.getElementById("to").value);

if(dt1 != "" || null || "NaN" || "undefined"){ 
var ndays = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24))
document.getElementById("no_days").value =  (ndays <= 0) ? 1 : ndays;
}}

//end date functions

</script>
<!-- end wizard -->

<!-- rating sliders -->
<script> 
// service_quality_slider
var service_quality = document.getElementById("service_quality");
var service_quality_rating = document.getElementById("rating1");
service_quality_rating.innerHTML = service_quality.value; // Display the default slider value

service_quality.oninput = function() {
  service_quality_rating.innerHTML = this.value;
}

// service_quality_slider
var process_information = document.getElementById("process_clarity");
var process_information_rating = document.getElementById("rating2");
process_information_rating.innerHTML = process_information.value; // Display the default slider value

process_information.oninput = function() {
  process_information_rating.innerHTML = this.value;
}

// service_quality_slider
var timeliness = document.getElementById("efficiency_timeliness");
var timeliness_rating = document.getElementById("rating3");
timeliness_rating.innerHTML = timeliness.value; // Display the default slider value

timeliness.oninput = function() {
  timeliness_rating.innerHTML = this.value;
}

// corruption
var bribery_rating = document.getElementById("rating4");
var admin, executive, political, points;
function corruption(){
   points = 0;
   admin = document.getElementById("admin");
   executive = document.getElementById("executive");
   political = document.getElementById("political");

  // If the checkbox is checked, display the output text
  if (admin.checked == true){
    points += 25;
  }
  if (executive.checked == true){
    points += 25;
  }
  if (political.checked == true){
    points += 50;
  }
  bribery_rating.innerHTML = points;
}




</script>
<!-- end rating sliders -->

<!-- file upload with preview -->

<script >
$(document).ready(function(){
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='rate_org']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      description: "required", correct_information: "required",
      from: "required", officers: "required", service_requested: "required",  service_recieved: "required", 
    },
    // Specify validation error messages
    messages: {
      description: "Please enter why you are rating this organization",
      correct_information: "Please confirm the above information is true"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });


// evidecne ajax upload
$('#evidence_submit').click(function(){

   var form_data = new FormData();

   // Read selected files
   var totalfiles = document.getElementById('evidence').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("evidence[]", document.getElementById('evidence').files[index]);
   }

   // AJAX request
   $.ajax({
     url: "/upload-evidence", 
     type: 'post',
     data: form_data,
     dataType: 'json',
     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
     contentType: false,
     processData: false,
     success: function (response) {
       for(var index = 0; index < response.length; index++) {
         var src = response[index];
         // console.log(src.path)
         // Add img element in <div id='preview'>
         $('#preview').append('<div class="preview_column"><img src="/'+src.path+'" width="50px;" height="50px"><input type="hidden" name="evidence_path[]" value="/'+src.path+'"></div>');
       }

     }
   });
});

});
</script>