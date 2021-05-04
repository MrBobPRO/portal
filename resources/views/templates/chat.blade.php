{{-- used in JS on ajaxChatUpdate --}}
<script>var lastMsgId = {{$lastMsgId}};</script>

<button onclick="showChat()" id="show_chat_btn"><span class="material-icons-outlined">chat</span></button>
<div class="chat-container {{session('chat') == 'hidden' ? 'hidden-chat' : ''}}" id="chat">
   <div class="chat-header">Групповой чат 
      <button onclick="hideChat()"><span class="material-icons-outlined">keyboard_arrow_down</span></button>
   </div>
   <div class="chat-body" id="chat_body">
      @foreach ($chat as $c)
         {{-- Alight right users msg --}}
         @if($c->user_id == \Auth::user()->id)
            <div class="chat-item users-msg">
               <?php $u = App\Models\User::find($c->user_id) ?>
               <div>
                  <h6>{{$u->name}}</h6>
                  <p>{{$c->text}}</p>
                  <span>
                  <?php 
                     $date = \Carbon\Carbon::parse($c->created_at)->locale('ru');
                     $formatted = $date->isoFormat('H:mm');
                  ?>
                  {{$formatted}}
               </span>
            </div>
            <img src="{{asset('img/users/' . $u->avatar)}}">
            </div>
            {{-- Else if its not users msg --}}
         @else 
            <div class="chat-item">
               <?php $u = App\Models\User::find($c->user_id) ?>
               <img src="{{asset('img/users/' . $u->avatar)}}">
               <div>
                  <h6>{{$u->name}}</h6>
                  <p>{{$c->text}}</p>
                  <span>
                     <?php 
                        $date = \Carbon\Carbon::parse($c->created_at)->locale('ru');
                        $formatted = $date->isoFormat('H:mm');
                     ?>
                     {{$formatted}}
                  </span>
               </div>
            </div>
         @endif
      @endforeach
   </div>

   <form method="POST" id="chat_push" onsubmit="ajax_chat_push()">
      <input type="text" id="chat_input" name="text" autocomplete="off" placeholder="Начните общатся...">
      <button type="button"><span class="material-icons">send</span></button>
   </form>
</div>