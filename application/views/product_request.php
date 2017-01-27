<style media="screen">
  .badge {
    border:none;
    font-size: 0.9em;
  }

  .divider {
    height: 1px;
    width: 100%;
    border: 1px solid #ddd;
    margin-top: 0.5em;
    margin-bottom: 1em;
  }

  .blank {
    height: 1px;
    width: 100%;
    margin-top: 1.5em;
    margin-bottom: 1.5em;
  }

  img {
    max-width: 100%;

  }
</style>

<div class="container">
  <div class="col-md-12">
    <h2><?=$detail->product_name?></h2>
  </div>
  <div class="col-md-5">
    <img src="<?=base_url('assets/img/product/'.$detail->product_img)?>" alt=""/>
  </div>
  <div class="col-md-7">
    <h5>물품 정보</h5>
    <div class="divider"></div>
    <p>종류 : <?=$detail->product_type?></p>
    <p>쟝르 : <?=$detail->product_genre?></p>
    <p>재고번호 : <?=$detail->product_seq?></p>
    <div class="blank"></div>
    <h5 style="float:left">대여자 정보</h5><h6 style="float:right">(확인 후 신청 버튼 눌러주세요.)</h6>
    <div class="divider" style="clear:both"></div>
    <p>이름 : <?=$this->session->userdata('user_name')?> (<?=$this->session->userdata('user_id')?>)</p>
    <p>기수 : <?=$this->session->userdata('user_season')?></p>
    <p>연락처 : <?=$this->session->userdata('user_phone')?></p>
    <form class="" action="<?=base_url('Rental/register')?>" method="post">
      <input type="hidden" name="rental_user" value="<?=$this->session->userdata('user_id')?>">
      <input type="hidden" name="rental_product" value="<?=$id?>">
      <input type="hidden" name="product_seq" value="<?=$detail->product_seq?>">
      <input type="hidden" name="type" value="<?=$detail->product_type_id?>">
      <button class="btn btn-primary col-md-6" type="submit">신청하기</button>
      <button class="btn btn-secondary col-md-6" type="button" onclick="history.back(-1);">취소하기</button>
    </form>
  </div>
</div>
