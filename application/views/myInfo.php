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
<div class="container">
  <!-- Form Start -->
  <form class="" action="<?php echo base_url('Member/editMyInfo'); ?>" method="post">
    <div class="col-md-12">
      <h2 class="main_title">내 정보</h2>
    </div>
    <!-- I D -->
    <div class= "form-group col-md-12">
      <label for="user_id">아이디</label>
      <input class="form-control" type="text" id="user_id" name="user_id"
      placeholder="아이디를 입력해 주세요." tabindex="1" value="<?=$user->user_id?>" disabled>
    </div>
    <!-- Password -->
    <div class= "form-group col-md-6">
      <label for="user_password">비밀번호</label>
      <input class="form-control" type="password" id="user_password" name="user_password"
      placeholder="변경하려면 입력하고, 입력안할 시 정보만 변경됩니다." tabindex="2">
    </div>
    <!-- Password confirm -->
    <div class= "form-group col-md-6">
      <label for="user_password_confirm">비밀번호 확인</label>
      <input class="form-control" type="password" id="user_password_confirm" name="user_password_confirm"
      placeholder="비밀번호 확인" tabindex="3">
    </div>
    <!-- Name -->
    <div class= "form-group col-md-12">
      <label for="user_name">이름</label>
      <input class="form-control" type="text" id="user_name" name="user_name"
      placeholder="" tabindex="4" value="<?=$user->user_name?>" required>
    </div>
    <!-- Season -->
    <div class= "form-group col-md-12">
      <label for="user_name">기수</label>
      <input class="form-control" type="number" id="user_season" name="user_season"
      placeholder="" tabindex="5" min="1" max="50" value="<?=$user->user_season?>" required>
    </div>
    <!-- Major -->
    <div class= "form-group col-md-6">
      <label for="user_name">학과</label>
      <input class="form-control" type="text" id="user_major" name="user_major"
      placeholder="" value="<?=$user->user_major?>" tabindex="6">
    </div>
    <!-- Enter -->
    <div class= "form-group col-md-6">
      <label for="user_name">입학년도(4자리)</label>
      <input class="form-control" type="text" id="user_enter" name="user_enter"
      placeholder="2017" tabindex="7" value="<?=$user->user_enter?>">
    </div>
    <!-- Birth -->
    <div class= "form-group col-md-12">
      <label for="user_birth">생일</label>
      <input class="form-control" type="date" id="user_birth" name="user_birth"
      placeholder="2017. 01. 01" tabindex="8" value="<?=$user->user_birth?>">
    </div>
    <!-- Email -->
    <div class= "form-group col-md-6">
      <label for="user_email">이메일</label>
      <input class="form-control" type="email" id="user_email" name="user_email"
      placeholder="buras@example.com" tabindex="9" value="<?=$user->user_email?>" required>
    </div>
    <!-- Phone -->
    <div class= "form-group col-md-6">
      <label for="user_name">전화번호</label>
      <input class="form-control" type="text" id="user_phone" name="user_phone"
      placeholder="010-1234-5678" tabindex="10" value="<?=$user->user_phone?>" required>
    </div>
    <!-- S button -->
    <div class="form-group col-md-6">
      <button type="submit" class="btn btn-primary" tabindex="11" style="width:100%;">수정완료</button>
    </div>
    <div class="form-group col-md-6">
      <button type="button" class="btn btn-danger" tabindex="12"
      onclick="window.history.back();" style="width:100%;">취소</button>
    </div>
  </form>
  <!-- End Form -->
</div>
