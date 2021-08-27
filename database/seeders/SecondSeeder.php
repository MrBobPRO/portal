<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\Project;
use App\Models\Subject;
use App\Models\Subjectcat;
use App\Models\Material;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Entertainment;
use App\Models\Grade;
use App\Models\News;

class SecondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Create News
        $global = [false, true, true, true, false, false, false];
        for ($i = 0; $i < count($global); $i++) {
            $news = new News;
            $news->global = $global[$i];
            $news->image = ($i+1) . '.jpg';
            $news->ruTitle = 'Заголовок новостей ' . $i ;
            $news->ruText = 'В конце 80-х годов XX века в СССР начались политические процессы, которые были связаны с начавшейся демократизацией советского общества. В национальных республиках СССР под воздействием национально-демократических сил начался процесс объявления «государственных суверенитетов» в национальных парламентах республик СССР. Суверенитет также был объявлен в Таджикской ССР.
            <br><br> 24 августа 1990 года на второй сессии Верховного Совета Таджикской ССР была принята Декларация «О суверенитете Таджикской ССР». Но этот суверенитет декларировался ещё в составе Советского Союза. Несмотря на это, Декларация была первым документом, предвещавшим путь к действительной независимости Таджикистана. В ней провозглашалось, что «Таджикская ССР на своей территории самостоятельно решает все политические, экономические, социальные и культурные вопросы, кроме тех вопросов, которые Таджикистан добровольно передает в компетенцию СССР». По словам бывшего министра юстиции РТ Халифабобо Хамидова (1950—2013), «декларация была первым документом для приближения независимости. Например, её пятая статья наделила Верховный Совет республики полномочиями прекратить действия документов СССР, которые противоречили законным правам Таджикистана».' ;
            $news->tjTitle = 'Хабархои навтарин ' . $i ;
            $news->tjText = 'Имрӯзҳо дар тамоми нуқтаҳои маъмурию ҷуғрофии Тоҷикистон бо истифода аз фазои сулҳу суботу ваҳдат ва фароҳам овардани шарту шароитҳои беҳтарин бо мақсади таъмини рушди мунтазаму муназзами риштаҳои гуногуни хоҷагии халқ, татбиқи лоиҳаи гуногун, алалхусус дар яке аз соҳаҳои муҳими иқтисоди кишвар энергетика назаррас мебошад.<br><br>Дар ин раванд дар чаҳорчӯби иқдомҳои созандаи Асосгузори сулҳу ваҳдати миллӣ – Пешвои миллат, Президенти Ҷумҳурии Тоҷикистон муҳтарам Эмомалӣ Раҳмон ва дар асоси ҳамкориҳои судманди Вазорати энергетика ва захираҳои оби Ҷумҳурии Тоҷикистон бо Агентии Корея оид ба ҳамкории байналмилалӣ (KOICA) татбиқи лоиҳаи «Сохтмони шабакаҳои барқи дар ҷамоати деҳоти Ромит» амалӣ карда мешавад.<br><br>Татбиқи лоиҳа, пеш аз ҳама, барои дастрасии мардуми деҳот ба нерўи барқ нигаронида шуда, он имкон фароҳам меорад, ки сокинони ҷамоати деҳоти Ромит – деҳаҳои Қоху, Девдара, Новаки поён, Новаки боло, Пушандоч, Вистан, Дашти мазор, Ғусғеф ва Пичеф, (дар маҷмуъ 9 деҳа) иборат аз 3 093 нафар аҳолӣ аввалин бор давоми солҳои тўлонии истиқомат дар ин мавзеъ ба нерўи барқ дастрасӣ пайдо намоянд. Дар баробари ин, бунёди инфрасохтори барқӣ ва мутаносибан васеъ гардидани имконияти бунёди инфрасохтори саёҳӣ ва истифодаи таҷҳизоти муосир дар ин мавзеи саёҳӣ, ҷиҳати ҷалби бештари саёҳони дохилию хориҷӣ мусоидат хоҳад намуд.';
            $news->enTitle = 'Very interesting news ' . $i ;
            $news->enText = 'In 1959, the Tajik Installation Department “Gidroelectromontaj” (TID GEM) was formed in Dushanbe, which was part of the all-Union trust of the city of Leningrad (present-day St. Petersburg). The founders of TID GEM were Linduk P. S. and O. P Yanis. In the 60s TID GEM was entrusted with electrical work at the Yovon HPP. The specialists of the Department carried out the installation of transformers on an open switchgear 220 kV, as well as the installation of the power unit of the machine hall.<br><br>In 1972, a shop for metal processing and manufacturing of metal structures was launched. From 1972 to 1979, all electrical installation works were performed and the hydroelectric units of the Nurek HPP were put into operation. Installation of the electrical part was performed by TID GEM specialists in a record time and upon completion of the HPP passed the State Commission with distinction. In early 1975, the organization strengthened its position and became one of the most competitive electrical installation companies.';
            $news->save();
        } 

        //grades for news
        $grade = new Grade;
        $grade->user_id = 2;
        $grade->news_id = 1;
        $grade->like = true;
        $grade->save();

        $grade = new Grade;
        $grade->user_id = 1;
        $grade->news_id = 1;
        $grade->like = false;
        $grade->save();

        $grade = new Grade;
        $grade->user_id = 3;
        $grade->news_id = 1;
        $grade->like = true;
        $grade->save();

        //comments for news
        $c = new Comment;
        $c->user_id = 1;
        $c->news_id = 1;
        $c->body = 'Смелость — это способность подавить воображаемые страхи и получить намного более насыщенную и богатую жизнь, в которой ты сам себе отказываешь.';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-22 12:44:07');
        $c->save();

        $c = new Comment;
        $c->user_id = 2;
        $c->news_id = 1;
        $c->body = 'Как же хорошо сказано...';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-23 13:05:22');
        $c->save();

        $c = new Comment;
        $c->user_id = 3;
        $c->news_id = 1;
        $c->body = 'Золотые слова Юрий Венедиктовичь!';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-24 13:12:27');
        $c->save();

        //Entertainment
        $enter = ['Властелин колец','Храброе сердцем','Один дома','Форсаж 9','Митохондриа','Бегущий в лабиринте'];
        for ($i=0; $i < count($enter); $i++) {
            $ent = new Entertainment;
            $ent->filename = ($i+1) . '.mp4';
            $ent->ruTitle = $enter[$i];
            $ent->tjTitle = 'Номи филми ' . ($i+1);
            $ent->enTitle = 'Movie name ' . ($i+1);
            if($i == 0 || $i == 3 || $i == 5)
                $ent->subtitles = ($i+1) . '.vtt';
            $ent->from_catalog = false;
            $ent->save();
        }
        
        $ent = new Entertainment;
        $ent->filename = 'Собачка.mp4';
        $ent->ruTitle = 'Собачка';
        $ent->tjTitle = 'Сагча';
        $ent->enTitle = 'The Snoopy Dogg';
        $ent->from_catalog = true;
        $ent->save();
        

        //Projects
        for ($i=0; $i < 11; $i++) {
            $projects = new Project;
            $projects->image = ($i+1) . '.jpg';
            $projects->manager_id = $i+1;
            $projects->ruTitle = 'Заголовок проекта ' . $i;
            $projects->tjTitle = 'Номи проекти ' . $i;
            $projects->enTitle = 'Project title ' . $i;
            $projects->ruText = 'В конце 80-х годов XX века в СССР начались политические процессы, которые были связаны с начавшейся демократизацией советского общества. В национальных республиках СССР под воздействием национально-демократических сил начался процесс объявления «государственных суверенитетов» в национальных парламентах республик СССР. Суверенитет также был объявлен в Таджикской ССР.
            <br><br> 24 августа 1990 года на второй сессии Верховного Совета Таджикской ССР была принята Декларация «О суверенитете Таджикской ССР». Но этот суверенитет декларировался ещё в составе Советского Союза. Несмотря на это, Декларация была первым документом, предвещавшим путь к действительной независимости Таджикистана. В ней провозглашалось, что «Таджикская ССР на своей территории самостоятельно решает все политические, экономические, социальные и культурные вопросы, кроме тех вопросов, которые Таджикистан добровольно передает в компетенцию СССР». По словам бывшего министра юстиции РТ Халифабобо Хамидова (1950—2013), «декларация была первым документом для приближения независимости. Например, её пятая статья наделила Верховный Совет республики полномочиями прекратить действия документов СССР, которые противоречили законным правам Таджикистана».' ;
            $projects->tjText = 'Имрӯзҳо дар тамоми нуқтаҳои маъмурию ҷуғрофии Тоҷикистон бо истифода аз фазои сулҳу суботу ваҳдат ва фароҳам овардани шарту шароитҳои беҳтарин бо мақсади таъмини рушди мунтазаму муназзами риштаҳои гуногуни хоҷагии халқ, татбиқи лоиҳаи гуногун, алалхусус дар яке аз соҳаҳои муҳими иқтисоди кишвар энергетика назаррас мебошад.<br><br>Дар ин раванд дар чаҳорчӯби иқдомҳои созандаи Асосгузори сулҳу ваҳдати миллӣ – Пешвои миллат, Президенти Ҷумҳурии Тоҷикистон муҳтарам Эмомалӣ Раҳмон ва дар асоси ҳамкориҳои судманди Вазорати энергетика ва захираҳои оби Ҷумҳурии Тоҷикистон бо Агентии Корея оид ба ҳамкории байналмилалӣ (KOICA) татбиқи лоиҳаи «Сохтмони шабакаҳои барқи дар ҷамоати деҳоти Ромит» амалӣ карда мешавад.<br><br>Татбиқи лоиҳа, пеш аз ҳама, барои дастрасии мардуми деҳот ба нерўи барқ нигаронида шуда, он имкон фароҳам меорад, ки сокинони ҷамоати деҳоти Ромит – деҳаҳои Қоху, Девдара, Новаки поён, Новаки боло, Пушандоч, Вистан, Дашти мазор, Ғусғеф ва Пичеф, (дар маҷмуъ 9 деҳа) иборат аз 3 093 нафар аҳолӣ аввалин бор давоми солҳои тўлонии истиқомат дар ин мавзеъ ба нерўи барқ дастрасӣ пайдо намоянд. Дар баробари ин, бунёди инфрасохтори барқӣ ва мутаносибан васеъ гардидани имконияти бунёди инфрасохтори саёҳӣ ва истифодаи таҷҳизоти муосир дар ин мавзеи саёҳӣ, ҷиҳати ҷалби бештари саёҳони дохилию хориҷӣ мусоидат хоҳад намуд.';
            $projects->enText = 'In 1959, the Tajik Installation Department “Gidroelectromontaj” (TID GEM) was formed in Dushanbe, which was part of the all-Union trust of the city of Leningrad (present-day St. Petersburg). The founders of TID GEM were Linduk P. S. and O. P Yanis. In the 60s TID GEM was entrusted with electrical work at the Yovon HPP. The specialists of the Department carried out the installation of transformers on an open switchgear 220 kV, as well as the installation of the power unit of the machine hall.<br><br>In 1972, a shop for metal processing and manufacturing of metal structures was launched. From 1972 to 1979, all electrical installation works were performed and the hydroelectric units of the Nurek HPP were put into operation. Installation of the electrical part was performed by TID GEM specialists in a record time and upon completion of the HPP passed the State Commission with distinction. In early 1975, the organization strengthened its position and became one of the most competitive electrical installation companies.';
            if ($i % 2 === 0) {
                $projects->completed = true;
            } else {
                $projects->completed = false;
            }
            $projects->save();
        }


        //Create Videos
        // $videoCategory = ['lessons','performance','interview','monolog','overheadWork','undergroundWork','climbingWork','generalWork'];
        // $videoRuCategory = ['Уроки','Выступление','Интервью','Монолог','Надземная работа','Подземная работа','Верхолазная работа','Общестроительная работа'];
        // $materialIDs = ['3','6','9','12','15','18','21','24','27','29','30','31','33','34','35','38','41','43','45','47','49','51'];
        // for ($i=0; $i < count($materialIDs); $i++){
        //     for ($j=0; $j < 13; $j++) {
        //         for ($k=0; $k < count($videoCategory); $k++) {
        //             $videos = new Video;
        //             $videos->material_id = $materialIDs[$i];
        //             $videos->category = $videoCategory[$k];
        //             $videos->ruCategory = $videoRuCategory[$k];
        //             $videos->filename = 'video.mp4';
        //             $videos->ruTitle = 'Видеоурок ' . $k;
        //             $videos->tjTitle = 'Видео ' . $k;
        //             $videos->enTitle = 'Video ' . $k;
        //             $videos->from_catalog = 0;
        //             $videos->save();
        //         }
        //     } 
        // }

        
        //Create Books
        // $bookCategory = ['coursebook','workbook','selectedComposition','selectedLiterature','questionnaire','englishLessons','literature'];
        // $bookRuCategory = ['Классная книга','Рабочая книга','Отборные произведение','Отборная литература','Вопросник','Английские уроки','Литература'];
        // $matIDs = ['1','2','4','5','7','8','10','11','13','14','15','16','17','19','20','22','23','25','26','28','32','36','37','39','40','42','44','46','48','50'];
        // for ($i=0; $i < count($matIDs); $i++){
        //     for ($j=0; $j < 13; $j++) {
        //         for ($k=0; $k < count($bookCategory); $k++) {
        //             $books = new Book;
        //             $books->ruTitle = 'Название книги ' . $k;
        //             $books->tjTitle = 'Номи китоб ' . $k;
        //             $books->enTitle = 'Book name ' . $k;
        //             $books->filename = '1.pdf';
        //             $books->material_id = $matIDs[$i];
        //             $books->category = $bookCategory[$k];
        //             $books->ruCategory = $bookRuCategory[$k];
        //             $books->save();
        //         }
        //     } 
        // }

        //Create Subjects && Subjectcats && Materials
        $subjects = [
            [   'name' => 'Английский',
                'categories' => [[  'name'=> 'Начинающий',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Средний',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Выше среднего',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Эксперт',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Мастер',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]]]
            ],
            [   'name' => 'Русский',
                'categories' => [[  'name'=> 'Грамматика',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Фонетика',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Синтаксис',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Пунктуация',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name' => 'Морфология',
                                    'materials' => [['name' => 'Классная книга',
                                                     'type' => 'book',
                                                     'category' => 'coursebook'],
                                                    ['name' => 'Рабочая книга',
                                                     'type' => 'book',
                                                     'category' => 'workbook'],
                                                    ['name' => 'Видео уроки',
                                                     'type' => 'video',
                                                     'category' => 'lessons']]],
                                 [  'name' => 'Словарь',
                                    'materials' => [['name' => 'Классная книга',
                                                     'type' => 'book',
                                                     'category' => 'coursebook'],
                                                    ['name' => 'Рабочая книга',
                                                     'type' => 'book',
                                                     'category' => 'workbook'],
                                                    ['name' => 'Видео уроки',
                                                     'type' => 'video',
                                                     'category' => 'lessons']]]]
            ],
            [   'name' => 'Бизнес',
                'categories' => [[  'name'=> 'Книги',
                                    'materials'=> [['name' => 'Отборные произведение',
                                                    'type' => 'book',
                                                    'category' => 'selectedComposition']]],
                                 [  'name'=> 'Видео',
                                    'materials'=> [['name' => 'Выступление',
                                                    'type' => 'video',
                                                    'category' => 'performance'],
                                                   ['name' => 'Интервью',
                                                    'type' => 'video',
                                                    'category' => 'interview'],
                                                   ['name' => 'Мотивированный монолог',
                                                    'type' => 'video',
                                                    'category' => 'monolog']]]]
            ],
            [   'name' => 'Энергетика',
                'categories' => [[  'name'=> 'Книги',
                                    'materials'=> [['name' => 'Отборная литература',
                                                    'type' => 'book',
                                                    'category' => 'selectedLiterature']]],
                                 [  'name'=> 'Видео',
                                    'materials'=> [['name' => 'Генерация',
                                                    'type' => 'video',
                                                    'category' => 'generation'],
                                                   ['name' => 'Блочные Тр-ры',
                                                    'type' => 'video',
                                                    'category' => 'block'],
                                                    ['name' => 'ПС',
                                                    'type' => 'video',
                                                    'category' => 'ps'],
                                                   ['name' => 'ВЛ',
                                                    'type' => 'video',
                                                    'category' => 'vl'],
                                                   ['name' => 'РЗиА',
                                                    'type' => 'video',
                                                    'category' => 'rz'],
                                                   ['name' => 'Учёт электроэнергии',
                                                    'type' => 'video',
                                                    'category' => 'electrometer'],
                                                   ['name' => 'АСУТП',
                                                    'type' => 'video',
                                                    'category' => 'asut']]],
                                 [  'name'=> 'Для разряда',
                                    'materials'=> [['name' => 'Вопросник для разрядов (2,6).',
                                                    'type' => 'book',
                                                    'category' => 'questionnaire']]]]
            ],
            [   'name' => 'ПГС',
                'categories' => [[  'name'=> 'Книги',
                                    'materials'=> [['name' => 'Отборная литература ПГС',
                                                    'type' => 'book',
                                                    'category' => 'selectedLiterature']]],
                                 [  'name'=> 'Видео',
                                    'materials'=> [['name' => 'Общестроительная работа',
                                                    'type' => 'video',
                                                    'category' => 'generalWork']]],
                                 [  'name'=> 'Для повышение квалификации',
                                    'materials'=> [['name' => 'Тесты',
                                                    'type' => 'book',
                                                    'category' => 'englishLessons']]]]
            ],
            [   'name' => 'IT-Программы',
                'categories' => [[  'name'=> 'Excel',
                                    'materials'=> [['name' => 'Литература Excel',
                                                    'type' => 'book',
                                                    'category' => 'literature'],
                                                   ['name' => 'Видео',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Word',
                                    'materials'=> [['name' => 'Литература Word',
                                                    'type' => 'book',
                                                    'category' => 'literature'],
                                                   ['name' => 'Видео',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'AutoCAD 2016-2017',
                                    'materials'=> [['name' => 'Литература AutoCAD',
                                                    'type' => 'book',
                                                    'category' => 'literature'],
                                                   ['name' => 'Видео',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],                  
                                 [  'name'=> 'AutoCAD 2020',
                                    'materials'=> [['name' => 'Литература AutoCAD',
                                                    'type' => 'book',
                                                    'category' => 'literature'],
                                                   ['name' => 'Видео',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Civil',
                                    'materials'=> [['name' => 'Литература Civil',
                                                    'type' => 'book',
                                                    'category' => 'literature'],
                                                   ['name' => 'Видео',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'ArchiCAD 2018',
                                    'materials'=> [['name' => 'Литература ArchiCAD',
                                                    'type' => 'book',
                                                    'category' => 'literature'],
                                                   ['name' => 'Видео',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'Primavera project',
                                    'materials'=> [['name' => 'Литература Primavera project',
                                                    'type' => 'book',
                                                    'category' => 'literature'],
                                                   ['name' => 'Видео',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]]]
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
                            $mat->category = $material['category'];
                            $mat->save();
                        }
                }
        }

        $ruTitle = ['Excel (базовый)', 'Сводная таблица в Excel', '20 приёмов MS Excel', 'Exсel урок 1', 'Exсel урок 2', 'Exсel урок 3', 'Exсel урок 4', 'Exсel урок 5', 'Макросы. Урок 1', 'Макросы. Урок 2', 'Макросы. Урок 3', 'Макросы. Урок 4', 'Макросы. Урок 5', 'Макросы. Урок 6', 'Макросы. Урок 7'];
        $tjTitle = ['Excel (базовый)', 'Ҷадвали ҷамъбастӣ дар Excel', '20 ҳиллаҳои MS Excel','Excel дарси якум', 'Excel дарси дуюм', 'Excel дарси сеюм', 'Excel дарси чорум', 'Excel дарси панчум', 'Макросы. Дарси 1', 'Макросы. Дарси 2', 'Макросы. Дарси 3', 'Макросы. Дарси 4', 'Макросы. Дарси 5', 'Макросы. Дарси 6', 'Макросы. Дарси 7'];
        $enTitle = ['Excel (basic)', 'PivotTable in Excel', '20 tricks MS Excel','Excel lesson 1', 'Excel lesson 2', 'Excel lesson 3', 'Excel lesson 4', 'Excel lesson 5', 'Macros. lesson 1', 'Macros. lesson 2', 'Macros. lesson 3', 'Macros. lesson 4', 'Macros. lesson 5', 'Macros. lesson 6', 'Macros. lesson 7'];
        $file = ['Excel (базовый).mp4', 'Сводная таблица в Excel.mp4', '20 приёмов MS Excel.mp4','Exсel урок 1.mp4', 'Exсel урок 2.mp4', 'Exсel урок 3.mp4', 'Exсel урок 4.mp4', 'Exсel урок 5.mp4', 'Макросы. Урок 1.mp4', 'Макросы. Урок 2.mp4', 'Макросы. Урок 3.mp4', 'Макросы. Урок 4.mp4', 'Макросы. Урок 5.mp4', 'Макросы. Урок 6.mp4', 'Макросы. Урок 7.mp4'];

        for($i=0; $i<count($ruTitle); $i++) {
            $videos = new Video;
            $videos->material_id = 51;
            $videos->category = 'lessons';
            $videos->ruCategory = 'Видео';
            $videos->filename = $file[$i];
            $videos->ruTitle = $ruTitle[$i];
            $videos->tjTitle = $tjTitle[$i];
            $videos->enTitle = $enTitle[$i];
            $videos->from_catalog = 0;
            $videos->priority = $i + 1;
            $videos->save();
        }

    }
}
