<?php

// static class
class Post
{
    /**
     * Retrieve all posts from database
     */
    public static function getAllPosts()
    {
        return DB::connect()->select(
            'SELECT * FROM posts ORDER BY id DESC',
            [],
            true
        );
    }

    /**
     * Retrieve post data by id
     */
    public static function getPostByID( $post_id )
    {
        return DB::connect()->select(
            'SELECT * FROM posts WHERE id = :id',
            [
                'id' => $post_id
            ]
        );
    }

    /**
     * Add new post
     */
    public static function add( $user_id, $title, $content)
    {
        return DB::connect()->insert(
            'INSERT INTO posts ( user_id, title , content)   
            VALUES ( :user_id, :title, :content)',
            [
                'user_id' => $user_id,
                'title' => $title,
                'content' => $content

            ]
        );
    }

      /**
     * Update post details
     */
    public static function update( $id, $title, $content, $status )
    {

        // setup params
        $params = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'status' => $status
        ];

        // update user data into the database
        return DB::connect()->update(
            'UPDATE posts SET id = :id, title = :title, content = :content, status = :status WHERE id = :id',
            $params
        );
    }

    /**
     * Delete user
     */

     public static function delete($post_id)
     {
        return DB::connect()->delete
        (
            'DELETE FROM posts WHERE id = :id',
            [
                'id' => $post_id
            ]
        );
     }


}                         