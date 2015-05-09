<div class="container">
  <center>
    <h1 style="font-size:25px">Upload Gambar</h1>
    <hr/>
    <form style="padding:20px" role="form" method="POST" enctype="multipart/form-data" action="">
      <div class="col-md-12">
       <?php
       if(!empty($error)){
        echo '<div class="alert alert-danger">'.$error['error'].'</div>';
        }
        ?>
         <?php
       if(!empty($upload)){
        echo '<div class="alert alert-success"> '.site_url('resource/img/news/'.$upload['file_name']).'</div>';
        }
        ?>
      <div class="col-md-offset-3 col-md-5">
        <input class="form-control" type="file" name="gambar" placeholder="username"/>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </form>
</center>
</div>
