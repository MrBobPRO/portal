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

      <div class="subject accordion" id="accordionSubject">

         @foreach ($subjects as $subject)
             
            <div class="subject accordion-item">
               <h2 class="subject accordion-header" id="heading{{ $subject->name }}">
                  <button class="subject accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $subject->name }}" aria-expanded="true" aria-controls="collapse{{ $subject->name }}">
                     {{ __($subject->name) }}
                  </button>
               </h2>
               <div id="collapse{{ $subject->name }}" class="subject accordion-collapse collapse" aria-labelledby="heading{{ $subject->name }}" data-bs-parent="#accordionSubject">
                  <div class="subject accordion-body">

                     <div class="accordion" id="accordion{{ $subject->name }}">

                        @foreach ($subjectcats as $subjectcat)
                           @if ($subjectcat->subject_id == $subject->id)

                              <div class="accordion-item">  
                                 <h2 class="accordion-header" id="heading{{ $subjectcat->id }}">
                                    <button class="subjectcat accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $subjectcat->id }}" aria-expanded="true" aria-controls="collapse{{ $subjectcat->id }}">
                                       {{ __($subjectcat->name) }}
                                    </button>
                                 </h2>
                                 <div id="collapse{{ $subjectcat->id }}" class="subjectcat accordion-collapse collapse" aria-labelledby="heading{{ $subjectcat->id }}" data-bs-parent="#accordion{{ $subject->name }}">
                                    <div class="subjectcat accordion-body">
                                       
                                       <ul class="mat-list">

                                          @foreach ($materials as $material)
                                             @if ($material->subjectcat_id == $subjectcat->id)
                  
                                                <li class="mat-items">
                                                   @if ($material->type == 'book')
                                                      <a href=" {{ route('knowledge.books.index', $material->id) }} "> {{ __($material->name) }} </a>   
                                                   @elseif ($material->type == 'video')
                                                      <a href=" {{ route('knowledge.videos.index', $material->id) }} "> {{ __($material->name) }} </a>
                                                   @endif   
                                                </li> 
                  
                                             @endif
                                          @endforeach 
                                          
                                       </ul>

                                    </div>
                                 </div>
                              </div> 

                           @endif
                        @endforeach
                        
                     </div>

                  </div>
               </div>
            </div>

         @endforeach


   </section>
   
@endsection