<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('login.html', '2fc091cda89516dc1c6db7af895f6100', 1359942018);?>

<? include($template->getfile('../Public/header')); ?>
<script src="__PUBLIC__/Js/jquery.validate.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/Js/jQuery.validate.message_cn.js" type="text/javascript"></script>
<? include($template->getfile('../Public/nav')); ?>
<div class="w990 clear">
        <div id="main">
            <div class="main_l">
                <div id="main_l_l" class="clear">
                    <h2 class="login_t">会员登陆</h2>
                    <ul class="clear">
                    <form action="<? echo reUrl('User/login');; ?>" method="post" name="login_form" id="login_form">
                    <table width="100%" border="0" class="login_form">
  <tr>
    <td width="100" align="right">帐号：</td>
    <td colspan="2"><input name="nick" id="nick" type="text" style="width:200px;" /></td>
  </tr>
  <tr>
    <td align="right">密码：</td>
    <td colspan="2"><input name="pw" id="pw" type="password" style="width:200px;" />&nbsp;<a href="<? echo reUrl('User/getpwd');; ?>">忘记密码？</a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td colspan="2"><input name="save" id="save" type="checkbox" value="1" /><span id="label_save">下次自动登陆？</span></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td width="150"><input type="submit" value="登陆" name="commit" id="signup-submit" class="formbutton"></td>
    <td><? if($_CFG['sina_wb_open']) { ?><a href="<? echo reUrl('User/login_sina');; ?>"><img src="__PUBLIC__/Images/Home/sina_logo_big.gif" align="absbottom" /></a><? } ?>&nbsp;&nbsp;<? if($_CFG['qq_open']) { ?><a href="<? echo reUrl('User/login_qq');; ?>"><img src="__PUBLIC__/Images/Home/qqlogin.png" align="absbottom" /></a><? } ?></td>
  </tr>
</table>
<input name="_hash_" type="hidden" value="<?=$_hash_?>" />
</form>
				</ul>
                </div>
            </div>
            <div class="main_r" style="width: 320px;">
    <ul class="sidebar">
            

        <li class="yellow">
            <h3>还没有<?=$_CFG['site_name']?>帐号？</h3>
            <div class="sidebar_s clear">
            	<div class="sidebar_s_l">
                    <a class="signUp" href="<? echo reUrl('User/reg');; ?>"></a>
                </div>
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
var u_index_url = "<? echo reUrl('User/index');; ?>";
$(document).ready(function() {
			$("#login_form").validate({
						 submitHandler:function(form){
							 						form.submit();
						 						}
						 });
			$('#nick').rules('add', {
						 		required: true,
								rangelength: [2,20]
						});
			$('#pw').rules('add', {
						 		required: true,
								rangelength: [6,15]
						});
});
</script>
<? include($template->getfile("../Public/footer")); ?>
