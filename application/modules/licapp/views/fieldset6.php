<fieldset class="steps" id="fs6">
  <div class="corporate_entities"<?php echo in_array($ques2, array('Corporate', 'Both')) ? '' : ' style="display: none;"'; ?>>
    <p>How many corporate shareholders will your new company have?</p>
    <?php
    $question3 = get_field('question3') ? : array('part1' => '', 'part2' => '');
    $options = array(1, 2, 3, 4, 5, 6);
    ?>
    <select name="question3[part1]" class="input_start">
      <option value="">None</option>
      <?php foreach($options as $opt){ ?>
        <option value="<?php echo $opt; ?>"<?php echo $opt == $question3['part1'] ? ' selected' : ''; ?>><?php echo $opt; ?></option>
      <?php } ?>
    </select><br><br>
    <?php
    for($countsherholder = 1; $countsherholder <= 6; $countsherholder++){
      include __DIR__ . '/form/page2.php';
    }
    ?>
  </div>
  <div class="shareholders"<?php echo in_array($ques2, array('', 'Individual', 'Both')) ? '' : ' style="display: none;"'; ?>>
    <p>How many individual shareholders will your new company have?</p>
    <select name="question3[part2]" class="input_start">
      <option value="">None</option>
      <?php foreach($options as $opt){ ?>
        <option value="<?php echo $opt; ?>"<?php echo $opt == $question3['part2'] ? ' selected' : ''; ?>><?php echo $opt; ?></option>
      <?php } ?>
    </select><br><br>
    <?php
    $pic = FALSE;
    for($countsherholder = 1; $countsherholder <= 6; $countsherholder++){
      include __DIR__ . '/form/page3.php';
    }
    unset($countsherholder, $options, $opt);
    ?>
  </div>
  <input type="button" name="next" class="next action-button" value="Next" />
  <input type="button" name="previous" class="previous action-button" value="Previous" />
</fieldset>