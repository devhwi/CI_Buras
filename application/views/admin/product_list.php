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
        <td class="center-area"><?=$row['product_status']?></td>
        <td class="button-area">
          <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#update_product">수정</button>
        </td>
        <td class="button-area">
          <form class="" action="<?=base_url('admin/Product/delete_goods')?>" method="post" onsubmit="return confirm('해당 상품 정보 모두가 삭제됩니다. 계속하시겠습니까?');">
            <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
            <input type="hidden" name="product_seq" value="<?=$row['product_seq']?>">
            <button class="btn btn-danger" type="submit">삭제</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div align="right">
    <button class="btn btn-outline btn-primary" type="button" data-toggle="modal" data-target="#add_product">물품 추가</button>
  </div>
</div>

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/admin/vendor/datatables/js/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#productTable').DataTable({
        responsive: true
    });
});
</script>
