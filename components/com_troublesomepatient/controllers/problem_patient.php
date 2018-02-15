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
class TroublesomePatientControllerProblem_patient extends JControllerForm
{
    function deleteUser(){
        
        $id = JRequest::getVar('patient_id');
        $action = JRequest::getVar('patient_action');
        
        if($action == "削除"){
            $model = $this->getModel('troublesomepatient'); 
            $model->delete($id);
            parent::display();
        } else{
            echo "<script>alert('You want to edit $id');</script>";
            parent::display();
        }
        
    }

}