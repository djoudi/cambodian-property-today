<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.model');

class PropertyModelSearch extends JModel{
    var $_data = null;
    var $_total = null;
    var $_areas = null;
    var $_pagination = null;
    function __construct()
    {
        parent::__construct();

        $app	= &JFactory::getApplication();
        $config = JFactory::getConfig();

        $this->setState('limit', $app->getUserStateFromRequest('com_search.limit', 'limit', $config->get('list_limit'), 'int'));
        $this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));
    }

    function setSearch($keyword, $match = 'all', $ordering = 'newest')
    {
        if (isset($keyword)) 
            $this->setState('keyword', $keyword);
        if (isset($match)) 
            $this->setState('match', $match);  
        if (isset($ordering)) 
            $this->setState('ordering', $ordering);        
    }
    function getData()
    {
        

    }

    function getTotal()
    {
        return $this->_total;
    }

    function getPagination()
    {
        if (empty($this->_pagination))
        {
                jimport('joomla.html.pagination');
                $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_pagination;
    }
}