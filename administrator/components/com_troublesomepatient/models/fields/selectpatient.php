<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldSelectPatient extends JFormField {
	
	protected $type = 'SelectPatient';

	// getLabel() left out

	public function getInput() {

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*')->from($db->quoteName('#__problem_patient'));

        $db->setQuery($query);
		$db->execute();
        $rows = $db->loadObjectList();
        
        $element = '<select size="5" id="'.$this->id.'" name="'.$this->name.'">';

        foreach ($rows as $row) {
			$element = $element.'<option value="'.$row->pid.'" data-level="'.$row->event_level.'">'.
				$row->pid.' - '.$row->pname.
				'</option>';
        }

		$element = $element.'</select>';

		return $element;
	}
}