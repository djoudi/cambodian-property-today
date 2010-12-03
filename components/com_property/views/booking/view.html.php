<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.view');
class PropertyViewBooking extends JView
{

    function display($tpl = null)
    {
        $task = JRequest::getVar("task");
        switch ($task){
            case "booking":
                $this->book();
                break;
            case "show":
                $this->show();
                break;
            default:

                

        }
        parent::display($tpl);
    }

    public function show($tpl=null){

        $model = $this->getModel();
        $this->item = $model->getBooking(JRequest::getVar("id"));
    }
    
    public function  book($tpl=null){

    }
	
}