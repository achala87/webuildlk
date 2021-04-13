@section('title', 'Coming Soon')
<x-app-layout>
   <x-slot name="header">
       <div class="row"> 
       <div class="col-md-6"><i>WebuildLk is a citizen initiative to sustainably develop Sri Lanka</i></div> 
    </div>
   </x-slot>
   
<x-guest-layout>

        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        
        <div class="row"> 
       <div class="col-md-12">
        <div style="margin:0px auto; width: 100%;  margin-top:50px; text-align:center;">
        
        <div class="bg-white overflow-hidden shadow-sm ">
        <div class="p-6 bg-white border-b border-gray-200">
        <h2>Coming Soon!!!</h2>
        </div></div>
        
        </div></div></div>
        </x-guest-layout>
</x-auth-card>

