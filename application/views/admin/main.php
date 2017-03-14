<style media="screen">
.img-thumbnail {
  max-height: 280px;
}

.img-list {
  text-align: center;
}

#main-poster {
  max-width: 100%;
  max-height: auto;
}
</style>
<!-- Title Area -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$total_board?></div>
                        <div>전체 게시물</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Board/post')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$total_reply?></div>
                        <div>전체 댓글</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Board/reply')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-refresh fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$ing_rental?></div>
                        <div>렌탈 중 품목</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Rental')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-krw fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$ing_finance?></div>
                        <div>미납 건수</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Finance')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
  <div class="col-lg-12">
      <h3 class="page-header">메인 이미지 (회장 & 기획 전용)&nbsp;<small>(바로 적용 안될 시, 브라우저 캐시 삭제 바람)</small></h3>
  </div>
  <?php foreach ($main_images as $k => $row): ?>
    <div class="col-md-4 col-xs-12 img-list">
      <img class="img-thumbnail" src="<?=base_url('assets/img/main/'.$row['code_desc'])?>" alt="">
      <form class="" action="<?=base_url('admin/Main/edit_main_image')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="code_group" value="<?=$row['code_group']?>">
        <input type="hidden" name="code_name" value="<?=$row['code_name']?>">
        <input type="hidden" name="code_seq" value="<?=$row['code_seq']?>">
        <input type="file" name="code_desc" class="form-control edit_file">
        <button class="btn btn-block btn-primary edit_button" type="submit" disabled="true">수정 (jpg만 가능)</button>
      </form>
    </div>
  <?php endforeach; ?>
</div>

<div class="row" style="margin-bottom: 2em">
  <div class="col-md-6 col-xs-12">
    <div class="col-lg-12">
      <h3 class="page-header">메인 포스터</h3>
    </div>
    <div class="col-lg-12">
      <img src="<?=base_url('assets/img/main/'.$main_poster->code_desc)?>" id="main-poster">
      <form class="" action="<?=base_url('admin/Main/edit_main_poster')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="code_group" value="main">
        <input type="hidden" name="code_name" value="poster">
        <input type="file" name="code_desc" class="form-control edit_file">
        <button class="btn btn-block btn-primary edit_button" type="submit" disabled="true">수정 (jpg만 가능)</button>
      </form>
    </div>
  </div>
  <div class="col-md-6 col-xs-12">
    <div class="col-lg-12">
      <h3 class="page-header">연락처 정보</h3>
    </div>
    <div class="col-lg-12">
      <form class="" action="<?=base_url('admin/Main/edit_leaders')?>" method="post">
        <div class="form-group">
          <label for="">남회장</label>
          <select class="form-control" name="boy">
            <?php foreach ($members as $k => $row): ?>
              <option value="<?=$row['user_id']?>" <?=$row['user_id'] == $boy_contact->code_desc ? 'selected' : ''?>><?=$row['user_name'].' ('.$row['user_phone'].')'?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">여회장</label>
          <select class="form-control" name="girl">
            <?php foreach ($members as $k => $row): ?>
              <option value="<?=$row['user_id']?>" <?=$row['user_id'] == $girl_contact->code_desc ? 'selected' : ''?>><?=$row['user_name'].' ('.$row['user_phone'].')'?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <button class="btn btn-block btn-primary" type="submit" name="button">저장</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(".edit_file").on("change", function () {
    $(this).siblings(".edit_button").attr('disabled', false);
  });
</script>
