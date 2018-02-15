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

JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the TroublesomePatient component
 *
 * @since  0.0.1
 */
class JFormFieldTroublesomePatient extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'TroublesomePatient';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('pid,pname');
		$query->from('#__problem_patient');
		$db->setQuery((string) $query);
		$patients = $db->loadObjectList();
		$options  = array();

		if ($patients)
		{
			foreach ($patients as $patient)
			{
				$options[] = JHtml::_('select.option', $patient->pid, $patient->pname);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
