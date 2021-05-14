
<div id="sidebar" class="sidebar">
   <div class="birthdays">
      <h1>День рождении
         <span class="material-icons-outlined">star</span>
      </h1>
      
      <div class="single-birthday">
         <img src="{{asset('img/users/6.jpg')}}">
         <span>Сегодня</span>
         <p>Нурова Шакира</p>
      </div>

      <div class="single-birthday">
         <img src="{{asset('img/users/7.jpg')}}">
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

               @switch(\App::currentLocale())
                  @case('ru')
                  <h4>{{ $new->ruTitle }}</h4>
                  <p>{!! $new->ruText !!}</p> 
                  <span>
                     <?php 
                        $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}
                  </span>
                  @break
                  
                  @case('tj')
                     <h4>{{ $new->tjTitle }}</h4>
                     <p>{!! $new->tjText !!}</p> 
                     <span>
                        <?php 
                           $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                           $formatted = $date->isoFormat('DD.MM.YYYY');
                        ?>
                        {{$formatted}}
                     </span>
                  @break

                  @case('en')
                     <h4>{{ $new->enTitle }}</h4>
                     <p>{!! $new->enText !!}</p> 
                     <span>
                        <?php 
                           $date = \Carbon\Carbon::parse($new->created_at)->locale('en');
                           $formatted = $date->isoFormat('DD MMMM YYYY');
                        ?>
                        {{$formatted}}
                     </span>
                  @break
               @endswitch
               
            </a>
         </div>
      @endforeach

   </div>
</div>