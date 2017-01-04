<div class="row">
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" align="center">
        <img src="<?=base_url('assets/img/test_carousel.jpg')?>" alt="First slide" width="900">
      </div>
      <div class="carousel-item" align="center">
        <img src="<?=base_url('assets/img/test_carousel.jpg')?>" alt="Second slide" width="900">
      </div>
      <div class="carousel-item" align="center">
        <img src="<?=base_url('assets/img/test_carousel.jpg')?>" alt="Third slide" width="900">
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
<script type="text/javascript">
  $('.carousel').carousel({
    interval: 2000
  });
</script>
