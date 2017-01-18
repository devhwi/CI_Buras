<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Buras | Admin</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url('assets/admin/vendor/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?=base_url('assets/admin/vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

  <!-- Social Buttons CSS -->
  <link href="<?=base_url('assets/admin/vendor/bootstrap-social/bootstrap-social.css')?>" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?=base_url('assets/admin/dist/css/sb-admin-2.css')?>" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="<?=base_url('assets/admin/vendor/morrisjs/morris.css')?>" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?=base_url('assets/admin/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

  <!-- DataTables CSS -->
  <link href="<?=base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css')?>" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="<?=base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.css')?>" rel="stylesheet">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
  <div class="container">

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Admin Login</h3>
      </div>
      <div class="panel-body">
        <form id="" class="" role="form" action="<?=base_url('admin/Login/check')?>" method="post">
          <fieldset>
            <div class="form-group">
              <input class="form-control" placeholder="ID" name="user_id" type="text" autofocus required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="password" name="user_password" type="password" value="" required>
            </div>
            <!-- Remember me -->
            <!-- <div class="checkbox">
              <label>
                <input name="remember" type="checkbox" value="Remember Me">Remember Me
              </label>
            </div> -->
            <!-- Change this to a button or input when using this as a form -->
            <button type="submit" class="btn btn-lg btn-success btn-block">로그인</a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
