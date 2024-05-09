<?php

namespace Models;

use Core\Model;

class Users extends Model
{
    public $email_address;
    public $phone_number;
    public $password;
    public $isAdmin;

    public function __construct()
    {
        $this->email_address = '';
        $this->phone_number = '';
        $this->password = '';
        $this->isAdmin = false;
    }
    public function getUsers($page, $size, $search)
    {
        $offset = $page * $size - $size;
        $Query = "SELECT * FROM user  WHERE (`email_address` LIKE '%$search%'
         OR  `phone_number` LIKE '%$search%') AND  `delete_at` IS NULL
         LIMIT $size OFFSET $offset";
        return $this->SelectRow($Query);
    }
    public function getUsersById($id)
    {
        $Query = "SELECT * FROM user WHERE id = " . $id;
        return $this->SelectRow($Query);
    }
    public function getUsersByEmail(
        $email_address
    ) {
        $Query = "SELECT * FROM user WHERE email_address = '" . $email_address . "'";
        return $this->SelectRow($Query);
    }
    public function getUsersByPhone(
        $phone_number
    ) {
        $Query = "SELECT * FROM user WHERE phone_number = '" . $phone_number . "'";
        return $this->SelectRow($Query);
    }
    public function updateUser($id, $email_address, $phone_number, $password, $isAdmin, $is_active)
    {
        $Query = "UPDATE `user` SET `email_address`='$email_address',`phone_number`='$phone_number',`password`='$password',
        `isAdmin`=$isAdmin,
        `is_active`=$is_active
        WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
    public function addUser($email_address, $phone_number, $password, $isAdmin)
    {
        $Query =  "INSERT INTO `user`( `id`,`email_address`, `phone_number`, `password`, `isAdmin`, `avatar`, `is_active`) 
        VALUES (NULL,'$email_address',' $phone_number','$password',false, '', true);";
        return $this->InsertRow($Query, [], true);
    }
    public function deleteUser($id)
    {
        $Query =  "UPDATE `user` SET `delete_at`=current_timestamp  WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
}
