<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_troublesomepatient
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * This layout file is for displaying the front end form for capturing a new helloworld message
 *
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');

$app    = JFactory::getApplication();
$document = JFactory::getDocument();

JHtml::script(Juri::base() . 'templates/'.$app->getTemplate().'/js/problem_patient.1.js');
JHtml::script(Juri::base() . 'templates/'.$app->getTemplate().'/js/calendar.js');

$document->addStyleSheet(JURI::base() . 'templates/'.$app->getTemplate().'/css/problem_patient_style.css');

?>

<form name="search_troublesome_patient" id="search_troublesome_patient" action="<?php echo JRoute::_('index.php?option=com_troublesomepatient&task=problem_patients.actionUser&controller=problem_patients&id=patient_id');?>" method="get">
    <table class="outer">
        <tbody>
            <tr>
                <th colspan="2">
				<legend><?php echo JText::_('問題患者検索') ?></legend>	
				</th>
            </tr>
            <tr valign="top" align="left">
                <td class="head">患者ＩＤ</td>
                <td class="even">
					<?php echo $this->form->renderField('search_patient');  ?>
                </td>
            </tr>
			<tr valign="top" align="left">
                <td class="head">患者</td>
                <td class="odd">
					<?php echo $this->form->renderField('patient_id');  ?>
                    <!-- <select size="5" name="patient_id" id="patient_id"> -->
                   <?php 
                    // for($i=0; $i<sizeof($this->msg); $i++){
						// echo "<option value='" .$this->msg[$i]->pid ."' data-level='".$this->msg[$i]->event_level."'>" . $this->msg[$i]->pid . " - " . $this->msg[$i]->pname . "</option>"; 
						// echo "<option ". $this->msg[0]->pname . "></option>"; 
                    //     echo "</br>";
                    // }
                ?>
                    <!-- </select> -->
                </td>
			</tr>
			<tr valign="top" align="left">
                <td class="head"></td>
                <td class="even">
					<?php echo $this->form->renderField('patient_action');  ?>
                </td>
			</tr>
			<tr valign="top" align="left">
                <td class="head"></td>
                <td class="odd">
					<input type="submit" class="formButton" name="submit" id="submitEditDelete" value="送信">
                </td>
			</tr>			
        </tbody>
	</table>

	<input type="hidden" name="task" value="problem_patients.actionUser" />
	<?php echo JHtml::_('form.token'); ?>

</form>

<form name="detail_troublesome_patient" id="detail_troublesome_patient" action="<?php echo JRoute::_('index.php?option=com_troublesomepatient&task=problem_patients.insertUpdateUser&controller=problem_patients');?>" method="post" onsubmit="return xoopsFormValidate_detail_troublesome_patient();" class="form-validate">
	<table class="outer">
        <tbody>
            <tr>
				<th colspan="2">
					<legend><?php echo JText::_('問題患者詳細') ?></legend>	
				</th>
            </tr>
			<tr valign="top" align="left">
				<td class="head">患者ＩＤ
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="even">
					<?php echo $this->form->renderField('pid');  ?>
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head">患者氏名
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="odd">
					<?php echo $this->form->renderField('pname');  ?>
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head">患者氏名（ふりがな）
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="even">
					<?php echo $this->form->renderField('furigana');  ?>
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head">患者誕生日
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="odd">
					<?php echo $this->form->renderField('bday');  ?>
					<a href="#" onclick="return showCalendar('jform_bday');">
						<img src="/joomla/images/calendar_btn.gif" width="33" height="20">
					</a>
					(日付をYYYY/MM/DD形式で入力)
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head">患者の性別
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="even">
					<?php echo $this->form->renderField('sex');  ?>
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head">発生年月日
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="odd">
					<?php echo $this->form->renderField('occur_date');  ?>
					<a href="#" onclick="return showCalendar('jform_occur_date');">
						<img src="/joomla/images/calendar_btn.gif" width="33" height="20">
					</a>
					(日付をYYYY/MM/DD形式で入力)
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head">事例の内容
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="even">
					<?php echo $this->form->renderField('contents');  ?>
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head">事象のレベル
					<img src="/joomla/images/kome.png" />
					:
				</td>
				<td class="odd" id="eventTd">
					<?php echo $this->form->renderField('event');  ?>
				</td>
			</tr>
			<tr valign="top" align="left">
				<td class="head"></td>
				<td class="even">
					<input type="submit" class="formButton" name="submit" value="登録">
				</td>
			</tr>
    	</tbody>
	</table>
    <input type="hidden" name="task" value="problem_patients.insertUpdateUser" />
	<?php echo JHtml::_('form.token'); ?>
</form>

