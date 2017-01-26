<style media="screen">
  .button-area {
    text-align: right;
  }

  th,
  .center-area {
    text-align: center;
  }
</style>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">물품 리스트</h1>
  </div>
  <table id="productTable" class="table" width="100%">
    <thead>
      <tr>
        <th>코드</th>
        <th>명칭</th>
        <th>종류</th>
        <th>쟝르</th>
        <th>재고번호</th>
        <th>상태</th>
        <th class="button-area">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($product as $k => $row) : ?>
      <tr>
        <td class="center-area"><?=$row['product_id']?></td>
        <td><?=$row['product_name']?></td>
        <td class="center-area"><?=$row['product_type_name']?></td>
        <td class="center-area"><?=$row['product_genre_name']?></td>
        <td class="center-area"><?=$row['product_seq']?></td>
        <td class="center-area">
          <button type="button" class="btn btn-outline <?=$row['product_status'] == 1 ? 'btn-success' : 'btn-danger'?>" disabled>
          <?=$row['product_status'] == 1 ? '대여가능' : '대여중' ?>
          </button>
        </td>
        <td class="button-area">
          <form class="" action="<?=base_url('admin/Product/delete_goods')?>" method="post" onsubmit="return confirm('해당 상품 정보 모두가 삭제됩니다. 계속하시겠습니까?');">
            <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
            <input type="hidden" name="product_seq" value="<?=$row['product_seq']?>">
            <button class="btn btn-danger" type="submit" <?=$row['product_status'] == 1 ? '' : 'disabled'?>>삭제</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div align="right">
    <button class="btn btn-lg btn-outline btn-primary" type="button" data-toggle="modal" data-target="#add_product">물품 추가</button>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">물품 추가</h4>
      </div>
      <form class="" action="<?=base_url('admin/Product/add_goods')?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="">물품코드</label>
          <input class="form-control" type="text" name="product_id" value="" required>
        </div>
        <div class="form-group">
          <label for="">물품명</label>
          <input id="name_area" class="form-control" type="text" name="product_name" value="" required>
          <input id="chk_additional" type="checkbox" name="additional">&nbsp;기존 물품 추가
        </div>
        <div class="form-group">
          <label for="">종류</label>
          <select class="form-control" name="product_type">
            <?php foreach($type as $k => $row) : ?>
            <option value="<?=$row['type_id']?>"><?=$row['type_desc']?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">쟝르</label>
          <select class="form-control" name="product_genre">
            <?php foreach($genre as $k => $row) : ?>
            <option value="<?=$row['genre_id']?>"><?=$row['genre_desc']?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">수량</label>
          <input class="form-control" type="number" name="product_count" value="1" min="1" required>
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

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/admin/vendor/datatables/js/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>

<script type="text/javascript">
$('#chk_additional').change(function() {
  if($(this).is(':checked')) {
    $('#name_area').attr('disabled', true);
  }else{
    $('#name_area').attr('disabled', false);
  }
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $('#productTable').DataTable({
    responsive: true
  });
  $('.edit-btn').click(function () {
    var currentTD = $(this).parents('tr').find('td');
    if ($(this).html() == '수정') {
      $.each(currentTD, function () {
        $(this).prop('contenteditable', true)
      });
    } else {
      $.each(currentTD, function () {
        $(this).prop('contenteditable', false)
      });
    }

    $(this).html($(this).html() == '수정' ? '저장' : '수정')
  });
});
</script>
