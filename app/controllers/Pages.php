<?php

class Pages extends Controller
{
  public function __construct() 
  {

    // $this->postModel = $this->model('Post'); // Allowing access to the post model
    // $this->postModel = $this->model('User');
  }

  public function index()
  {

    if (isLoggedIn()){
      urlRedirect('posts');
    }
    $data = [
      'title' => 'BeachandBobs Blog',
      'description' => 'Welcome to my blog site'
    ];



      // // Get posts
      // $posts = $this->postModel->getPosts(); 
  
      // $data = [ // Setting $data = to array with posts in it
      //   'posts' => $posts
      // ];
      // $this->view('posts/index', $data); // Rendering the view

    $this->view('pages/index', $data);
  }

  public function about() 
  {
    $data = [
      'title' => 'About us',
      'description' => 'Here I will share my own experiences, via this blogging site!'
    ];
    $this->view('pages/about', $data);

  }

  public function contact()
  {
    $data = [
      'title' => 'Contact Me',
      'description' => 'Please get in contact by filling out the form below'
    ];

    $this->view('pages/contact', $data);
  }
}