<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldEventRadio extends JFormField {
	
	protected $type = 'EventRadio';

	// getLabel() left out

	public function getInput() {
        
        $element = '<div id="" >'.
        '<input id="'.$this->id.'" type="radio" name="'.$this->name.'" value="0" checked="">'.
        '<label for="警告">警告</label> </div>'.
        '<div id="" >'.
        '<input id="'.$this->id.'" type="radio" name="'.$this->name.'" value="1">'.
        '<label for="拒否">拒否</label>'.
        '</div>';

		return $element;
	}
}