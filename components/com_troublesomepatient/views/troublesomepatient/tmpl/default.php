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

$user = JFactory::getUser();

$app    = JFactory::getApplication();
$document = JFactory::getDocument();

JHtml::script(Juri::base() . 'templates/'.$app->getTemplate().'/js/problem_patient.js');
JHtml::script(Juri::base() . 'templates/'.$app->getTemplate().'/js/calendar.js');

$document->addStyleSheet(JURI::base() . 'templates/'.$app->getTemplate().'/css/problem_patient_style.css');
// $var = JRoute::_('index.php?option=com_troublesomepatient&task=problem_patients.insertUser&controller=problem_patients&id=patient_id');
// echo $var;
?>

<form name="search_troublesome_patient" id="search_troublesome_patient" action="<?php echo JRoute::_('index.php?option=com_troublesomepatient&task=problem_patients.actionUser&controller=problem_patients&id=patient_id');?>" method="get">
    <table width="100%" class="outer" cellspacing="1">
        <tbody>
            <tr>
                <th colspan="2">問題患者検索 </th>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者ＩＤ/氏名</td>
                <td class="even">
                    <input type="text" name="search_patient" id="search_patient" size="80" maxlength="60" value="" style="ime-mode:active; width: 30%;">
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者</td>
                <td class="odd">
                    <select size="5" style="ime-mode:active; height:110px; width:40%; outline:0;" name="patient_id" id="patient_id">
                    <?php 
                    for($i=0; $i<sizeof($this->msg); $i++){
                        echo "<option value='" .$this->msg[$i]->pid ."' data-level='".$this->msg[$i]->event_level."'>" . $this->msg[$i]->pid . " - " . $this->msg[$i]->pname . "</option>"; 
                        echo "</br>";
                    }
                ?>
                    </select>
                </td>
            </tr>
            <?php 
            if ($user->authorise('core.admin')) {
            ?>
            <tr valign="top" align="left">
                <td class="head" width="20%"></td>
                <td class="even">
                    <select size="1" name="patient_action" id="patient_action">
                        <option value="編集" >編集</option>
                        <option value="削除" >削除</option>
                    </select>
                </td>
            </tr>
            <?php } ?>

            <tr valign="top" align="left">
                <td class="head" width="20%"></td>
                <td class="odd">
                    <input type="submit" class="formButton" name="submit" id="submitEditDelete" value="送信">
                </td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="task" value="problem_patients.actionUser" />
    <!-- <?php
        // $action = JRequest::getVar('patient_action');
        // if($action == "削除"){ ?>
            <input type="hidden" name="task" value="problem_patients.actionUser" />
        <?php ?> -->
            <!-- <input type="hidden" name="task" value="insertUser" /> -->
        <!-- <?php  ?>  -->
	<?php echo JHtml::_('form.token'); ?>
</form>

<?php 
    if ($user->authorise('core.admin')) {
?>
<form name="detail_troublesome_patient" id="detail_troublesome_patient" action="<?php echo JRoute::_('index.php?option=com_troublesomepatient&task=problem_patients.insertUser&controller=problem_patients');?>" method="post" onsubmit="return xoopsFormValidate_detail_troublesome_patient();">
    <table width="100%" class="outer" cellspacing="1">
        <tbody>
            <tr>
                <th colspan="2">問題患者詳細 </th>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者ＩＤ
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="even">
                    <input type="text" name="pid" id="pid" size="80" maxlength="10" value="" style="ime-mode:active; width: 20%;">
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者氏名
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="odd">
                    <input type="text" name="pname" id="pname" size="80" maxlength="60" value="" style="ime-mode:active; width: 20%;">
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者氏名（ふりがな）
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="even">
                    <input type="text" name="furigana" id="furigana" size="80" maxlength="60" value="" style="ime-mode:active; width: 20%;">
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者誕生日
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="odd">
                    <span>
                        <input type="text" name="bday" id="bday" size="0" maxlength="10" value="" style="vertical-align:middle;">
                        <a href="#" onclick="return showCalendar('bday');">
                            <img src="images/calendar_btn.gif" width="33" height="20" style="vertical-align:middle;">
                        </a>
                        (日付をYYYY/MM/DD形式で入力)
                    </span>
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者の性別
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="even">
                    <input id="男性" type="radio" name="sex" value="0" checked="checked">
                    <label for="男性">男性</label>
                    <input id="女性" type="radio" name="sex" value="1">
                    <label for="女性">女性</label>
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">発生年月日
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="odd">
                    <span>
                        <input type="text" name="occur_date" id="occur_date" size="0" maxlength="10" value="" style="vertical-align:middle;">
                        <a href="#" onclick="return showCalendar(&quot;occur_date&quot;);">
                            <img src="images/calendar_btn.gif" width="33" height="20" style="vertical-align:middle;">
                        </a>
                        (日付をYYYY/MM/DD形式で入力)
                    </span>
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">事例の内容
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="even">
                    <textarea name="contents" id="contents" rows="10" cols="60" style="ime-mode:active; width:60%;"></textarea>
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">事象のレベル
                    <img src="images/kome.png" class="png32" width="33" height="15">：</td>
                <td class="odd">
                    <div style="background-color: yellow;">
                        <input id="警告" type="radio" name="event" value="0" checked="checked">
                        <label for="警告">警告</label>
                    </div>
                    <div style="background-color: transparent; color: black;">
                        <input id="拒否" type="radio" name="event" value="1">
                        <label for="拒否">拒否</label>
                    </div>
                </td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%"></td>
                <td class="even">
                    <input type="submit" class="formButton" name="submit" id="submit" value="登録"> </td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="task" value="problem_patients.insertUser" />
	<?php echo JHtml::_('form.token'); ?>
</form>
<?php }
    else {
?>
<form name="detail_troublesome_patient" id="detail_troublesome_patient" action="" method="post" onsubmit="return xoopsFormValidate_detail_troublesome_patient();">
    <table width="100%" class="outer" cellspacing="1">
        <tbody>
            <tr>
                <th colspan="2">問題患者詳細 </th>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者ＩＤ ：</td>
                <td class="even"></td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者氏名 ：</td>
                <td class="odd"></td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者氏名（ふりがな）：</td>
                <td class="even"></td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者誕生日 ：</td>
                <td class="odd"></td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">患者の性別 ：</td>
                <td class="even"></td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">発生年月日 ：</td>
                <td class="odd"></td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">事例の内容 ：</td>
                <td class="even"></td>
            </tr>
            <tr valign="top" align="left">
                <td class="head" width="20%">事象のレベル ：</td>
                <td class="odd">
                    <div></div>
                </td>
            </tr>
        </tbody>
    </table>
</form>
    <?php } ?>