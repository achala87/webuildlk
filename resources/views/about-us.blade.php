@section('page_description', 'Buildlk is a volunteer effort by citizens of Sri Lanka and a few expatriates from a diverse range of proffesions to face the reality of government lead corruption and national failures by providing information and proactive solutions')
@section('page_keywords', 'Sri Lankan citizens, voluneering for nation building, uplift sri lanka, corruption free sri lanka, about the people behind buildlk')
@section('page_author', 'Volunteers of buildlk')
@section('title', 'About us')

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
        <h1 class="h1class">About us</h1>
      </div>

      <p class="pclass">The people behind #webuildlk are average citizens of Sri Lanka. The order of member profiles change on each page load - we are a flat group who follow a merit based system for descision making.</p>

      <p class="pclass">Buildlk is a volunteer effort by citizens of Sri Lanka and a few expatriates from a diverse range of proffesions to face the reality of government lead corruption and national failures by providing information and proactive solutions</p>

      <div class="card gallerycard"> 
            <img src="{{url('/profiles/achala.jpeg')}}" alt="achala-profile-picture"  width="100px;" height="120px">
            <div class="container">
                  <h4><b>Achala Arunalu</b></h4>
                  <h5>ICT Professional, entreprenuer and nature conservationist</h5>
                  <a href = "mailto: achala.meddegama@gmail.com">achala.meddegama@gmail.com</a>
                  <p>Over 12 years experinece in IT and is the founder of Reforest Sri Lanka. 
                  He has experience in IT, Agriculture, Tourism and social entrepreneurship.
                  </p>
            </div>
      </div>

      <div class="card gallerycard">
            <img src="img_avatar.png" alt="Avatar" style="width:100%">
            <div class="container2">
                  <h4><b>Madhura Rasanjaya</b></h4>
                  <h5>Telecommunications Engineer, father and social activist</h5>
                  <a href = "mailto:madhura.somaweera@gmail.com">madhura.somaweera@gmail.com</a>
                  <p>Over 14 years in Telecommunications as a senior manager. 
                  He is an avid social worker in his spare time volunteering with the Cancer hospital, Reforest Sri Lanka, Local Dhamma school.</p>
            </div>
      </div>

      <div class="card gallerycard">
            <img src="img_avatar.png" alt="Avatar" style="width:100%">
            <div class="container2">
                  <h4><b>Shiran Vidanapathirana</b></h4>
                  <h5>Lawyer, Husband and Seeker of a just society</h5>
                  <a href = "mailto:shirankandy@gmail.com">shirankandy@gmail.com</a>
                  <p>Is a lawyer and an academic lecturer at the University of Peradeniya.  
                 He is a promoter of public interest litigation and supports social work and is a committee member of Reforest Sri Lanka</p>
            </div>
      </div>
      
      <div class="card gallerycard">
            <img src="img_avatar.png" alt="Avatar" style="width:100%">
            <div class="container2">
                  <h4><b>Jayantha Sirisena</b></h4>
                  <h5>Software Engineer, father and humanitarian</h5>
                  <a href = "mailto: jayanthakgjls@gmail.com">jayanthakgjls@gmail.com</a>
                  <p>Jayantha is a self made technology professional with a BSc from CSE, University of Moratuwa. He is a regular reforester with Reforest Sri Lanka and supports other humanitarian causes such as public healthecare and social support schemes.</p>
            </div>
      </div>

      <div class="card gallerycard">
            <img src="{{url('/profiles/nalika.png')}}" alt="nalika-profile-picture"  width="100px;" height="120px">
            <div class="container2">
                  <h4><b>Nalika Ulapane</b></h4>
                  <h5>Research scientist - BSc.Engineering, PhD</h5>
                  <a href = "mailto: nalika.ulapane@gmail.com">nalika.ulapane@gmail.com</a>
                  <p>Nalika is a researcher from Australia. He received a B.Sc. degree in electrical and electronic engineering from the University of Peradeniya, Sri Lanka, in 2011, and a Ph.D. degree in electrical and electronics engineering from the University of Technology Sydney (UTS), Australia, in 2016. He has then gone on to serve research fellowships at UTS and the University of Melbourne. His research work has revolved around mathematical modeling, machine learning, sensor technologies, and infrastructure robotics.</p>
            </div>
      </div>

</div></div></div></div>       
</x-app-layout>   
    
<script>
var cards = $(".gallerycard");
for(var i = 0; i < cards.length; i++){
    var target = Math.floor(Math.random() * cards.length -1) + 1;
    var target2 = Math.floor(Math.random() * cards.length -1) +1;
    cards.eq(target).before(cards.eq(target2));
}
</script>
