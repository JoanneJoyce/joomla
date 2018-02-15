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
	 * @var string message
	 */
	protected $message;

	/**
	 * Get the message
         *
	 * @return  string  The message to be displayed to the user
	 */
	public function getMsg()
	{
		if (!isset($this->message))
		{
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');
		}
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('*')
			  ->from($db->quoteName('#__problem_patient'));

		$db->setQuery($query);
		$db->execute();
		$row = $db->loadObjectList();

		$this->message = $row;

		return $this->message;
	}

	public function delete($id){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		// delete all custom keys for id passed.
		$conditions = array(
			$db->quoteName('pid') . ' = ' . $id
		);

		$query->delete($db->quoteName('#__problem_patient'));
		$query->where($conditions);

		$db->setQuery($query);

		$result = $db->execute();
		echo "<script>alert('You want to delete $id');</script>";
	}
}