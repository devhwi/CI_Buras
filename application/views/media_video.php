<style media="screen">
  img {
    max-width:100%;
    margin-top: 1em;
  }

  #video-list-header {
    margin-bottom: 1em;
  }

  #select_category {
    width: 25%;
  }

  @media (max-width: 576px) {
    #select_category {
      width: 100%;
    }
  }
</style>
<div class="container" id="video-list-header">
  <form class="" action="<?=base_url('Media/1')?>" method="post">
    <select class="form-control" name="media_category" onchange="this.form.submit()" id="select_category">
      <?php foreach ($video_categories as $k => $row): ?>
        <option value="<?=$row['media_category']?>" <?=$media_category == $row['media_category'] ? 'selected' : ''?>><?=$row['media_category']?></option>
      <?php endforeach; ?>
    </select>
  </form>
</div>
<div class="container">
  <?php foreach ($media as $k => $row): ?>
    <?php
    $youtubeVideoId = $row['media_content'];

    $thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
    $videoURL = 'https://www.youtube.com/embed/'.$youtubeVideoId;
    ?>
    <div class="card col-md-3" style="">
      <a href="#" data-toggle="modal" data-target="#vdoModal"
        data-vdo="<?=$videoURL?>"
        data-title="<?=$row['media_title']?>"> <!-- detail link -->
        <img class="card-img-top" src="<?=$thumbURL?>" alt="">
      </a>
      <div class="card-block">
        <a href="#" data-toggle="modal" data-target="#vdoModal"
          data-vdo="<?=$videoURL?>"
          data-title="<?=$row['media_title']?>"> <!-- detail link -->
          <h4 class="card-title"><?=$row['media_title']?></h5>
        </a>
        <p class="card-text"><small class="text-muted"><?=$row['media_category']?></small></p>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="col-md-12 col-xs-12" align="center">
    <?=$this->pagination->create_links();?><br>
  </div>
</div>

<!-- VIDEO MODAL -->
<div class="modal fade" id="vdoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div id="modal-vdo" class="modal-body">

      </div>
      <div class="modal-footer" align="center" style="text-align: center">
        <h5 id="modal-title"><!-- Title by JQuery --></h5>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#vdoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var video = button.data('vdo');
    var title = button.data('title');
    var videoURL = '<iframe id="youtube" width="100%" height="500px" src="'+video+'" frameborder="0" allowfullscreen></iframe>';

    var modal = $(this);
    modal.find('#modal-vdo').html(videoURL);
    modal.find('#modal-title').text(title);
  });

  $('#vdoModal').on('hidden.bs.modal', function (event) {
    $("#vdoModal iframe").attr("src", $("#vdoModal iframe").attr("src"));
  });
</script>
