<?php $__env->startSection('title'); ?>
    MYBUMP
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .check
{
  opacity:0.5;
  color:#996;
}
.img-check:hover {
  cursor: pointer;
}
.hidden {
  visibility: hidden;
}
</style>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">MYBUMP</li>
        </ol>
        <!-- /.container-fluid-->
  <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-table"></i> <h2>Add Post</h2></div>
                  <div class="card-body">
					<?php if(Session::has('error')): ?>
					   <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
					<?php elseif(Session::has('success')): ?>
					   <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
					<?php endif; ?>
                  	<form action="<?php echo e(url('/blog/add')); ?>" method="post">
                  		<?php echo csrf_field(); ?>
	                  	<div class="form-group">
	                  		<label for="title">Post Title</label>
                  			<input name="title" id="title" value="<?php echo e(old('title')); ?>" onfocusout="title()" type="text" class="form-control" placeholder="Title">
	                  	</div>
	                  	<div class="row">
	                  		<div class="col-md-6">
			                  	<div class="form-group">
			                  		<label for="slug">Slug</label>
		                  			<input name="slug" id="slug" value="<?php echo e(old('slug')); ?>" type="text" class="form-control" placeholder="Slug">
			                  	</div>	                  			
	                  		</div>
	                  		<div class="col-md-6">
			                  	<div class="form-group">
			                  		<label for="sequence">BUMP Sequence</label>
		                  			<input name="sequence" value="<?php echo e($seq); ?>" type="number" class="form-control" placeholder="BUMP Sequence">
			                  	</div>	                  			
	                  		</div>
	                  	</div>
	                  	<div class="form-group">
	                  		<label for="content">Content</label>
                  			<textarea name="content" value="<?php echo e(old('content')); ?>" placeholder="Content" rows="5" class="form-control"></textarea>
	                  	</div>
	                  	<div class="form-group">
                  			<button type="submit" class="btn btn-large-btn-block btn-primary">Add Post</button>
	                  	</div>
                  	</form>                  		
                  </div>
                  <div class="card-footer small text-muted">MYBUMP</div>
                </div>
                 <!-- /tables-->
              </div>
          </div>
  </div>

</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
  tinymce.init({ selector:'textarea' });
</script>
<script type="text/javascript">
      // console.log("Working...");
  // $(document).ready(function() {
    // $("#title").keyup(function() {
      // var title = $('#title').val();
      // console.log(title);
       // $("#slug").val($(this).val().replace(/\s/g,'-').toLowerCase();
    // });
  // });

  // var title = () => {
  //   document.getElementById("title").value;
  //   console.log("title");
  // }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>