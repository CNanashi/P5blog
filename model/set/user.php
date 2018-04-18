<?php


class user extends Model
{
     private $user_id;
     private $permission;
     private $email;
     private $username;
     private $password;
     private $date_add;
     private $date_edit;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function setUserId($id)
    {
        $id = (int) $id;
        $this->user_id = $id;
    }
    public function setPermission($permission)
    {
        if((int) $permission >= 0) {
            $this->permission = $permission;
        }
    }
    public function setEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setDateAdd($date)
    {
        $this->date_add = $date;
    }

    public function setDateEdit($date)
    {
        $this->date_edit = $date;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getPermission()
    {
        return $this->permission;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function getDateEdit()
    {
        return $this->date_edit;
    }
}