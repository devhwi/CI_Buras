<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">회원 관리</h1>
    </div>
</div>
<table id="memberTable" class="table" width="100%">
  <thead>
    <tr>
      <th>아이디</th>
      <th>이름</th>
      <th>기수</th>
      <th>생일</th>
      <th>입학년도</th>
      <th>전공</th>
      <th>연락처</th>
      <th>이메일</th>
      <th>권한레벨</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($member as $k => $row) : ?>
    <tr>
      <td><?=$row['user_id']?></td>
      <td><?=$row['user_name']?></td>
      <td><?=$row['user_season']?></td>
      <td><?=$row['user_birth']?></td>
      <td><?=$row['user_enter']?></td>
      <td><?=$row['user_major']?></td>
      <td><?=$row['user_phone']?></td>
      <td><?=$row['user_email']?></td>
      <td>
        <form class="" action="<?=base_url('admin/Member/change_level')?>" method="post">
          <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
          <select class="form-control" name="user_level" style="width:100%" onchange="this.form.submit();">
            <?php foreach($auth_list as $i => $auth) : ?>
            <option value="<?=$auth['level_id']?>" <?=$row['user_level'] == $auth['level_id'] ? 'selected' : ''?>><?=$auth['level_desc']?></option>
            <?php endforeach; ?>
          </select>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/admin/vendor/datatables/js/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#memberTable').DataTable({
        responsive: true
    });

});
</script>
