<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>


    <div class="col-8 text-center">
      <h1>Welcome to admin panel, here you can edit, update and add posts!</h1>
    </div>
    <div class="col">
      <a href="<?php echo URLROOT;?>/posts/add" class="btn btn-primary pull-right mb-4"><i class="fas fa-pencil-alt"></i> Add Post</a>
    </div>


  <?php foreach($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
  <!-- <img src="<?php //echo $post->post_img; ?>" alt="Image for post"> -->
    <h4 class="card-title"><?php echo $post->title; ?></h4>
    <div class="bg-light p-2 mb-3">
      Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
    </div>
    <p class="card-text"> 
      <?php echo mb_strimwidth($post->body, 0, 400, "..."); ?> 
    </p>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-outline-primary">Edit post</a>
  </div>

  <?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
