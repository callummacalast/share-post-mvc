<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT;?>/posts" class="btn btn-light"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
    <div class="card card-body bg-light mt-5">
      <h2 class="display-4">Add Blog Post</h2>
      <p>Create a post</p>
      <form action="<?php echo URLROOT; ?>/posts/add" method="POST">
      <div class="form-group">
          <input type="file" name="post_img" value="<?php echo $data['post_img']; ?>" class="<?php echo (!empty($data['pot_img_err'])) ? 'is-invalid' : ''; ?>">
          <span class="invalid-feedback"><?php echo $data['post_img_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="title">Title: <sup>*</sup></label>
          <input type="text" name="title" value="<?php echo $data['title']; ?>" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>">
          <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
       
        <div class="form-group">
          <label for="body">Content: <sup>*</sup></label>
          <textarea type="text" name="body" value="<?php echo $data['body']; ?>" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"></textarea>
          <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
      </form>
    </div>




<?php require APPROOT . '/views/inc/footer.php'; ?>
