<style media="screen">
  img {
    max-width:100%;
    margin-top: 1em;
  }
</style>
<div class="container">
  <?php foreach ($media as $k => $row): ?>
    <?php
    $urlArr = explode("/",$row['media_content']);
    $urlArrNum = count($urlArr);

    $youtubeVideoId = $urlArr[$urlArrNum - 1];

    $thumbURL = /*'http://img.youtube.com/vi/'.*/$youtubeVideoId.'/0.jpg';
    ?>
    <div class="card col-md-3" style="">
      <a href="#"> <!-- detail link -->
        <img class="card-img-top" src="<?=$thumbURL?>" alt="">
      </a>
      <div class="card-block">
        <a href="#"> <!-- detail link -->
          <h4 class="card-title"><?=$row['media_title']?></h4>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="col-md-12 col-xs-12" align="center">
    <?=$this->pagination->create_links();?><br>
  </div>
</div>
