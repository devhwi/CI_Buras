<style media="screen">
  .badge {
    border:none;
    font-size: 0.9em;
  }

  .divider {
    height: 1px;
    width: 100%;
    border: 1px solid #ddd;
    margin-top: 1em;
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

  .product-img > img {
    margin-bottom: 1em;
  }

  @media (max-width: 767px) {
    .detail-top {
      margin-top: 1em;
    }
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
    <h5 class="detail-top">물품 정보</h5>
    <div class="divider"></div>
    <p>종류 : <?=$detail->product_type?></p>
    <p>쟝르 : <?=$detail->product_genre?></p>
    <div class="blank"></div>
    <h5>물품 현황</h5>
    <div class="divider"></div>
    <ul class="list-group">
      <?php foreach($status as $k => $row) : ?>
      <li class="list-group-item justify-content-between">
        <?=$row['product_name'].'-'.$row['product_seq']?>
        <?php if($row['product_status'] == 0) : ?>
        <span class="badge badge-danger">대여중</span>
        <?php else : ?>
        <a href="<?=base_url('Product/request/'.$row['product_id'].'/'.$row['product_seq'])?>"><span class="badge badge-success">대여 가능</span></a>
        <?php endif; ?>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col-md-12">
    <h5>물품 이미지</h5>
    <div class="divider"></div>
    <div class="product-img" align="center">
      <?php foreach($image as $k => $row) : ?>
        <img src="<?=base_url('assets/img/product/'.$row['image_name'])?>" alt="">
      <?php endforeach; ?>
    </div>
  </div>
</div>
