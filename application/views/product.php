<style media="screen">
  img {
    max-width: 100%;
    max-height:inherit;

  }

  a.plink {
    text-derocarion: none;
    color: inherit;
  }

  .custom-select {
    width: 100%;
  }

  .card {
    max-height: 300px;
  }

  .card-img-top {
    height: 200px;
    width: 100%;
  }
</style>
<div class="col-md-2" style="margin-bottom: 1em;">
  <form class="" action="<?=base_url('Product/list')?>" method="post">
    <div class="form-group">
      <label for="">종류</label>
      <select class="custom-select" name="type" onchange="this.form.submit()">
      <?php foreach($type as $k => $row) : ?>
        <option value = "<?=$row['type_id']?>" <?php if($sel_type == $row['type_id']) echo 'selected'?>><?=$row['type_desc']?></option>
      <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">쟝르</label>
      <select class="custom-select" name="genre" onchange="this.form.submit()">
      <?php foreach($genre as $k => $row) : ?>
        <option value = "<?=$row['genre_id']?>" <?php if($sel_genre == $row['genre_id']) echo 'selected'?>><?=$row['genre_desc']?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </form>
</div>
<div class="col-md-10" id="">
  <?php foreach($list as $k => $row) : ?>
  <div class="col-md-3" style="margin-bottom: 1em;">
    <div class="card text-xs-center">
      <a class="plink" href="<?=base_url('Product/detail/'.$row['product_id'])?>"><img class="card-img-top" src="<?=base_url('assets/img/product/'.$row['product_img'])?>" alt=""></a>
      <div class="card-block">
        <a class="plink" href="<?=base_url('Product/detail/'.$row['product_id'])?>"><h5 class="card-title"><?=$row['product_name']?></h5></a>
        <p class="card-text">재고 : <?=$row['product_count']?></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<script type="text/javascript">

</script>
