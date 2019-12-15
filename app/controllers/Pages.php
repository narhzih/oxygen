<?php

class Pages extends Controller
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = $this->model('Posts');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'Welcome',
            'posts' => $posts
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Welcome'
        ];
        $this->view('pages/about', $data);
    }
}