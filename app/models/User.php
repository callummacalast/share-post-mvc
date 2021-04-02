<?php

class User 
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Register user
  public function register($data) // Data array, includes everything, even the hashed password
  {
    $this->db->query('INSERT INTO users (name, email, password, user_status) VALUES (:name, :email, :password, :user_status)');
    // Bind the values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':user_status', $data['user_status']);

    // Execute the prepared statement 
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function login($email, $password)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    $row = $this->db->single();

    $hashed_password = $row->password;
    if(password_verify($password, $hashed_password)) {
      return $row; // return row of user if true
    } else {
      return false;
    }
  }

  // finds the user by their email
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    //Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }    
  }

  // Get user by Id
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    //Check row
    return $row;
  }


}