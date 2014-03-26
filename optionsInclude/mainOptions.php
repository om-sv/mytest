<?//iframe да будет он проклят?>
<tr class="heading">
	<td colspan="2" valign="top" align="center" onclick="$('#to_ms_warehouse').closest('tr').show();"><?=GetMessage('MLSP_OPTTAB_MSOPTIONS')?></td>
</tr>
<?
	$contetns=json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/".$module_id."/classes/multiship/config/config.json"));
	$string=md5(mktime());
?>
<tr>
	<td valign="top" align="center" colspan='2'>
		<iframe style="width:100%;border: 2px dotted #E0E8EA;height: 1412px;" id="ms_settings" src="http://multiship.ru/modules/iframe?id=<?=$contetns->moduleInstallId?>&string=<?=$string?>&hash=<?=md5($string.$contetns->iframeKey)?>"></iframe>
	</td>
</tr>

<?//Настройки обмена Multiship?>
<tr class="heading">
	<td colspan="2" valign="top" align="center" onclick="$('#to_ms_warehouse').closest('tr').show();"><?=GetMessage('MLSP_OPTTAB_MSOPTIONS')?></td>
</tr>
<?ShowParamsHTMLByArray($arAllOptions["msOptions"]);?>

<?// == Габариты товаров == ?>
<tr class="heading">
	<td colspan="2" valign="top" align="center" onclick="$('.measHide').show();"><?=GetMessage('MLSP_OPTTAB_DIMENSIONS')?></td>
</tr>

<?// == Единицы измерения ?>
<tr><td colspan="2" valign="top" align="center"><strong><?=GetMessage('MLSP_HEADER_MEASUREMENT')?></strong></td></tr>
<tr class="measHide">
	<td><?=GetMessage('MLSP_LABEL_sidesMeas')?></td>
	<td>
		<?$MLSP_wD=COption::GetOptionString($module_id,'sidesMeas','mm');?>
		<select name='sidesMeas' id='sidesMeas' onchange="$('.MeasLbl').html( $(this).val() );">
			<option value='mm' id="sidesMeas_mm" <?if($MLSP_wD=='mm') echo 'selected';?>><?=GetMessage('MLSP_LABEL_mm')?></option>
			<option value='cm' <?if($MLSP_wD=='cm') echo 'selected';?>><?=GetMessage('MLSP_LABEL_cm')?></option>
			<option value='m' <?if($MLSP_wD=='m') echo 'selected';?>><?=GetMessage('MLSP_LABEL_m')?></option>
		</select>
		<span id="sidesMeas_fix" style="display:none"><?=GetMessage('MLSP_LABEL_mm')?></span>
	</td>
</tr>

<?// == Тип указания свойств ?>
<tr><td colspan="2" valign="top" align="center">
	<input type='radio' name='sideMode' id='MLSP_meaMode_unit' value='unit' onclick='MLSP_measRadio("unit")'><label for='MLSP_meaMode_unit'><?=GetMessage('MLSP_LABEL_dimMode_unit')?></label>&nbsp;
	<input type='radio' name='sideMode' id='MLSP_meaMode_sep' value='sep' onclick='MLSP_measRadio("sep")'><label for='MLSP_meaMode_sep'><?=GetMessage('MLSP_LABEL_dimMode_sep')?></label>
	<input type='radio' name='sideMode' id='MLSP_meaMode_def' value='def' onclick='MLSP_measRadio("def")'><label for='MLSP_meaMode_def'><?=GetMessage('MLSP_LABEL_dimMode_def')?></label>
</td></tr>

<?// == ДШВ ?>
<tr id='MLSP_mea_unit_prop' class="MLSP_mea">
	<td><?=GetMessage('MLSP_OPT_sides')?></td>
	<td><input type='text' name='sidesUnit' value='<?=COption::GetOptionString($module_id,'sidesUnit', 'DIMESIONS')?>'></td>
</tr>
<tr id='MLSP_mea_unit' class="MLSP_mea">
	<td><?=GetMessage('MLSP_OPT_sidesUnitSprtr')?></td>
	<td><input type='text' name='sidesUnitSprtr' value='<?=COption::GetOptionString($module_id,'sidesUnitSprtr', 'x')?>'></td>
</tr>

<?// == 3 свойства ?>
<tr id='MLSP_mea_sep_l' class="MLSP_mea"><td><?=GetMessage('MLSP_OPT_MEA_SEP_L')?></td><td><input type='text' name='MLSP_MEA_SEP_L' value='<?=$sides['L']?>'></td></tr>
<tr id='MLSP_mea_sep_w' class="MLSP_mea"><td><?=GetMessage('MLSP_OPT_MEA_SEP_W')?></td><td><input type='text' name='MLSP_MEA_SEP_W' value='<?=$sides['W']?>'></td></tr>
<tr id='MLSP_mea_sep_h' class="MLSP_mea"><td><?=GetMessage('MLSP_OPT_MEA_SEP_H')?></td><td><input type='text' name='MLSP_MEA_SEP_H' value='<?=$sides['H']?>'></td></tr>
<tr id='MLSP_mea_def' class="MLSP_mea"><td colspan="2" style="text-align:center; padding:5px"><?=GetMessage('MLSP_OPT_MEA_DEF')?></td></tr>

