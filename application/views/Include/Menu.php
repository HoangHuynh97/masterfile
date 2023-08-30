<div class="container--menu">
	<div class="container--menu-banner">
		<div class="container--menu-banner-logo margin-bottom-20px">
			<div class="logo"><img src="<?=base_url("assets/images/masterfile.png")?>"></div>
		</div>
		<div class="container--menu-banner-title">Master File</div>
		<div class="container--menu-banner-social margin-top-10px margin-bottom-10px">
			<a href="https://www.youtube.com/channel/UCYUFqf0VJC5q2rVgeZII0MQ" target="_blank">
				<img class="youtube" src="<?=base_url("assets/images/YouTube.png")?>">
			</a>
			<a href="https://t.me/mastergames97" target="_blank">
				<img class="telegram" src="<?=base_url("assets/images/Telegram.png")?>">
			</a>
		</div>
	</div>
	<div class="line-menu"></div>
	<div class="container--menu-action">
		<div class="container--menu-action-box active" onclick="goMenu(); return false;">
			<div class="container--menu-action-box-icon">
				<img src="<?=base_url("assets/images/i-genshin.jpg")?>">
			</div>
			<div class="container--menu-action-box-title">
				Genshin Impact
			</div>
		</div>
		<div class="container--menu-action-box" onclick="goMenu(); return false;">
			<div class="container--menu-action-box-icon">
				<img src="<?=base_url("assets/images/i-honkai.jpg")?>">
			</div>
			<div class="container--menu-action-box-title">
				Honkai Star Rail
			</div>
		</div>
		<div class="container--menu-action-box" onclick="goMenu(); return false;">
			<div class="container--menu-action-box-icon">
				<img src="<?=base_url("assets/images/i-valorant.png")?>">
			</div>
			<div class="container--menu-action-box-title">
				Valorant
			</div>
		</div>
	</div>
	<div class="container--menu-report" onclick="report(); return false;">
		BÁO LINK HỎNG
	</div>
</div>

<script type="text/javascript">
	function report() {
    	Swal.fire({
		  	icon: 'error',
		  	title: 'MỆT',
		  	text: 'Mệt! Không muốn làm!'
		})
	}
	function goMenu() {
    	Swal.fire({
		  	icon: 'error',
		  	title: 'MỆT',
		  	text: 'Mệt! Update sau!'
		})
	}
</script>