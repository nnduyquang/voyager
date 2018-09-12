<?php

namespace App\Repositories\Backend\Post;

interface PostRepositoryInterface
{
    public function getAllPostOrderById();

    public function showCreatePost();

    public function showEditPost($id);

    public function createNewPostWithSeoId($request);

    public function updateNewPost($request, $id);

    public function deletePost($id);
}


