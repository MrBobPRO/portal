<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\Choice;
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
use App\Models\Option;
use App\Models\Questionnaire;
use App\Models\Slider;

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
        $departaments = ['Не выбрано', 'Аудит', 'Бухгалтерия', 'Внешние закупки', 'Внутренние закупки', 'ПНУ', 'Международные тендеры', 'PR и Маркетинг', 'Внутренние тендеры', 'ОГМ', 'Информационые технологии и безопасности', 'Административно-хозяйственный', 'Кадровое администрирования', 'Логистики и таможняя очистка', 'Авто-транспорт', 'Бетонно-смеситель', 'Бухгалтерский учёт и отчетность', 'Геодезия', 'Дробильно-сортировочное хозяйство', 'Информационые технологии', 'Контроль качества', 'Лаборатория', 'Охрана окружающей среды ТБ и ОТ', 'Планово-экономический', 'Снабжения', 'Технический', 'Хозяйственный', 'Эксплуатация', 'Электро-монтажный', 'ПТО'];
        $dep_priority = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];

        for ($i = 0; $i<count($departaments); $i++) {
            $dep = new Department;
            $dep->name = $departaments[$i];
            $dep->priority = $dep_priority[$i];
            $dep->save();
        }

        //Designations
        $designations = ['Не выбрано', 'Генеральный директор', 'Заместитель генерального директора', 'Руководитель', 'Заместитель руководителя', 'Главный специалист', 'Ведущий специалист', 'Младший специалист', 'Стажёр'];
        $desPriority = [0,1,2,3,4,5,6,7,8];

        for ($i = 0; $i<count($designations); $i++) {
            $des = new Designation;
            $des->name = $designations[$i];
            $des->priority = $desPriority[$i];
            $des->save();
        }


        //Positions
        $positions = ['Не выбрано', 'Ёрдамчии молиячии иқтисодчи', 'Муҳосиб', 'Молиячи-иқтисодчи', 'Мутахассис', 'Мутахассиси шуъба', 'Мудири анбор', 'Муҳандис - танзимгар', 'Сардори шуъба', 'Муҳандиси корҳои сметави', 'Муовини сармуҳосиб', 'Муҳандиси шуъба', 'Сармеханик', 'Маъмури системави', 'Менеҷери лоиҳа', 'Муовини сардор', 'Муҳосиби музди меҳнат', 'Сармутахассис', 'Директори департамент', 'Сардори раёсати кадрҳо', 'Директори генерали', 'Сармуҳандис', 'Директори иҷроия', 'Механики калон', 'Муовини сармеханик', 'Ёрдамчии Сардори КНА', 'Сардор', 'Муҳандис-геодезисти пешбар', 'Муҳандис (оид ба сист. мушоҳидаи камерави)', 'Мутахассис (Мorpho DB)', 'Муҳандис', 'Муҳандиси пешбар', 'Мутахассис (оид ба хариди беруни)', 'Сардори РСИ дар ш.Роғун', 'Муҳандиси сохтмон', 'Муҳандиси гидротехникӣ', 'Мудири хоҷаги', 'Мув. Иҷ. Сардори қитъа'];

        for ($i = 0; $i<count($positions); $i++) {
            $pos = new Position;
            $pos->name = $positions[$i];
            $pos->save();
        }

        // $avatars = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg'];
        $names = ['Админ', 'Саидакбар', 'Ҷаҳонгир', 'Давлатёр', 'Искандар', 'Муҳаммад', 'Давид', 'Сорбони', 'Саъдулло', 'Рустамҷон', 'Илҳомҷон', 'Муборакхотун', 'Суҳроб', 'Ҷамшед', 'Парвиз', 'Баҳриддин', 'Икмолиддини', 'Боирҷон', 'Меҳровар', 'Меҳроҷиддин', 'Бехруз', 'Махмадулло', 'Шавқат', 'Бахтовар', 'Илҳом', 'Диловар', 'Суҳроб', 'Абдурозиқ', 'Меҳрнуш', 'Ваҳобҷон', 'Ҳусейн', 'Шокир', 'Ахмадҷон', 'Наврӯзи', 'Баҳодур', 'Иқбол', 'Баҳром', 'Тулкунҷон', 'Далер', 'Ахмад', 'Сохибназар', 'Далер', 'Баҳодур', 'Аламшо', 'Исмоил', 'Гулназар', 'Саидислом', 'Алишер', 'Шоҳзода', 'Азаматҷон', 'Фазлиддин', 'Фаррух', 'Хаким', 'Турон', 'Масрур', 'Фаридун', 'Шокирджон', 'Шоҳин', 'Ҷумахон', 'Ёқуб', 'Мирзошариф', 'Сайфиддин', 'Фазлиддин', 'Ҷайҳуни', 'Абдурасул', 'Муҳаммадзариф', 'Фирдавс', 'Меҳроҷиддин', 'Файзали', 'Сироҷиддин', 'Лутфуллои', 'Аҳлидин'];
        $surnames = ['Админ', 'Акбаров', 'Қурбонов', 'Раҷабов', 'Бобоев', 'Муҳаммадиев', 'Силемонов', 'Сафарали', 'Убайдов', 'Сатторов', 'Баротов', 'Сафармамадова', 'Садуллоев', 'Исмоилзода', 'Зокиров', 'Аббосзода', 'Инъомуддин', 'Хайруллоев', 'Давлатов', 'Мирзоев', 'Сафаров', 'Собиров', 'Раҳимов', 'Ҳакимов', 'Бобоев', 'Миров', 'Очилов', 'Абдулфайзов', 'Бобохонов', 'Хоҷаев', 'Охонов', 'Бобоев', 'Муродалиев', 'Юсуфзод', 'Бурибоев', 'Сафаров', 'Азимзода', 'Муҳаммадиев', 'Низомов', 'Абдуллоев', 'Асанов', 'Каримов', 'Ҳаётов', 'Ҷураев', 'Мародмамадов', 'Нураётов', 'Муҳиддинов', 'Сиддиқов', 'Муҳиддинов', 'Қамбаралиев', 'Шамсудинов', 'Саидзода', 'Султонов', 'Худойдодов', 'Яқубов', 'Набиев', 'Сафаров', 'Муминзода', 'Раҷабов', 'Садиров', 'Мухамадов', 'Одинаев', 'Холов', 'Раҳматзода', 'Қосимов', 'Ҳасанов', 'Тиллоев', 'Ибрагимов', 'Ғуломов', 'Қодирқулов', 'Лутфуллои', 'Сафаров'];
        $patronymics = ['', 'Саидаъзамович', 'Сулаймонович', 'Абдулсаидович', 'Рустамович', 'Тулқунҷонович', 'Синавбарович', '', 'Ҳамудллоевич', 'Икромҷонович', 'Ҳабибович', 'Карамшоевна', 'Рустамович', '', 'Саидқулович', '', '', 'Баҳодурҷонович', 'Бурҳонович', 'Ҷамолович', 'Икромович', 'Рустамович', 'Абдуҷаборович', 'Давлатович', 'Мирзоалиевич', 'Мавҷудович', 'Алиҷонович', 'Абдураҳмонович', 'Зиёратшоевич', 'Ҳусейнович', 'Мамадҷонович', 'Абдуфатоевич', 'Мавҷудалиевич', '', 'Атауллоевич', 'Давлатович', 'Рауф', 'Раҳматҷонович', 'Ҳабибуллоевич', 'Акдодович', 'Мавлонназарович', 'Маҳмадуллоевич', 'Асадхуҷаевич', 'Шарифович', 'Амирмамадович', 'Худойназарович', 'Муслиҳиддинович', 'Тошмирзоевич', 'Муслиҳиддинович', 'Алиҷонович', 'Фатҳудинович', 'Рустам', 'Бобокулович', 'Исломидинович', 'Маҳмадуллоевич', 'Бахтиёрович', 'Хайдарович', 'Амрулло', 'Умарович', 'Хуҷамадович', 'Рахматшоевич', 'Олимхуҷаевич', 'Аббосович', 'Нематулло', 'Талбонович', 'Ҷафаралиевич', 'Саидмуродович', 'Илҳомиддинович', 'Бекназарович', 'Ҳуснидинович', '', 'Мирзоалиевич'];
        $login_id = ['5FHaLyd9', 'A0000512', 'A0000629', 'A0000418', 'A0000008', 'A0000529', 'A0000593', 'A0000495', 'A0000603', 'A0012777', 'A0000130', 'A0000639', 'A0000150', 'A0000137', 'A0000280', 'A0010206', 'A0000019', 'A0000049', 'A0010399', 'A0000077', 'A0000042', 'A0000044', 'A0000574', 'A0000481', 'A0010228', 'A0000602', 'A0000611', 'A0000496', 'A0000010', 'A0000052', 'A0000037', 'A0000009', 'A0000029', 'A0010933', 'A0000559', 'A0000043', 'A0000002', 'A0000031', 'A0014074', 'A0010010', 'A0010145', 'A0014338', 'A0011583', 'A0014289', 'A0010743', 'A0010996', 'A0000583', 'A0011423', 'A0010916', 'A0010547', 'A0000604', 'A0014436', 'A0015275', 'A0014753', 'A0011973', 'A0015515', 'A0011398', 'A0015543', 'A0014056', 'A0012855', 'A0010909', 'A0011027', 'A0011111', 'A0014469', 'A0014296', 'A0013369', 'A0011504', 'A0012207', 'A0015194', 'A0000024', 'A0010728', 'A0011359'];
        $emails = ['tgem_admin@mail.ru', 'saidakbar.akbarov@tgem.tj', 'jahongir.kurbonov@tgem.tj', 'davlatyor.rajabov@tgem.tj', 'iskandar.boboev@tgem.tj', 'muhammad.muhammadiev@tgem.tj', 'david.silemonov@tgem.tj', 'sorboni.safarali@tgem.tj', 'sadullo.ubaidov@tgem.tj', 'rustam.sattorov@tgem.tj', 'ilkhomjon.barotov@tgem.tj', 'muborak.safarmamadova@tgem.tj', 'suhrob.sadulloev@tgem.tj', 'jamshed.ismoilzoda@tgem.tj', 'parviz.zokirov@tgem.tj', 'b.abboszoda@tgem.tj', 'ikmoliddini.inomuddin@tgem.tj', 'boirjon.khairulloev@tgem.tj', 'mehrovar.davlatov@tgem.tj', 'mehrojiddin.mirzoev@tgem.tj', 'behruz.safarov@tgem.tj', 'mahmadulo.sobirov@tgem.tj', 'shavkat.rakhimov@tgem.tj', 'hbd@tgem.tj', 'Ilkhom.boboev@tgem.tj', 'dilovar.mirov@tgem.tj', 'suhrob.ochilov@tgem.tj', 'abdurozik.abdulfaizov@tgem.tj', 'mehrnush.bobohon@tgem.tj', 'vahob.hojaev@tgem.tj', 'husein.okhonov@tgem.tj', 'shokir.boboev@tgem.tj', 'ahmadjon.murodaliev@tgem.tj', 'navruzi.yusufzod@tgem.tj', 'bahodur.buriboev@tgem.tj', 'ikbol.safarov@tgem.tj', 'bakhrom.azimzoda@tgem.tj', 'm.tulkin@tgem.tj', 'daler.nizomov@tgem.tj', 'ahmad.abdulloev@tgem.tj', 'sohibnazar.asanov@tgem.tj', 'daler.karimov@tgem.tj', 'bohodur.hayotov@tgem.tj', 'alamsho.juraev@tgem.tj', 'ismoil.marodmamadov@tgem.tj', 'nurhayotov.gulnazar@tgem.tj', 'saidislom.mukhiddinov@tgem.tj', 'alisher.siddikov@tgem.tj', 'shahzod.mukhiddinov@tgem.tj', 'azamat.qambaraliev@tgem.tj', 'fazliddin.shamsudinov@tgem.tj', 'farruh.saidzoda@tgem.tj', 'hakim.sultonov@tgem.tj', 'turon.hudoydodov@tgem.tj', 'masrur.yakubov@tgem.tj', 'faridun.nabiev@tgem.tj', 'shokir.safarov@tgem.tj', 'shohin.muminzoda@tgem.tj', 'jumahon.rajabov@tgem.tj', 'sadirov.yokub@tgem.tj', 'mirzosharif.muhammadov@tgem.tj', 'sayfiddin.odinaev@tgem.tj', 'fazliddin.holov@tgem.tj', 'jayhuni.rahmatzoda@tgem.tj', 'abdurasul.kosimov@tgem.tj', 'muhammadzarif.hasanov@tgem.tj', 'firdavs.tilloev@tgem.tj', 'mehrojiddin.ibragimov@tgem.tj', 'fayzali.gulomov@tgem.tj', 'sirojiddin.kodirkulov@tgem.tj', 'lutfulloi.abdualim@tgem.tj', 'ahlidin.safarov@tgem.tj'];
        $phones = ['', '904022682', '987600760', '985683988', '928544422', '918972222', '501559580', '985545451', '988668100', '927736763', '918566310', '933889900', '885086556', '934410007', '927600209', '918559200', '927363320', '985880222', '901005533', '933034545', '901098778', '918411919', '935730030', '939870077', '989992822', '908889898', '989991060', '905554489', '985053400', '918989890', '918867000', '918544824', '907978026', '500000775', '932011111', '918674774', '985065300', '918418070', '900901996', '934375225', '985366269', '774444327', '985589922', '985163445', '988490004', '933741616', '902813838', '981051865', '989992201', '989991936', '909944033', '907560809', '937956827', '935719952', '988788811', '904025005', '907391017', '54008', '904019001', '901062614', '989992206', '988727009', '918559100', '937790530', '918167918', '987444941', '988267617', '919088075', '938417575', '985587789', '918447009', '939300424'];

        
        $today = date('Y-m-d');
        $tomorrow = strtotime("+1 day");
        $afterTomorrow = strtotime("+2 day");

        // $birthdates = [
        //     date_create_from_format('Y-m-d', '1997-04-05'),
        //     date_create_from_format('Y-m-d', '1987-04-03'),
        //     date_create_from_format('Y-m-d', '1956-04-03'),
        //     date_create_from_format('Y-m-d', '2000-04-06'),
        //     date_create_from_format('Y-m-d', '2001-04-07'),
        //     date_create_from_format('Y-m-d', '1990-' . date('m-d')),
        //     date_create_from_format('Y-m-d', '1996-' . date('m-d', $tomorrow)),
        //     date_create_from_format('Y-m-d', '1990-04-06'),
        //     date_create_from_format('Y-m-d', '2001-' . date('m-d', $afterTomorrow)),
        //     date_create_from_format('Y-m-d', '2001-04-07')
        // ];

        $des_id = [2,3,4,7,7,4,5,7,8,9];
        $pos_id = [1,2,3,4,5,6,5,7,5,8,5,3,8,9,10,11,12,9,9,13,14,9,15,9,16,5,15,17,5,9,16,18,19,15,20,21,22,23,24,25,25,26,27,27,28,16,16,27,27,9,29,16,30,30,27,16,16,31,32,32,27,33,34,35,35,31,35,35,36,37,27,28];
        $dep_id = [1,2,3,2,4,4,4,5,4,6,7,3,6,8,30,3,9,4,30,10,11,12,9,2,13,14,6,3,4,5,4,4,1,1,1,1,1,1,15,15,15,15,16,17,18,18,18,18,19,20,20,20,13,13,21,22,23,24,24,24,25,25,1,26,26,26,26,26,26,27,28,29];

        for ($i=0; $i < count($names); $i++) {
            $user = new User;
            $user->name = $names[$i];
            $user->surname = $surnames[$i];
            $user->patronymic = $patronymics[$i];
            $user->role = 'user';
            if($i == 0) $user->role = 'admin';
            $user->birth_date = date_create_from_format('Y-m-d', '2000-01-01');
            $user->email = $emails[$i];
            $user->phone = $phones[$i];
            $user->login_id = $login_id[$i];
            $user->password = bcrypt($login_id[$i]);
            $user->avatar = 'default.png';
            if($i == 0) $user->avatar = 'admin.jpg';
            $user->department_id = $dep_id[$i];
            $user->position_id = $pos_id[$i];
            $user->description = 'Коротко о себе...';
            $user->save();
            $user->projects()->attach(rand(1,8));
        }

        $uu = User::find(1);
        $uu->projects()->attach(9);
        $uu->projects()->attach(10);

        //Create languages
        $ruName = ['Английский', 'Арабский', 'Испанский', 'Итальянский', 'Французский', 'Китайский', 'Индийский', 'Японский', 'Русский', 'Таджикский', 'Турецкий', 'Узбекский'];
        $enName = ['English', 'Arab', 'Spanish', 'Italian', 'French', 'Chinese', 'Indian', 'Japanese', 'Russian', 'Tajik', 'Turkish', 'Uzbek'];
        $tjName = ['Англисӣ', 'Арабӣ', 'Испанӣ', 'Итолёвӣ', 'Фаронсавӣ', 'Хитоӣ', 'Ҳиндӣ', 'Ҷопонӣ', 'Русӣ', 'Тоҷикӣ', 'Туркӣ', 'Узбекӣ'];

        for ($i = 0; $i < count($ruName); $i++) {
            $lang = new Language;
            $lang->ruName = $ruName[$i];
            $lang->enName = $enName[$i];
            $lang->tjName = $tjName[$i];
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
        $i->text = "<p>Предлагаю <b>всей тимой</b> сходить 20 августа в Искендеркуль на тимбилндинги ! Причины</p><ol><li>&nbsp;Давно не ходили в тимбилдинги</li><li>Заслужили</li><li>Отдых не помешает</li><li>Темболее погодая какая классная!</li></ol><p>Озеро&nbsp;Искандеркуль&nbsp;по преданиям получило своё название от имени&nbsp;Александра Македонского[1], которого на Востоке называли&nbsp;Искандер Зулькарнайн&nbsp;(Искандер двурогий). Слово «куль» (тадж.&nbsp;кӯл,&nbsp;узб.&nbsp;ko'l) означает собственно «озеро», отсюда название&nbsp;— «Искандеркуль». Александр Македонский якобы здесь побывал на своём пути из&nbsp;Средней Азии&nbsp;в&nbsp;Индию.<br></p><p><img alt='Iskanderkul-na-16-polosu.jpg' src='/img/ideas/simditor/AR4z953JqjyD1G3.jpg' width='960' height='720'><br></p><p>Озеро имеет завальный тип строения, оно подпружено&nbsp;мореной, засыпанной сверху горной породой, что явилось результатом обвала, возможно вследствие сильного землетрясения. Озеро расположено на высоте 2195 метров над уровнем моря, в отрогах горного узла&nbsp;Кухистан, между западными оконечностями Гиссарского и Зерафшанского хребтов.<br></p><p>Общая площадь водной поверхности озера составляет 3,4 км², глубина озера достигает 72 метров, объём по данным 1978 года, составляло 0,24 км³[2]. По мнению ученых, в древности озеро имело более высокий уровень воды, следы которого можно увидеть на склонах окружающих гор, на высоте более 120 метров[3].<br></p><p>В озеро впадают реки&nbsp;Сарытаг,&nbsp;Хазормечь, Сарима, а также мелкие горные ручьи. Из озера вытекает река&nbsp;—&nbsp;Искандердарья, входящая в бассейн&nbsp;Зеравшана.<br></p>
        <p>Кто едет ставим лайки!";
        $i->user_id = 4;
        // $i->created_at = date_create_from_format('Y-m-d H:i:s', date('Y-m-d') . ' 08:22:00');
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
        
        $s = new Slider;
        $s->image = '1.jpg';
        $s->url = 'http://portal.tgem.tj/dashboard/ideas/1';
        $s->title = 'Очень важная новость, голосуй !';
        $s->priority = 1;
        $s->save();

        $s = new Slider;
        $s->image = '2.jpg';
        $s->priority = 2;
        $s->save();

        $a = new Ads;
        $a->text = 'С 1 июня до 25 августа в столовой обеда не будет, так как в столовой начнется ремонт. С наилучшими пожеланиями администрация!';
        $a->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-25 10:27:07');
        $a->save();

        $a = new Ads;
        $a->text = 'Спешу сообщит всем, что 5 июля Икром Рахимов устраивает вечеринку у себя на даче. Приглашены все!';
        $a->created_at = date_create_from_format('Y-m-d H:i:s', '2021-05-25 09:30:22');
        $a->save();


        //questionnaire
        $q = new Questionnaire;
        $q->text = 'Дорогие коллеги, давайте по честному проголосуем. Кто будет дежурить в грядущие выходные??';
        $q->private = false;
        $q->save();
        //options
        $o = new Option;
        $o->text = 'Бахтиёр';
        $o->questionnaire_id = 1;
        $o->save();
        $o = new Option;
        $o->text = 'Мансур';
        $o->questionnaire_id = 1;
        $o->save();
        $o = new Option;
        $o->text = 'Исмоил';
        $o->questionnaire_id = 1;
        $o->save();
        $o = new Option;
        $o->text = 'Манучехр';
        $o->questionnaire_id = 1;
        $o->save();
        //choices
        $c = new Choice;
        $c->user_id = 1;
        $c->option_id = 1;
        $c->save();
        $c = new Choice;
        $c->user_id = 2;
        $c->option_id = 1;
        $c->save();
        $c = new Choice;
        $c->user_id = 3;
        $c->option_id = 2;
        $c->save();
        $c = new Choice;
        $c->user_id = 4;
        $c->option_id = 4;
        $c->save();
        $c = new Choice;
        $c->user_id = 9;
        $c->option_id = 4;
        $c->save();
        $c = new Choice;
        $c->user_id = 6;
        $c->option_id = 4;
        $c->save();
        $c = new Choice;
        $c->user_id = 7;
        $c->option_id = 4;
        $c->save();
        $c = new Choice;
        $c->user_id = 8;
        $c->option_id = 4;
        $c->save();

        //Run second seeder
        $this->call([
            SecondSeeder::class
        ]);


    }
}
