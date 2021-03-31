<div class="toolbar">
   <ul class="toolbar-right">
      <li class="toolbar-items"> <i class="fa fa-envelope-o"></i> </li>
      <li class="toolbar-items"> <i class="far fa-bell"></i> </li>
      <li class="toolbar-items"> <i class="fa fa-comment-o"></i> </li>
   </ul>
   <form  class="search-form" action="/search" method="GET">
      <input type="text" name="keyword" minlength="3" required placeholder="{{ __('Поиск...') }}"/>
      <button type="submit"> <i class="fa fa-search"></i> </button>
   </form>
</div>