<?php


namespace application\model;

class UserModel extends Model
{
    // select user from DB to check if user exists or not
    public function checkUserExists($field, $value)
    {
        $db = new Model();
        $user = $db->select("SELECT * FROM `users` WHERE (" . $field . " = ?); ", [$value])->fetch();
        return $user;
    }

    // store user in DB
    public function storeUser($request, $token)
    {
        $db = new Model();
        $db->insert('users', ['username', 'email', 'password', 'token'], [$_POST['username'], $_POST['email'], $_POST['password'], $token]);
        return true;
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

    public function updatePassword($userId,$password)
    {
        $db = new Model();
        $changed = $db->update('users', $userId, ['password'], [$password]);
        if ($changed != null)
            return $changed;
        else
            return false;
    }

    public function updateUserProfile($id,$user)
    {
        $db = new Model();
        $changed = $db->update('users', $id, ['first_name', 'last_name'], [$user['first_name'], $user['last_name']]);
        if ($changed != null)
            return $changed;
        else
            return false;
    }

    public function userExists($id)
    {
        $db = new Model();
        $user = $db->select("SELECT * FROM `users_votes` WHERE `user_id`=? ;", [$id])->fetch();
        if ($user != null) {
            return true;
        } else
            return true;
    }
}