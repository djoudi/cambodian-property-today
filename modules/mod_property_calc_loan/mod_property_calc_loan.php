<?php
defined('_JEXEC') or die;
?>
<form id="load-calculator" name="loan-calculator"  >
    <div class="div-row">
        <label style="display: block;"> <?php echo JText::_("Amount of loan") ?> </label>
        <input type="text" name="amount-load" id="amount-load" class="inputbox" onkeyup="this.value = this.value.replace (/[^0-9\.]/, '');" />
    </div>

    <div class="div-row">
        <label style="display: block;"> <?php echo JText::_("Annual Interest Rate (%)") ?> </label>
        <input type="text" name="annual-interest-rate" id="annual-interest-rate" class="inputbox"  onkeyup="this.value = this.value.replace (/[^0-9\.]/, '');" />
    </div>

    <div class="div-row">
        <label style="display: block;"> <?php echo JText::_("Term of loan (year) ") ?> </label>
        <input type="text" name="term-loan" id="term-load" class="inputbox"  onkeyup="this.value = this.value.replace (/[^0-9\.]/, '');" />
    </div>
    
    <div style="display: hidden;margin-top:5px;line-height: 1.5;" id="total"  >  </div>

    <br />
    <div>
        <input type="reset" id="reset"  class="button" value="<?php echo JText::_("Reset") ?>"  />
        <input type="button" class="button" value="<?php echo JText::_("Calculate") ?>"  id="load_reult_monthly" value="load_calculator" />
    </div>

    
</form>
<script type="text/javascript">

  window.addEvent('domready', function() {
      var btn = document.getElementById("load_reult_monthly");
      var amount = document.getElementById("amount-load");
      var rate = document.getElementById("annual-interest-rate");
      var loan = document.getElementById("term-load");

        var reset = document.getElementById("reset");
        reset.onclick = function(){
            document.getElementById("total").style.display="none";
        }


      amount.onchange = calc;
      rate.onchange = calc;
      loan.onchange =calc;

      

      function loan_cal(){
            var amount = document.getElementById("amount-load").value;
            var rate = document.getElementById("annual-interest-rate").value;
            var loan = document.getElementById("term-load").value;

            var monthly_rate = parseFloat((rate/12)/100);   //rate yearly in percentage
            var monthly_term_loan = parseFloat(loan * 12 );  //term-of-load yearly
            var formular = parseFloat(amount*(monthly_rate/(1-Math.pow(1+monthly_rate,-monthly_term_loan ))));
            //document.getElementById("monthly-load").value = formular.toFixed(4);


            var total = formular * monthly_term_loan;
            var operation = "<b><?php echo JText::_("Monthly loan ") ?>"+ " : $ </b> " +  formular.toFixed(2) ;
            operation += "<br /><b><?php echo JText::_("Total payment ")?>  : $ </b> " + total.toFixed(2);
            //operation += "<br /><b>Outcome :</b> " +  (total-amount).toFixed(4);
            document.getElementById("total").innerHTML = operation ;
            document.getElementById("total").style.display="block";
            
      }

      function calc(){
          var amount = document.getElementById("amount-load");
          var rate = document.getElementById("annual-interest-rate");
          var loan = document.getElementById("term-load");
          if(amount.value !="" && rate.value != "" && loan.value!="")
              {
                 //document.getElementById("monthly-load").value = "";
                 loan_cal();
              }
      }

      btn.onclick = loan_cal;
      
  });
</script>