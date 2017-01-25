<style media="screen">
  .nav-link {
    color: #aaa;
  }

  .img-thumbnail {
    max-width:100px;
  }

  .table td {
    vertical-align: middle!important;
    text-align: center;
  }
  .table th {
    text-align: center;
    border-top: 0;
  }

  .mobile-shown, .mobile-shown > i {
    display: none;
  }

  .badge {
    font-size: 0.9em;
  }

  .table td.no-center {
    text-align: left;
  }
  @media( max-width: 640px ) {
    .table td {
      text-align: left;
    }

    .img-thumbnail {
      max-width:100%;
    }

    .table th {
      display: none;
    }

    .mobile-shown, .mobile-shown > i {
      display: inline-block;
    }
  }

</style>

<div class="container">
  <!-- TAB LIST -->
  <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#all" role="tabpanel" aria-controls="all">
        <i class="fa fa-globe" aria-hidden="true" style="color:#222"></i> 전체
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#ing" role="tabpanel" aria-controls="ing">
        <i class="fa fa-spinner" aria-hidden="true" style="color:red"></i> 대여중
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#ed" role="tabpanel" aria-controls="ed">
        <i class="fa fa-check" aria-hidden="true" style="color:green"></i> 반납 완료
      </a>
    </li>
  </ul>
  <!-- TAB CONTENT -->
  <div class="tab-content">
    <!-- ALL -->
    <div class="tab-pane fade" id="all" role="tabpanel">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>이미지</th>
            <th>품목명</th>
            <th>렌탈일시</th>
            <th>반납상태</th>
            <th>반납일시</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($my_all as $k=>$row) : ?>
          <?php $status_badge = $row['rental_status'] == 0 ? '<span class="badge badge-danger">대여중</span>' : '<span class="badge badge-success">반납완료</span>'; ?>
          <tr>
            <td><span class="mobile-shown"><i class="fa fa-list-ol" aria-hidden="true"></i> 번호 :&nbsp;</span><?=$k+1?></td>
            <td><span class="mobile-shown"><i class="fa fa-picture-o" aria-hidden="true"></i> 이미지&nbsp;</span><img class="img-thumbnail" src="<?=base_url('assets/img/product/'.$row['product_img'])?>" alt="" /></td>
            <td class="no-center"><span class="mobile-shown"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 품목명 :&nbsp;</span><?=$row['product_name']?></td>
            <td><span class="mobile-shown"><i class="fa fa-clock-o" aria-hidden="true"></i> 렌탈일시 :&nbsp;</span><?=$row['rental_dttm']?></td>
            <td><span class="mobile-shown"><i class="fa fa-repeat" aria-hidden="true"></i> 반납상태 :&nbsp;</span><?=$status_badge?></td>
            <td><span class="mobile-shown"><i class="fa fa-calendar-o" aria-hidden="true"></i> 반납일시 :&nbsp;</span><?=$row['rental_return_dttm']?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- ING -->
    <div class="tab-pane fade" id="ing" role="tabpanel">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>이미지</th>
            <th>품목명</th>
            <th>렌탈일시</th>
            <th>반납상태</th>
            <th>반납일시</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($my_ing as $k=>$row) : ?>
          <?php $status_badge = $row['rental_status'] == 0 ? '<span class="badge badge-danger">대여중</span>' : '<span class="badge badge-success">반납완료</span>'; ?>
          <tr>
            <td><span class="mobile-shown"><i class="fa fa-list-ol" aria-hidden="true"></i> 번호 :&nbsp;</span><?=$k+1?></td>
            <td><span class="mobile-shown"><i class="fa fa-picture-o" aria-hidden="true"></i> 이미지&nbsp;</span><img class="img-thumbnail" src="<?=base_url('assets/img/product/'.$row['product_img'])?>" alt="" /></td>
            <td class="no-center"><span class="mobile-shown"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 품목명 :&nbsp;</span><?=$row['product_name']?></td>
            <td><span class="mobile-shown"><i class="fa fa-clock-o" aria-hidden="true"></i> 렌탈일시 :&nbsp;</span><?=$row['rental_dttm']?></td>
            <td><span class="mobile-shown"><i class="fa fa-repeat" aria-hidden="true"></i> 반납상태 :&nbsp;</span><?=$status_badge?></td>
            <td><span class="mobile-shown"><i class="fa fa-calendar-o" aria-hidden="true"></i> 반납일시 :&nbsp;</span><?=$row['rental_return_dttm']?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- ED -->
    <div class="tab-pane fade" id="ed" role="tabpanel">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>이미지</th>
            <th>품목명</th>
            <th>렌탈일시</th>
            <th>반납상태</th>
            <th>반납일시</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($my_ed as $k=>$row) : ?>
          <?php $status_badge = $row['rental_status'] == 0 ? '<span class="badge badge-danger">대여중</span>' : '<span class="badge badge-success">반납완료</span>'; ?>
          <tr>
            <td><span class="mobile-shown"><i class="fa fa-list-ol" aria-hidden="true"></i> 번호 :&nbsp;</span><?=$k+1?></td>
            <td><span class="mobile-shown"><i class="fa fa-picture-o" aria-hidden="true"></i> 이미지&nbsp;</span><img class="img-thumbnail" src="<?=base_url('assets/img/product/'.$row['product_img'])?>" alt="" /></td>
            <td class="no-center"><span class="mobile-shown"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 품목명 :&nbsp;</span><?=$row['product_name']?></td>
            <td><span class="mobile-shown"><i class="fa fa-clock-o" aria-hidden="true"></i> 렌탈일시 :&nbsp;</span><?=$row['rental_dttm']?></td>
            <td><span class="mobile-shown"><i class="fa fa-repeat" aria-hidden="true"></i> 반납상태 :&nbsp;</span><?=$status_badge?></td>
            <td><span class="mobile-shown"><i class="fa fa-calendar-o" aria-hidden="true"></i> 반납일시 :&nbsp;</span><?=$row['rental_return_dttm']?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<script type="text/javascript">
  var hash = location.hash;
  $('#myTab').find('a:first').tab('show');
  $(function () {
    $('#myTab a').click(function(){
      $(this).find(hash).tab('show');
    });
  });
  $('table').addClass('mobileTables');
</script>
