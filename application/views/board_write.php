<style media="screen">

</style>
<div class="container">
  <h3>게시물 작성</h3>
  <form class="" action="<?=base_url('Board/write_check')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="board_category" value="<?=$board_category?>">
    <input type="hidden" name="board_notice" value="<?=$board_notice?>">
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="board_title">제 목</label>
      <div class="col-md-10">
        <input class="form-control" type="text" name="board_title" value="" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="board_title">카테고리</label>
      <div class="col-md-10">
        <input class="form-control" type="text" name="board_title" value="<?=$board_category_name?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="board_content">내 용</label>
      <div class="col-md-10">
        <textarea class="form-control" name="board_content" rows="8" cols="80" required></textarea>
      </div>
    </div>
    <?php if ($board_category == 2 || $board_category == 3 || $board_category == 4) : ?>
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="board_content">첨부파일</label>
      <div class="col-md-10">
        <input class="form-control" type="file" name="board_file" required>
      </div>
    </div>
    <?php endif; ?>
    <div class="form-group row" align="right">
      <div class="col-md-12">
        <button class="btn btn-danger" type="button" onclick="window.history.back();">취소</button>
        <button class="btn btn-primary" type="submit">게시물 등록</button>
      </div>
    </div>
  </form>
</div>
