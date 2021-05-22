<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Language;
use App\Models\Department;
use App\Models\Position;
use App\Models\Designation;
use App\Models\Chat;
use App\Models\Complaint;
use App\Models\Image;
use App\Models\Gallery;
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
            date_create_from_format('Y-m-d', '1800-04-06'),
            date_create_from_format('Y-m-d', '2001-04-07'),
            date_create_from_format('Y-m-d', '1990-' . date('m-d')),
            date_create_from_format('Y-m-d', '1996-' . date('m-d', $tomorrow)),
            date_create_from_format('Y-m-d', '1800-04-06'),
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


        $txts = ['test1','test2','test3','test4','test5','test6','test7','test8','test9','test10','test11','test12','test13','test14','test15','test16','test17','test18','test19','test20', 'test21','test22','test23','test24','test25','test26','test27','test28','test29','test30','test31','test32','test33','test34','test35','test36','test37','test38','test39','test40', 'test41','test42','test43','test44','test55','test46','test47','test48','test49','test50','test51','test52','test53','test54','test55','test56','test57','test58','test59','test60','Привет, акаи Бобур!', 'Добрый день, Икром', 'Мне нужна ваша помощь ака', 'Слушаю??', 'Так как меня не было вчера я не получил свои задачки. У вас же они есть можете мне отправить?', 'Хорошо я тебе отправлю', 'Спасибо, вы лучший!', 'Кто бы сомневался!'];
        //chat
        for ($i = 0; $i < count($txts); $i++) {
            $c = new Chat;
            if($i % 2 ==0)
                $c->user_id = 1;
            else
                $c->user_id = 2;
            $c->text = $txts[$i];
            if($i < 10)
                $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-04-23 12:44:0' . $i);
            else
                $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-04-23 12:44:' . $i);
            $c->save();
        }

        $c = new Chat;
        $c->user_id = 4;
        $c->text = '12345';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-04-24 08:30:00');
        $c->save();

        $c = new Chat;
        $c->user_id = 4;
        $c->text = '67890 1234567890';
        $c->created_at = date_create_from_format('Y-m-d H:i:s', '2021-04-24 08:31:00');
        $c->save();
        
        //Run second seeder
        $this->call([
            SecondSeeder::class
        ]);

        $c = new Complaint();
        $c->user_id = 3;
        $c->title = 'Где мои новые наушники??';
        $c->text = 'Вы мне 2 месяца назад обещали новые наушники! И где же они???????? Мне ещё долго ждать их?? Или лучше самому купить?';
        $c->save();


    }
}
