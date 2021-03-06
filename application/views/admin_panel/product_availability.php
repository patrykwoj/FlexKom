<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h2 class="modal-title">Check product availability</h2>
</div>
<!-- /modal-header -->

<div class="modal-body">
	<div class="input-group stylish-input-group">
		<input type="text" class="form-control" placeholder="Search"
			id="product_availability_input" required> <span
			class="input-group-addon">
			<button type="submit" id="product_availability_search_btn">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</span>
	</div>
</div>
<!-- /modal-body -->

<div class="modal-footer">
	<div id="pa_result"></div>
</div>
<!-- /modal-footer -->

<script>
function ajax_submit(form_data, url, result) {
	$.ajax({
		url: url,
		type: 'POST',
		data: form_data,
		success: function(msg) {
			  var res = $(msg).filter('span.redirect');
              if($(res).html() != null){
                  window.location.replace($(res).html()); 
                  return false;
              }
			$(result).html(msg);
		}
	});
};

$(function() {
	 $("#product_availability_search_btn").click(function(e){
		 ajax_submit(
					form_data = {
						product_name: $('#product_availability_input').val()},
						"<?php echo site_url('admin_panel/product_availability/getByName'); ?>",
						'#pa_result'
				);
				return false; 
		 });
});
</script>

