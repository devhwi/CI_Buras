<div class="box">
    <div class="box-table">
        <div class="box-table-header">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="<?php echo admin_url($this->pagedir); ?>">인기검색어</a></li>
                <li role="presentation" class="active"><a href="<?php echo admin_url($this->pagedir . '/rank'); ?>">순위</a></li>
                <li role="presentation"><a href="<?php echo admin_url($this->pagedir . '/cleanlog'); ?>">오래된 로그삭제</a></li>
            </ul>
            <form class="form-inline" name="flist" action="<?php echo current_url(); ?>" method="get" >
                <div class="box-table-button">
                    <span class="mr10">
                        기간 : <input type="text" class="form-control input-small datepicker " name="start_date" value="<?php echo element('start_date', $view); ?>" readonly="readonly" /> - <input type="text" class="form-control input-small datepicker" name="end_date" value="<?php echo element('end_date', $view); ?>" readonly="readonly" />
                    </span>
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="submit" class="btn btn-default btn-sm">검색</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <colgroup>
                    <col class="col-md-1">
                    <col class="col-md-2">
                    <col class="col-md-1">
                    <col class="col-md-2">
                    <col class="col-md-6">
                </colgroup>
                <thead>
                    <tr>
                        <th>순위</th>
                        <th>검색어</th>
                        <th>검색회수</th>
                        <th>비율</th>
                        <th>그래프</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (element('list', $view)) {
                    foreach (element('list', $view) as $result) {
                ?>
                    <tr>
                        <td><?php echo element('no', $result); ?></td>
                        <td><?php echo html_escape(element('key', $result)); ?></td>
                        <td><?php echo number_format(element('count', $result, 0)); ?></td>
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
                if ( ! element('list', $view)) {
                ?>
                    <tr>
                        <td colspan="5" class="nopost">자료가 없습니다</td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
                <?php
                if (element('list', $view)) {
                ?>
                    <tfoot>
                        <tr class="warning">
                            <td>전체</td>
                            <td></td>
                            <td><?php echo element('sum_count', $view, 0); ?></td>
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
