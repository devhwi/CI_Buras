<style media="screen">

</style>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">갤러리 관리</h1>
    <table id="videoTable" class="table">
      <thead>
        <tr>
          <th colspan="6" style="text-align:right;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGallery">등록하기</button>
          </th>
        </tr>
        <tr>
          <th>카테고리</th>
          <th>이미지</th>
          <th>제목</th>
          <th>글쓴이</th>
          <th>작성일시</th>
          <th>삭제</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($gallery_list as $k => $row): ?>
          <tr>
            <td><?=$row['media_category']?></td>
            <td>
              <img src="<?=base_url('assets/img/gallery/'.$row['media_content'])?>" alt="" width="150px">
            </td>
            <td><?=$row['media_title']?></td>
            <td><?=$row['user_name'].'('.$row['media_writer'].')'?></td>
            <td><?=$row['media_dttm']?></td>
            <td>
              <form class="" action="<?=base_url('admin/Board/remove_gallery')?>" method="post" onsubmit="return confirm('삭제하시겠습니까?');">
                <input type="hidden" name="media_id" value="<?=$row['media_id']?>">
                <input type="hidden" name="media_content" value="<?=$row['media_content']?>">
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

<!-- GALLERY ADD MODAL -->
<div class="modal fade" id="addGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">갤러리 추가</h4>
      </div>
      <form action="<?=base_url('admin/Board/add_gallery')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="media_writer" value="<?=$this->session->userdata('user_id')?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="">사진 제목</label>
            <input class="form-control" type="text" name="media_title" required>
          </div>
          <div class="form-group">
            <label for="">카테고리</label>
            <input class="form-control" type="text" name="media_category">
          </div>
          <div class="form-group">
            <label for="">사진 파일</label>
            <input class="form-control" type="file" name="media_content">
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
$(document).ready(function() {
  $('#videoTable').DataTable({
    responsive: true
  });
});
</script>

<script type="text/javascript">
  $('#vdoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var video = button.data('vdo');
    var title = button.data('title');
    var videoURL = '<iframe id="youtube" width="100%" height="500px" src="'+video+'" frameborder="0" allowfullscreen></iframe>';

    var modal = $(this);
    modal.find('#modal-vdo').html(videoURL);
    modal.find('#modal-title').text(title);
  });
</script>
