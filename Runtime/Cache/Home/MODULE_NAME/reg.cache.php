<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('reg.html', 'eeccc985ca2e5f4601198b5f082633a6', 1359942020);?>

<? include($template->getfile('../Public/header')); ?>
<script src="__PUBLIC__/Js/jquery.validate.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/Js/jQuery.validate.message_cn.js" type="text/javascript"></script>
<link rel="Stylesheet" type="text/css" href="__PUBLIC__/Js/jmodal/jquery.jmodal.css" />
<script src="__PUBLIC__/Js/jmodal/jquery.jmodal.js" type="text/javascript"></script>
<? include($template->getfile('../Public/nav')); ?>
<div class="w990 clear">
        <div id="main">
            <div class="main_l">
                <div id="main_l_l" class="clear">
                    <h2 class="login_t">会员注册</h2>
                    <ul class="clear">
                    <form action="<? echo reUrl('User/reg'); ?>" method="post" id="reg_form" name="reg_form">
                    <table width="100%" border="0" class="login_form">
  <tr>
    <td width="100" align="right">帐号：</td>
    <td><input name="nick" id="nick" type="text" style="width:200px;" onblur="check_nick_valid();" /><label class="error2" id="tip_nick"></label></td>
  </tr>
  <tr>
    <td width="100" align="right">E-mail：</td>
    <td><input name="email" id="email" type="text" style="width:200px;" /></td>
  </tr>
  <tr>
    <td align="right">密码：</td>
    <td><input name="pw" id="pw" type="password" style="width:200px;" onblur="check_nick_valid();" /></td>
  </tr>
  <tr>
    <td align="right">确认密码：</td>
    <td><input name="confirm_pw" id="confirm_pw" type="password" style="width:200px;" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input name="agree" id="agree" type="checkbox" value="1" />&nbsp;<a href="__ROOT__/Html/policy.html" target="_blank" id="label_agree">同意注册协议</a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" value="注册" name="commit" id="signup-submit" class="formbutton"></td>
  </tr>
</table>
<input name="hash" type="hidden" value="<?=$hash?>" />
</form>
				</ul>
                </div>
            </div>
            <div class="main_r" style="width: 320px;">
    <ul class="sidebar">
            

        <li class="yellow">
            <h3>已有<?=$_CFG['site_name']?>帐号？</h3>
            <div class="sidebar_s clear">
                <ul class="twocol user_link">
                    <li><a class="login_btn" href="<? echo reUrl('User/login'); ?>"></a></li>
                </ul>
            </div>
        </li>
   
             </ul>
</div>
        </div>
    </div>
<script type="text/javascript">
var g = '<?=GROUP_NAME?>';
var m = '<?=MODULE_NAME?>';
var a = '<?=ACTION_NAME?>';
var reg_url = "<? echo reUrl('User/reg'); ?>";
var u_index_url = "<? echo reUrl('User/index'); ?>";
var dosubmit = false;
function check_nick_valid()
{
	var nick = $('#nick').val();
	if(nick == ''){
		$('#tip_nick').text('');
		return false;
	}
	var url = "index.php?g="+g+"&m="+m+"&ajax=1&a=check_nick_valid&nick="+encodeURIComponent(nick);
		$.getJSON(url, function(data){
									if(data.status == 0){
										$('#tip_nick').html('该帐号已存在');
										dosubmit = false;
									}else{
										$('#tip_nick').html('<font color="green">该帐号可以使用</font>');
										dosubmit = true;
									}
									});
}
function reg()
{
	if(! dosubmit) return false;
	$.ajax({
		url: reg_url,
		type:"POST",
		cache: false,
		data:$("#reg_form").serialize(),
		dataType:"json",
		error: function(){
			
		},
		success: function(result){
			if(result.status==1){
				$.fn.jmodal({
                    data: {},
                    title: '温馨提示',
                    content: '注册成功<br>现在您可以会员身份登陆',
                    buttonText: { ok: '确定', cancel: '' },
                    fixed: false,
					marginTop: 200,
					okEvent: function(data, args) {
                        window.location.href = u_index_url;
                    }
                });
			}else{
				$.fn.jmodal({
                    data: {},
                    title: '温馨提示',
                    content: result.info,
                    buttonText: { ok: '确定', cancel: '' },
                    fixed: false,
					marginTop: 200,
					okEvent: function(data, args) {
                        args.hide();
                    }
                });
			}
		}
	});
}
$(document).ready(function() {
			$("#reg_form").validate({
						 errorPlacement:function(error,element) {
     												if (element.attr("name") == "agree"){
       													error.insertAfter("#label_agree");
													}else{
														error.insertAfter(element);
													}},
						 submitHandler:function(form){
							 						reg();
													return false;
						 						}
						 });
			$('#nick').rules('add', {
						 		required: true,
								rangelength: [2,20]
						});
			$('#email').rules('add', {
						 		required: true,
								email: true
						});
			$('#pw').rules('add', {
						 		required: true,
								rangelength: [6,15]
						});
			$('#confirm_pw').rules('add', {
						 		required: true,
								equalTo: '#pw',
								rangelength: [6,15]
						});
			$('#agree').rules('add', {
						 		required: true
						});
});
</script>
<? include($template->getfile("../Public/footer")); ?>
