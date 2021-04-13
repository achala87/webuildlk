@section('title', 'Centralized cities and constitution')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-12 ml-4"><i>WeBuildLk is a citizen initiative to sustainably develop a corruption free Sri Lanka</i></div> 
    </div>
   </x-slot>

   <div class="sitecontent"> 
    <div class="row"> 
    <div class="col-md-12" style="margin:0px auto; width: 100%; margin-top:1rem; text-align:center;">
    <div class="bg-white overflow-hidden shadow-sm p-6 bg-white border-b border-gray-200">
        
      <div class="title">
        <h1 class="h1class">Sri Lanka is currently developed in a way it would become an unsustainable island city.<br/> Centralized cities & vast areas for nature key for sustainable development of Sri Lanka.</h1>
      </div>
      
      <p class="pclass">Small colonies, towns and villages increase capital and maintainance costs, increases chances of failures of public services, administration, infrastructure and logistics. It also destroys large areas of natural resources we must conserve for eco-systems services we all need to live a healthy and happy life.</p>
      
      <h2 class="h2class">Constitution preamble amendment</h2>

       <p  class="pclass"> Preamble of the Constitution amended to include  
  "Protection of the Environment" & to "Seek peace and never to see the horrors of War".  </p>

  <h2 class="h2class">Environment</h2>
  <ol type="1" class="d">
  <li> Environmental Fundamental Rights entitles every citizen and organization to a clean and healthy environment, plentiful clean and free air, water and other natural eco-system   services. </li>
  <li>
  The state to protect over 50% of the nation’s land area as forests for wildlife and sustenance of our natural resources which support combating climate   change. </li>
  <li>
  To centralize human colonization to vertical cities, reducing infrastructure costs required otherwise to spread resources over vast distances, promoting a higher quality of life and sustainable development. </li>
  <li> 
  A special committee chaired by the CEA and the Ministry of Environment, made up of civil society and ministerial officers called the ECFMDA committee   (Environmental conservation first managed development action plan committee) to coordinate policy and action directives. </li>
  <button onclick="myFunction()" id="myBtn" style="color:darkolivegreen; margin:0 auto; display:block; font-size:12px; font-weight:bold">Read more</button>
  <span id="dots">...</span>
    <span id="more" class="hidden">
    <ol class="q">
    <li>
    The ECFMDA can induct Green Tribunals for dispute resolution, and makes the EIA process mandatory for medium and large-scale projects. EIAs to be carried out by the   CEA to ensure unbiased, accountable reporting. </li>
    <li>
    The ECFMDA committee to liase with the Ministry of Justice to amend and update environmental legislation and punitive measures to legal action will be too costly to   justify crimes. </li>
    <li>
    The ECFMDA committee to draft and implement environmental restoration and protection activities. </li>
    <li>
    The ECFMDA committee will define annual and three-year Key performance indicators. </li>
    <li>
    The ECFMDA members to be compensated at the highest levels of government pay scales. </li>
    <li>
    Schedule of projects, action points and approvals, project documentation, long and   short-term activities of the ECFMDA to be publicly shared over a web portal which is   kept up-to-date and accessible for transparency. </li>
    <li>
    The ECFMDA committee to provide necessary tools and support for conservation efforts of the Department of Wildlife Conservation and the Department of Forest Conservation. </li>
    <li>
    The ECFMDA members would be subject to a strict annual audit by the AG and the CID to ensure they are not biased for private interests which are unconstitutional.</li>
    </ol>


    <p class="pclass">The state should also be responsible for adinistration and regulation of civc activities and it's own activities in a way that would create a better and just life for all people.</p>

    <h3 class="h3class">The state to:</h3>
    <ol class="q">
    <li>Eliminate or drastically reduce use of single use and packaging plastics within a short period. </li>
    <li>Extend and Conserve Hydrological resources and actively promote sustainable renewable energy sources and their regenerative sources. </li>
    <li>Hold environmental governance and regulation under one Ministerial portfolio via the Minister of Environment. </li>
    <li>Hold sovereignty over all national natural resources. </li>
    <li>Regulate and empower legislation of wildlife protected areas. </li>
    <li>Govern Property ownership, Colonization and industrialization for sustainable development. </li>
    <li>Develop Healthy Living Environment</li>
    </ol>

    <h2 class="h2class">Why the environment should be safe guarded for the benefit of all.</h2>

    <ol class="q">
    <li>Corruption destroys the nations ability to uphold the rule of law and our fundamental rights.   It destroys Financial stability and leads to the dcline of economies. 
    <li>When public finance and the economy fails, the environment is the first to suffer as poverty   stricken peoples in indebted states in a highly inflated cash market has no other valuable asset   to sell other than those we are only supposed to be custodians of, our nature. </li>
    <li>When National Security fails, finance and economy of the nation fails, leading the above situation. </li>
    <li>When National Security fails, the environment is abused via illicit activities and is held hostage.   When the Environment fails, the National Security of the nation also fails. I.e. Sri Lanka has been   listed in the most climate risk vulnerable nations for the past 5-10 years. </li>
    <li>When National Security fails, our Fundamental rights are not upheld. We will have to suffer the   consequences of acts of terrorism, of war, of autocracies and military juntas. </li>
    <li>Corruption leads to the decline of our ability to protect our Fundamental rights and the   decline of the upholding of our FR leads to corruption and risks National Security. </li>
    <li>Corruption directly devastates our Environment. </li>
    <li>When the Environment fails provide intergenerational equity and value necessary for sustainable   development leading to a content, secure, healthy, abundant life, our FR are not upheld. </li>
    </ol>
    <p class="pclass">
    The importance of Health, Education, Industry and Technology and the many facets of a nations  development should not be second-handed to those described above. Some ideas such as the  use of technological tools and automation to bring about efficiency and transparency is touched  upon the constitutional components developed as well. 
    When the Environment fails due to our mismanagement of her resources or overconsumption,  everything else fails. 
    </p>
    </ol>
    </span>

</div></div></div></div>
  
</x-app-layout>

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
</script>