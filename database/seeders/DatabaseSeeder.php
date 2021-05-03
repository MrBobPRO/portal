<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Language;
use App\Models\Department;
use App\Models\Position;
use App\Models\Designation;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

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
        $nicknames = ['ikrom', 'Bob', 'miha', 'dima', 'aza', 'medina', 'snejok', 'amrik', 'superman', 'skype'];
        $roles = ['admin', 'admin', 'user', 'user', 'user', 'user', 'user', 'user', 'user', 'user'];
        $emails = ['ikromr04@gmail.com', 'boburjon_n@mail.ru', 'misha@mail.ru', 'dima@mail.ru', 'azamat@mail.ru', 'med_2000@mail.ru', 'snejok@mail.ru', 'amriqul@mail.ru', 'superman_sila@mail.ru', 'parvinka99@mail.ru'];
        $birthdates = [
            date_create_from_format('Y-m-d', '1997-04-05'),
            date_create_from_format('Y-m-d', '1987-04-03'),
            date_create_from_format('Y-m-d', '1956-04-03'),
            date_create_from_format('Y-m-d', '1800-04-06'),
            date_create_from_format('Y-m-d', '2001-04-07'),
            date_create_from_format('Y-m-d', '1997-04-05'),
            date_create_from_format('Y-m-d', '1987-04-03'),
            date_create_from_format('Y-m-d', '1956-04-03'),
            date_create_from_format('Y-m-d', '1800-04-06'),
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

        
        //Run second seeder
        $this->call([
            SecondSeeder::class
        ]);

    }
}
