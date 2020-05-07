<!DOCTYPE html>
<html lang="en"><head>
	<title> Nhân Viên </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src=" <?php echo base_url() ?>vendor/bootstrap.js"></script>
	<!-- Jquery upload flie -->
	<script type="text/javascript" src=" <?php echo base_url() ?>jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src=" <?php echo base_url() ?>jQuery-File-Upload/js/jquery.fileupload.js"></script>
	
	
	
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
 		<div class="container">
 			<div class="text-xs-center">
 				<h3 class="display-3"> Danh Sách Nhân Sự</h3>
 			</div>
 		</div>
 		<div class="container">
 			<div class="row">
 				
 				<div class="card-deck-wrapper">
 					<div class="card-deck">
 			
 					<?php foreach($mangketqua as $values): ?>
 					<div class="col-sm-4">
 					<div class="card">
 						<img class="card-img-top img-fluid" src="<?php echo $values['anhavatar'] ?>" alt="Card img">
 						<div class="card-block">
 							<h4 class="card-title"><?php echo $values['ten'] ?></h4>
 							<p class="card-text tuoi">Tuổi : <?php echo $values['tuoi'] ?></p>
 							<p class="card-text sdt"> SDT : <?php echo $values['sdt'] ?></p>
 							<p class="card-text sodonhang"> <?php echo $values['sodonhang'] ?></p>

 							<p class="card-text FB"> <small><a href="<?php echo $values['linkFB'] ?>"  class="btn btn-primary btn-x">Facebook   <i class="fa fa-facebook" aria-hidden="true"></i></a></small></p>

 							<p class="card-text FB"> 

 								<small><a href="<?php echo base_url()?>index.php/NhanVien/sua_NhanVien/<?php echo $values['id'] ?>"  class="btn btn-warning btn-x">Chính sửa  <i class="fa fa-times" aria-hidden="true"></i></a></small>

 								<small><a href="<?php echo base_url()?>index.php/NhanVien/xoa_NhanVien/<?php echo $values['id'] ?>"  class="btn btn-outline-danger btn-x">Xóa  <i class="fa fa-times" aria-hidden="true"></i></a></small>
 							
								
							</p>
						
 						</div>
 					</div>
 					</div>	
 					<?php endforeach ?>
 					
 						
 					</div>
 				</div>	
 		
 		</div>	

 		</br>
 			
		<div class="container">
	 		<div class="text-xs-center">
	 			<h3 class="display-3"> Them Nhan vien</h3>
	 		</div>
	 	</div>

<!-- start Form -->
		<!-- <form action="<?= base_url();?>index.php/NhanVien/NhanVien_add" enctype="multipart/form-data" method="post" accept-charset="utf-8"> -->
			<div class="form-group row">
				
				<div class="col-sm-6">
					<div class="row">
							<label for="anh" class="col-sm-4 form-control-label text-xs-right">Anh dai dien</label>
						<div class="col-sm-8">
							<input name="files[]" id="anhavatar" type="file" class="form-control" placeholder="Upload anh">
						</div>
					</div>
				</div>

			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Số đơn hàng</label>
					<div class="col-sm-8">
						<input name="sodonhang" id="sodonhang" type="number" class="form-control" placeholder="vd 25 đơn">
					</div>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Tên</label>
					<div class="col-sm-8">
						<input name="ten" id="ten" type="text" class="form-control" placeholder="vd Võ Văn Kiệt">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Số điện thoại</label>
					<div class="col-sm-8">
						<input name="sdt" id="sdt" type="text" class="form-control" placeholder="vd 0367203822">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Tuổi</label>
					<div class="col-sm-8">
						<input name="tuoi" id="tuoi" type="number" class="form-control" placeholder="vd 22">
					</div>
				</div>
			</div>	
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Link facebook</label>
					<div class="col-sm-8">
						<input name="linkFB" id="linkFB" type="text" class="form-control" placeholder="vd 22">
					</div>
				</div>
			</div>	
		</div>

			<div class="form-group row text-xs-center">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="button"  class="btn btn-outline-success nutxulyajax" placeholder="Upload anh" >Them moi</button>
					<button type="reset" class="btn btn-outline-success" placeholder="Upload anh">Reset</button>
				</div>
			</div>

		<!-- </form> -->
 				
 	</div>
 	<script >
 		duongdan = '<?php echo base_url()?>';
 		$('#anhavatar').fileupload({
 			url :duongdan +'index.php/NhanVien/uploadfile',
 			dataType:'json',
 			done: function (e, data) {
 				$.each(data.result.files, function (index,file) {
 				tenfile = file.url;
 				});
 			}
 		})

 		$('.nutxulyajax').click(function(event) {
 			$.ajax({
	 			url: 'NhanVien/ajax_add',
	 			type: 'POST',
	 			dataType: 'json',
	 			data: {
	 				ten: $('#ten').val(),
	 				tuoi: $('#tuoi').val(),
	 				sdt: $('#sdt').val(),
	 				anhavatar: tenfile,
	 				linkFB: $('#linkFB').val(),
	 				sodonhang: $('#sodonhang').val()
	 				
	 			
 				
	 			},
	 		})
	 		.done(function() {
	 			console.log("success");
	 		})
	 		.fail(function() {
	 			console.log("error");
	 		})
	 		.always(function() {
	 			console.log("complete");
	 			noidung='<div class="col-sm-4">';
	 			noidung+='<div class="card">';
	 			noidung+='<img class="card-img-top img-fluid" src="'+tenfile+'">';
	 			noidung+='<div class="card-block">';
	 			noidung+='<h4 class="card-title">'+ $('#ten').val()+ '</h4>';
	 			noidung+='<p class="card-text tuoi">Tuổi :'+ $('#tuoi').val()+ '</p>';
	 			noidung+='<p class="card-text sdt"> SDT : '+ $('#sdt').val()+ '</p>';
	 			noidung+='<p class="card-text sodonhang"> '+ $('#sodonhang').val()+ '</p>';
	 			noidung+='<p class="card-text FB"> <small><a href="'+ $('#linkFB').val()+ '"  class="btn btn-primary btn-x">Facebook   <i class="fa fa-facebook" aria-hidden="true"></i></a></small></p>';
	 			noidung+='<p class="card-text FB">';
	 			noidung+='<small><a href="<?php echo base_url()?>index.php/NhanVien/sua_NhanVien/<?php echo $values['id'] ?>"  class="btn btn-warning btn-x">Chính sửa  <i class="fa fa-times" aria-hidden="true"></i></a></small>';
	 			noidung+='<small><a href="<?php echo base_url()?>index.php/NhanVien/xoa_NhanVien/<?php echo $values['id'] ?>"  class="btn btn-outline-danger btn-x">Xóa  <i class="fa fa-times" aria-hidden="true"></i></a></small>';
	 			noidung+='</p>';
	 			noidung+='</div>';
	 			noidung+='</div>';
	 			noidung+='</div>';

	 			$('.card-deck').append(noidung);
	 		});
	 		});

 		
 		
 	</script>
</html>