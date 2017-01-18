<style media="screen">
  .card-header {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }

  .reply-title {
    margin-top: 2em;
  }

  .reply {
    padding: 0.75em 0em;
    border-top: 1px dashed black;
    border-bottom: 1px dashed black;
  }

  .reply-footer {
    /*font-size: 0.8em;*/
    font-weight: normal;
  }
</style>
<div class="container">
  <div class="card">
    <h4 class="card-header"><?=$detail->board_title?></h4>
    <div class="card-block">
      <h5 class="card-title"><?=$detail->user_name.'&nbsp;('.$detail->board_writer.')'?></h5>
      <p class="card-text" style="">
        <?=str_replace('<br />', '', $detail->board_content)?>
      </p>
    </div>
    <div class="card-footer text-muted">
      <?=$detail->board_dttm?>&nbsp;에 작성
    </div>
  </div>
  <h5 class="reply-title">댓글</h5>
  <div class="card card-outline-secondary">
    <div class="card-block">
      <!-- WRITE REPLY AREA -->
      <form class="" action="" method="post">
        <input type="hidden" name="reply_writer" value="<?=$this->session->userdata('user_id')?>">
        <input type="hidden" name="reply_ref_board" value="<?=$detail->board_id?>">
        <textarea class="form-control" name="reply_content" rows="2" placeholder="댓글을 남겨주세요." style="" required=""></textarea>
        <div class="" align="right">
          <button type="submit" class="btn btn-primary" href="" style="margin-top:0.25em;">댓글 등록</button>
        </div>
      </form>
    </div>
  </div>
  <div class="list-group">
    <div class="list-group-item">
      <?php if($reply_count == 0) : ?>
        댓글이 없습니다.
      <?php endif; ?>
      <?php foreach($reply as $k => $row) : ?>
      <div class="col-xs-12 reply">
        <div class="col-md-10">
          <?=str_repeat('<i class="fa fa-reply fa-rotate-180" aria-hidden="true"></i>&nbsp;',$row['reply_level']).str_replace('<br />', '', $row['reply_content'])?>
        </div>
        <div class="col-md-2">
          <?=$row['reply_writer']?>
        </div>
        <div class="col-md-12 text-muted reply-footer">
          <?=str_repeat('&nbsp;', $row['reply_level']*4).$row['reply_dttm']?>&nbsp;에 작성
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
