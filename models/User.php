<?php

class User
{
    private $conn;
    private $table = 'users';

    public $id;
    public $name;
    public $nick;
    public $email;
    public $password;
    public $created_date;

    public function __construct($db)
    {
        $this->conn = $db; 
    }

    // GET USERS
    public function read()
    {
        $query = 'SELECT u.id AS user_id, u.name AS user_name, u.nick AS user_nick, u.email AS user_email, u.created_date AS user_created_date, r.name AS role FROM ' . $this->table . ' u INNER JOIN roles r ON r.id = u.role_id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    // GET INDIVIDUAL USER
    public function read_individual($id)
    {
        $query = 'SELECT u.id AS user_id, u.name AS user_name, u.nick AS user_nick, u.email AS user_email, u.created_date AS user_created_date, r.name AS role FROM ' . $this->table . ' u INNER JOIN roles r ON r.id = u.role_id WHERE u.id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    // UPDATE USER
    public function update($idUser, $role)
    {
        $query = 'UPDATE ' . $this->table . ' SET role_id = :role_id WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":role_id", $role, PDO::PARAM_INT);
        $stmt->bindParam(":id", $idUser, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        printf("error", $stmt->error);
    }

    // DELETE USER
    public function delete($idUser)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $idUser, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        printf("error", $stmt->error);
    }

    // USER REGISTER
    public function register($name, $nick, $email, $password)
    {
        $query = 'INSERT INTO ' . $this->table . ' (name, nick, email, password, role_id)VALUES(:name, :nick, :email, :password, 2)'; # Amb el 2 fem que al registrar-se l'usuari quedi amb el rol de registrat.
        $passwordEncrypt = sha1($password);
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":nick", $nick, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $passwordEncrypt, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        printf("error", $stmt->error);
    }

    // VALIDATE IF EMAIL ALREADY EXISTS IN DATABASE
    public function validate_email($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $registerEmail = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($registerEmail) { 
            return false; 
        } else { 
            return true;
        }
    }

    // USER ACCES
    public function acces($nick, $password)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nick = :nick AND password = :password';
        $passwordEncrypt = sha1($password);
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nick", $nick, PDO::PARAM_STR);
        $stmt->bindParam(":password", $passwordEncrypt, PDO::PARAM_STR);
        $stmt->execute();
        $UserExist = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($UserExist) { 
            return true;
        } else { 
            return false;
        }
    }
}
