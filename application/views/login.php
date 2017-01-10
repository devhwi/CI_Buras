<!DOCTYPE html>
<html>
<head>
  <!-- Meta Informations -->
  <meta http-equiv="Content-Type" context="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- Title -->
  <title>Buras</title>

  <!-- Javascript Libraries -->
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>

  <!-- CSS Libraries -->
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/custom_style.css') ?>" rel="stylesheet">

  <!-- Custom Style -->
  <style type="text/css">
  @import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);

  html, body {
    font-family: 'Jeju Gothic';
  }

  footer {
    bottom: 0;
    position: fixed;
    width:100%;
    background-color: #f7f7f9;
    margin-top: 3em;
    padding: 1em 1.5em;
    /*text-align: center;*/
    color: #333;
    font-size: 0.75em;
  }

  .img-rounded {
    border: 0px;
    border-radius: 50%;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    max-width: 100%;
    height: auto;
  }

  #user-menu {
    margin-bottom: 0em;
  }
  </style>
</head>
<body style="height:100%">
  <div class="container-fluid">
    <div class="layer">
      <h4 class="main_title">BURAS에 오신 것을 환영합니다.</h4>
      <!-- Form Start -->
      <form action="<?php echo base_url('Login/login_check'); ?>" method="post">
        <!-- I D -->
        <div class= "form-group">
          <input class="form-control" type="text" id="user_id" name="user_id"
          placeholder="ID" tabindex="1" autofocus required>
        </div>
        <!-- Password -->
        <div class= "form-group">
          <input class="form-control" type="password" id="user_password" name="user_password" placeholder="Password" tabindex="2" required>
        </div>
        <!-- Submit button -->
        <div class="form-group">
          <button type="submit" class="main_button" tabindex="5">로그인</button>
          <button type="button" class="main_button main_button_signup" tabindex="6">회원가입</button>
        </div>
      </form>
    </div>
