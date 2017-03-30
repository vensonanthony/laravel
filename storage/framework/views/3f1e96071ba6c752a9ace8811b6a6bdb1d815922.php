<!DOCTYPE html>
<html>
<head>
	<title>Sample</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  <style type="text/css">
    #container {
      width: 250px;
      height: 320px;
      font-size: 1rem;
      border:1px solid black;
      border-radius: 5px;
    }

    .login {
      height: 33px;
      width: 220px;
      font-size: .8rem;
    }

    .inline {
      display: inline-block;
    }

    .small {
      font-size: .7rem;
    }

    .check {
      width: 300px;
    }

    .move {
      width: 15rem;
    }
  </style>

</head>
<body>
<a class="btn btn-primary" data-toggle="collapse" href="#container" aria-expanded="false" aria-controls="container">link</a>

<div class="collapse" id="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Have an account?</div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control login" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control login" name="password" required placeholder="Password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-12">
                                <div class="checkbox check">
                                    <label class="small">
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <span>Remember Me</span>
                                         <a class="btn btn-link inline small" href="<?php echo e(route('password.request')); ?>">
                                            Forgot Your Password?
                                         </a>
                                    </label>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group move">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                                <span>New User?</span>

                                 <button class="btn btn-secondary btn-block">
                                    Register
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>