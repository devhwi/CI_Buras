<style media="screen">

</style>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">댓글 관리</h1>
    <table id="replyTable" class="table">
      <thead>
        <tr>
          <th>댓글ID</th>
          <th>상위댓글ID</th>
          <th>카테고리</th>
          <th>글쓴이</th>
          <th>관련글제목</th>
          <th>댓글내용</th>
          <th>작성일시</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reply_list as $k => $row): ?>
          <tr>
            <td><?=$row['reply_id']?></td>
            <td><?=$row['reply_parent']?></td>
            <td><?=$row['category_desc']?></td>
            <td><?=$row['user_name'].'('.$row['reply_writer'].')'?></td>
            <td><?=$row['board_title']?></td>
            <td><?=$row['reply_content']?></td>
            <td><?=$row['reply_dttm']?></td>
            <td>
              <form class="" action="<?=base_url('admin/Board/remove_reply')?>" method="post" onsubmit="return confirm('하위 댓글도 삭제됩니다.\n삭제하시겠습니까?');">
                <input type="hidden" name="reply_id" value="<?=$row['reply_id']?>">
                <button type="submit" class="btn btn-block btn-danger">삭제</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<!-- End row class -->

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/admin/vendor/datatables/js/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#replyTable').DataTable({
    responsive: true
  });
});
</script>
