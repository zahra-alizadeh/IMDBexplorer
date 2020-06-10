<?php


namespace application\model;
use application\model\Model;

class CreateDB extends Model
{
    private $createTableQueries = array(
        "CREATE TABLE `users` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `picture` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `admin` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `email` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `watchList` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `movieId` int(11) NOT NULL,
          `userId` int(11) NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`movieId`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `comments` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `userId` int(11) NOT NULL,
          `commentText` text COLLATE utf8_persian_ci NOT NULL,
          `movieId` int(11)  NOT NULL,
          `permission` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`movieId`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)
           ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

    );

    private $tableInitializes = array(
        ['table' => 'users', 'fields' => ['username', 'email', 'password', 'permission'], 'values' => ['zahra', 'alaki@gmail.com', '1234', 'admin']],
    );

    public function run()
    {
        foreach ($this->createTableQueries as $createTableQuery) {
            $this->createTable($createTableQuery);
        }
        foreach ($this->tableInitializes as $tableInitialize) {
            $this->insert($tableInitialize['table'], $tableInitialize['fields'], $tableInitialize['values']);
        }
    }
}

