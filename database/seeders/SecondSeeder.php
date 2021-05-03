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
            $news->title = 'Заголовок новостей ' . $i ;
            if($i == 4) $news->title = 'Очень длинный заголовок новостей' ;
            $news->text = 'В конце 80-х годов XX века в СССР начались политические процессы, которые были связаны с начавшейся демократизацией советского общества. В национальных республиках СССР под воздействием национально-демократических сил начался процесс объявления «государственных суверенитетов» в национальных парламентах республик СССР. Суверенитет также был объявлен в Таджикской ССР.
            <br><br> 24 августа 1990 года на второй сессии Верховного Совета Таджикской ССР была принята Декларация «О суверенитете Таджикской ССР». Но этот суверенитет декларировался ещё в составе Советского Союза. Несмотря на это, Декларация была первым документом, предвещавшим путь к действительной независимости Таджикистана. В ней провозглашалось, что «Таджикская ССР на своей территории самостоятельно решает все политические, экономические, социальные и культурные вопросы, кроме тех вопросов, которые Таджикистан добровольно передает в компетенцию СССР». По словам бывшего министра юстиции РТ Халифабобо Хамидова (1950—2013), «декларация была первым документом для приближения независимости. Например, её пятая статья наделила Верховный Совет республики полномочиями прекратить действия документов СССР, которые противоречили законным правам Таджикистана».' ;
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
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-04-23 12:44:07');
        $c->save();

        $c = new Comment;
        $c->user_id = 2;
        $c->news_id = 1;
        $c->body = 'Икром ты это в серьёз??';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-04-24 13:05:22');
        $c->save();

        $c = new Comment;
        $c->user_id = 1;
        $c->news_id = 1;
        $c->body = 'Зуб даю!';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-04-24 13:12:27');
        $c->save();

        //Intertainment
        $enter = ['Властелин капец','Храбрые перцем','Одна дома','Фарсаг 9','Митохондриа!','Бегущий в спортзале','Доктор МОМ','Лига уродов'];
        for ($i=0; $i < count($enter); $i++) {
            $ent = new Entertainment;
            $ent->filename = '1.mp4';
            if(($i+1) % 2 == 0) $ent->filename = '2.mp4';
            $ent->title = $enter[$i];
            $ent->subtitles = '1.vtt';
            if(($i+1) % 2 == 0) $ent->subtitles = null;
            $ent->save();
        }
        

        //Projects
        for ($i=0; $i < 11; $i++) {
            $projects = new Project;
            $projects->image = ($i+1) . '.jpg';
            $projects->title = 'Заголовок проекта ' . $i;
            $projects->text = 'В конце 80-х годов XX века в СССР начались политические процессы, которые были связаны с начавшейся демократизацией советского общества. В национальных республиках СССР под воздействием национально-демократических сил начался процесс объявления «государственных суверенитетов» в национальных парламентах республик СССР. Суверенитет также был объявлен в Таджикской ССР.
            <br><br> 24 августа 1990 года на второй сессии Верховного Совета Таджикской ССР была принята Декларация «О суверенитете Таджикской ССР». Но этот суверенитет декларировался ещё в составе Советского Союза. Несмотря на это, Декларация была первым документом, предвещавшим путь к действительной независимости Таджикистана. В ней провозглашалось, что «Таджикская ССР на своей территории самостоятельно решает все политические, экономические, социальные и культурные вопросы, кроме тех вопросов, которые Таджикистан добровольно передает в компетенцию СССР». По словам бывшего министра юстиции РТ Халифабобо Хамидова (1950—2013), «декларация была первым документом для приближения независимости. Например, её пятая статья наделила Верховный Совет республики полномочиями прекратить действия документов СССР, которые противоречили законным правам Таджикистана».' ;
            $projects->save();
        }


        //Create Videos
        $videoCategory = ['lessons','performance','interview','monolog','overheadWork','undergroundWork','climbingWork','generalWork'];
        $materialIDs = ['3','6','9','12','15','18','21','24','27','29','30','31','33','34','35','38','41','43','45','47','49','51'];
        for ($i=0; $i < count($materialIDs); $i++){
            for ($j=0; $j < 13; $j++) {
                for ($k=0; $k < count($videoCategory); $k++) {
                    $videos = new Video;
                    $videos->material_id = $materialIDs[$i];
                    $videos->category = $videoCategory[$k];
                    $videos->filename = 'video.mp4';
                    $videos->poster = '';
                    $videos->title = 'Видеоурок ' . $k;
                    $videos->save();
                }
            } 
        }

        
        //Create Books
        $bookCategory = ['coursebook','workbook','selectedComposition','selectedLiterature','questionnaire','englishLessons','literature'];
        $matIDs = ['1','2','4','5','7','8','10','11','13','14','15','16','17','19','20','22','23','25','26','28','32','36','37','39','40','42','44','46','48','50'];
        for ($i=0; $i < count($matIDs); $i++){
            for ($j=0; $j < 13; $j++) {
                for ($k=0; $k < count($bookCategory); $k++) {
                    $books = new Book;
                    $books->name = 'Название книги ' . $k;
                    $books->filename = '1.pdf';
                    $books->material_id = $matIDs[$i];
                    $books->category = $bookCategory[$k];
                    $books->description = 'Книга — один из видов печатной продукции: непериодическое издание';
                    $books->save();
                }
            } 
        }

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
                'categories' => [[  'name'=> 'ТРКИ-1',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'ТРКИ-2',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'ТРКИ-3',
                                    'materials'=> [['name' => 'Классная книга',
                                                    'type' => 'book',
                                                    'category' => 'coursebook'],
                                                   ['name' => 'Рабочая книга',
                                                    'type' => 'book',
                                                    'category' => 'workbook'],
                                                   ['name' => 'Видео уроки',
                                                    'type' => 'video',
                                                    'category' => 'lessons']]],
                                 [  'name'=> 'ТРКИ-4',
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
                                    'materials'=> [['name' => 'Надземная работа',
                                                    'type' => 'video',
                                                    'category' => 'overheadWork'],
                                                   ['name' => 'Подземная работа',
                                                    'type' => 'video',
                                                    'category' => 'undergroundWork'],
                                                   ['name' => 'Верхолазная работа',
                                                    'type' => 'video',
                                                    'category' => 'climbingWork']]],
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
                                 [  'name'=> 'AutoCAD',
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
                                 [  'name'=> 'ArchiCAD',
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
    }
}
