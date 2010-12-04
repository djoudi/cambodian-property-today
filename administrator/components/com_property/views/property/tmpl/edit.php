<?php
    defined('_JEXEC') or die;
    JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers'.DS.'html');
    JHtml::_('behavior.tooltip');
    JHtml::_('behavior.formvalidation');
    $canDo	= PropertyMenuHelper::getActions();
?>
<script type="text/javascript">
    Joomla.submitbutton = function(task)
    {
        if (task == 'property.cancel' || document.formvalidator.isValid(document.id('property-form'))) 
            Joomla.submitform(task, document.getElementById('property-form'));
        
    }
</script>
<style>
  .textareap{
        width: 250px;
        height: 30px;
  }
</style>

<form action="<?php echo JRoute::_("index.php?option=com_property&layout=edit&id={$this->item->id}"); ?>" method="post" name="adminForm" id="property-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo empty($this->item->id) ? JText::_('Add Property') : JText::sprintf('Edit Property', $this->item->id); ?></legend>
            
            <ul class="adminformlist">
                <li><?php echo $this->form->getLabel('ref'); ?>
                <?php echo $this->form->getInput('ref'); ?></li>
                <?php
                    $url_new_agent = JRoute::_("index.php?option=com_property&task=agent.add");
                    $url_new_owner = JRoute::_("index.php?option=com_property&task=owner.add");
                    $url_new_province = JRoute::_("index.php?option=com_property&task=province.add");
                    $url_new_district = JRoute::_("index.php?option=com_property&task=district.add");
                    $format = "<div style='float:left;margin:5px 5px 5px 0;width:auto;' > <a href='%s'> %s </a></div>";
                    function fill_format($format,$a,$b){
                        return sprintf($format,$a,$b);
                    }
                ?>

                <li><?php echo $this->form->getLabel('id_type'); ?>
                <?php echo $this->form->getInput('id_type'); ?></li>

                <li><?php echo $this->form->getLabel('id_agent'); ?>
                <?php echo $this->form->getInput('id_agent'); ?>
                <?php echo fill_format($format, $url_new_agent, JText::_("Create a new agent"));?>
                
                </li>

                <li><?php echo $this->form->getLabel('id_owner'); ?>
                <?php echo $this->form->getInput('id_owner'); ?>
                <?php echo fill_format($format, $url_new_owner, JText::_("Create a new owner"));?>
                </li>

                <li><?php echo $this->form->getLabel('id_province'); ?>
                <?php echo $this->form->getInput('id_province'); ?>
                <?php echo fill_format($format, $url_new_province, JText::_("Create a new province"));?>
                </li>

                <li><?php echo $this->form->getLabel('id_district'); ?>
                    <div id="div_id_district" >
                        <?php echo $this->form->getInput('id_district'); ?>
                    </div>
                <?php echo fill_format($format, $url_new_district, JText::_("Create a new district"));?>
                </li>

                <li><?php echo $this->form->getLabel('list'); ?>
                <?php echo $this->form->getInput('list'); ?></li>
                
                <li><?php echo $this->form->getLabel('tel'); ?>
                <?php echo $this->form->getInput('tel'); ?></li>

                <li><?php echo $this->form->getLabel('picture'); ?>
                <?php echo $this->form->getInput('picture'); ?></li>

                <li><?php echo $this->form->getLabel('start_date'); ?>
                <?php echo $this->form->getInput('start_date'); ?></li>

                <li><?php echo $this->form->getLabel('end_date'); ?>
                <?php echo $this->form->getInput('end_date'); ?></li>

                <li><?php echo $this->form->getLabel('price'); ?>
                <?php echo $this->form->getInput('price'); ?></li>

                <li><?php echo $this->form->getLabel('commision_type'); ?>
                <?php echo $this->form->getInput('commision_type'); ?></li>

                <li><?php echo $this->form->getLabel('commision'); ?>
                <?php echo $this->form->getInput('commision'); ?></li>

                <li><?php echo $this->form->getLabel('price_in_sq'); ?>
                <?php echo $this->form->getInput('price_in_sq'); ?></li>
                
                <li><?php echo $this->form->getLabel('style'); ?>
                <?php echo $this->form->getInput('style'); ?></li>

                <li><?php echo $this->form->getLabel('condition'); ?>
                <?php echo $this->form->getInput('condition'); ?></li>

                <li><?php echo $this->form->getLabel('size_lot'); ?>
                <?php echo $this->form->getInput('size_lot'); ?></li>
                
                <li><?php echo $this->form->getLabel('size_house'); ?>
                <?php echo $this->form->getInput('size_house'); ?></li>

                <li><?php echo $this->form->getLabel('location_address'); ?>
                <?php echo $this->form->getInput('location_address'); ?></li>

                <li><?php echo $this->form->getLabel('location_street'); ?>
                <?php echo $this->form->getInput('location_street'); ?></li>

                <li><?php echo $this->form->getLabel('location_commune'); ?>
                <?php echo $this->form->getInput('location_commune'); ?></li>

                <li><?php echo $this->form->getLabel('location_district'); ?>
                <?php echo $this->form->getInput('location_district'); ?></li>

                <li><?php echo $this->form->getLabel('location_province'); ?>
                <?php echo $this->form->getInput('location_province'); ?></li>

                <li><?php echo $this->form->getLabel('location_area'); ?>
                <?php echo $this->form->getInput('location_area'); ?></li>

                <li><?php echo $this->form->getLabel('id'); ?>
                <?php echo $this->form->getInput('id'); ?></li>

            </ul>
        </fieldset>
    </div>

    <div class="width-40 fltrt">
      <?php echo JHtml::_('sliders.start','property-sliders-'.$this->item->id, array('useCookie'=>1)); ?>

        <!-- Panel Option -->
        <?php echo JHtml::_('sliders.panel',JText::_('Option'), 'publishing-details'); ?>
        <fieldset class="panelform">
            <ul class="adminformlist">  
              <li>
                <?php echo $this->form->getLabel('published'); ?>
                <?php echo $this->form->getInput('published'); ?>
              </li>
            </ul>
        </fieldset>
        <!-- End panel option -->


        <?php echo JHtml::_('sliders.panel',JText::_('Feature'), 'publishing-details'); ?>
        <fieldset class="panelform">
            <ul class="adminformlist">
            <?php if ($canDo->get('core.edit.state')): ?>
                <li><?php echo $this->form->getLabel('feature_story'); ?>
                <?php echo $this->form->getInput('feature_story'); ?></li>

                <li><?php echo $this->form->getLabel('feature_floor'); ?>
                <?php echo $this->form->getInput('feature_floor'); ?></li>

                <li><?php echo $this->form->getLabel('feature_bedroom'); ?>
                <?php echo $this->form->getInput('feature_bedroom'); ?></li>

                <li><?php echo $this->form->getLabel('feature_bathroom'); ?>
                <?php echo $this->form->getInput('feature_bathroom'); ?></li>

                <li><?php echo $this->form->getLabel('feature_parking'); ?>
                <?php echo $this->form->getInput('feature_parking'); ?></li>

                <li><?php echo $this->form->getLabel('feature_livingroom'); ?>
                <?php echo $this->form->getInput('feature_livingroom'); ?></li>

                <li><?php echo $this->form->getLabel('feature_dinningroom'); ?>
                <?php echo $this->form->getInput('feature_dinningroom'); ?></li>

                <li><?php echo $this->form->getLabel('feature_kitchen'); ?>
                <?php echo $this->form->getInput('feature_kitchen'); ?></li>

                <li><?php echo $this->form->getLabel('feature_balcany'); ?>
                <?php echo $this->form->getInput('feature_balcany'); ?></li>

                <li><?php echo $this->form->getLabel('feature_terrace'); ?>
                <?php echo $this->form->getInput('feature_terrace'); ?></li>

                <li><?php echo $this->form->getLabel('feature_garden'); ?>
                <?php echo $this->form->getInput('feature_garden'); ?></li>

                <li><?php echo $this->form->getLabel('feature_pool'); ?>
                <?php echo $this->form->getInput('feature_pool'); ?></li>
                
                <li><?php echo $this->form->getLabel('feature_other'); ?>
                <?php echo $this->form->getInput('feature_other'); ?></li>
            <?php endif;?>
            </ul>
        </fieldset>

        <?php echo JHtml::_('sliders.panel',JText::_('Equipment'), 'publishing-details'); ?>
        <fieldset class="panelform">
        <ul class="adminformlist">
        <?php if ($canDo->get('core.edit.state')): ?>
            <li><?php echo $this->form->getLabel('equipment_bed'); ?>
            <?php echo $this->form->getInput('equipment_bed'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_mattress'); ?>
            <?php echo $this->form->getInput('equipment_mattress'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_cloth'); ?>
            <?php echo $this->form->getInput('equipment_cloth'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_dressingtable'); ?>
            <?php echo $this->form->getInput('equipment_dressingtable'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_cupboard'); ?>
            <?php echo $this->form->getInput('equipment_cupboard'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_dinningtable'); ?>
            <?php echo $this->form->getInput('equipment_dinningtable'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_chair'); ?>
            <?php echo $this->form->getInput('equipment_chair'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_sofa'); ?>
            <?php echo $this->form->getInput('equipment_sofa'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_cabinet'); ?>
            <?php echo $this->form->getInput('equipment_cabinet'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_aircon'); ?>
            <?php echo $this->form->getInput('equipment_aircon'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_gasstove'); ?>
            <?php echo $this->form->getInput('equipment_gasstove'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_microwave'); ?>
            <?php echo $this->form->getInput('equipment_microwave'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_refrigerator'); ?>
            <?php echo $this->form->getInput('equipment_refrigerator'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_tv'); ?>
            <?php echo $this->form->getInput('equipment_tv'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_fan'); ?>
            <?php echo $this->form->getInput('equipment_fan'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_standingfan'); ?>
            <?php echo $this->form->getInput('equipment_standingfan'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_satellitedish'); ?>
            <?php echo $this->form->getInput('equipment_satellitedish'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_fax'); ?>
            <?php echo $this->form->getInput('equipment_fax'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_generator'); ?>
            <?php echo $this->form->getInput('equipment_generator'); ?></li>

            <li><?php echo $this->form->getLabel('equipment_other'); ?>
            <?php echo $this->form->getInput('equipment_other'); ?></li>

        <?php endif; ?>
        </ul>
        </fieldset>
         <?php echo JHtml::_('sliders.panel',JText::_('Service'), 'publishing-details'); ?>
        <fieldset class="panelform">
            <ul class="adminformlist">
             <?php if ($canDo->get('core.edit.state')): ?>
                <li><?php echo $this->form->getLabel('service_electricity'); ?>
                <?php echo $this->form->getInput('service_electricity'); ?></li>
                <li><?php echo $this->form->getLabel('service_water'); ?>
                <?php echo $this->form->getInput('service_water'); ?></li>
                <li><?php echo $this->form->getLabel('service_garbage'); ?>
                <?php echo $this->form->getInput('service_garbage'); ?></li>
                <li><?php echo $this->form->getLabel('service_security'); ?>
                <?php echo $this->form->getInput('service_security'); ?></li>
                <li><?php echo $this->form->getLabel('service_pestcontrol'); ?>
                <?php echo $this->form->getInput('service_pestcontrol'); ?></li>
                <li><?php echo $this->form->getLabel('service_cabletv'); ?>
                <?php echo $this->form->getInput('service_cabletv'); ?></li>
                <li><?php echo $this->form->getLabel('service_laundry'); ?>
                <?php echo $this->form->getInput('service_laundry'); ?></li>
                <li><?php echo $this->form->getLabel('service_swimmingpool'); ?>
                <?php echo $this->form->getInput('service_swimmingpool'); ?></li>
                <li><?php echo $this->form->getLabel('service_id'); ?>
                <?php echo $this->form->getInput('service_id'); ?></li>
                <li><?php echo $this->form->getLabel('service_fax'); ?>
                <?php echo $this->form->getInput('service_fax'); ?></li>
                <li><?php echo $this->form->getLabel('service_newspaper'); ?>
                <?php echo $this->form->getInput('service_newspaper'); ?></li>
                <li><?php echo $this->form->getLabel('service_credit'); ?>
                <?php echo $this->form->getInput('service_credit'); ?></li>
                <li><?php echo $this->form->getLabel('service_internet'); ?>
                <?php echo $this->form->getInput('service_internet'); ?></li>
                <li><?php echo $this->form->getLabel('service_other'); ?>
                <?php echo $this->form->getInput('service_other'); ?></li>
             <?php endif;?>
            </ul>
        </fieldset>

      <?php echo JHtml::_('sliders.end'); ?>
    </div>

    <div class="clr"></div>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <script type="text/javascript" >
         window.addEvent('domready', function() {
            var prov = document.getElementById("jform_id_province");

            prov.onchange = function(){
                var prov = this.options[this.selectedIndex].value;
                var url = 'index.php?option=com_property&task=districts.getbyprovince';
                var request = new Request({
                    method : 'get',
                    url : url,
                    data: {id_province:prov},
                    onRequest: function(){

                    },
                    onComplete: function(response){
                       var div = document.getElementById("div_id_district");
                       div.innerHTML= response;
                    }
                });
                request.send();
            }

         });

    </script>
</form>