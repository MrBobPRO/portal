@extends('templates.master')
@section('content')

   <section class="aboutus-page">

      <div class="aboutus-header">

         <h3 class="title">{{ __('Кто мы') }}  ?</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href="/">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a href="/about">{{ __('О компании') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Кто мы') }}  ?</a>
            </li>
         </ul>  

      </div>

      <div class="whoarewe">
         <img src="https://tgem.tj/wp-content/uploads/2018/06/%D0%9F%D1%80%D0%B5%D0%B8%D0%BC%D1%83%D1%89%D0%B5%D1%81%D1%82%D0%B2%D0%B0.jpg" alt="img">
         <div class="whoarewe-text">
            <p>6 июня 1959 года в городе Душанбе было образовано Таджикское монтажное управление «Гидроэлектромонтаж» (ТМУ ГЭМ), которое входило в состав Всесоюзного треста г. Ленинград (нынешнего Санкт-Петербург).</p>
            <p>Основателями ТМУ ГЭМ были П.С. Линдук и О.П Янис.</p>
            <p>В 60-х годах ТМУ ГЭМ были доверены электромонтажные работы на Яванской ТЭЦ. Специалистами управления был выполнен монтаж трансформаторов на ОРУ 220 кВ, а также монтаж энергоблока машинного зала.</p>
            <p>В 1972 был запущен цех по обработке металла и изготовлению металлоконструкции.</p>
            <p>В начале 1975 года организация укрепила свои позиции и стала одной из конкурентно-способных электромонтажных предприятий.</p>
            <p>С 1972 по 1979 года были выполнены все электромонтажные работы и введены в эксплуатацию гидроагрегаты Нурекской ГЭС. Монтаж электрической части был выполнен специалистами ТМУ ГЭМ в рекордно короткий срок и по завершению строительства ГЭС с отличаем прошла Государственную комиссию.</p>
            <p>В вначале 80-ых годов ТМУ ГЭМ обеспечил установку высоковольтного оборудования в кремниево-преобразовательных подстанциях, а также сданы в эксплуатацию электролизные корпуса Алюминиевого завода.</p>
            <p>В 1986 году ТМУ ГЭМ начала работу на Рогунской ГЭС. Управление соответствовала высоким требованиям рынка по технической оснащённости и это обеспечивало качественное и своевременное выполнение работ.</p>
            <p>С момента образования и по настоящее время ТМУ ГЭМ всегда были доверены строительства объектов республиканского и регионального значения. И за достижения высокой эффективности, ответственный подход и безупречный работу компании не раз присуждались государственные награды.</p>
         </div>
      </div>

      <div class="extra-info">
         <b>За 60 лет своего существования наша компания выполнила и продолжает выполнять электромонтажные, строительные и пусконаладочные работы на всех крупнейших объектах Республики Таджикистан и за его пределами:</b>
         <ul class="info-img-list">
            <li class="info-items">
               <img src="{{ asset('img/about/info1.jpg') }}" alt="img">
            </li>
            <li class="info-items">
               <img src="{{ asset('img/about/info2.jpg') }}" alt="img">
            </li>
            <li class="info-items">
               <img src="{{ asset('img/about/info3.jpg') }}" alt="img">
            </li>
            <li class="info-items">
               <img src="{{ asset('img/about/info4.jpg') }}" alt="img">
            </li>
         </ul>
      </div>
      
   </section>

@endsection