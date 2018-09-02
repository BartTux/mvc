<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 02.09.18
 * Time: 15:14
 */

class User extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findUserByEmail(string $email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function registerNewUser(array $data)
    {
        //Prepare the query
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute the query
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login(string $email, string $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
}