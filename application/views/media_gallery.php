<style media="screen">
  .card-img-top {
    max-width:100%;
    margin-top: 1em;
    padding: 0em 1em;
  }

  .card-block {
    padding: 0.5rem 0.75rem;
  }

  .btn-link {
    padding: 0;
    display: block;
  }

  .btn-text {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    display: block;
    text-overflow: ellipsis;
  }
</style>
<div class="container">
  <!-- image list -->
  <?php foreach ($media as $k => $row): ?>
    <div class="col-md-3">
      <div class="card" >
        <a href="#" data-toggle="modal" data-target="#imgModal"
          data-img="<?=base_url('assets/img/gallery/'.$row['media_content'])?>"
          data-title="<?=$row['media_title']?>"> <!-- detail link -->
          <img class="card-img-top" src="<?=base_url('assets/img/gallery/'.$row['media_content'])?>" alt="">
        </a>
        <div class="card-block">
          <button class="btn btn-link btn-text" data-toggle="modal" data-target="#imgModal"
            data-img="<?=base_url('assets/img/gallery/'.$row['media_content'])?>"
            data-title="<?=$row['media_title']?>"> <!-- detail link -->
            <span class="card-title">
              <?=$row['media_title']?>
            </span>
          </button>
        </div>
        <div class="card-footer">
          <small class="text-muted">
            <?=$row['media_dttm']?>
          </small>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="col-md-12 col-xs-12" align="center">
    <?=$this->pagination->create_links();?><br>
  </div>
</div>

<!-- IMAGE MODAL -->
<div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img id="modal-img" src="" alt="">
      </div>
      <div class="modal-footer" align="center" style="text-align: center">
        <h5 id="modal-title"><!-- Title by JQuery --></h5>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#imgModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var image = button.data('img');
    var title = button.data('title');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('#modal-img').attr('src', image);
    modal.find('#modal-title').text(title);
  });
</script>
