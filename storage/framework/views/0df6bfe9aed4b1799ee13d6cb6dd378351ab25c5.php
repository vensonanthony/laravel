<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="/posts">
            <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required="required">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>  
                    <textarea name="body" id="body" class="form-control" required="required"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Publish </button>
                </div>
            </form>
        </div>
    </div> <!-- row -->
</div> <!-- container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>