<style media="screen">
img {
  width: 700px;
}

.item-box {
  width: 100%;
  height: 50vh;
  background-color: #888;
}
</style>

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
      </div>
      <div class="carousel-item" align="center">
        <div class="item-box" style="">
        </div>
      </div>
      <div class="carousel-item" align="center">
        <div class="item-box" style="">
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
<script type="text/javascript">
  $('.carousel').carousel({
    interval: 2000
  });
</script>
