<?php
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class PropertyControllerDistricts extends JControllerAdmin
{
    protected $text_prefix = 'Districts';
    public function __construct($config = array())
    {
            parent::__construct($config);
            //$this->registerTask('unpublish',	'publish');
    }

    public function &getModel($name = 'District', $prefix = 'PropertyModel')
    {
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));
            return $model;
    }
    public function getbyprovince(){

        $id_province = JRequest::getVar("id_province");
        $path = JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."models".DS."fields".DS."districtlist.php";    
        require_once $path;
        
        $dl = new JFormFieldDistrictList();
        $options = $dl->getOptions($id_province);

        
        $path = JPATH_ADMINISTRATOR.DS."components".DS."com_property".DS."helpers".DS."renderlistdistrict.php";
        require_once $path;      

        $mainframe =& JFactory::getApplication();
        $mainframe->close();
    }

}