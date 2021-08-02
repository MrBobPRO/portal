@extends('templates.no_sidebar_master')

@section('content')
@include('templates.breadcrumbs')

<section class="single-questionnaire-page">
   <div class="question-container">
      {{-- Show private text if its private questionnaire --}}
      @if($question->private)
         <p class="private-text"><span class="material-icons">lock</span> Приватное логосование !</p>
      @endif

      <p class="question-text">{{$question->text}}</p>

      <div class="options-list">
         <?php 
            // used in modals as id
            $counterrr = 1;
         ?>

         @foreach ($question->options as $option)
            <?php
               // calculate totalPercentage 
               $choicesCount = $option->choices()->count();
               // $max_options_choices_count count declared in controller. Escaping division by ZERO
               if($max_options_choices_count == 0) $totalPercentage = 0;
               else $totalPercentage = ($choicesCount * 100) / $max_options_choices_count;

               //calculate percentage of options choices
               // $total_choices_count count declared in controller. Escaping division by ZERO
               if($total_choices_count == 0) $choicesPercentage = 0;
               else $choicesPercentage = round((($choicesCount * 100) / $total_choices_count), 1); 
            ?>
            <div class="single-option">
               <div class="option-text" data-bs-toggle="modal" data-bs-target="#qsModal{{$counterrr}}">
                  <p>{{$option->text}}</p>
                  <div></div>
                  <div class="choice-percentage" style="width: {{$totalPercentage}}%"></div>
                  <div class="choice-percentage-numeric">{{$choicesPercentage}}%</div>
               </div>

               {{-- Like or Remove like forms --}}
               {{-- If users has voted this options --}}
               @if($option->id == $users_choice_option_id)
                  <form action="/options/remove_like" method="POST">
                     @csrf
                     <input type="hidden" value="{{$question->id}}" name="question_id">
                     <input type="hidden" value="{{$option->id}}" name="option_id">
                     <button type="submit"><span class="material-icons-outlined">favorite</span></button>
                     <p>{{ $option->choices()->count()}}</p>
                  </form>
               {{-- else If users hasnt voted this options --}}
               @else
                  <form action="/options/like" method="POST">
                     @csrf
                     <input type="hidden" value="{{$question->id}}" name="question_id">
                     <input type="hidden" value="{{$option->id}}" name="option_id">
                     <button type="submit"><span class="material-icons-outlined">favorite_border</span></button>
                     <p>{{ $option->choices()->count()}}</p>
                  </form>
               @endif

               {{-- show users modal if questionnaire isnt private--}}
               @if(!$question->private)
               <div class="modal fade qs-modal" id="qsModal{{$counterrr}}" tabindex="-1" aria-labelledby="#qsModal{{$counterrr}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="qsModal{{$counterrr}}Label">
                           <span class="material-icons-outlined">favorite</span> {{__('Проголосовали')}} {{$choicesCount}} / {{$total_choices_count}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        @foreach ($option->choices as $choice)
                           <div class="modal-user-item">
                              <img src="{{ asset('img/users/' . $choice->user->avatar)}}"> {{$choice->user->name}} {{$choice->user->surname}}
                           </div>
                        @endforeach
                      </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="main-btn" data-bs-dismiss="modal">{{__('Закрыть')}}</button>
                      </div>

                    </div>
                  </div>
               </div>
               @endif
               {{-- show users modal end--}}

               {{-- increment counter --}}
               <?php $counterrr++; ?>
            </div>
         @endforeach
      </div>

   </div>

</section>

@endsection