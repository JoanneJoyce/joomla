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
class TroublesomePatientControllerProblem_patients extends JControllerForm
{
    function actionUser(){

        $app = JFactory::getApplication();
        $getData = $app->input->get;

        $id = $getData->get('patient_id', '', 'int');
        $action = $getData->get('patient_action', '', 'string');

        if($action == "削除"){
            $model = $this->getModel('troublesomepatient'); 
            $model->delete($id);
        } 
        else{          
            
            $session = JFactory::getSession();
            $session->set("id", $id);

            $view = $this->getView('troublesomepatient', 'html');
            $view->setModel($this->getModel('troublesomepatient'), true);
            $view->viewUser($id);
        }
        parent::display();

    }

    function insertUpdateUser(){
        
        $app = JFactory::getApplication();
        $getData = $app->input->post;

        $session = JFactory::getSession();

        $actionBtn = $getData->getString('submit');

        if($actionBtn == "登録"){
           
            $model = $this->getModel('troublesomepatient');
            $model->insert($getData);

        } else{
            $pid = $session->get('id');

            $model = $this->getModel('troublesomepatient');
            $model->update($getData, $pid);
            
            unset($pid);

        }
        parent::display(); 
    }

}