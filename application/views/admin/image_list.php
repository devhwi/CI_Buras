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
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add_image" <?=$selected_id == "" ? 'disabled' : ''?>>이미지 추가</button>
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
    <img class="img-thumbnail" src="<?=base_url('assets/img/product/'.$row['image_name'])?>" alt="">
    <a href="" class="btn btn-danger" style="width:100%;margin-bottom: 0.75em;">삭제</a>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">물품 이미지 추가</h4>
      </div>
      <form action="<?=base_url('admin/Image/upload')?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="">파일 추가</label>
            <input type="hidden" name="product_id" value="<?=$selected_id?>">
            <input class="form-control" type="file" name="product_image[]" multiple required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
          <button type="submit" class="btn btn-primary">추가하기</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
