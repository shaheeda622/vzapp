<fieldset class="steps" id="fs5">
  <?php $ques2 = get_field('question2'); ?>
  <p> Please select the type of shareholder(s) your new company will have. </p>
  <div class="col-md-3 col-sm-12">
    <input type="radio" name="question2" value="Individual"<?php echo in_array($ques2, array('', 'Individual')) ? ' checked' : ''; ?> id="q2_yes" />
    <label for="q2_yes">Individual(s) </label>
  </div>
  <div class="col-md-3 col-sm-12">
    <input type="radio" name="question2" value="Corporate"<?php echo $ques2 == 'Corporate' ? ' checked' : ''; ?> id="q2_no" />
    <label for="q2_no"> Corporate(s) </label>
  </div>
  <div class="col-md-6 col-sm-12">
    <input type="radio" name="question2" value="Both"<?php echo $ques2 == 'Both' ? ' checked' : ''; ?> id="q2_both" />
    <label for="q2_both"> Both Individual(s) & Coporate(s) </label>
  </div>
  <br>

  <input type="hidden" value="<?php echo $ques2; ?>" name="question2_hidden">
  <input type="hidden" value="<?php echo get_field('share_capital'); ?>" name="share_capital">
  <input type="hidden" value="<?php echo get_field('Company_Type__c'); ?>" name="Company_Type__c">
  
  <input type="hidden" value="<?php echo get_field('Total_Pages__c'); ?>" name="Total_Pages__c">
  
  <input type="button" name="next" class="next action-button" value="Next" />
  <input type="button" name="previous" class="previous action-button" value="Previous" />
</fieldset>

<!--<i class="fa fa-arrow-right next action-button">Next</i>-->



