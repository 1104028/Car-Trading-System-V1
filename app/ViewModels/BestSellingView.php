<?php

namespace App\ViewModels;

class PostViewModel extends ViewModel
{
    public $indexUrl = null;

    public function __construct(User $user, Post $post = null)
    {
        $this->user = $user;
        $this->post = $post;

        $this->indexUrl = action([PostsController::class, 'index']); 
    }
}