<?
/*
	Авторизация пользователя, то бишь первоначальная настройка модуля
*/
?>
<script>
	function MLSP_authorize(){
		var dataObj={
			login:$('#MSLP_login').val(),
			password:$('#MSLP_password').val(),
			action: 'autorize'
		};
		
		if(!dataObj.login){
			alert('<?=GetMessage('MLSP_AUTH_NOLOGIN')?>');
			return;
		}
		if(!dataObj.password){
			alert('<?=GetMessage('MLSP_AUTH_PASSWORD')?>');
			return;
		}
		$('[onclick="MLSP_authorize()"]').css('display','none');
		$('#ms_ajax_pre').show();
		$.ajax({
			url: '<?=$ajaxUrl?>',
			data: dataObj,
			type: 'POST',
			success: function(data){
				if(data.trim()=='good'){
					alert('<?=GetMessage('MLSP_AUTH_AUTHORIZED')?>');
					window.location.reload();
				}
				else{
					alert(data);
					$('[onclick="MLSP_authorize()"]').css('display','inline');
					$('#ms_ajax_pre').hide();
				}
			},
		});
	}
	function MLSP_onAuthPress(ev){
		if(ev.keyCode==13){
			MLSP_authorize();
			ev.preventDefault();
		}
	}
	$(document).ready(function(){
		$('#MSLP_password').on('keydown',MLSP_onAuthPress);
		$('#MSLP_login').on('keydown',MLSP_onAuthPress);
	});
</script>

<?echo GetMessage("MLSP_AUTH_TEXT");?><br><br>
<?=GetMessage("MLSP_AUTH_LOGIN")?>&nbsp;&nbsp;<input type='text' id='MSLP_login'><br>
<?=GetMessage("MLSP_AUTH_PASSWORD")?>&nbsp;&nbsp;<input type='password' id='MSLP_password'><br><br>
<input type='button' value='<?=GetMessage("MLSP_AUTH_AUTHORIZE")?>' onclick='MLSP_authorize()'><img style="display:none" id="ms_ajax_pre" src="/bitrix/images/<?=$module_id?>/ajax.gif" style="width:20px" /><br>
<p style='padding-right: 30px;'><a href='http://multiship.ru' target='_blank'><?=GetMessage("MLSP_AUTH_REGISTER")?></a></p>