<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Language;
use App\Models\Department;
use App\Models\Position;
use App\Models\Designation;
use App\Models\Complaint;
use App\Models\Image;
use App\Models\Gallery;
use App\Models\Grade;
use App\Models\Idea;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Gallery
        $galleryRu = ['Праздник Навруз', 'Тимбилдинг', 'Новый год', 'Поход'];
        $galleryTj = ['Иди Навруз', 'Тимбилдинг', 'Соли нав', 'Поход'];
        $galleryEn = ['Navruz', 'Teambuilding', 'New year', 'Party'];

        for($i=0; $i < count($galleryRu); $i++) {
            $gallery = new Gallery;
            $gallery->ruTitle = $galleryRu[$i];
            $gallery->tjTitle = $galleryTj[$i];
            $gallery->enTitle = $galleryEn[$i];
            $gallery->image = ($i+1) . '.jpg';
            $gallery->date = date_create_from_format('Y-m-d', '2018-04-0' . ($i+1));
            $gallery->save();  
        }

        //Images
        $qq = 1;
        for($x=1; $x<5; $x++) {
            for($i=0; $i < 9; $i++) {
                $image = new Image;
                $image->filename = $qq . '.jpg';
                $image->gallery_id = $x;
                $image->save();
                $qq++;
            }
        }


        //Departments
        $departaments = ['Руководство', 'Отдел управление персоналом', 'Отдел юридических аспектов', 'Отдел финансов', 'Отдел разработки программного обеспечения', 'Отдел ИТ', 'Отдел маркетинга'];
        $dep_priority = [1,2,3,4,5,6,7,];

        for ($i = 0; $i<count($departaments); $i++) {
            $dep = new Department;
            $dep->name = $departaments[$i];
            $dep->priority = $dep_priority[$i];
            $dep->save();
        }

        //Designations
        $designations = ['Генеральный директор', 'Заместитель генерального директора', 'Руководитель', 'Заместитель руководителя', 'Главный специалист', 'Ведущий специалист', 'Младший специалист', 'Стажёр'];
        $desPriority = [1,2,3,4,5,6,7,8];

        for ($i = 0; $i<count($designations); $i++) {
            $des = new Designation;
            $des->name = $designations[$i];
            $des->priority = $desPriority[$i];
            $des->save();
        }


        //Positions
        $positions = ['Руководитель высшего звена', 'Менеджер по работе с персоналом', 'Специалист по работе с персоналом', 'Специалист по юриспруденции', 'Специалист по регистрации товарных знаков', 'Переводчик', 'Senior разработчик', 'Middle разработчик', 'Junior разработчик',
        'Дизайнер', 'Научный редактор', 'Аналитик'];
        $dep_id = [1,2,2,3,3,7,5,5,5,7,7,7];

        for ($i = 0; $i<count($positions); $i++) {
            $pos = new Position;
            $pos->name = $positions[$i];
            $pos->department_id = $dep_id[$i];
            $pos->save();
        }

        $dep_id = [1,1,2,2,2,3,3,3,3,3];
        $des_id = [1,2,3,6,6,3,4,6,7,8];
        $pos_id = [1,1,2,3,3,4,4,4,6,11];

        //Create Users
        $avatars = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg'];
        $names = ['Икром', 'Бобур', 'Даврон', 'Дмитрий', 'Азамат', 'Медина', 'Снежанна', 'Амриддин', 'Михаил', 'Парвина'];
        $surnames = ['Рахимов', 'Нуридинов', 'Олегов', 'Камаров', 'Зияев', 'Иброровна', 'Бадоева', 'Холов', 'Сохибназаров', 'Мирославовна'];
        $nicknames = ['ikrom', 'bobur', 'miha', 'dima', 'admin', 'aza', 'snejok', 'amrik', 'user', 'skype'];
        $roles = ['admin', 'admin', 'user', 'user', 'admin', 'user', 'user', 'user', 'user', 'user'];
        $emails = ['ikromr04@gmail.com', 'boburjon_n@mail.ru', 'misha@mail.ru', 'dima@mail.ru', 'azamat@mail.ru', 'med_2000@mail.ru', 'snejok@mail.ru', 'amriqul@mail.ru', 'superman_sila@mail.ru', 'parvinka99@mail.ru'];

        $today = date('Y-m-d');
        $tomorrow = strtotime("+1 day");
        $afterTomorrow = strtotime("+2 day");

        $birthdates = [
            date_create_from_format('Y-m-d', '1997-04-05'),
            date_create_from_format('Y-m-d', '1987-04-03'),
            date_create_from_format('Y-m-d', '1956-04-03'),
            date_create_from_format('Y-m-d', '2000-04-06'),
            date_create_from_format('Y-m-d', '2001-04-07'),
            date_create_from_format('Y-m-d', '1990-' . date('m-d')),
            date_create_from_format('Y-m-d', '1996-' . date('m-d', $tomorrow)),
            date_create_from_format('Y-m-d', '1990-04-06'),
            date_create_from_format('Y-m-d', '2001-' . date('m-d', $afterTomorrow)),
            date_create_from_format('Y-m-d', '2001-04-07')
        ];

        for ($i=0; $i < count($names); $i++) {
            $user = new User;
            $user->name = $names[$i];
            $user->surname = $surnames[$i];
            $user->role = $roles[$i];
            $user->email = $emails[$i];
            $user->password = bcrypt('12345');
            $user->avatar = $avatars[$i];
            $user->nickname = $nicknames[$i];
            $user->birth_date = $birthdates[$i];
            $user->department_id = $dep_id[$i];
            $user->position_id = $pos_id[$i];
            $user->designation_id = $des_id[$i];
            $user->description = 'Родилась 27 сентября 1978 года в небольшом городе Кицмань на севере Черновицкой области Украинской ССР.';
            $user->save();
        }

        //Create languages
        $langs = ['Английский', 'Русский', 'Турецкий', 'Таджикский', 'Узбекский', 'Арабский'];
        foreach ($langs as $lan) {
            $lang = new Language;
            $lang->name = $lan;
            $lang->save();
        }

        $u = User::find(1);
        $u->languages()->attach(1);
        $u->languages()->attach(2);

        $u = User::find(2);
        $u->languages()->attach(3);
        $u->languages()->attach(4);


        $c = new Complaint();
        $c->user_id = 3;
        $c->title = 'Где мои новые наушники??';
        $c->text = 'Вы мне 2 месяца назад обещали новые наушники! И где же они???????? Мне ещё долго ждать их?? Или лучше самому купить?';
        $c->save();
        
        $i = new Idea;
        $i->title = 'Тимбилдинг в Искандаркуле!';
        $i->text = "<p>Предлагаю <b>всей тимой</b> сходить 20 июня в Искендеркуль на тимбилндинги ! Причины</p><ol><li>&nbsp;Давно не ходили в тимбилдинги</li><li>Заслужили</li><li>Отдых не помешает</li><li>Темболее погодая какая классная!</li></ol><p>Озеро&nbsp;Искандеркуль&nbsp;по преданиям получило своё название от имени&nbsp;Александра Македонского[1], которого на Востоке называли&nbsp;Искандер Зулькарнайн&nbsp;(Искандер двурогий). Слово «куль» (тадж.&nbsp;кӯл,&nbsp;узб.&nbsp;ko'l) означает собственно «озеро», отсюда название&nbsp;— «Искандеркуль». Александр Македонский якобы здесь побывал на своём пути из&nbsp;Средней Азии&nbsp;в&nbsp;Индию.<br></p><p><img alt='Iskanderkul-na-16-polosu.jpg' src='/img/ideas/simditor/AR4z953JqjyD1G3.jpg' width='960' height='720'><br></p><p>Озеро имеет завальный тип строения, оно подпружено&nbsp;мореной, засыпанной сверху горной породой, что явилось результатом обвала, возможно вследствие сильного землетрясения. Озеро расположено на высоте 2195 метров над уровнем моря, в отрогах горного узла&nbsp;Кухистан, между западными оконечностями Гиссарского и Зерафшанского хребтов.<br></p><p>Общая площадь водной поверхности озера составляет 3,4 км², глубина озера достигает 72 метров, объём по данным 1978 года, составляло 0,24 км³[2]. По мнению ученых, в древности озеро имело более высокий уровень воды, следы которого можно увидеть на склонах окружающих гор, на высоте более 120 метров[3].<br></p><p>В озеро впадают реки&nbsp;Сарытаг,&nbsp;Хазормечь, Сарима, а также мелкие горные ручьи. Из озера вытекает река&nbsp;—&nbsp;Искандердарья, входящая в бассейн&nbsp;Зеравшана.<br></p>
        <p>Кто едет ставим лайки!";
        $i->user_id = 4;
        $i->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-22 08:22:00');
        $i->save();

        $c = new Comment;
        $c->idea_id = 1;
        $c->user_id = 10;
        $c->body = 'Мы только за, если всё за счет компании))';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-22 09:00:00');
        $c->save();

        $c = new Comment;
        $c->idea_id = 1;
        $c->user_id = 8;
        $c->body = 'А мы едем с ночовкой или без?';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-22 09:20:00');
        $c->save();

        $c = new Comment;
        $c->idea_id = 1;
        $c->user_id = 7;
        $c->body = 'Ночовка наверное по желанию будет. Кто без ночовки, довезём после ужина по домам';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-22 09:22:00');
        $c->save();

        $g = new Grade;
        $g->like = true;
        $g->idea_id = 1;
        $g->user_id = 5;
        $g->save();

        $g = new Grade;
        $g->like = true;
        $g->idea_id = 1;
        $g->user_id = 4;
        $g->save();

        $g = new Grade;
        $g->like = true;
        $g->idea_id = 1;
        $g->user_id = 3;
        $g->save();

        $g = new Grade;
        $g->like = false;
        $g->idea_id = 1;
        $g->user_id = 10;
        $g->save();

        //Run second seeder
        $this->call([
            SecondSeeder::class
        ]);


    }
}
