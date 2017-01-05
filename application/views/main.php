<style media="screen">
.item-box {
  width: 100%;
  height: 30em;
  background-color: #888;
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
      <h3 class="card-header">게시판1</h3>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">게시물 예시</li>
        <li class="list-group-item">게시물 예시</li>
        <li class="list-group-item">게시물 예시</li>
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <h3 class="card-header">게시판2</h3>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">게시물 예시</li>
        <li class="list-group-item">게시물 예시</li>
        <li class="list-group-item">게시물 예시</li>
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
