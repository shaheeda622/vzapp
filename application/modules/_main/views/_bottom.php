	</div>
</div>
<script type="text/javascript">
window.onload = function () {
	$('.selectpicker').selectpicker({style: 'btn-default form-control'});
  $('input.datepicker').datepicker({
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true,
    orientation: "auto bottom"
  });
	$('input, textarea').placeholder();
	$('.table-striped>tbody>tr:nth-child(odd)').css('background-color','#f9f9f9');
};
</script>
</body>
</html>