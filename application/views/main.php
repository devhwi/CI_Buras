<style media="screen">
.item-box {
  width: 100%;
  height: 30em;
  background-color: #888;
}

.col-md-6 {
  margin-bottom: 1.5em;
}
</style>

<!-- CAROUSEL -->
<div class="row">
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" align="center">
        <div class="item-box" style="">
        </div>
        <div class="carousel-caption">
          <h3>Slide 1</h3>
          <p>some description..</p>
        </div>
      </div>
      <div class="carousel-item" align="center">
        <div class="item-box" style="">
        </div>
        <div class="carousel-caption">
          <h3>Slide 2</h3>
          <p>some description..</p>
        </div>
      </div>
      <div class="carousel-item" align="center">
        <div class="item-box" style="">
        </div>
        <div class="carousel-caption">
          <h3>Slide 3</h3>
          <p>some description..</p>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
      <span class="icon-prev" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
      <span class="icon-next" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="" style="margin-top:1em;">

</div>
<div class="container">
  <div class="col-md-6">
    <div class="card">
      <h3 class="card-header">NOTICE</h3>
      <ul class="list-group list-group-flush">
        <?php if (count($notice) == 0): ?>
          <li class="list-group-item" style="height:230px">게시글이 없습니다.</li>
        <?php else: ?>
          <?php foreach ($notice as $k => $row): ?>
            <a href="<?=base_url('Board/detail/'.$row['board_id'])?>"><li class="list-group-item"><?=$row['board_title']?></li></a>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <h3 class="card-header">FINANCE</h3>
      <ul class="list-group list-group-flush">
        <?php if (count($finance) == 0): ?>
          <li class="list-group-item" style="height:230px">게시글이 없습니다.</li>
        <?php else: ?>
          <?php foreach ($finance as $k => $row): ?>
            <a href="<?=base_url('Board/detail/'.$row['board_id'])?>"><li class="list-group-item"><?=$row['board_title']?></li></a>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <h3 class="card-header">DOCUMENTS</h3>
      <ul class="list-group list-group-flush">
        <?php if (count($documents) == 0): ?>
          <li class="list-group-item" style="height:230px">게시글이 없습니다.</li>
        <?php else: ?>
          <?php foreach ($documents as $k => $row): ?>
            <a href="<?=base_url('Board/detail/'.$row['board_id'])?>"><li class="list-group-item"><?=$row['board_title']?></li></a>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <h3 class="card-header">DATA</h3>
      <ul class="list-group list-group-flush">
        <?php if (count($data) == 0): ?>
          <li class="list-group-item" style="height:230px">게시글이 없습니다.</li>
        <?php else: ?>
          <?php foreach ($data as $k => $row): ?>
            <a href="<?=base_url('Board/detail/'.$row['board_id'])?>"><li class="list-group-item"><?=$row['board_title']?></li></a>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
<!-- CAROUSEL END -->
<script type="text/javascript">
  $('.carousel').carousel({
    interval: 2000
  });
</script>
