<?php


namespace application\model;
require_once('Model.php');

class CreateDB extends Model
{
    private $createTableQueries = array(
//        "CREATE TABLE `users` (
//          `id` int(11) NOT NULL AUTO_INCREMENT,
//          `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `admin` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`),
//          UNIQUE KEY (`email`,`username`)
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

//        "CREATE TABLE `actors` (
//          `id` int(11) NOT NULL AUTO_INCREMENT,
//          `first_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `last_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `picture` varchar(200) NOT NULL,
//          `birth_date` varchar(100) ,
//          `birth_place` varchar(100) ,
//          `bio` varchar(1000) COLLATE utf8_persian_ci,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`)
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//        "CREATE TABLE `actor_pictures` (
//          `actor_id` int(11) NOT NULL ,
//          `picture` varchar(200),
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`actor_id`,`picture`),
//          FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//
//        "CREATE TABLE `directors` (
//          `id` int(11) NOT NULL AUTO_INCREMENT,
//          `first_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `last_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `birth_date` varchar(100) ,
//          `birth_place` varchar(100) ,
//          `picture` varchar(200) COLLATE utf8_persian_ci,
//          `bio` varchar(1000) COLLATE utf8_persian_ci,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`)
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//        "CREATE TABLE `director_pictures` (
//          `director_id` int(11) NOT NULL ,
//          `picture` varchar(200) COLLATE utf8_persian_ci,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`director_id`,`picture`),
//          FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//        "CREATE TABLE `movies` (
//          `id` int(11) NOT NULL AUTO_INCREMENT,
//          `movie_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `director` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `author` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `release_date` varchar(100),
//          `trailer` varchar(100) COLLATE utf8_persian_ci,
//          `picture` varchar(200) COLLATE utf8_persian_ci,
//          `score` varchar(200) COLLATE utf8_persian_ci,
//          `summary` varchar(2000) COLLATE utf8_persian_ci,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`)
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//        "CREATE TABLE `movie_pictures` (
//          `movie_id` int(11) NOT NULL ,
//          `picture` varchar(200) COLLATE utf8_persian_ci,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`movie_id`,`picture`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//
//        "CREATE TABLE `movie_genre` (
//          `movie_id` int(11) NOT NULL,
//          `genre` varchar(100) COLLATE utf8_persian_ci NOT NULL,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`movie_id`,`genre`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//        "CREATE TABLE `watchList` (
//          `movie_id` int(11) NOT NULL,
//          `user_id` int(11) NOT NULL,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`movie_id`,`user_id`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
//          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//        "CREATE TABLE `movie_actor` (
//          `movie_id` int(11) NOT NULL,
//          `actor_id` int(11) NOT NULL,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`movie_id`,`actor_id`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//
//        "CREATE TABLE `comments` (
//          `id` int(11) NOT NULL AUTO_INCREMENT,
//          `user_id` int(11) NOT NULL,
//          `movie_id` int(11)  NOT NULL,
//          `text` text COLLATE utf8_persian_ci NOT NULL,
//          `permission` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
//          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//          )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

//        "CREATE TABLE `blogs` (
//          `id` int(11) NOT NULL AUTO_INCREMENT,
//          `movie_id` int(11)  NOT NULL,
//          `actor_id` int(11)  NOT NULL,
//          `picture` varchar(200) COLLATE utf8_persian_ci,
//          `text` text COLLATE utf8_persian_ci NOT NULL,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
//          FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
//          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

//        "CREATE TABLE `votes` (
//          `id` int(11) NOT NULL AUTO_INCREMENT,
//          `title` varchar(200) COLLATE utf8_persian_ci  NOT NULL,
//          `candidate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`,`title`,`candidate`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
//          FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)
//           ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
//
//        "CREATE TABLE `votes` (
//          `vote_id` int(11) NOT NULL AUTO_INCREMENT,
//          `user_id` int(11) NOT NULL,
//          `title`  varchar(200) COLLATE utf8_persian_ci  NOT NULL,
//          `candidates` varchar(200) COLLATE utf8_persian_ci NOT NULL,
//          `created_at` datetime NOT NULL,
//          `updated_at` datetime DEFAULT NULL,
//          PRIMARY KEY (`id`),
//          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
//          FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)
//           ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

    );

    private $tableInitializes = array(

//        ['table' => 'movie_actor', 'fields' => ['movie_id','actor_id'], 'values' => ['1', '1']]

//        ['table' => 'actors', 'fields' => ['first_name', 'last_name', 'birth_date', 'birth_place', 'bio'], 'values' => ['امین', 'حیایی', '۱۹ خرداد ۱۳۴۹', 'تهران',
//            'امین حیایی در ۱۹ خرداد ۱۳۴۹ در تهران در محله قیطریه[نیازمند منبع] به دنیا آمد پدرش تقی حیایی کارمند شغل آزاد بود در دوران تحصیل به فعالیت در تئاتر پرداخت و پس از گرفتن دیپلم، ضمن خدمت سربازی در مرکز هنرهای نمایشی عقیدتی - سیاسی نیروی هوایی فعالیتش را آغاز کرد. در سال ۱۳۷۰ بازیگر یک تئاتر کودکان به کارگردانی ثریا قاسمی بود. در پانزدهمین جشنواره فیلم فجر نامزد دریافت جایزه بازیگر نقش دوم برای فیلم «براده‌های خورشید» شد.'],
//        ], ['table' => 'actors', 'fields' => ['first_name', 'last_name', 'birth_date', 'birth_place', 'bio'], 'values' => ['هومن', 'سیدی', '۸ آذر ۱۳۵۹۹', 'تهران',
//            'هومن سیدی پس از پایان دبیرستان و دریافت دیپلم گرافیک کار خود را با حضور در کلاس‌های انجمن سینمای جوان رشت و ساخت چند فیلم کوتاه آغاز کرد. سپس به تهران آمد و در کلاس‌های بازیگری کارنامه به مدیریت پرویز پرستویی شرکت کرد. او فرزند دوم خانواده است و ۲ برادر (حامد و هامون) و یک خواهر (هیلدا) دارد. مادرش بازنشسته نیروی دریایی است و پدرش بازنشسته کارمند بانک کشاورزی.']],

//        ['table' => 'movies', 'fields' => ['movie_name', 'director', 'release_date', 'trailer', 'picture', 'score', 'summary'],
//            'values' => ['طعم گیلاس','عباس کیارستمی', '۱۳۷۶', 'https://www.didestan.com/video/m8kmO9xG', 'https://fa.wikipedia.org/wiki/%D9%BE%D8%B1%D9%88%D9%86%D8%AF%D9%87:%D8%B7%D8%B9%D9%85_%DA%AF%DB%8C%D9%84%D8%A7%D8%B3.jpg', '8', 'محمد تاجیک –طعم گیلاس فیلم برگزیده نخل طلای کن تولید مشترک با فرانسه محصول ۱۹۹۷ میلادی است. فیلم درباره مردی است که در حومهٔ شهر تهران، با اتوموبیلش دنبال کسی می‌گردد که تقاضای پردردسر او را در ازای دریافت ۲۰۰هزار تومان پول انجام دهد.فیلم طعم گیلاس همراه با فیلم ژاپنی «مارماهی» ساختهٔ «شوهی ایمامورا» جایزهٔ نخل طلای جشنوارهٔ کن رادر سال ۱۹۹۷ برد که مهم ترین جایزه‌ای است که سینمای ایران به دست آورده است.']],
        ['table' => 'directors', 'fields' => ['first_name', 'last_name', 'birth_date', 'birth_place','picture', 'bio'],
            'values' => ['عباس','کیارستمی','۱ تیر ۱۳۱۹', ' تهران', 'https://upload.wikimedia.org/wikipedia/commons/5/57/Kiarostami_Boroujerdi_%283%29%28Cropped%29.jpg',
                'عبّاس کیارستمی (زاده ۱ تیر ۱۳۱۹ تهران – درگذشته ۱۴ تیر ۱۳۹۵ پاریس) کارگردان، فیلمنامه‌نویس، تدوین‌گر، عکاس، تهیه‌کننده، گرافیست و کارگردان هنری بین‌المللی، همچنین نویسنده و نقاش ایرانی بود. او فیلم‌سازی تأثیرگذار در سینمای جهان به‌شمار می‌آید، و آثار وی با استقبال فراوان ناقدان، داوران، کارگردانان، فستیوال‌ها و بنیادهای فرهنگی و هنری جهان روبه‌رو شده‌است. ']],



//        ['table' => 'actor_pictures', 'fields' => ['actor_id', 'picture'], 'values' => ['2', 'https://commons.wikimedia.org/wiki/File:Hooman_seyedi_khashm_hayahoo.jpg?uselang=fa']],
//        ['table' => 'actor_pictures', 'fields' => ['actor_id', 'picture'], 'values' => ['1', 'https://commons.wikimedia.org/wiki/File:Amin_Hayayi.jpg?uselang=fa']],
//        ['table' => 'actor_pictures', 'fields' => ['actor_id', 'picture'], 'values' => ['2', 'https://namnak.com/%D9%87%D9%88%D9%85%D9%86-%D8%B3%DB%8C%D8%AF%DB%8C.p9131']],
//        ['table' => 'actor_pictures', 'fields' => ['actor_id', 'picture'], 'values' => ['1', 'http://www.nazbahar.com/wp-content/uploads/2016/02/amin-hayaei-niloofar.jpg']],
//        ['table' => 'actor_pictures', 'fields' => ['actor_id', 'picture'], 'values' => ['1', 'https://cinemabartar.ir/wp-content/uploads/2019/11/amin-hayai-1.jpg']]

    );

    public function run()
    {
//        foreach ($this->createTableQueries as $createTableQuery) {
//            $this->createTable($createTableQuery);
//        }
        foreach ($this->tableInitializes as $tableInitialize) {
            $this->insert($tableInitialize['table'], $tableInitialize['fields'], $tableInitialize['values']);
            echo "helllo";
        }
    }
}

