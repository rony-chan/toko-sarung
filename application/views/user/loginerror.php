<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h3>Login Error</h3>
		<?php if(!empty($error)){ ?>
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong>Login Error !</strong> <?php echo $error;?>
		</div>
		<?php } ?>
		<form method="POST" action="<?php echo site_url('p/login')?>" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input name="input_email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input name="input_password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label>
							<input type="checkbox"> Remember me
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" style="float: left; margin-right: 5px;">Login</button>
					<span><p style="margin-top: 5px;">Lupa Password? <a href="#">Klik di sini</a></p></span>
				</div>
			</div>
		</form>
	</div>
</div>