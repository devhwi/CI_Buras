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
  <table class="table table-sm">
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
        <td class="col-md-6" style="text-align:left;"><a href="<?=base_url('Board/detail/'.$row['board_id'])?>"><?=$row['board_title']?></a></td>
        <td class="col-md-2"><?=$row['user_name']?></td>
        <td class="col-md-2"><?=$row['board_dttm']?></td>
        <td class="col-md-1"><?=$row['reply_count']?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td><?=$this->pagination->create_links();?></td>
      </tr>
      <tr>
        <td style="text-align:right;">
          <a class="btn btn-primary" style="color:#fff" href="<?=base_url('Board/write/'.$category_id)?>">글쓰기</a>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
