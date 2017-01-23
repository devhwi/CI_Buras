<style media="screen">
.img-thumbnail {
  padding: 0.25rem;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 0.25rem;
  -webkit-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
  max-width: 100%;
  height: auto;
}
</style>

<div class="row" style="padding-top: 2em;margin-bottom: 2em;">
  <div class="col-md-3">
    <form class="" action="<?=base_url('admin/Image')?>" method="post">
      <select id="select_id" class="form-control" name="product_id" onchange="this.form.submit()">
        <option value="">-</option>
        <?php foreach($id_list as $k => $row) : ?>
        <option value="<?=$row['product_id']?>" <?=$selected_id == $row['product_id'] ? 'selected' : ''?>><?=$row['product_id']?></option>
        <?php endforeach; ?>
      </select>
    </form>
  </div>
  <div class="col-md-9">
    <button class="btn btn-primary" type="button">이미지 추가</button>
  </div>
</div>
<div class="row">
  <?php if($image_list == NULL) : ?>
  <div class="col-md-12">
    이미지가 없습니다.
  </div>
  <?php else: ?>
  <?php foreach($image_list as $k => $row) : ?>
  <div class="col-md-3">
    <img class="img-thumbnail" src="<?=base_url('assets/img/product/'.'sample1.jpg')?>" alt="">
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
</div>
<script type="text/javascript">
</script>
