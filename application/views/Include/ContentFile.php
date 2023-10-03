<div class="container--content">
	<div class="container--content-search">
		<div class="container--content-search-box">
			<div class="container--content-search-box-icon">
				<i class="fa-solid fa-magnifying-glass"></i>
			</div>
			<div class="container--content-search-box-input">
				<input type="text" id="key_search" placeholder="Tìm kiếm theo tên game, tên file,..." onchange="changeKey(); return false;">
			</div>
		</div>
	</div>
	<div class="container--content-file">
		<div class="content-search hide">
			<div class="container--content-file-title">
				Kết quả tìm kiếm
			</div>
			<div class="add-result"></div>
		</div>
		<div class="content-detail hide">
			<div class="call-back" onclick="callBack(); return false;">
				<<< Quay lại
			</div>
			<div class="container--content-file-title text-center">
				title
			</div>
			<div class="content-detail-box">
				<div onclick="checkClick('no-ads'); return false;">
					<a class="content-detail-box-ads no-ads" href="" target="_blank">
						<div class="container--content-file-c-box-detail">
							<div class="container--content-file-c-relative">
								<div class="container--content-file-c-box-img">
									<img src="">
								</div>
								<div class="container--content-file-c-box-title">
									<div class="__title-game">Genshin Impact</div>
									<div class="__title-file">Teleport điểm dịch chuyển</div>
									<div class="__title-group">
										<div class="__title-date">#29-08-2023</div>
										<div class="__title-count"><i class="fa-regular fa-circle-down"></i> <span class="__title-count-js"></span></div>
									</div>
								</div>
							</div>
							<div class="title-ads">Không có quảng cáo</div>
						</div>
					</a>
				</div>
				<div onclick="checkClick('ads'); return false;">
					<a class="content-detail-box-ads ads" href="" target="_blank">
						<div class="container--content-file-c-box-detail">
							<div class="container--content-file-c-relative">
								<div class="container--content-file-c-box-img">
									<img src="">
								</div>
								<div class="container--content-file-c-box-title">
									<div class="__title-game">Genshin Impact</div>
									<div class="__title-file">Teleport điểm dịch chuyển</div>
									<div class="__title-group">
										<div class="__title-date">#29-08-2023</div>
										<div class="__title-count"><i class="fa-regular fa-circle-down"></i> <span class="__title-count-js"></span></div>
									</div>
								</div>
							</div>
							<div class="title-ads">Có quảng cáo</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="content-file">
			<div class="container--content-file-title">
				Mới cập nhật
			</div>
			<div class="relative">
				<div class="prev-slide"><i class="fa-solid fa-caret-left"></i></div>
				<div class="next-slide"><i class="fa-solid fa-caret-right"></i></div>
				<div class="container--content-file-c">
					<?php foreach ($dataResult as $key => $value) { ?>
					<div class="container--content-file-c-box" onclick="get_link(<?=$value['ID']?>); return false;">
						<div class="container--content-file-c-relative">
							<div class="container--content-file-c-box-img">
								<img src="<?=base_url($value['image'])?>">
							</div>
							<div class="container--content-file-c-box-title">
								<div class="__title-game"><?=$value['game']?></div>
								<div class="__title-file"><?=$value['name']?></div>
								<div class="__title-group">
									<div class="__title-date">#<?=$value['date_create']?></div>
									<div class="__title-count"><i class="fa-regular fa-circle-down"></i> <?=$value['count']?></div>
								</div>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="container--content-file-title margin-top-30px margin-bottom-20px">
				Tải nhiều nhất
			</div>
			<?php foreach ($dataResultCount as $key => $value) { ?>
			<div class="container--content-file-sort" onclick="get_link(<?=$value['ID']?>); return false;">
				<div class="container--content-file-sort-box">
					<div class="__sort-image">
						<img src="<?=base_url($value['image'])?>">
					</div>
					<div class="__sort-title">
						<?=$value['name']?>
					</div>
					<div class="__sort-date">
						#<?=$value['date_create']?>
					</div>
					<div class="__sort-count">
						<i class="fa-regular fa-circle-down"></i> <?=$value['count']?>
					</div>
					<?php if($value['pin'] == 1) { ?>
						<div class="__sort-action" style="color: #f00;">
							<i class="fa-solid fa-thumbtack"></i>
						</div>
					<?php } else { ?>
						<div class="__sort-action">
							<i class="fa-solid fa-eye"></i>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	var time = 3;
	setInterval(checkTime, 1000);
	function checkTime() {
		time = time - 1;
		if(time == 0) {
			nextSlide();
			time = 3;
		}
	}
	$(".next-slide").click(function(){
		nextSlide();
		time = 3;
	});
	$(".prev-slide").click(function(){
		prevSlide();
		time = 3;
	});
	function nextSlide() {
		$(".container--content-file-c-box:nth-child(1)").appendTo(".container--content-file-c");
	}
	function prevSlide() {
		$(".container--content-file-c-box:nth-child(10)").prependTo(".container--content-file-c");
	}

	function get_link(id) {
		$.ajax({
            url: "<?=base_url()?>home/getView",
            type: 'POST',
            dataType: 'html',
            data: {
                id: id
            }
        }).done(function(r) {
        	r = JSON.parse(r);
            $('.content-detail').find('.container--content-file-title').html(r.name);
            $('.content-detail').find('.container--content-file-c-box-img').html('<img src="<?=base_url()?>'+r.image+'">');
            $('.content-detail').find('.__title-game').html(r.game);
            $('.content-detail').find('.__title-file').html(r.name);
            $('.content-detail').find('.__title-date').html('#'+r.date_create);
            $('.content-detail').find('.__title-count-js').html(r.count);
            $('.content-detail').find('.no-ads').attr('href', r.link_noads);
            $('.content-detail').find('.ads').attr('href', r.link_ads);
            $('.content-file').addClass('hide');
            $('.content-detail').removeClass('hide');
            $('.content-search').addClass('hide');
        });
	}

	function callBack() {
		$('.content-file').removeClass('hide');
        $('.content-detail').addClass('hide');
        $('.content-search').addClass('hide');
	}

	function checkClick(type) {
		if(type == 'ads') {
			Swal.fire({
			  	icon: 'success',
			  	title: 'Quá tuyệt vời!',
			  	text: 'Cảm ơn đã ủng hộ cho mình!',
			  	confirmButtonText: 'Ok',
			}).then((result) => {
			  	if (result.isConfirmed) {
			  		window.open($('.ads').attr('href'), '_blank');
			  	}
			})
		} else {
			Swal.fire({
			  	title: '<strong>LÀM THẬT LUÔN</strong>',
				icon: 'info',
				html: 'Suy nghĩ lại đi mà!',
				showCloseButton: true,
				showCancelButton: true,
				focusConfirm: false,
				confirmButtonText: 'Tiếp tục',
				cancelButtonText: 'Suy nghĩ lại',
			}).then((result) => {
			  	if (result.isConfirmed) {
			    	window.open($('.no-ads').attr('href'), '_blank');
			  	}
			})
		}
	}

	$(document).ready(function(){
	    $('#key_search').val('<?=$search?>');
		changeKey();
	});

	function changeKey() {
		if($('#key_search').val() != '') {
			$.ajax({
	            url: "<?=base_url()?>home/getSearch",
	            type: 'POST',
	            dataType: 'html',
	            data: {
	                key: $('#key_search').val()
	            }
	        }).done(function(r) {
	        	r = JSON.parse(r);
	            var html = '';
	            $.each(r, function( index, value ) {
	  				html += '<div class="container--content-file-sort" onclick="get_link('+value.dataResult.id+'); return false;">\
								<div class="container--content-file-sort-box">\
									<div class="__sort-image">\
										<img src="'+value.dataResult.image+'">\
									</div>\
									<div class="__sort-title">\
										'+value.dataResult.name+'\
									</div>\
									<div class="__sort-date">\
										#'+value.dataResult.date_create+'\
									</div>\
									<div class="__sort-count">\
										<i class="fa-regular fa-circle-down"></i> '+value.dataResult.count+'\
									</div>\
									<div class="__sort-action">\
										<i class="fa-solid fa-eye"></i>\
									</div>\
								</div>\
							</div>';
				});
	            $('.add-result').html(html);

	            $('.content-file').addClass('hide');
		        $('.content-detail').addClass('hide');
		        $('.content-search').removeClass('hide');
	        });
	    } else {
	    	$('.content-file').removeClass('hide');
	        $('.content-detail').addClass('hide');
	        $('.content-search').addClass('hide')
	    }
	}
</script>