<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $avaUrls = ['ava1.jpg', 'ava2.jpg', 'ava3.jpg', 'ava4.jpg', 'ava5.jpg'];
        $names = ['Raketa', 'Bruce', 'Murod', 'Jumagul', 'Arthur'];
        $surnames = ['Vespuchi', 'Banner', 'Bahramov', 'Odinaeva', 'Fleck'];
        $emails = ['ikrom@mail.ru', 'bruce@mail.ru', 'murod@mail.ru', 'raketa@mail.ru', 'arthur@mail.ru'];
        $birthdays = [
            date_create_from_format('Y-m-d', '1997-04-05'),
            date_create_from_format('Y-m-d', '1987-04-03'),
            date_create_from_format('Y-m-d', '1956-04-03'),
            date_create_from_format('Y-m-d', '1800-04-06'),
            date_create_from_format('Y-m-d', '2001-04-07')
        ];
        for ($i=0; $i < count($names); $i++) 
        {
            $user = new User;
            $user->avaUrl = $avaUrls[$i];
            $user->name = $names[$i];
            $user->surname = $surnames[$i];
            $user->email = $emails[$i];
            $user->password = bcrypt('12345');
            $user->birth_date = $birthdays[$i];
            $user->save();
        }

        $type = [false, true, true, true, false, false, false];
        $imageUrls = ['news0.jpg', 'news1.jpg', 'news2.jpg', 'news3.jpg', 'news4.jpg', 'news5.jpg', 'news6.jpg'];
        $titles = ['Негативное воздействие трудовой миграции','Is Pizza better than Qurutob?', 'We need seniors', 'Who stole my mood?', 'Зависимость от денежных переводов', 'Россия оказывает давление на Таджикистан', '«Нам нужно быть предельно осторожными»'];
        $texts = [
            'Всемирный банк в своем отчете, опубликованном в январе, проанализировал негативные экономические последствия денежных переводов для стран Восточной Европы, Южного Кавказа и Центральной Азии.

            В своем исследовании эксперты делятся заключением о том, что денежные переводы в такие страны, как Таджикистан, Кыргызстан и Узбекистан, поступающие в основном из России, оказывают негативное воздействие на экономику этих государств.
            
            Переводы снижают конкурентоспособность их экономик, усиливают инфляционное давление, отталкивают инвесторов, препятствуют расширению производств и появлению новых рабочих мест, показало исследование.
            
            В Таджикистане доля семей, живущих на денежные переводы, составляет до 40%.
            
            Приток иностранной валюты в страны региона также повышает курс местных валют, который не обеспечивается экспортом и достижениями реальной экономики.
            
            Такая тенденция снижает конкурентоспособность товаров местных производителей не только на внутреннем, но и на внешних рынках. Местные компании также испытывают трудности из-за повышения стоимости рабочей силы, отмечено в исследовании.
            
            Казахстан представляет собой наиболее развитую экономику в регионе благодаря своим богатым природным ресурсам, поэтому Казахстан сам привлекает трудовую миграцию, а не служит ее источником и не зависит от денежных переводов.',
            'Мы подберем оптимальное решение под ваши задачи, выполним тонкую настройку нашей платформы с учетом всех особенностей вашей компании и поможем вовлечь сотрудников и изменить их поведение с привычного на желаемое.',
            'Более 100 успешных проектов в компаниях со штатом от 50 до 18 000 человек.',
            'Подписание инвестиционного соглашения о строительстве и эксплуатации предприятия по производству электрического оборудования в городе Душанбе',
            'Трудовая миграция и денежные переводы из-за рубежа — одни из «системообразующих» факторов поддержания таджикской экономики на плаву.

            По данным Всемирного банка на октябрь 2020 года, денежные переводы составляли значительные доли валового внутреннего продукта (ВВП) в центральноазиатских странах: в Кыргызстане — 25%, в Таджикистане — 26%, в Узбекистане — почти 6%.
            
            В 2019 году объемы денежных переводов были еще больше.
            
            По данным Центрального банка России, за первые три квартала 2020 года из России в Таджикистан были сделаны переводы на сумму 1,2 млрд долларов, что на 37% меньше, чем за тот же период предыдущего года.
            
            Во время пандемии Россия закрыла транспортное сообщение, в том числе с центральноазиатскими государствами, но к настоящему времени авиарейсы с Казахстаном, Кыргызстаном и Беларусью восстановлены. Но не с Таджикистаном.
            
            Периодически Москва инициировала введение визового режима с теми странами Центральной Азии, которые не входят в Евразийский экономический союз (ЕАЭС), в частности Узбекистаном и Таджикистаном, напомнил директор ташкентского исследовательского института «Караван знаний» Фархад Толипов.
            
            «Таким образом, Россия фактически разделяет центральноазиатские страны на “своих” и “чужих”», — отметил он, имея в виду разделение по принципу присоединения тех или иных стран к ЕАЭС.',
            'Обозреватели предполагают, что РФ, ограничивая трудовую миграцию, оказывает давление на Таджикистан, чтобы он присоединился к ЕАЭС, при этом российские государственные СМИ посылают в сторону Душанбе прямые, откровенные сигналы.

            Российский пропагандистский новостной сайт «Sputnik Таджикистан» 11 февраля опубликовал интервью с генеральным директором Международного агентства продвижения экспорта (IEXPA), главой Ассоциации малых и средних экспортеров Юрием Шурыгиным.',
        
        ];
        for ($i = 0; $i < count($titles); $i++) 
        {
            $news = new News;
            $news->type = $type[$i];
            $news->imageUrl = $imageUrls[$i];
            $news->title = $titles[$i];
            $news->text = $texts[$i];
            $news->save();
        } 
    }
}
