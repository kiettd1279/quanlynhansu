<!DOCTYPE html>
<html lang="en"><head>
	<title> Nhân Viên </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src=" <?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
 		<div class="container">
 			<div class="text-xs-center">
 				<h3 class="display-3"> Thay đổi thông tin Nhân sự</h3>
 			</div>
 		</div>

<!-- start Form -->
		<?php foreach($mangdulieu as $values): ?>
		<div class="container">
		<form action="<?= base_url();?>index.php/NhanVien/NhanVien_update" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			<div class="form-group row">
				
				<div class="col-sm-6">
					<div class="row">
							<label for="anh" class="col-sm-4 form-control-label text-xs-right">Anh dai dien</label>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-6">
									<img src="<?= $values['anhavatar'] ?>" class="img-fluid"></img>
								</div>
							</div>
							<input type="hidden" name="id" value="<?= $values['id'] ?>">
							<input type="hidden" name="anhavatar2" value="<?= $values['anhavatar'] ?>">
							<input name="anhavatar" type="file" class="form-control" placeholder="Upload anh">

						</div>
					</div>
				</div>


			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Tên</label>
					<div class="col-sm-8">
						<input name="ten" type="text" class="form-control" value="<?= $values['ten'] ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Số đơn hàng</label>
					<div class="col-sm-8">
						<input name="sodonhang" type="number" class="form-control" value="<?= $values['sodonhang'] ?>">
					</div>
				</div>
			</div>
			
		
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Số điện thoại</label>
					<div class="col-sm-8">
						<input name="sdt" type="text" class="form-control" value="<?= $values['sdt'] ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Tuổi</label>
					<div class="col-sm-8">
						<input name="tuoi" type="number" class="form-control" value="<?= $values['tuoi'] ?>">
					</div>
				</div>
			</div>	
			<div class="col-sm-6">
				<div class="row">
						<label for="anh" class="col-sm-4 form-control-label text-xs-right">Link facebook</label>
					<div class="col-sm-8">
						<input name="linkFB" type="text" class="form-control" value="<?= $values['linkFB'] ?>">
					</div>
				</div>
			</div>	
		</div>

			<div class="form-group row text-xs-center">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit"  class="btn btn-outline-success" placeholder="Upload anh">Lưu thông tin</button>
				
			</div>

		</form>
		</div>		
 				<?php endforeach ?>
 	</div>
</html>