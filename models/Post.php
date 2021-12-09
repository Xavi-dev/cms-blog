<?php

class Post
{
    private $conn;
    private $table = 'posts';

    public $id;
    public $title;
    public $image;
    public $text;
    public $created_date;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET POSTS
    public function read()
    {
        $query = 'SELECT id, title, image, text, created_date FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    // GET INDIVIDUAL POST
    public function read_individual($id)
    {
        $query = 'SELECT id, title, image, text, created_date FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_OBJ);
        return $post;
    }

    // CREATE POST
    public function create($title, $newImageName, $text)
    {
        $query = 'INSERT INTO ' . $this->table . ' (title, image, text)VALUES(:title, :image, :text)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":image", $newImageName, PDO::PARAM_STR);
        $stmt->bindParam(":text", $text, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        printf("error", $stmt->error);
    }

    // UPDATE POST
    public function update($id, $title, $text, $newImageName)
    {
        if ($newImageName == "") { 
            $query = 'UPDATE ' . $this->table . ' SET title = :title, text = :text WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":text", $text, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            }
        } else {
            $query = 'UPDATE ' . $this->table . ' SET title = :title, text = :text, image = :image WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":text", $text, PDO::PARAM_STR);
            $stmt->bindParam(":image", $newImageName, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            }
        }
        printf("error", $stmt->error);
    }

    // DELETE POST
    public function delete($idPost)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $idPost, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        printf("error", $stmt->error);
    }
}
