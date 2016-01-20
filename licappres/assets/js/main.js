var developing = false;
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var common_error = 'Field is required';
var total_shares = 0;
var la_name = '';
function number_format(number, decimals, dec_point, thousands_sep){
  number = (number + '')
          .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
          s = '',
          toFixedFix = function(n, prec){
            var k = Math.pow(10, prec);
            return '' + (Math.round(n * k) / k)
                    .toFixed(prec);
          };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
          .split('.');
  if(s[0].length > 3){
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if((s[1] || '')
          .length < prec){
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
            .join('0');
  }
  return s.join(dec);
}
function validate(){
  if(developing){
    return true;
  }
  $('span.merror').html(common_error);
  var fs_id = current_fs.attr('id');
  if(fs_id === 'fs1'){
    var val = $('input[name="question4[option1]"]').val();
    var val2 = $('input[name="question4[option2]"]').val();
    var val3 = $('input[name="question4[option3]"]').val();
    if(val === '' || (val2 === '' && val3 === '')){
      if(val === ''){
        $('span.merror').html('Please provide the desired name of your new company.');
        $('span.merror').show();
      }else{
        $('span.merror').html('Please provide atleast one alternative name of your new company.');
        $('span.merror').show();
      }
      return false;
    }
    else if(val.length < 4 || val2.length < 4){
      if(val.length < 4){
        $('span.merror').html('Company name must be greater than 3 alphabets');
        $('span.merror').show();
      }else{
        $('span.merror').html('Company alternate name must be greater than 3 alphabets');
        $('span.merror').show();
      }
      return;
    }
    if((val === val2 || val === val3) || (val2 === val3)){
      if(val2 === val3){
        $('span.merror').html('Please provide different alternative names.');
        $('span.merror').show();
      }else{
        $('span.merror').html('Please provide an alternative name different from the desired name.');
        $('span.merror').show();
      }
      return;
    }
  }
  else if(fs_id === 'fs3'){
    if($('#activities li').length < 1){
      $('span.merror').html('Atleast one activity must be selected');
      $('span.merror').show();
      return false;
    }
  }
  else if(fs_id === 'fs4'){
    if(!$('input[name="question1"]').is(':checked')){
      $('span.merror').show();
      return false;
    }
  }
  else if(fs_id === 'fs5'){
    if(!$('input[name="question2"]').is(':checked')){
      $('span.merror').show();
      return false;
    }
  }
  else if(fs_id === 'fs6'){
    if($('select[name="question3[part1]"]').val() === '' && $('select[name="question3[part2]"]').val() === ''){
      $('span.merror').show();
      return false;
    }
    $('.corporate_entities').find('div[id*="corp"]:visible .section_body:hidden').prev().click();
    $('.shareholders').find('div[id*="ind"]:visible .section_body:hidden').prev().click();
    var ch1 = !$("#" + fs_id + " input.validate").valid();
    if(ch1){
      $("#" + fs_id + " input.validate").blur();
    }
    var ch = !validCheckboxes();
    if(ch || ch1){
      return false;
    }
    var total_val = 0;
    $('div[id*="indiv"]:visible input[name="ind_num_o_sha[]"],div[id*="corp"]:visible input[name="cop_num_o_sha[]"]').each(function(){
      var val = parseInt($(this).val());
      if(!isNaN(val)){
        total_val += val;
      }
    });

    if(total_val < 100){
      $('span.merror').html("The total number of shares cannot be less than 100, current value is " + total_val + ".");
      $('span.merror').show();
      $('html, body').animate({scrollTop: $("body").offset().top}, 500);
      return false;
    }
  }
  else if(fs_id === 'fs7' || fs_id === 'fs7a'){
    $('#picfrmbody:hidden').prev().click();
    $('#fpcfrmbody:hidden').prev().click();
    var ch1 = !$("#" + fs_id + " input.validate").valid();
    if(ch1){
      $("#" + fs_id + " input.validate").blur();
    }
    var ch = !validCheckboxes();
    if(ch || ch1){
      return false;
    }
  }

  return true;
}

var reloadFs7a = function(obj){
  check_pic_fpos(obj);
  var inputs = $(obj).parents('div.section').eq(0).find('input[name^="ind_"],select[name^="ind_"],div[data-name^="ind_"]');
  var tag_name = '';
  var attrname = '';
  for(var i = 0;i < inputs.length;i++){
    tag_name = $(inputs[i]).prop('tagName').toLowerCase();
    attrname = tag_name === 'div' ? 'data-name' : 'name';
    var inpname = $(inputs[i]).attr(attrname).split('ind_')[1].replace('[]', '');
    if($(inputs[i]).is(':checkbox')){
      $(tag_name + '[' + attrname + '="pic_' + inpname + '"][value="' + $(inputs[i]).val() + '"]').prop('checked', $(obj).val() === 'Yes' ? $(inputs[i]).is(':checked') : false);
    }
    else{
      $(tag_name + '[' + attrname + '="pic_' + inpname + '"]').val($(obj).val() === 'Yes' ? $(inputs[i]).val() : '');
    }
    if($(inputs[i]).is(':checkbox')){
      if($(obj).val() === 'Yes'){
        $(tag_name + '[' + attrname + '="pic_' + inpname + '"]').addClass('disabled');
      }
      else{
        $(tag_name + '[' + attrname + '="pic_' + inpname + '"]').removeClass('disabled');
      }
    }
    $(tag_name + '[' + attrname + '="pic_' + inpname + '"]').prop('readonly', $(obj).val() === 'Yes');
  }
  disbale_checks();
};

var reloadFs7b = function(obj){
  check_pic_fpos(obj);
  var e_sel = $(obj).parents('div.section').find('#picfrmbody').length > 0 ? 'pic_' : 'ind_';
  var inputs = $(obj).parents('div.section').find('input[name^="' + e_sel + '"],select[name^="' + e_sel + '"],div[data-name^="' + e_sel + '"]');
  var tag_name = '';
  var attrname = '';
  for(var i = 0;i < inputs.length;i++){
    tag_name = $(inputs[i]).prop('tagName').toLowerCase();
    attrname = tag_name === 'div' ? 'data-name' : 'name';
    var inpname = $(inputs[i]).attr(attrname).split(e_sel)[1].replace('[]', '');
    if($(inputs[i]).is(':checkbox')){
      $(tag_name + '[' + attrname + '="fpc_' + inpname + '"][value="' + $(inputs[i]).val() + '"]').prop('checked', $(obj).val() === 'Yes' ? $(inputs[i]).is(':checked') : false);
    }
    else{
      $(tag_name + '[' + attrname + '="fpc_' + inpname + '"]').val($(obj).val() === 'Yes' ? $(inputs[i]).val() : '');
    }
    if($(inputs[i]).is(':checkbox')){
      if($(obj).val() === 'Yes'){
        $(tag_name + '[' + attrname + '="fpc_' + inpname + '"]').addClass('disabled');
      }
      else{
        $(tag_name + '[' + attrname + '="fpc_' + inpname + '"]').removeClass('disabled');
      }
    }
    $(tag_name + '[' + attrname + '="fpc_' + inpname + '"]').prop('readonly', $(obj).val() === 'Yes');
  }
};

var validCheckboxes = function(){
  var valid = true;
  $('input.checkme:visible').each(function(e, v){
    var parent = $(this).parents('div').eq(0);
    var inputs = parent.find('input.checkme:checked');
    if(inputs.length < 1){
      parent.children('label.error').html('This field is required').show();
      valid = false;
    }
  });
  return valid;
};

var check_pic_fpos = function(obj){
  if($(obj).val() === 'Yes' && $(obj).is(':checked')){
    $('input[name="' + $(obj).attr('name') + '"][value="Yes"]').not(obj).attr('disabled', true);
    $('input[name="' + $(obj).attr('name') + '"][value="No"]').not($(obj).parents('div').eq(0).find('input[name="' + $(obj).attr('name') + '"][value="No"]')).prop('checked', true).attr('disabled', true);
  }
  else{
    $('input[name="' + $(obj).attr('name') + '"]').attr('disabled', false);
  }
};

var disbale_checks = function(){
  $('.disabled').click(function(ev){
    ev.preventDefault();
    return false;
  });
};

$(document).ready(function(){
  $('input.checkme').on('click', function(){
    if($(this).hasClass('disabled')){
      return;
    }
    var parent = $(this).parents('div').eq(0);
    if($(this).is(':checked')){
      parent.children('label.error').hide();
    }
    else{
      var inputs = parent.find('input.checkme:checked');
      if(inputs.length < 1){
        parent.children('label.error').html('This field is required').show();
      }
    }
  });
  $('input[type="checkbox"]').click(function(){
    if($(this).hasClass('disabled')){
      return;
    }
    if($(this).is(':checked')){
      var inputs = $(this).parents('div').eq(0).find('input[name="' + $(this).attr('name') + '"]');
      for(var i = 0;i < inputs.length;i++){
        if($(inputs[i]).val() !== $(this).val()){
          $(inputs[i]).prop('checked', false);
        }
      }
    }
  });

  var ind_sh_inch = $('input[name="ind_sh_inch[]"][value="Yes"]:checked');
  if(ind_sh_inch.length > 0){
    reloadFs7a(ind_sh_inch);
  }
  var ind_sh_fpc = $('input[name="ind_sh_fpo[]"][value="Yes"]:checked');
  if(ind_sh_inch.length > 0){
    reloadFs7b(ind_sh_fpc);
  }
  var pic_fpc = $('input[name="pic_sh_fpo[]"][value="Yes"]:checked');
  if(pic_fpc.length > 0){
    reloadFs7b(pic_fpc);
  }

  $('input[name^="ind_"],select[name^="ind_"],div.bfh-countries[data-name^="ind_"]').on('focusout', function(){
    var inptype = $(this).prop('tagName').toLowerCase();
    var inpattr = 'name';
    if(inptype === 'div'){
      inpattr = 'data-name';
    }
    var inpname = $(this).attr(inpattr).split('ind_')[1].replace('[]', '');
    if($(this).parents('div.section').find('input[name^="ind_sh_inch"][value="Yes"]').is(':checked')){
      if($(this).is(':checkbox')){
        $(inptype + '[' + inpattr + '="pic_' + inpname + '"][value="' + $(this).val() + '"]').prop('checked', $(this).is(':checked'));
        $(inptype + '[' + inpattr + '="pic_' + inpname + '"][value!="' + $(this).val() + '"]').prop('checked', false);
        $(inptype + '[' + inpattr + '="pic_' + inpname + '"]').addClass('disabled');
      }
      else{
        $(inptype + '[' + inpattr + '="pic_' + inpname + '"]').val($(this).val());
      }
      $(inptype + '[' + inpattr + '="pic_' + inpname + '"]').prop('readonly', true);
    }
    if($(this).parents('div.section').find('input[name^="ind_sh_fpo"][value="Yes"]').is(':checked')){
      if($(this).is(':checkbox')){
        $(inptype + '[' + inpattr + '="fpc_' + inpname + '"][value="' + $(this).val() + '"]').prop('checked', $(this).is(':checked'));
        $(inptype + '[' + inpattr + '="fpc_' + inpname + '"][value!="' + $(this).val() + '"]').prop('checked', false);
        $(inptype + '[' + inpattr + '="fpc_' + inpname + '"]').addClass('disabled');
      }
      else{
        $(inptype + '[' + inpattr + '="fpc_' + inpname + '"]').val($(this).val());
      }
      $(inptype + '[' + inpattr + '="fpc_' + inpname + '"]').prop('readonly', true);
    }
  });

  $('input[name^="pic_"],select[name^="pic_"],div.bfh-countries[data-name^="pic_"]').on('focusout', function(){
    var inptype = $(this).prop('tagName').toLowerCase();
    var inpattr = 'name';
    if(inptype === 'div'){
      inpattr = 'data-name';
    }
    var inpname = $(this).attr(inpattr).split('pic_')[1].replace('[]', '');
    if($(this).parents('div.section').find('input[name^="pic_sh_fpo"][value="Yes"]').is(':checked')){
      if($(this).is(':checkbox')){
        $(inptype + '[name="fpc_' + inpname + '"][value="' + $(this).val() + '"]').attr('checked', $(this).is(':checked'));
        $(inptype + '[name="fpc_' + inpname + '"][value!="' + $(this).val() + '"]').prop('checked', false);
        $(inptype + '[name="fpc_' + inpname + '"]').addClass('disabled');
      }
      else{
        $(inptype + '[name="fpc_' + inpname + '"]').val($(this).val());
      }
      $(inptype + '[name="fpc_' + inpname + '"]').attr('readonly', true);
    }
  });

  $('.cop_p_ad_same,.ind_p_ad_same,.pic_p_ad_same,.fpc_p_ad_same').click(function(){
    if($(this).hasClass('disabled')){
      return;
    }
    var obj = $(this);
    var parent = $(this).parents('fieldset.form-horizontal');
    var mad = parent.find('.cad');
    var pad = parent.find('.pad');
    var picpad = [];
    var fpcpad = [];
    if($(this).hasClass('ind_p_ad_same') && $(this).parents('div.section').find('input[name^="ind_sh_inch"][value="Yes"]').is(':checked')){
      var picpad = $('.pic_p_ad_same').parents('fieldset.form-horizontal').find('.pad');
    }
    if($(this).hasClass('ind_p_ad_same') && $(this).parents('div.section').find('input[name^="ind_sh_fpo"][value="Yes"]').is(':checked')){
      var fpcpad = $('.fpc_p_ad_same').parents('fieldset.form-horizontal').find('.pad');
    }
    if($(this).hasClass('pic_p_ad_same') && $(this).parents('div.section').find('input[name^="ind_sh_fpo"][value="Yes"]').is(':checked')){
      var fpcpad = $('.fpc_p_ad_same').parents('fieldset.form-horizontal').find('.pad');
    }
    for(var i = 0;i < pad.length;i++){
      $(pad[i]).val($(obj).is(':checked') ? $(mad[i]).val() : '');
      $(pad[i]).attr('readonly', $(obj).is(':checked') ? true : false);
      if(picpad.length > 0){
        $(picpad[i]).val($(obj).is(':checked') ? $(mad[i]).val() : '');
        $(picpad[i]).attr('readonly', $(obj).is(':checked') ? true : false);
      }
      if(fpcpad.length > 0){
        $(fpcpad[i]).val($(obj).is(':checked') ? $(mad[i]).val() : '');
        $(fpcpad[i]).attr('readonly', $(obj).is(':checked') ? true : false);
      }
    }
  });

  $('input[name="question1"]').click(function(){
    $('#q2_yes').attr('checked', false);
    $('#q2_no').attr('checked', true);
    $('#q2_both').attr('checked', false);
    if($(this).val() === 'Yes'){
      $('#q2_yes').attr('readonly', true);
      $('#q2_both').attr('readonly', true);
    }
    else{
      $('#q2_yes').attr('readonly', false);
      $('#q2_no').attr('readonly', false);
      $('#q2_both').attr('readonly', false);

      $('#q2_yes').attr('checked', false);
      $('#q2_no').attr('checked', false);
      $('#q2_both').attr('checked', false);
    }
  });
  var apl_type = $('input[name="question2"]').val();
  $('input[name="question2"]').click(function(){
    $('.corporate_entities').find('select').val('').change().blur();
    $('.shareholders').find('select').val('').change().blur();
    if($(this).val() === 'Both'){
      apl_type = 'Both';
      $('.corporate_entities').show();
      $('.shareholders').show();
    }
    else if($(this).val() === 'Individual'){
      apl_type = 'Individual';
      $('.corporate_entities').hide();
      $('.shareholders').show();
    }
    else if($(this).val() === 'Corporate'){
      apl_type = 'Corporate';
      $('.corporate_entities').show();
      $('.shareholders').hide();
    }
  });

  var total_pages;
  $('select[name="question3[part1]"]').change(function(){
    var val1 = parseInt($('select[name="question3[part1]"]').val()) || 0;
    var val2 = parseInt($('select[name="question3[part2]"]').val()) || 0;

    total_pages = val1 + val2 + 7;
    if((val1 + val2) > 6){
      alert('Selection of up to six(6) shareholders are permitted.');
      $(this).val('').change();
      return false;
    }
    var val = $('select[name="question3[part1]"]').val();
    if(val !== ''){
      for(var i = 1;i <= 6;i++){
        if(i <= val){
          $('#corp' + i).show();
        }
        else{
          $('#corp' + i).hide();
        }
      }
    }
    else{
      for(var i = 1;i <= 6;i++){
        $('#corp' + i).hide();
      }
    }

    if($('input[name="cop_num_o_sha[]"]').data('svalue') === ''){
      $('input[name="share_capital"]').val('150,000');
      if(val === '1' && apl_type === 'Corporate'){
        $('input[name="cop_val_p_sha[]"]').attr('readonly', false);
        $('input[name="cop_val_p_sha[]"]').val('1,000');
        $('input[name="cop_num_o_sha[]"]').val('100');
        $('input[name="cop_per_o_sha[]"]').val('100');
        $('input[name="cop_val_of_sha[]"]').val('150,000');

        $('input[name="Company_Type__c"]').val('Branch');

        $('input[name="cop_num_o_sha[]"]').attr('readonly', true);
        $('input[name="cop_per_o_sha[]"]').attr('readonly', true);
        $('input[name="cop_val_p_sha[]"]').attr('readonly', true);
        $('input[name="cop_val_of_sha[]"]').attr('readonly', true);
      }
      else{
        $('input[name="cop_num_o_sha[]"]').attr('readonly', false);
        $('input[name="cop_per_o_sha[]"]').attr('readonly', false);
        $('input[name="cop_val_p_sha[]"]').attr('readonly', false);
        $('input[name="cop_val_of_sha[]"]').attr('readonly', false);

        $('input[name="Company_Type__c"]').val('FZC');

        $('input[name="cop_val_p_sha[]"]').val('1,500');
        $('input[name="cop_num_o_sha[]"]').val('');
        $('input[name="cop_per_o_sha[]"]').val('');
        $('input[name="cop_val_of_sha[]"]').val('');
      }
    }
    else{
      $('input[name="cop_num_o_sha[]"]').data('svalue', '');
    }
  });

  $('select[name="question3[part2]"]').change(function(){
    var val1 = parseInt($('select[name="question3[part1]"]').val()) || 0;
    var val2 = parseInt($('select[name="question3[part2]"]').val()) || 0;

    total_pages = val1 + val2 + 7;

    if((val1 + val2) > 6){
      alert('Selection of up to six(6) shareholders are permitted.');
      $(this).val('').change();
      return false;
    }
    var val = $('select[name="question3[part2]"]').val();
    if(val !== ''){
      for(var i = 1;i <= 6;i++){
        if(i <= val){
          $('#indiv' + i).show();
        }
        else{
          $('#indiv' + i).hide();
        }
      }
    }
    else{
      for(var i = 1;i <= 6;i++){
        $('#indiv' + i).hide();
      }
    }

    if($('input[name="ind_num_o_sha[]"]').data('svalue') === ''){
      if(val === '1' && apl_type === 'Individual'){
        //$('#share_capital_chk').attr('checked','checked');
        $('input[name="share_capital"]').val('100,000');
        $('input[name="Company_Type__c"]').val('FZE');

        $('input[name="ind_val_p_sha[]"]').attr('readonly', false);
        $('input[name="ind_val_p_sha[]"]').val('1,000');
        $('input[name="ind_num_o_sha[]"]').val('100');
        $('input[name="ind_per_o_sha[]"]').val('100');
        $('input[name="ind_val_of_sha[]"]').val('100,000');

        $('input[name="ind_per_o_sha[]"]').attr('readonly', true);
        $('input[name="ind_num_o_sha[]"]').attr('readonly', true);
        $('input[name="ind_val_p_sha[]"]').attr('readonly', true);
        $('input[name="ind_val_of_sha[]"]').attr('readonly', true);
      }
      else{
        $('input[name="share_capital"]').val('150,000');
        $('input[name="ind_per_o_sha[]"]').attr('readonly', false);
        $('input[name="ind_num_o_sha[]"]').attr('readonly', false);
        $('input[name="ind_val_p_sha[]"]').attr('readonly', false);
        $('input[name="ind_val_of_sha[]"]').attr('readonly', false);

        $('input[name="Company_Type__c"]').val('FZC');

        $('input[name="ind_val_p_sha[]"]').val('1500');
        $('input[name="ind_num_o_sha[]"]').val('');
        $('input[name="ind_per_o_sha[]"]').val('');
        $('input[name="ind_val_of_sha[]"]').val('');
      }
    }
    else{
      $('input[name="ind_num_o_sha[]"]').data('svalue', '');
    }
  });

  $('input[name="ind_per_o_sha[]"]').blur(function(){
    var parent_fs = $(this).parents('fieldset.form-horizontal');
    var value = $(this).val();
    parent_fs.find('input[name="ind_num_o_sha[]"]').val(value);
    parent_fs.find('input[name="ind_val_of_sha[]"]').val(value === '' ? '' : number_format(parseInt(value) * 1500, 2, '.', ','));
    $('input[name="ind_per_o_sha[]"]').attr('disable', true);
    $('input[name="ind_val_of_sha[]"]').attr('disable', true);
  });

  $('input[name="cop_per_o_sha[]"]').blur(function(){
    var parent_fs = $(this).parents('fieldset.form-horizontal');
    parent_fs.find('input[name="cop_val_p_sha[]"]').val(1500);
    var value = $(this).val();
    parent_fs.find('input[name="cop_num_o_sha[]"]').val(value);
    parent_fs.find('input[name="cop_val_of_sha[]"]').val(value === '' ? '' : number_format(parseInt(value) * 1500, 2, '.', ','));
    $('input[name="cop_per_o_sha[]"]').attr('disable', true);
    $('input[name="cop_val_of_sha[]"]').attr('disable', true);
  });

  $('input[name="ind_num_o_sha[]"],input[name="cop_num_o_sha[]"]').blur(function(){
    var total_val = 0;
    $('div[id*="indiv"]:visible input[name="ind_num_o_sha[]"],div[id*="corp"]:visible input[name="cop_num_o_sha[]"]').each(function(){
      var val = parseInt($(this).val());
      if(!isNaN(val)){
        total_val += val;
      }
    });
  });

  $('select[name="question3[part1]"]').change();
  $('select[name="question3[part2]"]').change();

  $('input[name="ind_sh_fpo[]"]').click(function(){
    if($(this).val() === 'Yes' && $(this).is(':checked')){
      $('input[name="pic_sh_fpo"]').removeClass('checkme');
    }
    else{
      $('input[name="pic_sh_fpo"]').addClass('checkme');
    }
  });

  $('input.datepicker').datepicker({
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
  }).on('hide', function(){
    $('input.datepicker').blur();
  });

  $("#msform").validate();

  $("input.next").click(function(){
    $('.merror').hide();
    current_fs = $(this).parent();
    if(!validate()){
      return false;
    }
    $.post('licapp/initform?la_name=' + la_name, $('#msform').serialize(), function(res){
      if(res.status === 'success'){
        la_name = res.la_name;
      }
    });
    next_fs = $(this).parent().next();
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset.steps").index(next_fs)).addClass("active");
    //show the next fieldset
    next_fs.show();
    current_fs.hide();
  });

  $("input.previous").click(function(){
    $('.merror').hide();
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset.steps").index(current_fs)).removeClass("active");
    //show the previous fieldset
    previous_fs.show();
    current_fs.hide();
  });

  $(".submit").click(function(e){
    $('input[name="Total_Pages__c"]').val(total_pages);
    e.preventDefault();
    if(!developing && !$('#must_agree').is(':checked')){
      alert("You must agree to terms and conditions");
      return false;
    }
    var link = $(this).data('link');
    $.post('licapp/initform?la_name=' + la_name, $('#msform').serialize(), function(response){
      if(response.status === 'success'){
        location.href = link;
      }
    });
    return false;
  });
});