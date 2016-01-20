<fieldset class="steps" id="fs1">
  <p>What is the desired name of your new company? If you desire a specific spelling in Arabic please indicate to the right.</p>
  <br>
  <div>
    <div style="width:48%; float:left;">
      <input type="text" name="question4[option1]" class="input_start" value="<?php echo get_field('question4', 'option1'); ?>" id="question4_option1" />
    </div>

    <div style="width:48%; float:right;"><input dir="rtl" lang="ar" class="input_start" type="text" name="question4[option12]" value="<?php echo get_field('question4', 'option12'); ?>" /></div>
  </div>
  <div style="clear:both;"></div>

  <br>
  <div id="alternate_name_id">
    <p>Please provide atleast one alternative name of your new company.</p>

    <div>
      <div style="width:48%; float:left;">
        <input type="text" name="question4[option2]" class="input_start"
               value="<?php echo get_field('question4', 'option2'); ?>"  id="question4_option2" />
      </div>
      <div style="width:48%; float:right;"><input dir="rtl" lang="ar" class="input_start" type="text"
                                                  name="question4[option22]" id="question4_option22" value="<?php echo get_field('question4', 'option22'); ?>" />
      </div>
    </div>
    <div style="clear:both;"></div>

    <br>

    <div>
      <div style="width:48%; float:left;">
        <input type="text" name="question4[option3]" class="input_start"
               value="<?php echo get_field('question4', 'option3'); ?>"  id="question4_option3" />
      </div>
      <div style="width:48%; float:right;"><input dir="rtl" lang="ar" class="input_start" type="text" name="question4[option32]" value="<?php echo get_field('question4', 'option32'); ?>" id="question4_option32" /></div>
    </div>
    <div style="clear:both;"></div>

  </div>

  <div style="clear:both;"></div>

  <input type="button" name="next" class="next action-button" value="Next" />
  <?php if(isset($_SESSION['start_form'])){ ?>
    <input type="button" name="clear" class="action-button" value="Clear" onclick="location.href = '<?php echo url('licapp?clear=y'); ?>';" />
  <?php } ?>
</fieldset>