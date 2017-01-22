<style media="screen">
  .button-area {
    text-align: right;
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
        <td><?=$row['product_id']?></td>
        <td><?=$row['product_name']?></td>
        <td><?=$row['product_type_name']?></td>
        <td><?=$row['product_genre_name']?></td>
        <td><?=$row['product_seq']?></td>
        <td><?=$row['product_status']?></td>
        <td class="button-area">
          <form class="" action="index.html" method="post">
            <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
            <button class="btn btn-danger" type="submit">삭제</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
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
