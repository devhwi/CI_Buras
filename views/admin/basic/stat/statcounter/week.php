<div class="box">
    <div class="box-table">
        <div class="box-table-header">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="<?php echo admin_url($this->pagedir); ?>">방문자로그 </a></li>
                <li role="presentation" class="active"><a href="<?php echo admin_url($this->pagedir . '/visit'); ?>">기간별 그래프</a></li>
                <li role="presentation"><a href="<?php echo admin_url($this->pagedir . '/cleanlog'); ?>">오래된 로그삭제</a></li>
            </ul>
            <form class="form-inline" name="flist" method="get" >
                <div class="box-table-button">
                    <span class="mr10">
                        기간 : <input type="text" class="form-control input-small datepicker " name="start_date" value="<?php echo element('start_date', $view); ?>" readonly="readonly" /> - <input type="text" class="form-control input-small datepicker" name="end_date" value="<?php echo element('end_date', $view); ?>" readonly="readonly" />
                    </span>
                    <div class="btn-group" role="group" aria-label="...">
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/visit'); ?>" class="btn btn-default btn-sm statsubmit">방문자</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/domain'); ?>" class="btn btn-default btn-sm statsubmit">도메인</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/browser'); ?>" class="btn btn-default btn-sm statsubmit">브라우저</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/os'); ?>" class="btn btn-default btn-sm statsubmit">운영체제</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/hour'); ?>" class="btn btn-default btn-sm statsubmit">시간</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/week'); ?>" class="btn btn-warning btn-sm statsubmit">요일</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/day'); ?>" class="btn btn-default btn-sm statsubmit">일</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/month'); ?>" class="btn btn-default btn-sm statsubmit">월</button>
                        <button data-page-url="<?php echo admin_url($this->pagedir . '/year'); ?>" class="btn btn-default btn-sm statsubmit">년</button>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
            //<![CDATA[
            $(document).on('click', '.statsubmit', function() {
                var f = document.flist;
                f.action= $(this).attr('data-page-url');
                f.submit();
            });
            //]]>
            </script>
        </div>
        <div class="table-responsive">
            <div class="pull-right form-group">
                <label for="withoutzero" class="checkbox-inline">
                    <input type="checkbox" name="withoutzero" id="withoutzero" value="1" /> 방문자가 0 인 데이터 제외
                </label>
                <label for="orderdesc" class="checkbox-inline">
                    <input type="checkbox" name="orderdesc" id="orderdesc" value="1"/> 역순으로보기
                </label>
            </div>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>요일</th>
                        <th>방문자수</th>
                        <th>비율</th>
                        <th>그래프</th>
                    </tr>
                </thead>
                <tbody class="graphlist">
                <?php
                if (element('list', $view)) {
                    foreach (element('list', $view) as $key => $result) {
                ?>
                    <tr class="<?php echo ( ! element('scd_count', $result)) ? 'zerodata' : ''; ?>">
                        <td><?php echo element($key, element('week_korean', $view)); ?></td>
                        <td><?php echo number_format(element('scd_count', $result, 0)); ?></td>
                        <td><?php echo element('s_rate', $result, 0); ?>%</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php echo element('s_rate', $result, 0); ?>" aria-valuemin="0" aria-valuemax="<?php echo element('max_value', $view, 0); ?>" style="width: <?php echo element('bar', $result, 0); ?>%">
                                    <span class="sr-only"><?php echo element('s_rate', $result, 0); ?>%</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>
                </tbody>
                <?php
                if (element('list', $view)) {
                ?>
                    <tfoot>
                        <tr class="warning">
                            <td>전체</td>
                            <td><?php echo number_format(element('sum_count', $view, 0)); ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).on('change', '#withoutzero', function(){
    if (this.checked) {
        $('.zerodata').hide();
    } else {
        $('.zerodata').show();
    }
})
$(document).on('change', '#orderdesc', function(){
    var $body = $('tbody.graphlist');
    var list = $body.children('tr');
    $body.html(list.get().reverse());
})
</script>
