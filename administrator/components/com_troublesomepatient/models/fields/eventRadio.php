<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldEventRadio extends JFormField {
	
	protected $type = 'EventRadio';

	// getLabel() left out

	public function getInput() {

        // $db = JFactory::getDbo();
        // $query = $db->getQuery(true);
        // $query->select('*')->from($db->quoteName('#__problem_patient'));

        // $db->setQuery($query);
		// $db->execute();
        // $rows = $db->loadObjectList();
        
        $element = '<div id="" >'.
        '<input id="'.$this->id.'" type="radio" name="'.$this->name.'" value="0" checked="">'.
        '<label for="警告">警告</label>';

        // foreach ($rows as $row) {
		// 	$element = $element.'<option value="'.$row->pid.'" data-level="'.$row->event_level.'">'.
		// 		$row->pid.' - '.$row->pname.
		// 		'</option>';
        // }

		$element = $element.'</div>';

		return $element;
	}
}