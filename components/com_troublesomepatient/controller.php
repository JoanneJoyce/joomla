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
 * Troublesome Patient Component Controller
 *
 * @since  0.0.1
 */
class TroublesomePatientController extends JControllerLegacy
{
    function shout()
    {
      echo "<p>THIS IS ME SHOUTING!</p>";
    }
}