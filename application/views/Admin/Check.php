<?php echo loadHeader(); ?>
<body class="container--page">
	<div id="particles-js"></div>
	<div class="container--body" style="display: flex; align-items: center; justify-content: center;">
		<form action="<?=base_url('/adminh')?>" method="POST">
	      	<div style="width: 500px; display: flex; flex-direction: column;">
	      		<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Key</span>
				  	<input name="keySecurity" type="text" class="form-control" autocomplete="off">
				</div>
	        	<button type="submit" class="btn btn-primary">Kiểm tra</button>
	      	</div>
	    </form>
	</div>
</body>
<script type="text/javascript">
</script>
<?php echo loadFooter(); ?>