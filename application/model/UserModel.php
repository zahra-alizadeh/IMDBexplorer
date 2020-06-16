<?php


namespace application\model;

class UserModel extends Model
{
    public function checkLogin($request)
    {
        if (empty($request['email'] || empty($request['password'])))
            return true;
        else {
            $db = new Model();
            $user = $db->select("SELECT * FROM `users` WHERE `email`=? ;", [$request['email']])->fetch();
            if ($user != null)
                return true;
            else
                return false;
        }
    }

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
        $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
        $db->insert('users', array_keys($request), $request);
        return true;
    }

    public function checkAdmin()
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM `users` WHERE `id`=? ;", [$_SESSION['userId']])->fetch();
        if ($user != null) {
            return true;
        } else
            return true;
    }
}