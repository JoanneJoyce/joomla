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
		$conditions = $db->quoteName('pid') . ' = ' . $id;

		$query->delete($db->quoteName('#__problem_patient'));
		$query->where($conditions);

		$db->setQuery($query);

		$result = $db->execute();
	}

	public function insert($getData){
		$pid 		 = $getData['pid'];
		$pname 		 = $getData['pname'];
		$furigana 	 = $getData['furigana'];
		$bday 		 = strtotime($getData['bday']);
		$sex 		 = $getData['sex'];
		$occur_date  = strtotime($getData['occur_date']);
		$contents 	 = $getData['contents'];
		$event_level = $getData['event'];
		$regist_date = time();		
		$update_date = time();				

		// Create and populate an object.
		$profile 			  = new stdClass();
		$profile->pid 		  = $pid;
		$profile->pname 	  = $pname;
		$profile->furigana 	  = $furigana;
		$profile->bday 		  = $bday;
		$profile->sex		  = $sex;
		$profile->occur_date  = $occur_date;
		$profile->contents 	  = $contents;
		$profile->event_level = $event_level;
		$profile->regist_date = $regist_date;
		$profile->update_date = $update_date;	

		// Insert the object into the user profile table.
		$result = JFactory::getDbo()->insertObject('#__problem_patient', $profile);
	}

	public function update($getData, $id){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$pid 		 = $getData->get('pid', '', 'int');
		$pname 		 = $getData->get('pname', '', 'string');
		$furigana 	 = $getData->get('furigana', '', 'string');
		$bday 		 = strtotime($getData->get('bday', '', 'int'));
		$sex 		 = $getData->get('sex', '', 'int');
		$occur_date  = strtotime($getData->get('occur_date', '', 'int'));
		$contents 	 = $getData->get('contents', '', 'string');
		$event_level = $getData->get('event', '', 'int');
		$regist_date = time();		
		$update_date = time();

		// Fields to update.
		$fields = array(
			$db->quoteName('pid') . ' = ' . $pid,
			$db->quoteName('pname') . ' = ' . "'" .  $pname . "'",
			$db->quoteName('furigana') . ' = ' . "'" . $furigana . "'",
			$db->quoteName('bday') . ' = ' . $bday,
			$db->quoteName('sex') . ' = ' . $sex,
			$db->quoteName('occur_date') . ' = ' . $occur_date,
			$db->quoteName('contents') . ' = ' . "'" . $contents . "'",
			$db->quoteName('event_level') . ' = ' . $event_level,
			$db->quoteName('regist_date') . ' = ' . $regist_date,
			$db->quoteName('update_date') . ' = ' . $update_date
		);

		// Conditions for which records should be updated.
		$conditions = $id . ' = ' . $db->quoteName('pid');

		$query->update($db->quoteName('#__problem_patient'))->set($fields)->where($conditions);

		$db->setQuery($query);

		$result = $db->execute();
	}

	public function getData($id){
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('*')
			  ->from($db->quoteName('#__problem_patient'))
			  ->where($db->quoteName('pid') . '=' . $id);
		
		$db->setQuery($query);
		$db->execute();
		$row = $db->loadObjectList();

		$this->item = $row;
		
		return $this->item;
	}
}