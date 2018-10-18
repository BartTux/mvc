<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 15.10.18
 * Time: 12:35
 */

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT *,
                          posts.id_posts as postId,
                          users.id_users as userId,
                          posts.created_at as postCreated,
                          users.created_at as userCreated
                          FROM posts
                          INNER JOIN users
                          ON posts.user_id = users.id_users
                          ORDER BY posts.created_at DESC
                          ');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getPostById(int $id)
    {
        $this->db->query('SELECT * FROM posts WHERE id_posts = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }

    public function addPost($data)
    {
        //Prepare the query
        $this->db->query('INSERT INTO posts (title, body, user_id) VALUES (:title, :body, :user_id)');
        //Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);

        //Execute the query
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data)
    {
        //Prepare the query
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id_posts = :id');
        //Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $data['id']);

        //Execute the query
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}