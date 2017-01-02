<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="access col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">로그인</div>
        <div class="panel-body">
            <?php
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            $attributes = array('class' => 'form-horizontal', 'name' => 'flogin', 'id' => 'flogin');
            echo form_open(current_full_url(), $attributes);
            ?>
                <input type="hidden" name="url" value="<?php echo html_escape($this->input->get_post('url')); ?>" />
                <div class="form-group">
                    <label class="col-lg-4 control-label"><?php echo element('userid_label_text', $view);?></label>
                    <div class="col-lg-7">
                        <input type="text" name="mem_userid" class="form-control" value="<?php echo set_value('mem_userid'); ?>" accesskey="L" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">비밀번호</label>
                    <div class="col-lg-7">
                        <input type="password" class="form-control" name="mem_password" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-sm">로그인</button>
                    </div>
                    <div class="col-sm-6 col-sm-offset-1">
                        <label for="autologin">
                            <input type="checkbox" name="autologin" id="autologin" value="1" /> 자동로그인
                        </label>
                    </div>
                </div>
                <div class="alert alert-dismissible alert-info autologinalert" style="display:none;">
                    자동로그인 기능을 사용하시면, 브라우저를 닫더라도 로그인이 계속 유지될 수 있습니다. 자동로그이 기능을 사용할 경우 다음 접속부터는 로그인할 필요가 없습니다. 단, 공공장소에서 이용 시 개인정보가 유출될 수 있으니 꼭 로그아웃을 해주세요.
                </div>
            <?php echo form_close(); ?>
        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <a href="<?php echo site_url('register'); ?>" class="btn btn-success btn-sm" title="회원가입">회원가입</a>
                <a href="<?php echo site_url('findaccount'); ?>" class="btn btn-default btn-sm" title="아이디 패스워드 찾기">아이디 패스워드 찾기</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#flogin').validate({
        rules: {
            mem_userid : { required:true, minlength:3 },
            mem_password : { required:true, minlength:4 }
        }
    });
});
$(document).on('change', "input:checkbox[name='autologin']", function() {
    if (this.checked) {
        $('.autologinalert').show(300);
    } else {
        $('.autologinalert').hide(300);
    }
});
//]]>
</script>
