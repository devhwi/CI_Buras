<style media="screen">
  .button-area {
    text-align: right;
  }
</style>
<div class="row">
  <!-- 종류 -->
  <div class="col-md-6">
    <h3>종류</h3>
    <table class="table">
      <thead>
        <tr>
          <th>번호</th>
          <th>설명</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($type as $k => $row) : ?>
        <tr>
          <form class="" action="<?=base_url('admin/Product/delete_category')?>" method="post"
            onsubmit="return confirm('해당하는 종류의 품목이 함께 삭제됩니다. 계속하시겠습니까?');">
          <input type="hidden" name="param_type" value="type">
          <input type="hidden" name="type_id" value="<?=$row['type_id']?>">
          <td class="col-md-2"><?=$row['type_id']?></td>
          <td class="col-md-8"><?=$row['type_desc']?></td>
          <td class="col-md-2 button-area"><button type="submit" class="btn btn-danger">삭제</button></td>
          </form>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td class="button-area" colspan=3>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add_type">종류추가</button>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- 쟝르 -->
  <div class="col-md-6">
    <h3>쟝르</h3>
    <table class="table">
      <thead>
        <tr>
          <th>번호</th>
          <th>설명</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($genre as $k => $row) : ?>
        <tr>
          <form class="" action="<?=base_url('admin/Product/delete_category')?>" method="post"
            onsubmit="return confirm('해당하는 쟝르의 품목이 함께 삭제됩니다. 계속하시겠습니까?');">
          <input type="hidden" name="param_type" value="genre">
          <input type="hidden" name="genre_id" value="<?=$row['genre_id']?>">
          <td class="col-md-2"><?=$row['genre_id']?></td>
          <td class="col-md-8"><?=$row['genre_desc']?></td>
          <td class="col-md-2 button-area"><button type="submit" class="btn btn-danger">삭제</button></td>
          </form>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td class="button-area" colspan=3>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add_genre">쟝르추가</button>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<!-- Type Modal -->
<div class="modal fade" id="add_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">종류 추가</h4>
      </div>
      <form class="" action="<?=base_url('admin/Product/add_category')?>" method="post">
      <div class="modal-body">
        <input type="hidden" name="param_type" value="type">
        <input type="text" name="type_desc" placeholder="종류 이름" class="form-control">
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

<!-- Genre Modal -->
<div class="modal fade" id="add_genre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">쟝르 추가</h4>
      </div>
      <form class="" action="<?=base_url('admin/Product/add_category')?>" method="post">
      <div class="modal-body">
        <input type="hidden" name="param_type" value="genre">
        <input type="text" name="genre_desc" placeholder="쟝르 이름" class="form-control">
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
