<div class="col-sm-3 offset-sm-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
  <?php if(Auth::check()): ?>
    <h4><?php echo e(Auth::user()->name); ?></h4>
  <?php else: ?>
  	<h4>Name of User</h4>
  <?php endif; ?>
      <ul>
        <li>@TryGhost</li>
        <li>A platform for professional publishing</li>
        <li>name</li>
      </ul>
    </div>
  
</div><!-- /.blog-sidebar -->