<?// -- ВЕС ?>
<tr><td colspan="2" valign="top" align="center"><strong><?=GetMessage('MLSP_HEADER_WEIGHT')?></strong></td></tr>
<tr class="measHide">
	<td><?=GetMessage('MLSP_LABEL_sidesMeas')?></td>
	<td>
		<?$MLSP_wD=COption::GetOptionString($module_id,'weightMeas','g');?>
		<select name='weightMeas' id="weightMeas" onchange="$('.WeightLbl').html( $(this).val() );"> 
			<option value='g' id="weightMeas_g" <?if($MLSP_wD=='g') echo 'selected';?>><?=GetMessage('MLSP_LABEL_g')?></option>
			<option value='kg' <?if($MLSP_wD=='kg') echo 'selected';?>><?=GetMessage('MLSP_LABEL_kg')?></option>
		</select>
		<span id="weightMeas_fix" style="display:none"><?=GetMessage('MLSP_LABEL_g')?></span>
	</td>
</tr>
<tr>
	<td>
		<input type='radio' name='MLSP_weiMode' id='MLSP_weiMode_cat' value='cat' onclick='MLSP_weiRadio("cat")'><label for='MLSP_weiMode_cat'><?=GetMessage('MLSP_LABEL_weiMode_cat')?></label><br>
		<input type='radio' name='MLSP_weiMode' id='MLSP_weiMode_prop' value='prop' onclick='MLSP_weiRadio("prop")'><label for='MLSP_weiMode_prop'><?=GetMessage('MLSP_LABEL_weiMode_prop')?></label>
	</td>
	<td>
		<input type='text' name='weightPr' value='<?=$MLSP_weight?>'>
	</td>
</tr>

<?//Свойства заказа?>
<tr class="heading">
	<td colspan="2" valign="top" align="center"><?=GetMessage('MLSP_OPTTAB_PROPS')?> <a href='#' class='PropHint' onclick='return ipol_popup_virt("pop-PROPS",$(this));'></a></td>
</tr>
<?showOrderOptions();?>
<tr><td style="color:#555; " colspan="2" >
	<a class="moduleHeader" onclick="$(this).next().toggle(); return false;"><?=GetMessage('MLSP_ADDPROPS_TITLE')?></a>
	<div class="moduleInst" ><?=GetMessage('MLSP_ADDPROPS_DESCR')?></div>					
</td></tr>

<?//Службы доставки до двери?>
<tr class="heading">
	<td colspan="2" valign="top" align="center"><?=GetMessage('MLSP_OPTTAB_DELIVS')?></td>
</tr>
<?/*<tr><td colspan="2" valign="top" align="center"><strong><?=GetMessage('MLSP_HEADER_DELIVSIGNS')?></strong> <a href='#' class='PropHint' onclick='return ipol_popup_virt("pop-DELIVSIGNS",$(this));'></a></td></tr>*/?>
<tr><td colspan="2" valign="top" align="center"><strong> <br> </strong></td></tr>
<?ShowParamsHTMLByArray($arAllOptions["delivSigns"]);?>

<?//Типы плательщиков?>
<tr class="heading">
	<td colspan="2" valign="top" align="center"><?=GetMessage('MLSP_OPTTAB_PAYERS')?> <a href='#' class='PropHint' onclick='return ipol_popup_virt("pop-PAYERS",$(this));'></a></td>
</tr>
<?foreach($arPayers as $id =>$val){
	$payerIsChosen=false;
	if(COption::GetOptionString($module_id,'payers','none')=='none')//по-умолчанию
		$payerIsChosen=true;
?>
	<tr><td><?=$val['NAME']?></td><td><input type='checkbox' name='payers[]' value='<?=$id?>' <?echo ($val['sel']||$payerIsChosen)?'checked':'';?>></td></tr>
<?}?>

<?//Платежные системы, при которых курьер не берет деньги с покупателя?>
<tr class="heading">
	<td colspan="2" valign="top" align="center"><?=GetMessage('MLSP_OPTTAB_PAYSYSDEPTH')?> <a href='#' class='PropHint' onclick='return ipol_popup_virt("pop-PAYSYSDEPTH",$(this));'></a></td>
</tr>
<tr><td colspan='2' valign="top" align="center"><?=$paySysHtml?></td></tr>