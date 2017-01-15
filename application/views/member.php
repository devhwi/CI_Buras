<style media="screen">
  .card-margin {
    margin-bottom: 1em;
  }
  .card {
    height: 250px; /* 임시 높이 사이즈 */
  }

  .name {
    float: right;
    margin-right: 0.5em;
  }

  .season {
    float: right;
    margin-right: 0.5em;
  }

  .button_area {
    float: right;
  }
</style>
<div class="col-md-12">
  <div class="button_area form-group">
    <button class="btn btn-primary" type="submit">검색</button>
  </div>
  <div class="season form-group">
    <select class="" name="user_season">
      <option value="all">모두</option>
      <?php foreach($season_list as $k => $row) : ?>
      <option value="<?=$user_season?>"><?=$user_season?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="name form-group">
    <input class="form-control" type="text" name="user_name" placeholder="이름">
  </div>
</div>
<div class="card-deck" style="clear:both">
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
