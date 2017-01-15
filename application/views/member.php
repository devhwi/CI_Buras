<style media="screen">
  .card-margin {
    margin-bottom: 1em;
  }
  .card {
    height: 250px; /* 임시 높이 사이즈 */
  }
</style>

<div class="form-group" style="margin-bottom: 1em;">
  <form class="" action="<?=base_url('Member')?>" method="post">
    <div class="col-md-7">&nbsp;</div>
    <div class="col-md-3" align="right">
      <input class="form-control" type="text" name="user_name" placeholder="이름" value="<?=$search_member?>">
    </div>
    <div class="col-md-1" align="right">
      <select class="form-control" name="user_season">
        <option value="" <?=$search_season == "" ? 'selected' : ''?>>모두</option>
        <?php foreach($season_list as $k => $row) : ?>
        <option value="<?=$row['user_season']?>" <?=$search_season == $row['user_season'] ? 'selected' : ''?>><?=$row['user_season']?> 기</option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-1" align="right">
      <button class="btn btn-primary" type="submit" style="width:100%">검색</button>
    </div>
  </form>
</div>
<div class="card-deck" style="clear:both; padding-top:1em;">
  <?php foreach ($member as $k => $row) :?>
  <div class="card-margin col-md-3">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">[<?=$row['user_season']?>기]&nbsp;<?=$row['user_name']?></h4>
        <p class="card-text"><?=$row['user_birth']?></p>
      </div>
      <div class="card-footer">
        <small class="text-muted">푸터</small>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
