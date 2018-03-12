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
    function actionUser(){
        $app = JFactory::getApplication();
        $getData = $app->input->get;

        $getArray = $getData->get('jform', '', '');
        
        $id = $getArray['patient_id'];
        $action = $getArray['patient_action'];

        if($action == "削除"){
            $model = $this->getModel('troublesomepatient'); 
            $model->delete($id);
        } 
        else{          
            
            $session = JFactory::getSession();
            $session->set("id", $id);

            $view = $this->getView('form', 'html');
            $view->setModel($this->getModel('troublesomepatient'), true);
            $view->viewUser($id);
        }
        parent::display();

    }

    function insertUpdateUser(){
        
        $app = JFactory::getApplication();
        $getData = $app->input->post;

        $getArray = $getData->get('jform', '', '');

        $session = JFactory::getSession();

        $actionBtn = $getData->getString('submit');

        if($actionBtn == "登録"){
           
            $model = $this->getModel('troublesomepatient');
            $model->insert($getArray);

        } else{
            $pid = $session->get('id');

            $model = $this->getModel('troublesomepatient');
            $model->update($getData, $pid);
            
            unset($pid);

        }
        parent::display(); 
    }

}