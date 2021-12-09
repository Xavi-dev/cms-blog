<?php

class Comment
{
    private $conn;
    private $table = 'comments';

    public $id;
    public $comment;
    public $title;
    public $role;
    public $created_date;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    // READ POSTS
    public function read()
    {
        $query = 'SELECT c.id AS id_comment, c.comment AS comment, c.role AS role, c.created_date AS date, c.user_id, u.nick AS nick, p.title AS post_title FROM ' . $this->table . ' c LEFT JOIN users u ON u.id = c.user_id LEFT JOIN posts p ON p.id = c.post_id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    // READ INDIVIDUAL POST
    public function read_individual($id)
    {
        $query = 'SELECT c.id AS id_comment, c.comment AS comment, c.role AS role, c.created_date AS date, c.user_id, u.nick AS user_nick, a.title AS post_title  FROM ' . $this->table . ' c LEFT JOIN users u ON u.id = c.user_id LEFT JOIN posts a ON a.id = c.post_id WHERE c.id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $comment = $stmt->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    // GET COMMENT BY ID POST
    public function readById($idPost)
    {
        $query = 'SELECT c.id AS id_comment, c.comment AS comment, c.role AS role, c.created_date AS date, c.user_id, u.nick AS user_nick FROM ' . $this->table . ' c INNER JOIN users u ON u.id = c.user_id WHERE post_id = :post_id && role = 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam("post_id", $idPost);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    // CREATE A NEW COMMENT
    public function create($nick, $comment, $idPost)
    {
        // Agafar l'id de l'usuari mitjançant l'email
        $query = "SELECT * FROM users WHERE nick = :nick";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nick", $nick);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $idUser = $user->id;
        // Query per a inserir el comentari
        $query2 = 'INSERT INTO comments (comment, user_id, post_id, role)VALUES(:comment, :user_id, :post_id, 0)';
        $stmt = $this->conn->prepare($query2);
        $stmt->bindParam(":comment", $comment, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $idUser, PDO::PARAM_INT);
        $stmt->bindParam(":post_id", $idPost, PDO::PARAM_STR);
        $stmt->execute();
    }

    // ACCEPT COMMENT?
    public function update($idComment, $role)
    {
        $query = 'UPDATE ' . $this->table . ' SET role = :role WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $idComment, PDO::PARAM_INT);
        $stmt->bindParam(":role", $role, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        printf($stmt->error);
    }

    // DELETE COMMENT
    public function delete($idComment)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $idComment, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        printf($stmt->error);
    }
}
