<!DOCTYPE html>
<html>
<head>
  <!-- Meta Informations -->
  <meta http-equiv="Content-Type" context="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <!-- Title -->
  <title>Buras</title>

  <!-- Javascript Libraries -->
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

  <!-- CSS Libraries -->
  <link type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url('assets/css/custom_style.css') ?>" rel="stylesheet">

  <!-- Custom Style -->
  <style type="text/css">
  @import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);

  html, body {
    font-family: 'Jeju Gothic';
  }

  body {
    padding-top:2.5em;
    padding-bottom: 3.5em;
  }

  footer {
    bottom: 0;
    position: fixed;
    width:100%;
    background-color: #f7f7f9;
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

  </style>
</head>
<body style="height:100%">
  <div class="container-fluid">
    <div class="container">
      <!-- Form Start -->
      <form class="" action="<?php echo base_url('Signup/register'); ?>" method="post">
        <div class="col-md-12">
          <h2 class="main_title">BURAS 회원가입</h2>
        </div>
        <!-- I D -->
        <div class= "form-group col-md-12">
          <label for="user_id">아이디</label>
          <input class="form-control" type="text" id="user_id" name="user_id"
              placeholder="아이디를 입력해 주세요." tabindex="1" required>
        </div>
        <!-- Password -->
        <div class= "form-group col-md-6">
          <label for="user_password">비밀번호</label>
          <input class="form-control" type="password" id="user_password" name="user_password"
              placeholder="비밀번호를 입력해 주세요." tabindex="2" required>
        </div>
        <!-- Password confirm -->
        <div class= "form-group col-md-6">
          <label for="user_password_confirm">비밀번호 확인</label>
          <input class="form-control" type="password" id="user_password_confirm" name="user_password_confirm"
              placeholder="비밀번호 확인" tabindex="3" required>
        </div>
        <!-- Name -->
        <div class= "form-group col-md-12">
          <label for="user_name">이름</label>
          <input class="form-control" type="text" id="user_name" name="user_name"
              placeholder="" tabindex="4" required>
        </div>
        <!-- Season -->
        <div class= "form-group col-md-12">
          <label for="user_name">기수</label>
          <input class="form-control" type="number" id="user_season" name="user_season"
              placeholder="" tabindex="5" min="1" max="50" value="1"required>
        </div>
        <!-- Major -->
        <div class= "form-group col-md-6">
          <label for="user_name">학과</label>
          <input class="form-control" type="text" id="user_major" name="user_major"
              placeholder="" tabindex="6">
        </div>
        <!-- Enter -->
        <div class= "form-group col-md-6">
          <label for="user_name">학번</label>
          <input class="form-control" type="text" id="user_enter" name="user_enter"
              placeholder="" tabindex="7">
        </div>
        <!-- Birth -->
        <div class= "form-group col-md-12">
          <label for="user_birth">생일</label>
          <input class="form-control" type="date" id="user_birth" name="user_birth"
              placeholder="2017. 01. 01" tabindex="8">
        </div>
        <!-- Email -->
        <div class= "form-group col-md-6">
          <label for="user_email">이메일</label>
          <input class="form-control" type="email" id="user_email" name="user_email"
              placeholder="buras@example.com" tabindex="9" required>
        </div>
        <!-- Phone -->
        <div class= "form-group col-md-6">
          <label for="user_name">전화번호</label>
          <input class="form-control" type="text" id="user_phone" name="user_phone"
              placeholder="010-1234-5678" tabindex="10" required>
        </div>
        <!-- S button -->
        <div class="form-group col-md-6">
          <button type="submit" class="btn btn-primary" tabindex="11" style="width:100%;">가입완료</button>
        </div>
        <div class="form-group col-md-6">
          <button type="button" class="btn btn-danger" tabindex="12"
            onclick="location.href='<?php echo base_url();?>'" style="width:100%;">취소</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
