<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row login-page">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <?php flash('register_success'); ?>
      <h2 class="display-3 text-center">Login</h2>
      <!-- <p >Please fill in your credentials to login</p> -->
      <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password" name="password" value="<?php echo $data['password']; ?>" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" value="Login" class="btn btn-success btn-block">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
