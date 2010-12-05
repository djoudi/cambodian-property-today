<?php
defined('_JEXEC') or die;

?>
<form id="load-calculator" name="loan-calculator" >
    <div class="div-row">
        <label> <?php echo JText::_("Amount of loan") ?> </label>
        <input type="text" name="amount-load" id="amount-load" />
    </div>

    <div class="div-row">
        <label> <?php echo JText::_("Annual Interest Rate") ?>
        <input type="text" name="annual-interest-rate" id="annual-interest-rate" />
    </div>

    <div class="div-row">
        <label> <?php echo JText::_("term of loan") ?>
        <input type="text" name="term-loan" id="term-load" />
    </div>

    <div class="div-row">
        <label> <?php echo JText::_("Monthly loan payment") ?>
        <input type="text" name="monthly-loan" id="monthly-load" />
    </div>

    <div class="div-row">
        <label> <?php echo JText::_("Amount of loan") ?>
        <input type="text" name="" id="" />
    </div>

</form>
<script type="text/javascript">
    var formular = amount*(monthly_rate/(1-Math.pow(1+monthly_rate,-annual_term)));


</script>