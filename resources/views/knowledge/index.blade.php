@extends('templates.master')
@section('content')
   
   <section class="knowledge-page">
      
      <div class="knowledge-header">

         <h3 class="title"> {{ __('Центр знаний') }} </h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href=" {{ route('home.index') }} "> {{ __('Главная') }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Центр знаний') }}</a>
            </li>
         </ul>  

      </div>

      <nav>
         <ul class="subject-list">

            @foreach ($subjects as $subject)

               <li class="subject-items">
                  <h3> {{ $subject->name }} </h3>
                  <ul class="subjectcat-list">

                     @foreach ($subjectcats as $subjectcat)
                        @if ($subjectcat->subject_id == $subject->id)

                           <li class="subjectcat-items">
                              <h4> {{ $subjectcat->name }} </h4>
                              <ul class="material-list">

                                 @foreach ($materials as $material)
                                    @if ($material->subjectcat_id == $subjectcat->id)
             
                                       <li class="material-items">
                                          <a href="#"> {{ $material->name }} </a>
                                       </li>

                                    @endif                                       
                                 @endforeach

                              </ul>
                              
                           </li>

                        @endif
                     @endforeach

                  </ul>
               </li>

            @endforeach
            
         </ul>
      </nav>

   </section>
   
@endsection