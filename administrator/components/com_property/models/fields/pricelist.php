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

        $lists = array(
            "0-500"=>"0-500",
            "500-1000"=>        "500     - 1000",
            "1000 - 5000"=>     "1 000   - 5 000",
            "5000 - 10000"=>    "5 000   - 10 000",
            "10000 - 20000"=>   "10 000  - 20 000",
            "20000 - 50000"=>   "20 000  - 50 000",
            "50000 - 100000"=>  "50 000  - 100 000",
            "100000 - 200000"=> "100 000 - 200 000",
            
            );
        foreach($lists as $value =>$text){
            $temp = new stdClass();
            $temp->value = $value;
            $temp->text = $text;
            $options[]= $temp;
        }

        $temp = new stdClass();
        $temp->value = "500 000";
        $temp->text = "More than 500 000";;
        $options[] = $temp;
        
        return $options;
    }
}
