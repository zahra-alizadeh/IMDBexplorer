<?php


namespace application\model;
require_once ('Model.php');

class CreateDB extends Model
{
    private $createTableQueries = array(
        "CREATE TABLE `users` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `admin` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `email` (`email`),`username` (`username`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `movies` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `movie_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `release_date` datetime,
          `trailer` varchar(100) COLLATE utf8_persian_ci,
          `picture` varchar(200) COLLATE utf8_persian_ci,
          `score` varchar(200) COLLATE utf8_persian_ci,
          `summary` varchar(200) COLLATE utf8_persian_ci,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `movie_genre` (
          `movie_id` int(11) NOT NULL,
          `genre` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`movie_id`,`genre`),
          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `watchList` (
          `movie_id` int(11) NOT NULL,
          `user_id` int(11) NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`movie_id`,`user_id`),
          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `persons` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `first_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `last_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `birth_date` datetime ,
          `birth_place` varchar(100) ,
          `picture` varchar(200) COLLATE utf8_persian_ci,
          `bio` varchar(200) COLLATE utf8_persian_ci,
          `role` enum('director','actor&director','both') COLLATE utf8_persian_ci NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `movie_director` (
          `movie_id` int(11) NOT NULL,
          `director_id` int(11) NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`movie_id`,`director_id`),
          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `movie_actor` (
          `movie_id` int(11) NOT NULL,
          `actor_id` int(11) NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`movie_id`,`actor_id`),
          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",


        "CREATE TABLE `comments` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `user_id` int(11) NOT NULL,
          `movie_id` int(11)  NOT NULL,
          `text` text COLLATE utf8_persian_ci NOT NULL,
          `permission` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)
           ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `blogs` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `movie_id` int(11)  NOT NULL,
          `person_id` int(11)  NOT NULL,
          `picture` varchar(200) COLLATE utf8_persian_ci,
          `text` text COLLATE utf8_persian_ci NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)
           ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

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
        ['table' => 'users', 'fields' => ['username', 'email', 'password', 'admin'], 'values' => ['zahra', 'alaki@gmail.com', '1234', 'admin']],
    );

    public function run()
    {
//        foreach ($this->createTableQueries as $createTableQuery) {
//            $this->createTable($createTableQuery);
//        }
        foreach ($this->tableInitializes as $tableInitialize) {
            $this->insert($tableInitialize['table'], $tableInitialize['fields'], $tableInitialize['values']);
        }
    }
}

