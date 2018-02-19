<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_troublesomepatient
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
// defined('_JEXEC') or die('Restricted access');

/**
 * Troublesome Patient Component Controller - SUB
 *
 * @since  0.0.1
 */
class TroublesomePatientControllerViewUsers extends JControllerAdmin
{
    function view(){

        $app = JFactory::getApplication();
        $getData = $app->input->get;
        
        $id = $getData->get('patient_id', '', 'int');
        $action = $getData->get('patient_action', '', 'string');

        if($action == "削除"){
            $model = $this->getModel('troublesomepatient'); 
            $model->delete($id);
            parent::display();
        } else{
            $model = $this->getModel('troublesomepatient'); 
            $model->getData($id);
            parent::insertUser();
        }
        
    }
}