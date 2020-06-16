<?php


namespace application\model;

class UserModel extends Model
{

    // select user from DB to check if user exists or not
    public function checkUserExists($request)
    {
        $db = new Model();
        $user = $db->select("SELECT * FROM `users` WHERE (`email` = ?); ", [$request['email']])->fetch();
        if ($user != null)
            return false;
        else
            return true;
    }

    // store user in DB
    public function storeUser($request)
    {
        $db = new Model();
//        $db->insert('users', array_keys($request), $request);
        $db->insert('users', ['username', 'email', 'password'], [$_POST['username'], $_POST['email'], $_POST['password']]);
        return true;
    }

    public function insertUser($values)
    {
        $query = "INSERT INTO `users` ( `user_name`, `email`, `password`, created_at) VALUES ( ?, ?, ?, now() );";
        $this->execute($query, array_values($values));
        $this->closeConnection();
    }

    public function checkAdmin()
    {
        $db = new Model();
        $user = $db->select("SELECT * FROM `users` WHERE `id`=? ;", [$_SESSION['userId']])->fetch();
        if ($user != null) {
            return true;
        } else
            return true;
    }
}