<?php
class ManagerUser extends Manager
{
    public function loginVerification($identifier, $pass)
    {
        $query = $this->dbh->prepare("
            SELECT username, email, password
            FROM users
            WHERE username = :identifier OR email = :identifier
        ");
        $query->bindValue(":identifier", $identifier, \PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if(!password_verify($pass, $user["password"])) {
            return false;
        }
        return $user;
    }
    public function getAllUsers()
    {
        $query = $this->dbh->prepare("
            SELECT *, DATE_FORMAT(date_add, '%d/%m/%y à %Hh%i') as date_add
            FROM users
            ORDER BY user_id DESC
        ");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    public function getUser($user)
    {
        $query = $this->dbh->prepare("
            SELECT *, DATE_FORMAT(date_add, '%d/%m/%y à %Hh%i') as date_add
            FROM users
            WHERE user_id = :id 
            OR username LIKE :username
            OR email LIKE :email
        ");
        $query->bindValue(":id", $user, \PDO::PARAM_INT);
        $query->bindValue(":username", $user, \PDO::PARAM_STR);
        $query->bindValue(":email", $user, \PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }
    public function addUser(User $user)
    {
        $query = $this->dbh->prepare("
            INSERT INTO users 
            (email, username, password) 
            VALUES 
            (:email, :username, :password)
        ");
        $query->bindValue(":email", $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue(":username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue(":password", $user->getPassword(), \PDO::PARAM_STR);
        $query->execute();
        return $affectedLines = $query->rowCount();
    }
    public function updateUser(User $user)
    {
        $query = $this->dbh->prepare("
            UPDATE users
            SET permission = :perm, email = :email, username = :username, password = :password
        ");
        $query->bindValue(":perm", $user->getPermission(), \PDO::PARAM_INT);
        $query->bindValue(":email", $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue(":username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue(":password", $user->getPassword(), \PDO::PARAM_STR);
        $query->execute();
        return $affectedLines = $query->rowCount();
    }
    public function deleteUser($user)
    {
        $query = $this->dbh->prepare("
            DELETE FROM users
            WHERE user_id = :id
            OR username = :username
            OR email = :email
        ");
        $query->bindValue(":id", $user, \PDO::PARAM_INT);
        $query->bindValue(":username", $user, \PDO::PARAM_STR);
        $query->bindValue(":email", $user, \PDO::PARAM_STR);
        $query->execute();
        return $affectedLines = $query->rowCount();
    }
}