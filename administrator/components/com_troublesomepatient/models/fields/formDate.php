<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldFormDate extends JFormField {
	
	protected $type = 'FormDate';

	// getLabel() left out

	public function getInput() {
        
        $element = '<span>'.
        '<input type="text" name="'.$this->name.'" id="'.$this->id.'" size="0" maxlength="10" value="" style="vertical-align:middle;">'.
        '<a href="#" onclick="return showCalendar(\''.$this->id.'\');"><img src="/joomla/images/calendar_btn.gif" width="33" height="20" style="vertical-align:middle;"></a>'.
        '(日付をYYYY/MM/DD形式で入力)'.
        '</span>';

		return $element;
	}
}