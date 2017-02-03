<style media="screen">

</style>
<div class="container">
  <h3>게시물 수정</h3>
  <form class="" action="<?=base_url('Board/edit_check')?>" method="post">
    <input type="hidden" name="board_id" value="<?=$detail->board_id?>">
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="board_title">제 목</label>
      <div class="col-md-10">
        <input class="form-control" type="text" name="board_title" value="<?=$detail->board_title?>" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="board_title">카테고리</label>
      <div class="col-md-10">
        <input class="form-control" type="text" name="board_title" value="<?=$detail->category_desc?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="board_content">내 용</label>
      <div class="col-md-10">
        <textarea class="form-control" name="board_content" rows="8" cols="80" required><?=str_replace("<br />", "", $detail->board_content)?></textarea>
      </div>
    </div>
    <div class="form-group row" align="right">
      <div class="col-md-12">
        <button class="btn btn-danger" type="button" onclick="window.history.back();">취소</button>
        <button class="btn btn-primary" type="submit">게시물 수정</button>
      </div>
    </div>
  </form>
</div>
