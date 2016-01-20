<fieldset class="steps" id="fs4">
  <?php $ques1 = get_field('question1'); ?>
  <p>Will your new company be a branch of local / foreign company?</p>
  <input type="radio" name="question1" value="Yes"<?php echo $ques1 == 'Yes' ? ' checked' : ''; ?> id="q1_yes" /><label for="q1_yes"> Yes </label>
  <input type="radio" name="question1" value="No"<?php echo in_array($ques1, array('', 'No')) ? ' checked' : ''; ?>  id="q1_no" /><label for="q1_no"> No </label><br>
  <input type="button" name="next" class="next action-button" value="Next" />
  <input type="button" name="previous" class="previous action-button" value="Previous" />
</fieldset>