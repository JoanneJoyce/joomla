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
JHtml::_('behavior.formvalidator');

$user = JFactory::getUser();

$app    = JFactory::getApplication();
$document = JFactory::getDocument();

JHtml::script(Juri::base() . 'templates/'.$app->getTemplate().'/js/problem_patient.js');
JHtml::script(Juri::base() . 'templates/'.$app->getTemplate().'/js/calendar.js');

$document->addStyleSheet(JURI::base() . 'templates/'.$app->getTemplate().'/css/problem_patient_style.css');
?>

<div class="first-fieldset">
    <form name="formname">
        <fieldset class="adminform">
            <legend>Primary Fields</legend>
            <?php foreach ($this->msg->getFieldset() as $field): ?>
                <?php echo $field->label; ?>
                <?php echo $field->input; ?>
            <?php endforeach; ?>
        </fieldset>
    </form>
</div>
