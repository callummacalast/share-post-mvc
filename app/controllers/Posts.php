<?php

class Posts extends Controller // Needs to extend to use models and vies from Controller
{
  public function __construct()
  {
    /*
    isLoggedIn(); prevents users from seeing the posts if they are not logged in
    */

    // if (!isLoggedIn()){
    //   urlRedirect('users/login');
    // } 
    $this->postModel = $this->model('Post'); // Links up to the post Model
    $this->userModel = $this->model('User'); // Links up to the user Model
  }

  public function index()
  {
    // Get posts
    $posts = $this->postModel->getPosts(); 

    $data = [ // Setting $data = to array with posts in it
      'posts' => $posts
    ];
    $this->view('posts/index', $data); // Rendering the view
  }

  public function add()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize post array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


    $data = [
      'post_img' => $_POST['post_img'],
      'title' => trim($_POST['title']),
      'body' => trim($_POST['body']),
      'user_id' => $_SESSION['user_status'],
      'title_err' => '',
      'body_err' => ''
    ];
    // validate data
    if(empty($data['post_img'])){
      $data['psot_img_err'] = 'Please add a photo';
    }
    if(empty($data['title'])){
      $data['title_err'] = 'Please enter title';
    }
    if(empty($data['body'])){
      $data['body_err'] = 'Please enter content';
    }

    // Make sure no errors
    if(empty($data['title_err']) && empty($data['body_err']) && empty($data['post_img_err'])){

      if($this->postModel->addPost($data)) {
        flash('post_message', 'Post successfully added!');
        urlRedirect('posts');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errord
      $this->view('posts/add', $data);
    }


  } else {
    $data = [
      'title' => '',
      'body' => ''
    ];
  
    $this->view('posts/add', $data);
  
    }
  }

  public function edit($id)
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize post array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


    $data = [
      'id' => $id,
      'title' => trim($_POST['title']),
      'body' => trim($_POST['body']),
      'user_id' => $_SESSION['user_id'],
      'title_err' => '',
      'body_err' => ''
    ];
    // validate data
    if(empty($data['title'])){
      $data['title_err'] = 'Please enter title';
    }
    if(empty($data['body'])){
      $data['body_err'] = 'Please enter content';
    }

    // Make sure no errors
    if(empty($data['title_err']) && empty($data['body_err'])){
      if($this->postModel->updatePost($data)) {
        flash('post_message', 'Post successfully updated!');
        urlRedirect('posts');
      } else {
        die('Something went wrong');
      }
    } else {
      // Load view with errord
      $this->view('posts/edit', $data);
    }


  } else {
    // Get exsisting post from model
    $post = $this->postModel->getPostById($id);
    // Check for owner
    if($post->user_id != $_SESSION['user_id']){
      urlRedirect('posts');
    }

    $data = [
      'id' => $id,
      'title' => $post->title,
      'body' => $post->body,
    ];
  
    $this->view('posts/edit', $data);
  
    }
  }

  public function show($id)
  {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user

    ];
    $this->view('posts/show', $data);
  }

  public function delete($id)
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get exsisting post from model
    $post = $this->postModel->getPostById($id);
    // Check for owner
    if($post->user_id != $_SESSION['user_id']){
      urlRedirect('posts');
    }
      if($this->postModel->deletePost($id)){
        flash('post_message', 'Post successfully deleted');
        urlRedirect('posts');
      } else {
        die('Something went horribly wrong');
      }
    } else {
      urlRedirect('posts');
    }
  }


}


