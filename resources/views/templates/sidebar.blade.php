
<div id="sidebar" class="sidebar">
   <div class="birthdays">
      <h1>День рождении
         <span class="material-icons-outlined">star</span>
      </h1>
      
      <div class="single-birthday">
         <img src="{{asset('img/users/b1.jpg')}}">
         <span>Сегодня</span>
         <p>Нурова Шакира</p>
      </div>

      <div class="single-birthday">
         <img src="{{asset('img/users/b2.jpg')}}">
         <span>Завтра</span>
         <p>Расул Икромов</p>
      </div>
   </div>

   <div class="sidebar-news">
      <h1>Последние новости
         <span class="material-icons-outlined">article</span>
      </h1>

      @foreach($latest_news as $new)
         <div class="sidebar-single-news">
            <a href=" {{ route('news.single', $new->id) }} ">
               <img src="{{ asset('img/news/' . $new->image) }}" alt="Loading...">
               <h4>{{ $new->title }}</h4>
               <p>{{ $new->text }}</p> 
               <span>
                  <?php 
                     $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY');
                  ?>
                  {{$formatted}}
               </span>
            </a>
         </div>
      @endforeach

   </div>
</div>