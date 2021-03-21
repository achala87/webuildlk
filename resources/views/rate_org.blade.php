<style>
/*WIZARD */
* {
  box-sizing: border-box;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

/* END WIZARD SLIDER */

/*RATING SLIDER */
.slider {
  width: 320px;
  height: 2px;
  background: rgba(0, 0, 0, 0.2);
  border-radius: 2px;
  position: relative;
}
.slider .ui-slider-range {
  border-radius: 2px;
  background: #000;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
}
.slider .ui-slider-handle {
  cursor: move;
  cursor: grab;
  cursor: -webkit-grab;
  width: 32px;
  height: 32px;
  position: absolute;
  outline: none;
  top: 0;
  z-index: 1;
  border-radius: 50%;
  background: #fff;
  box-shadow: 0 2px 7px rgba(0, 0, 0, 0.2);
  margin: -1px 0 0 0;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  transition: box-shadow .3s ease;
}
.slider .ui-slider-handle .smiley {
  position: absolute;
  left: 50%;
  bottom: 100%;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid #000;
  opacity: 0;
  -webkit-transform: translate(-50%, -12px);
          transform: translate(-50%, -12px);
  transition: all .3s ease 0s;
}
.slider .ui-slider-handle .smiley:before, .slider .ui-slider-handle .smiley:after {
  content: '';
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: #000;
  position: absolute;
  top: 8px;
}
.slider .ui-slider-handle .smiley:before {
  left: 7px;
}
.slider .ui-slider-handle .smiley:after {
  right: 7px;
}
.slider .ui-slider-handle .smiley svg {
  width: 16px;
  height: 7px;
  position: absolute;
  left: 50%;
  bottom: 5px;
  margin: 0 0 0 -8px;
}
.slider .ui-slider-handle .smiley svg path {
  stroke-width: 3.4;
  stroke: #000;
  fill: none;
  stroke-linecap: round;
}
.slider .ui-slider-handle.ui-state-active {
  cursor: grabbing;
  cursor: -webkit-grabbing;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.32);
}
.slider .ui-slider-handle.ui-state-active + .text {
  -webkit-transform: translate(0, -80px);
          transform: translate(0, -80px);
  transition: -webkit-transform .3s ease 0s;
  transition: transform .3s ease 0s;
  transition: transform .3s ease 0s, -webkit-transform .3s ease 0s;
}
.slider .ui-slider-handle.ui-state-active .smiley {
  opacity: 1;
  -webkit-transform: translate(-50%, -12px);
          transform: translate(-50%, -12px);
  transition: all .3s ease .1s;
}
.slider .text {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-between;
  -webkit-transform: translate(0, -44px);
          transform: translate(0, -44px);
  transition: -webkit-transform .3s ease .2s;
  transition: transform .3s ease .2s;
  transition: transform .3s ease .2s, -webkit-transform .3s ease .2s;
  font-size: 16px;
}
.slider .text strong {
  color: #000;
  font-weight: bold;
}


* {
  box-sizing: inherit;
}
*:before, *:after {
  box-sizing: inherit;
}
/*END RATING SLIDER */

</style>
@section('title', 'Rate Organization')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6"> Rate organization</div> 
     
   </x-slot>

    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
        You are rating {{ $organization->title }}
        </h3> </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
        

            <form style="margin: 10px auto;" id="regForm" action="">



<!-- One "tab" for each step in the form: -->
<div class="tab">
<label>Describe why you are rating this organization *</label>
<p><input type="text" placeholder="" oninput="this.className = ''"></p>

<label>When did you encounter this experience *</label>
<p>From:<input type="date" id="from" onchange="copyDateFromToTo(this.value)" name="from" placeholder="from" oninput="this.className = ''"></p>
<p>To:<input type="date" class="extrafields" id="to" name="to" placeholder="to" oninput="this.className = ''"></p>
    
<label>Unit, Designation/ Names of officers involed * </label>
<p><input type="text" placeholder="i.e. [Services unit, Admin officer: Ruwan Danapala] and separate with a - multiple staff details" oninput="this.className = ''"></p>

<label>Reference numbers of your file if any</label>
<p><input type="text" placeholder="" class="extrafields" oninput="this.className = ''"></p>

<label>Services you requested from this organization *</label>
<p><input type="text" placeholder="" oninput="this.className = ''"></p>

<label>Services you recived from this organization *</label>
<p><input type="text" placeholder="" oninput="this.className = ''"></p>

<label>Rate organization *</label>

<div class="slider">
    <div class="ui-slider-handle">
        <div class="smiley">
            <svg viewBox="0 0 34 10" version="1.1">
                <path d=""></path>
            </svg>
        </div>
    </div>
    <div class="text">
        <span>Current Value</span>
        <strong>-</strong>
    </div>
</div>

Service recieved was valuable & worth the time and effort spent

Service quality 

Efficiency and speed of service

Guidance and information on process

Transparency of procedures and activities 

Customer focus 

Involvement of bribery and corruption
</div>

<div class="tab">

<label>Number of days taken to provide service </label>
<p><input type="text" placeholder="" class="extrafields" oninput="this.className = ''"></p>

<label>If you have, please attach any evidence to base this rating on [not mandatory]</label>
<p><input type="text" placeholder="" class="extrafields" oninput="this.className = ''"></p>

<label>Message to organization </label>
<p><input type="text" placeholder="" class="extrafields" oninput="this.className = ''"></p>

</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>
 
           
    </div>
    </div>
</x-app-layout>

<!--wizard -->
<script> 
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function copyDateFromToTo(dt){
  document.getElementById("to").value = dt;
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") { 
        if (y[i].classList.contains("extrafields")) { break; }
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
<!-- end wizard -->

<!-- rating sliders -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <script>var step = 10;

$(".slider").each(function () {
    var self = $(this);
    var slider = self.slider({
        create: function () {
            self.find('.text strong').text(self.slider('value'));
            setPathData(self.find('.smiley').find('svg path'), self.slider('value'));
        },
        slide: function (event, ui) {
            self.find('.text strong').text(ui.value);
            setPathData(self.find('.smiley').find('svg path'), ui.value);
        },
        range: 'min',
        min: 1,
        max: step,
        value: 1,
        step: 1 });

});

function setPathData(path, value) {
    var firstStep = 6 / step * value;
    var secondStep = 2 / step * value;
    path.attr('d', 'M1,' + (7 - firstStep) + ' C6.33333333,' + (2 + secondStep) + ' 11.6666667,' + (1 + firstStep) + ' 17,' + (1 + firstStep) + ' C22.3333333,' + (1 + firstStep) + ' 27.6666667,' + (2 + secondStep) + ' 33,' + (7 - firstStep));
}</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- end rating sliders -->