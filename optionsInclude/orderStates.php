<script>
	$(document).ready(function(){
		$("#doChangeOS").on('change',function(){$('#IPOLMLSP_mappOrs').toggle(500);});//mapping
	});
</script>
<?
	ShowParamsHTMLByArray($arAllOptions["mappingCh"]);
?>
<tr>
	<td colspan='2' valign="top" align="center">
		<table id='IPOLMLSP_mappOrs' <?if(COption::getOptionString($module_id,'doChangeOS','N')!='Y'){?>style="display:none;height:0px;"<?}?>>
			<?ShowParamsHTMLByArray($arAllOptions["mappingSt"]);?>
		</table>
	</td>
</tr>