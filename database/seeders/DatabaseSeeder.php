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
        $avaUrls = ['ava.jpg', 'batman.jpg', 'mrod.jpg', 'user.jpg', 'joker.jpg'];
        $names = ['Raketa', 'Bruce', 'Murod', 'Jumagul', 'Arthur'];
        $surnames = ['Vespuchi', 'Banner', 'Bahramov', 'Odinaeva', 'Fleck'];
        $emails = ['ikrom@mail.ru', 'bruce@mail.ru', 'murod@mail.ru', 'raketa@mail.ru', 'arthur@mail.ru'];
        $birthdays = [
            date_create_from_format('Y-m-d', '1997-04-01'),
            date_create_from_format('Y-m-d', '1987-03-31'),
            date_create_from_format('Y-m-d', '1956-04-05'),
            date_create_from_format('Y-m-d', '1800-04-04'),
            date_create_from_format('Y-m-d', '2001-03-11')
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

        $imageUrls = ['news1.jpg', 'news2.jpg', 'news3.jpg'];
        $titles = ['Is Pizza better than Qurutob?', 'We need seniors', 'Who stole my mood?'];
        $texts = [
            'Мы подберем оптимальное решение под ваши задачи, выполним тонкую настройку нашей платформы с учетом всех особенностей вашей компании и поможем вовлечь сотрудников и изменить их поведение с привычного на желаемое.',
            'Более 100 успешных проектов в компаниях со штатом от 50 до 18 000 человек.',
            'Подписание инвестиционного соглашения о строительстве и эксплуатации предприятия по производству электрического оборудования в городе Душанбе'
        ];
        for ($i = 0; $i < count($titles); $i++) 
        {
            $news = new News;
            $news->imageUrl = $imageUrls[$i];
            $news->title = $titles[$i];
            $news->text = $texts[$i];
            $news->save();
        } 
    }
}
