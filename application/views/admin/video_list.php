<style media="screen">

</style>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">동영상 관리</h1>
    <table id="videoTable" class="table">
      <thead>
        <tr>
          <th colspan="6" style="text-align:right;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addVideo">등록하기</button>
          </th>
        </tr>
        <tr>
          <th>썸네일</th>
          <th>제목</th>
          <th>글쓴이</th>
          <th>작성일시</th>
          <th>재생</th>
          <th>삭제</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($video_list as $k => $row): ?>
          <?php
            $youtubeVideoId = $row['media_content'];

            $thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
            $videoURL = 'https://www.youtube.com/embed/'.$youtubeVideoId;
          ?>
          <tr>
            <td>
              <img src="<?=$thumbURL?>" alt="" width="150px">
            </td>
            <td><?=$row['media_title']?></td>
            <td><?=$row['user_name'].'('.$row['media_writer'].')'?></td>
            <td><?=$row['media_dttm']?></td>
            <td>
              <a href="#" data-toggle="modal" data-target="#vdoModal"
                data-vdo="<?=$videoURL?>"
                data-title="<?=$row['media_title']?>"> <!-- detail link -->
                <button type="button" class="btn btn-block btn-success">재생</button>
              </a>
            </td>
            <td>
              <form class="" action="<?=base_url('admin/Board/remove_video')?>" method="post" onsubmit="return confirm('삭제하시겠습니까?');">
                <input type="hidden" name="media_id" value="<?=$row['media_id']?>">
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

<!-- VIDEO ADD MODAL -->
<div class="modal fade" id="addVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">동영상 추가(Youtube)</h4>
      </div>
      <form action="<?=base_url('admin/Board/add_video')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="media_writer" value="<?=$this->session->userdata('user_id')?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="">동영상 제목</label>
            <input class="form-control" type="text" name="media_title" required>
          </div>
          <div class="form-group">
            <label for="">동영상 링크</label>
            <input class="form-control" type="text" name="media_content"
              placeholder="유투브 링크를 복붙해주세요.(https://youtube.com/xxxxxx)" required>
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


<!-- VIDEO PLAY MODAL -->
<div class="modal fade" id="vdoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div id="modal-vdo" class="modal-body">

      </div>
      <div class="modal-footer" align="center" style="text-align: center">
        <h5 id="modal-title"><!-- Title by JQuery --></h5>
      </div>
    </div>
  </div>
</div>

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

  $('#vdoModal').on('hidden.bs.modal', function (event) {
    $("#vdoModal iframe").attr("src", $("#vdoModal iframe").attr("src"));
  });
</script>
