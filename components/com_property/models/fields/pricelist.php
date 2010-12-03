<?php
defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldPriceList extends JFormFieldList
{
    protected $type = 'PriceList';
    public function getOptions()
    {
        $options = array();
        $options[] = JHtml::_('select.option', '0', JText::_('Select price list'));

        $lists = array("0-500",
            "500-1000",
            "1 000 - 5 000",
            "5 000 - 10 000",
            "20 0000 - 50 0000",
            "50 0000 - 100 0000",
            "100 0000 - 200 0000",
            
            );
        $i = 0;
        for($i=0;$n=count($lists),$i<$n ; $i++){
            $temp = new stdClass();
            $temp->value = $lists[$i];
            $temp->text = "{$lists[$i]}";
            $options[]= $temp;
        }

        $temp = new stdClass();
        $temp->value = "200 000";
        $temp->text = "More than 200 000";;
        $options[] = $temp;
        
        return $options;
    }
}
