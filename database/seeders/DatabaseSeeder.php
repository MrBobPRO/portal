<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;
use App\Models\Video;
use App\Models\Project;
use App\Models\Subject;
use App\Models\Subjectcat;
use App\Models\Material;
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

            'Мы подберем оптимальное решение под ваши задачи, выполним тонкую настройку нашей платформы с учетом всех особенностей вашей компании и поможем вовлечь сотрудников и изменить их поведение с привычного на желаемое.
            Мы подберем оптимальное решение под ваши задачи, выполним тонкую настройку нашей платформы с учетом всех особенностей вашей компании и поможем вовлечь сотрудников и изменить их поведение с привычного на желаемое.
            Мы подберем оптимальное решение под ваши задачи, выполним тонкую настройку нашей платформы с учетом всех особенностей вашей компании и поможем вовлечь сотрудников и изменить их поведение с привычного на желаемое.',

            'Более 100 успешных проектов в компаниях со штатом от 50 до 18 000 человек.
            Мы подберем оптимальное решение под ваши задачи, выполним тонкую настройку нашей платформы с учетом всех особенностей вашей компании и поможем вовлечь сотрудников и изменить их поведение с привычного на желаемое.
            Мы подберем оптимальное решение под ваши задачи, выполним тонкую настройку нашей платформы с учетом всех особенностей вашей компании и поможем вовлечь сотрудников и изменить их поведение с привычного на желаемое.',

            ' Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem, ipsum rem? Dolorum tempora vero est iure magni nobis nihil molestiae cum aspernatur. Illum molestiae minima numquam laboriosam nihil. Quam possimus quis ipsa, debitis nisi cumque, 
            ut cum ratione delectus velit dolore ducimus veritatis, officia laudantium est id deserunt maiores esse. Accusamus vel voluptatum dolore provident a 
            nesciunt. Porro, expedita neque tempora itaque amet doloribus aspernatur voluptas?
            Подписание инвестиционного соглашения о строительстве и эксплуатации предприятия по производству электрического оборудования в городе Душанбе',

            'Трудовая миграция и денежные переводы из-за рубежа — одни из «системообразующих» факторов поддержания таджикской экономики на плаву.
            По данным Всемирного банка на октябрь 2020 года, денежные переводы составляли значительные доли валового внутреннего продукта (ВВП) в центральноазиатских странах: в Кыргызстане — 25%, в Таджикистане — 26%, в Узбекистане — почти 6%.
            В 2019 году объемы денежных переводов были еще больше.
            По данным Центрального банка России, за первые три квартала 2020 года из России в Таджикистан были сделаны переводы на сумму 1,2 млрд долларов, что на 37% меньше, чем за тот же период предыдущего года.
            Во время пандемии Россия закрыла транспортное сообщение, в том числе с центральноазиатскими государствами, но к настоящему времени авиарейсы с Казахстаном, Кыргызстаном и Беларусью восстановлены. Но не с Таджикистаном.
            Периодически Москва инициировала введение визового режима с теми странами Центральной Азии, которые не входят в Евразийский экономический союз (ЕАЭС), в частности Узбекистаном и Таджикистаном, напомнил директор ташкентского исследовательского института «Караван знаний» Фархад Толипов.
            «Таким образом, Россия фактически разделяет центральноазиатские страны на “своих” и “чужих”», — отметил он, имея в виду разделение по принципу присоединения тех или иных стран к ЕАЭС.',

            'Обозреватели предполагают, что РФ, ограничивая трудовую миграцию, оказывает давление на Таджикистан, чтобы он присоединился к ЕАЭС, при этом российские государственные СМИ посылают в сторону Душанбе прямые, откровенные сигналы.
            Российский пропагандистский новостной сайт «Sputnik Таджикистан» 11 февраля опубликовал интервью с генеральным директором Международного агентства продвижения экспорта (IEXPA), главой Ассоциации малых и средних экспортеров Юрием Шурыгиным.',
                
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

        $videoSrcs = [
                        'first.mp4', 'second.mp4', 'third.mp4', 'fourth.mp4',
                        'first.mp4', 'second.mp4', 'third.mp4', 'fourth.mp4',
                        'first.mp4', 'second.mp4', 'third.mp4', 'fourth.mp4',
                        'first.mp4', 'second.mp4', 'third.mp4', 'fourth.mp4',
                        'first.mp4', 'second.mp4', 'third.mp4', 'fourth.mp4'
                    ];
        $imageSrcs = [
                        'lazy_load.jpg', 'mobile_app.jpg', 'profile_card.jpg', 'timeline.jpg',
                        'lazy_load.jpg', 'mobile_app.jpg', 'profile_card.jpg', 'timeline.jpg',
                        'lazy_load.jpg', 'mobile_app.jpg', 'profile_card.jpg', 'timeline.jpg',
                        'lazy_load.jpg', 'mobile_app.jpg', 'profile_card.jpg', 'timeline.jpg',
                        'lazy_load.jpg', 'mobile_app.jpg', 'profile_card.jpg', 'timeline.jpg',
                    ];

        for ($i=0; $i < count($videoSrcs); $i++) 
        {
            $videos = new Video;
            $videos->videoSrc = $videoSrcs[$i];
            $videos->imageSrc = $imageSrcs[$i];
            $videos->save(); 
        }

        $prImage = ['project1.jpg', 'project2.jpg', 'project3.jpg', 'project4.jpg', 'project5.jpg', 
                    'project6.jpg', 'project7.jpg', 'project8.jpg', 'project9.jpg', 'project10.jpg', 'project11.jpg',
                ];
        $prTitle = [
                    'Нурекская ГЭС', 'Сангтудинская ГЭС 1', 'HYATT REGENCY HOTEL и БЦ “СОЗИДАНИЕ”',
                    'ЭЛЕКТРОСНАБЖЕНИЕ РУДНИКА “ЗАРНИСОР”', 'Международный аэропорт Душанбе', 'ПС «ВАХДАТ 110/10кВ»',
                    'БУРЕНИЕ ТОННЕЛЕЙ', 'ПЛОТИНА РОГУНСКОЙ ГЭС', 'В Худжанде дали старт строительству крупной электроподстанции',
                    'Официальный запуск проекта “Энергоснабжение сельского джамоата Ромит”', 'СТРОИТЕЛЬСТВО ЛЭП ИР АФГАНИСТАН'
                ];
        $prText = 'В разные годы на Нурекской ГЭС, специалистами нашей компании, были произведены строительные и электромонтажные работы различных объёмов, в том числе: монтаж трансформаторов, строительство ОРУ 500/220 кВ, прокладка силовых, контрольных и оптоволоконных кабелей.
                    Регулярность привлечения именно нашей компании для проведения работ, подтверждает высокий профессионализм наших специалистов.';
        for ($i=0; $i < count($prImage); $i++)
        {
            $projects = new Project;
            $projects->imageUrl = $prImage[$i];
            $projects->title = $prTitle[$i];
            $projects->text = $prText;
            $projects->save();
        }

        //subjects, subject categories, and materials table
        $subjects = [
            [   'name' => 'Английский',
                'categories' => [[  'name'=> 'Начинающий',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]],
                                 [  'name'=> 'Средний',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]],
                                 [  'name'=> 'Выше среднего',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]],
                                 [  'name'=> 'Эксперт',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]],
                                 [  'name'=> 'Мастер',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]]]
            ],
            [   'name' => 'Русский',
                'categories' => [[  'name'=> 'ТРКИ-1',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]],
                                 [  'name'=> 'ТРКИ-2',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]],
                                 [  'name'=> 'ТРКИ-3',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]],
                                 [  'name'=> 'ТРКИ-4',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'lessons']]]]
            ],
            [   'name' => 'Бизнес',
                'categories' => [[  'name'=> 'Книги',
                                    'materials'=> [['name' => 'Отборные произведение',
                                                    'type' => 'selected']]],
                                 [  'name'=> 'Видео',
                                    'materials'=> [['name' => 'Выступление',
                                                    'type' => 'performance'],
                                                   ['name' => 'Интервью',
                                                    'type' => 'interview'],
                                                   ['name' => 'Мотивированный монолог',
                                                    'type' => 'monolog']]]]
            ]
        ]; 

        foreach ($subjects as $subject) {
            $subj = new Subject;
            $subj->name = $subject['name'];
            $subj->save();

                foreach ($subject['categories'] as $cat) {
                    $subjcat = new Subjectcat;
                    $subjcat->subject_id = $subj->id;
                    $subjcat->name = $cat['name'];
                    $subjcat->save();

                        foreach ($cat['materials'] as $material) {
                            $mat = new Material;
                            $mat->subjectcat_id = $subjcat->id;
                            $mat->name = $material['name'];
                            $mat->type = $material['type'];
                            $mat->save();
                        }
                }
        }


    }
}
