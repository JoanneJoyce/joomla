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

/**
 * HTML View class for the TroublesomePatient Component
 *
 * @since  0.0.1
 */
class TroublesomePatientViewTroublesomePatient extends JViewLegacy
{
	/**
	 * Display the Troublesome Patient view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		if($action == "編集"){

		} else{
			// Assign data to the view
			$this->msg = $this->get('Msg');

			// Check for errors.
			if (count($errors = $this->get('Errors')))
			{
				JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

				return false;
			}

			// Display the view
			parent::display($tpl);
		}
	
	}

	function insertUser(){
		echo '<script>alert();</script>';
	}
}