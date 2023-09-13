<?php echo loadHeader(); ?>
<body class="container--page">
	<div id="particles-js"></div>
	<div class="container--body" style="padding: 10px; overflow: auto;">
		<div style="width: 100%; margin: 10px;">
			<div style="width: 100%; text-align: center;">
				==================EVENT==================
			</div>
			<div style="display: flex; align-items: center; justify-content: center;">
				<span>Limit Key</span>
				<input type="text" id="input_limitkey" value="<?=$dataSetting_key?>" autocomplete="off" style="margin: 0px 10px;">
				<div style="background: #f00; padding: 5px 10px; border-radius: 5px; color: #fff;" onclick="changeInput('key'); return false;">OK</div>
			</div>
			<div style="display: flex; align-items: center; justify-content: center; margin-top: 10px;">
				<span>Limit Date</span>
				<input type="text" id="input_limitdate" value="<?=$dataSetting_date?>" autocomplete="off" style="margin: 0px 10px;">
				<div style="background: #f00; padding: 5px 10px; border-radius: 5px; color: #fff;" onclick="changeInput('date'); return false;">OK</div>
			</div>
			<div style="display: flex; align-items: center; justify-content: center; margin-top: 10px;">
				<span>Limit Spin</span>
				<input type="text" id="input_limitspin" value="<?=$dataSetting_spin?>" autocomplete="off" style="margin: 0px 10px;">
				<div style="background: #f00; padding: 5px 10px; border-radius: 5px; color: #fff;" onclick="changeInput('spin'); return false;">OK</div>
			</div>
			<div style="width: 100%; text-align: center;">
				=========================================
			</div>
		</div>
		<button style="margin: 10px;" class="btn btn-primary" onclick="showModal(); return false;">Thêm mới</button>
		<button style="margin: 10px;" class="btn btn-primary" onclick="getDataSql(); return false;">Tải data</button>
		<div class="container--content-file-title" style="margin: 10px;">
			Danh sách dữ liệu
		</div>
		<table class="table" style="margin: 10px; width: calc(100% - 20px);">
			<thead>
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Name</th>
					<th>Count</th>
					<th>Link ads</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dataResult as $key => $value) { ?>
					<tr>
						<td><?=$value['ID']?></td>
						<td><?=$value['date_create']?></td>
						<td><?=$value['name']?></td>
						<td><?=$value['count']?></td>
						<td><?=$value['link_ads']?></td>
						<td>
							<button class="btn btn-primary" onclick="showModalEdit(<?=$value['ID']?>); return false;">Sửa</button>
							<button class="btn btn-danger" onclick="deleteRow(<?=$value['ID']?>); return false;">Xóa</button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

<div class="modal" id="addModal" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" style="color: #fff">Thêm mới</h5>
      		</div>
	      	<div class="modal-body">
	        	<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Key</span>
				  	<input id="keySecurity" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Game</span>
				  	<input id="game" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Tên file</span>
				  	<input id="name" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link Ảnh</span>
				  	<input id="image" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Lượt tải</span>
				  	<input id="count" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link ads</span>
				  	<input id="link_ads" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link no ads</span>
				  	<input id="link_noads" type="text" class="form-control">
				</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-primary" onclick="saveAjax(); return false;">Save</button>
	      	</div>
    	</div>
  	</div>
</div>


<div class="modal" id="editModal" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" style="color: #fff">Sửa</h5>
      		</div>
	      	<div class="modal-body">
	        	<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Key</span>
				  	<input id="keySecurityedit" type="text" class="form-control">
				  	<input id="idedit" style="display: none;" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Game</span>
				  	<input id="gameedit" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Tên file</span>
				  	<input id="nameedit" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link Ảnh</span>
				  	<input id="imageedit" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link ads</span>
				  	<input id="link_adsedit" type="text" class="form-control">
				</div>
				<div class="input-group mb-3" style="margin-top: 15px;">
				  	<span class="input-group-text" id="inputGroup-sizing-default">Link no ads</span>
				  	<input id="link_noadsedit" type="text" class="form-control">
				</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-primary" onclick="editAjax(); return false;">Save</button>
	      	</div>
    	</div>
  	</div>
</div>
<script type="text/javascript">
	function showModal() {
		$('#addModal').modal('show');
	}

	function saveAjax() {
		$.ajax({
	        url: "<?=base_url()?>home/saveData",
	        type: 'POST',
	        dataType: 'html',
	        data: {
	            keySecurity: $('#keySecurity').val(),
	            game: $('#game').val(),
	            name: $('#name').val(),
	            image: $('#image').val(),
	            count: $('#count').val(),
	            link_ads: $('#link_ads').val(),
	            link_noads: $('#link_noads').val()
	        }
	    }).done(function(r) {
	    	Swal.fire({
		        icon: 'success',
		        title: 'Ok',
		        text: 'Run!'
		    })
	    });
	}

	function showModalEdit(id) {
		$.ajax({
	        url: "<?=base_url()?>adminh/showModalEdit",
	        type: 'POST',
	        dataType: 'html',
	        data: {
	            id: id
	        }
	    }).done(function(r) {
	    	r = JSON.parse(r);
	        $('#idedit').val(r.id);
	        $('#gameedit').val(r.game);
	        $('#nameedit').val(r.name);
	        $('#imageedit').val(r.image);
	        $('#link_adsedit').val(r.link_ads);
	        $('#link_noadsedit').val(r.link_noads);
	        $('#editModal').modal('show');
	    });
	}

	function editAjax() {
		$.ajax({
	        url: "<?=base_url()?>adminh/editData",
	        type: 'POST',
	        dataType: 'html',
	        data: {
	        	id: $('#idedit').val(),
	            keySecurity: $('#keySecurityedit').val(),
	            game: $('#gameedit').val(),
	            name: $('#nameedit').val(),
	            image: $('#imageedit').val(),
	            link_ads: $('#link_adsedit').val(),
	            link_noads: $('#link_noadsedit').val()
	        }
	    }).done(function(r) {
	    	Swal.fire({
		        icon: 'success',
		        title: 'Ok',
		        text: 'Run!'
		    })
	    });
	}

	function deleteRow(id) {
		$.ajax({
	        url: "<?=base_url()?>adminh/deleteRow",
	        type: 'POST',
	        dataType: 'html',
	        data: {
	        	id: id
	        }
	    }).done(function(r) {
	    	Swal.fire({
		        icon: 'success',
		        title: 'Ok',
		        text: 'Run!'
		    })
	    });
	}

	function getDataSql() {
		$.ajax({
	        url: "<?=base_url()?>adminh/getDataSql",
	        type: 'POST',
	        dataType: 'html',
	        data: {}
	    }).done(function(r) {
	    	Swal.fire({
		        icon: 'success',
		        title: 'Ok',
		        text: 'Run!'
		    })
	    });
	}

	function changeInput(type) {
		if(type == 'key') {
			$.ajax({
		        url: "<?=base_url()?>adminh/changeInput",
		        type: 'POST',
		        dataType: 'html',
		        data: {key_val: 'key', val: $('#input_limitkey').val()}
		    }).done(function(r) {
		    	Swal.fire({
			        icon: 'success',
			        title: 'Ok',
			        text: 'Run!'
			    })
		    });
		} else if(type == 'date') {
			$.ajax({
		        url: "<?=base_url()?>adminh/changeInput",
		        type: 'POST',
		        dataType: 'html',
		        data: {key_val: 'date', val: $('#input_limitdate').val()}
		    }).done(function(r) {
		    	Swal.fire({
			        icon: 'success',
			        title: 'Ok',
			        text: 'Run!'
			    })
		    });
		} else if(type == 'spin') {
			$.ajax({
		        url: "<?=base_url()?>adminh/changeInput",
		        type: 'POST',
		        dataType: 'html',
		        data: {key_val: 'spin', val: $('#input_limitspin').val()}
		    }).done(function(r) {
		    	Swal.fire({
			        icon: 'success',
			        title: 'Ok',
			        text: 'Run!'
			    })
		    });
		}
	}
</script>
<?php echo loadFooter(); ?>