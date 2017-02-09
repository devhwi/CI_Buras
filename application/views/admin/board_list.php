<style media="screen">

</style>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">게시물 관리</h1>
    <table id="boardTable" class="table">
      <thead>
        <tr>
          <th>카테고리</th>
          <th>제목</th>
          <th>글쓴이</th>
          <th>작성일시</th>
          <th>첨부파일</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($board_list as $k => $row): ?>
          <tr>
            <td><?=$row['category_desc']?></td>
            <td><?=$row['board_title']?></td>
            <td><?=$row['user_name'].'('.$row['board_writer'].')'?></td>
            <td><?=$row['board_dttm']?></td>
            <td><?=$row['board_file']?></td>
            <td>
              <form class="" action="<?=base_url('admin/Board/remove_post')?>" method="post" onsubmit="return confirm('삭제하시겠습니까?');">
                <input type="hidden" name="board_id" value="<?=$row['board_id']?>">
                <input type="hidden" name="board_category" value="<?=$row['board_category']?>">
                <input type="hidden" name="board_seq" value="<?=$row['board_seq']?>">
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
  $('#boardTable').DataTable({
    responsive: true
  });
});
</script>
