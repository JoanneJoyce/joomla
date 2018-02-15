<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_troublesomepatient
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h1><?php echo $this->msg; ?></h1>
<!-- <form name="search_troublesome_patient" id="search_troublesome_patient" action="" method="get" onsubmit="return xoopsFormValidate_search_troublesome_patient();">
<table width="100%" class="outer" cellspacing="1"><tbody><tr><th colspan="2">問題患者検索 </th></tr><tr valign="top" align="left"><td class="head" width="20%">患者ＩＤ/氏名</td><td class="even"><input type="text" name="search_patient" id="search_patient" size="80" maxlength="60" value="" style="ime-mode:active; width: 30%;"></td></tr><tr valign="top" align="left"><td class="head" width="20%">患者</td><td class="odd"><select size="5" style="ime-mode:active; width:40%; height:130px; outline:0;" name="patient_id" id="patient_id">
<option value="1001" data-level="1">1001 - 四露死苦かすらカスラｶｽﾗ12abc</option>
<option value="1002" data-level="0">1002 - Sam Smith</option>
<option value="1003" data-level="0">1003 - Erica Cochran</option>
<option value="1004" data-level="1">1004 - Allen Loy</option>
<option value="1005" data-level="1">1005 - Effie Artis</option>
<option value="1006" data-level="1">1006 - Anthony Jacques</option>
<option value="1007" data-level="1">1007 - Julie Lewis</option>
<option value="1008" data-level="0">1008 - Lara Croft</option>
<option value="1009" data-level="1">1009 - Samwell Tarly</option>
<option value="1010" data-level="0">1010 - Tony Stark</option>
<option value="1011" data-level="0">1011 - Lyanna Stark</option>
<option value="1015" data-level="1">1015 - Fred Smith</option>
</select></td></tr><tr valign="top" align="left"><td class="head" width="20%">取るべき行動</td><td class="even"><select size="1" name="patient_action" id="patient_action">
<option value="編集">編集</option>
<option value="削除">削除</option>
</select></td></tr><tr valign="top" align="left"><td class="head" width="20%"></td><td class="odd"><input type="submit" class="formButton" name="submit" id="submit" value="送信" onclick="editDeletePatient()"></td></tr></tbody></table></form>

<form name="detail_troublesome_patient" id="detail_troublesome_patient" action="" method="post" onsubmit="return xoopsFormValidate_detail_troublesome_patient();">
<table width="100%" class="outer" cellspacing="1"><tbody><tr><th colspan="2">問題患者詳細 </th></tr><tr valign="top" align="left"><td class="head" width="20%">患者ＩＤ <img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="even"><input type="text" name="pid" id="pid" size="80" maxlength="60" value="" style="ime-mode:active; width: 20%;"></td></tr><tr valign="top" align="left"><td class="head" width="20%">患者氏名 <img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="odd"><input type="text" name="pname" id="pname" size="80" maxlength="60" value="" style="ime-mode:active; width: 20%;"></td></tr><tr valign="top" align="left"><td class="head" width="20%">患者氏名（ふりがな）<img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="even"><input type="text" name="furigana" id="furigana" size="80" maxlength="60" value="" style="ime-mode:active; width: 20%;"></td></tr><tr valign="top" align="left"><td class="head" width="20%">患者誕生日 <img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="odd"><span>
<input type="text" name="bday" id="bday" size="0" maxlength="10" value="" style="vertical-align:middle;"> <a href="#" onclick="return showCalendar(&quot;bday&quot;);"><img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/calendar_btn.gif" width="33" height="20" style="vertical-align:middle;"></a>
(日付をYYYY/MM/DD形式で入力)
</span>
</td></tr><tr valign="top" align="left"><td class="head" width="20%">患者の性別 <img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="even"><input type="radio" name="sex" value="1" checked="checked">男性
<input type="radio" name="sex" value="2">女性
</td></tr><tr valign="top" align="left"><td class="head" width="20%">発生年月日 <img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="odd"><span>
<input type="text" name="occur_date" id="occur_date" size="0" maxlength="10" value="" style="vertical-align:middle;"> <a href="#" onclick="return showCalendar(&quot;occur_date&quot;);"><img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/calendar_btn.gif" width="33" height="20" style="vertical-align:middle;"></a>
(日付をYYYY/MM/DD形式で入力)
</span>
</td></tr><tr valign="top" align="left"><td class="head" width="20%">事例の内容 <img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="even"><textarea name="contents" id="contents" rows="10" cols="60" style="ime-mode:active; width:60%;"></textarea></td></tr><tr valign="top" align="left"><td class="head" width="20%">事象のレベル <img src="http://192.168.1.20:8080/mpw_kyuseiki/themes/default/images/kome.png" class="png32" width="33" height="15">：</td><td class="odd"><div style="background-color: yellow;"><input id="警告" type="radio" name="event" value="0" checked="checked"><label for="警告">警告</label></div>
<div style="background-color: transparent; color: black;"><input id="拒否" type="radio" name="event" value="1"><label for="拒否">拒否</label></div>
</td></tr><tr valign="top" align="left"><td class="head" width="20%"></td><td class="even"><input type="submit" class="formButton" name="submit" id="submit" value="登録" onclick="check()"> </td></tr></tbody></table></form> -->
