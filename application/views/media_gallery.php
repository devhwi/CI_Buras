<style media="screen">
  img {
    max-width:100%;
    margin-top: 1em;
    padding: 0em 1em;
  }

  .card-block {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
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
  <?php foreach ($media as $k => $row): ?>
    <div class="col-md-3">
      <div class="card" >
        <a href="#" data-toggle="modal" data-target="#imgModal"> <!-- detail link -->
          <img class="card-img-top" src="<?=base_url('assets/img/gallery/'.$row['media_content'])?>" alt="">
        </a>
        <div class="card-block">
          <button class="btn btn-link btn-text"> <!-- detail link -->
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
