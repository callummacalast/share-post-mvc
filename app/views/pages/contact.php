<?php require APPROOT . '/views/inc/header.php'; ?>



  <div class="container text-center">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead">
      <?php echo $data['description']; ?>
    </p>
  </div>

  <form class="bg-light p-5">
  <div class="form-group">
    <label for="exampleInputEmail1">Firstname<sup>*</sup></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address <sup>*</sup></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Your message<sup>*</sup></label>
    <textarea class="form-control" name="" id="" cols="20" rows="5"></textarea>
  </div>
  <input type="submit" value="Submit" class="btn btn-outline-primary btn-block">
</form>





<?php require APPROOT . '/views/inc/footer.php'; ?>



