<style media="screen">

</style>
<!-- Title Area -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$total_board?></div>
                        <div>전체 게시물</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Board/post')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$total_reply?></div>
                        <div>전체 댓글</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Board/reply')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-refresh fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$ing_rental?></div>
                        <div>렌탈 중 품목</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Rental')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-krw fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$ing_finance?></div>
                        <div>미납 건수</div>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('admin/Finance')?>">
                <div class="panel-footer">
                    <span class="pull-left">자세히 보기</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
