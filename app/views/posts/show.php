<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT;?>/home" class="btn btn-light"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
<br>
<h1 class="display-4 text-left"><?php echo $data['post']->title; ?></h1>
<!-- Displays the image in the individual post page, currenlty not working-->

<div class="bg-secondary text-white p-2 mb-3">
  Written by <span class="text-info"><?php echo $data['user']->name;?></span> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?></p> 

<?php if($data['post']->user_id == $_SESSION['user_id']) : ?> 
<hr>
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>
<form class="float-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="POST">
  <input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
