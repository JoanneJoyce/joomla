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
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class TroublesomePatientModelTroublesomePatient extends JModelItem
{
	/**
	 * @var string patient
	 */
	protected $patient;

	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'TroublesomePatient', $prefix = 'TroublesomePatientTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}


	/**
	 * Get the patient
	 *
	 * @return  string  The patient to be displayed to the user
	 */
	public function getMsg($id = 1)
	{
		if (!isset($this->patient))
		{
			$this->patients = array();
		}

		if (!isset($this->patients[$id]))
		{
			// Request the selected id
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');

			// Get a TableTroublesomePatient instance
			$table = $this->getTable();

			// Load the patient
			$table->load($id);

			// Assign the patient
			$this->patients[$id] = $table->pname;
		}

		return $this->patient[$id];
	}
}