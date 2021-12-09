<?php

class Legals
{
    private $conn;

    public $id;
    public $cookies_text;
    public $cookies_text_link;
    public $privacy_text;
    public $privacy_text_link;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // CREATE COOKIES PAGE
    public function createCookiesPage($cookies_text, $cookies_text_link)
    {
        $query = 'INSERT INTO customise_cookies_text (cookies_text, cookies_text_link)VALUES(:cookies_text, :cookies_text_link)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cookies_text", $cookies_text, PDO::PARAM_STR);
        $stmt->bindParam(":cookies_text_link", $cookies_text_link, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        printf("error", $stmt->error);
    }

    // READ COOKIES PAGE
    public function readCookiesPage()
    {
        $query = 'SELECT id, cookies_text, cookies_text_link FROM customise_cookies_text ORDER BY id DESC LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $custom = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $custom;
    }


    // CREATE PRIVACY PAGE
    public function createPrivacyPage($privacy_text, $privacy_text_link)
    {
        $query = 'INSERT INTO customise_privacy_text (privacy_text, privacy_text_link)VALUES(:privacy_text, :privacy_text_link)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":privacy_text", $privacy_text, PDO::PARAM_STR);
        $stmt->bindParam(":privacy_text_link", $privacy_text_link, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        printf("error", $stmt->error);
    }

    // READ PRIVACY PAGE
    public function readPrivacyPage()
    {
        $query = 'SELECT id, privacy_text, privacy_text_link FROM customise_privacy_text ORDER BY id DESC LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $custom = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $custom;
    }
}
