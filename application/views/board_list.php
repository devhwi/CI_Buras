<style media="screen">
  .table {

  }

  .table th {
    text-align: center;
    border-top-width: 0;
  }

  .table td {
    text-align: center;
  }

  a {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }

  .ellip {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }

  .list-group-item {
    padding-left: 0.125rem;
    padding-right: 0.125rem;
  }

  @media (max-width: 640px) {
    .table {
      display: none;
    }
  }
</style>
<div class="">

</div>
<div class="container">
  <ul class="nav nav-tabs">
  <?php foreach($categories as $k => $row) : ?>
    <li class="nav-item">
      <a class="nav-link <?=$category_id == $row['category_id'] ? 'active' : ''?>" href="<?=base_url('Board/'.$row['category_id'])?>"><?=$row['category_desc']?></a>
    </li>
  <?php endforeach; ?>
  </ul>
  <table class="table">
    <thead>
      <tr>
        <th class="col-md-1">번호</th>
        <th class="col-md-6">제목</th>
        <th class="col-md-2">작성자</th>
        <th class="col-md-2">작성일</th>
        <th class="col-md-1">댓글</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($board_list as $k => $row) : ?>
      <tr>
        <td class="col-md-1"><?=$row['board_seq']?></td>
        <td class="col-md-6" style="text-align:left;">
          <a href="<?=base_url('Board/detail/'.$row['board_id'])?>">
            <?php $notice_yn = $row['board_notice'] == 0 ? '' : '<span class="badge badge-danger">공지</span>' ?>
            <?=$notice_yn.'&nbsp;'.$row['board_title']?>
          </a>
        </td>
        <td class="col-md-2"><?=$row['user_name']?></td>
        <td class="col-md-2"><?=$row['board_dttm']?></td>
        <td class="col-md-1"><?=$row['reply_count']?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan=5><?=$this->pagination->create_links();?></td>
      </tr>
      <?php if ($this->session->userdata('user_id')): ?>
        <?php if ($this->session->userdata('user_level') >= 7 || $this->uri->segment(2) == 4): ?>
          <tr>
            <td style="text-align:right;" colspan=5>
              <a class="btn btn-primary" style="color:#fff" href="<?=base_url('Board/write/'.$category_id)?>">글쓰기</a>
            </td>
          </tr>
        <?php endif; ?>
      <?php endif;?>
    </tfoot>
  </table>
  <ul class="list-group hidden-sm-up">
    <?php foreach($board_list as $k => $row) : ?>
    <li class="list-group-item">
      <div class="col-xs-10 ellip">
        <div class="ellip" style="max-width:100%">
          <a href="<?=base_url('Board/detail/'.$row['board_id'])?>">
          <?php $notice_yn = $row['board_notice'] == 0 ? '' : '<span class="badge badge-danger">공지</span>' ?>
          <?=$notice_yn.'&nbsp;'.$row['board_title']?>
          </a>
        </div>
        <div class="" style="max-width:100%;">
          <small><?=$row['user_name']?></small>&nbsp;&nbsp;&nbsp;<small class="text-muted"><?=$row['board_dttm']?></small>
        </div>
      </div>
      <div class="col-xs-2">
        <i class="fa fa-comments-o">&nbsp;<?=$row['reply_count']?></i>
      </div>
    </li>
    <?php endforeach; ?>
  </ul>
  <div class="hidden-sm-up" align="center">
    <?=$this->pagination->create_links();?><br>
  </div>
  <?php if ($this->session->userdata('user_id')): ?>
  <div class="hidden-sm-up" align="right">
    <a class="btn btn-primary" style="color:#fff" href="<?=base_url('Board/write/'.$category_id)?>">글쓰기</a>
  </div>
  <?php endif; ?>
</div>
