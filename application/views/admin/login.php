<div class="container">
  <div class="col-md-4 col-md-offset-4">
    <div style="display:none" id="login-form" class="login-form">
      <center>
        <h1><span class="glyphicon glyphicon-lock"></span> Login Administrator</h1>
        <hr/>
        <form style="padding:20px" role="form" method="POST" action="<?php echo site_url('admin/login')?>">
          <label>Username</label><input class="form-control" type="text" name="input_username" placeholder="username"/>
          <label>Password</label><input class="form-control" type="password" name="input_password" placeholder="password"/>
          <br/>
          <button type="submit" class="btn btn-primary">Masuk</button>
          <br/>
          <br/>
        </form>
      </center>
    </div>
    <?php if(!empty($_GET['error'])):?>
      <br/>
      <div class="alert alert-danger"><?php echo $_GET['error']?></div>
    <?php endif;?>
  </div>

</div>
