<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">회계 관리</h1>
  </div>
  <table id="financeTable" class="table" width="100%">
    <thead>
      <tr>
        <th style="width:5%;">번호</th>
        <th style="width:10%;">참조렌탈번호</th>
        <th style="width:15%">대여자ID</th>
        <th style="width:15%;">대여품목</th>
        <th style="width:10%;">경과월수</th>
        <th style="width:10%;">금액</th>
        <th style="width:15%;">납부일시</th>
        <th style="width:10%;">납부상태</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($finance_list as $k => $row) : ?>
        <tr>
          <td><?=$k+1?></td>
          <td><?=$row['finance_ref']?></td>
          <td><?=$row['rental_user']?></td>
          <td><?=$row['rental_product']?></td>
          <td><?=$row['pass_month']?></td>
          <td><?=$row['total_sum']?></td>
          <td><?=$row['finance_payment_dttm']?></td>
          <td>
            <?php if($row['finance_status'] == 1) : ?>
            <button type="button" class="btn btn-block btn-success" disabled>납부완료</button>
            <?php else : ?>
            <form action="<?=base_url('admin/Finance/payment')?>" method="post" onsubmit="return confirm('납부처리를 하시겠습니까?');">
              <input type="hidden" name="finance_id" value="<?=$row['finance_id']?>">
              <button type="submit" class="btn btn-block btn-danger">미납</button>
            </form>
            <?php endif; ?>
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
  $('#financeTable').DataTable({
    responsive: true
  });

});
</script>
