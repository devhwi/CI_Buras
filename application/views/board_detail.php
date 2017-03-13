<style media="screen">
  .card-header {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }

  .reply-title {
    margin-top: 1.5em;
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

  .r-of-r {
    margin-top: 0.5em;
  }
</style>
<div class="container">
  <div class="card">
    <h4 class="card-header"><?=$detail->board_title?></h4>
    <div class="card-block">
      <h5 class="card-title"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?=$detail->user_name.'&nbsp;('.$detail->board_writer.')'?></h5>
      <p class="card-text" style="">
        <?=$detail->board_content?>
      </p>
      <p>
        <?php if ($detail->board_category == 2 || $detail->board_category == 3 || $detail->board_category == 4): ?>
          <?php if ($detail->board_file == ""): ?>
            파일 없음
          <?php else: ?>
            <!-- <a href="<?=base_url('Board/download/'.$detail->board_file)?>"><?=$detail->board_file?></a> -->
            <a href="http://buras.cafe24.com/assets/file/<?=$detail->board_file?>"><?=$detail->board_file?></a>
          <?php endif; ?>
        <?php endif; ?>
      </p>
    </div>
    <div class="card-footer text-muted">
      <?=$detail->board_dttm?>&nbsp;에 작성&nbsp;&nbsp;&nbsp;
      <?php if ($detail->board_writer == $this->session->userdata('user_id')): ?>
        <a class="btn btn-link" href="<?=base_url('Board/edit/'.$detail->board_id)?>">수정</a>
        <a class="btn btn-link" href="<?=base_url('Board/delete/'.$detail->board_id.'/'.$detail->board_category.'/'.$detail->board_seq)?>"
          onclick="return confirm('삭제하시겠습니까?')">삭제</a>
      <?php endif; ?>
    </div>
  </div>
  <h5 class="reply-title">댓글</h5>
  <?php if ($this->session->userdata('user_id')) : ?>
  <div class="card card-outline-secondary">
    <div class="card-block">
      <!-- WRITE REPLY AREA -->
      <form class="" action="<?=base_url('Reply/write_reply')?>" method="post">
        <input type="hidden" name="reply_writer" value="<?=$this->session->userdata('user_id')?>">
        <input type="hidden" name="reply_ref_board" value="<?=$detail->board_id?>">
        <input type="hidden" name="reply_parent" value="0">
        <textarea class="form-control" name="reply_content" rows="2" placeholder="댓글을 남겨주세요." style="" required=""></textarea>
        <div class="" align="right">
          <button type="submit" class="btn btn-primary" href="" style="margin-top:0.5em;">댓글 등록</button>
        </div>
      </form>
    </div>
  </div>
  <?php endif; ?>
  <div class="list-group">
    <div class="list-group-item" style="border-color:#fff">
      <?php if($reply_count == 0) : ?>
        댓글이 없습니다.
      <?php endif; ?>
      <?php foreach($reply as $k => $row) : ?>
      <div class="col-xs-12 reply">
        <!-- pc -->
        <div class="col-md-10 hidden-md-down">
          <?=str_repeat('<i class="fa fa-reply fa-rotate-180" aria-hidden="true"></i>&nbsp;',$row['reply_level']).$row['reply_content']?>
        </div>
        <div class="col-md-2 hidden-md-down">
          <?=$row['reply_writer']?>
        </div>
        <div class="col-md-12 text-muted reply-footer hidden-md-down">
          <form class="" action="<?=base_url('Reply/delete_reply')?>" method="post" onsubmit="return confirm('삭제하시겠습니까?');">
            <?=$row['reply_dttm']?>&nbsp;에 작성
            <button class="btn btn-link btn-reply-of-reply" type="button">답글</button>
          <?php if($row['reply_writer'] == $this->session->userdata('user_id')) : ?>
            <input type="hidden" name="reply_id" value="<?=$row['reply_id']?>">
            <input type="hidden" name="reply_ref_board" value="<?=$row['reply_ref_board']?>">
            <button class="btn btn-link" style="color:#b8210d">삭제</button>
          <?php endif; ?>
          </form>
        </div>
        <!-- mobile -->
        <div class="col-md-12 hidden-md-up">
          <i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?=$row['reply_writer']?>
        </div>
        <div class="col-md-12 hidden-md-up" style="margin-bottom:0.5em;">
          <?=str_repeat('<i class="fa fa-reply fa-rotate-180" aria-hidden="true"></i>&nbsp;',$row['reply_level']).$row['reply_content']?>
        </div>
        <div class="col-md-12 text-muted reply-footer hidden-md-up">
          <?=$row['reply_dttm']?>&nbsp;에 작성
          <br>
          <form class="" action="<?=base_url('Reply/delete_reply')?>" method="post" onsubmit="return confirm('삭제하시겠습니까?');">
            <button class="btn btn-sm btn-outline-secondary btn-reply-of-reply" style="color:#666" type="button">답글</button>
          <?php if($row['reply_writer'] == $this->session->userdata('user_id')) : ?>
            <input type="hidden" name="reply_id" value="<?=$row['reply_id']?>">
            <input type="hidden" name="reply_ref_board" value="<?=$row['reply_ref_board']?>">
            <button class="btn btn-sm btn-outline-danger">삭제</button>
          <?php endif; ?>
          </form>
        </div>
        <!-- WRITE REPLY OF REPLY -->
        <div class="r-of-r col-md-12">
          <form class="" action="<?=base_url('Reply/write_reply')?>" method="post">
            <input type="hidden" name="reply_writer" value="<?=$this->session->userdata('user_id')?>">
            <input type="hidden" name="reply_ref_board" value="<?=$row['reply_ref_board']?>">
            <input type="hidden" name="reply_parent" value="<?=$row['reply_id']?>">
            <textarea class="form-control" name="reply_content" rows="2" placeholder="" style="" required></textarea>
            <div class="" align="right">
              <button type="submit" class="btn btn-primary" style="margin-top:0.5em;">대댓글 등록</button>
            </div>
          </form>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.r-of-r').hide();
  });

  $('.btn-reply-of-reply').click(function() {
    if($(this).parent().parent().siblings('.r-of-r').is(':visible')) {
      $(this).parent().parent().siblings('.r-of-r').hide();
      $(this).html('답글');
    }else {
      $(this).parent().parent().siblings('.r-of-r').show();
      $(this).html('닫기');
    }
  });
</script>
