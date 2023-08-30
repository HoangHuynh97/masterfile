<?php echo loadHeader(); ?>
<body class="container--page">
	<div id="particles-js"></div>
	<div class="container--body">
		<form action="<?=base_url('/home/saveData')?>" method="POST">
	      	<div class="modal-body">
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Key</span>
				  	<input name="keySecurity" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Game</span>
				  	<input name="game" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Tên file</span>
				  	<input name="name" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link Ảnh</span>
				  	<input name="image" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Lượt tải</span>
				  	<input name="count" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link ads</span>
				  	<input name="link_ads" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link no ads</span>
				  	<input name="link_noads" type="text" class="form-control">
				</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="submit" class="btn btn-primary">Lưu lại</button>
	      	</div>
      	</form>
	</div>
</body>
<script type="text/javascript">
</script>
<?php echo loadFooter(); ?>