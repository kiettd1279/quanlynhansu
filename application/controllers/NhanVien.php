<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'UploadHandler.php';
class NhanVien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('NhanVien_model');
		$ketqua =$this->NhanVien_model->getAllData();
		$ketqua  = array('mangketqua' => $ketqua);

		$this->load->view('NhanVien_view', $ketqua, FALSE);

	}
	// sửa nhân viên
	public function sua_NhanVien($idnhanvao)
	{
		$this->load->model('NhanVien_model');
		$ketqua=$this->NhanVien_model->getDataById($idnhanvao);
		$ketqua = array('mangdulieu' => $ketqua );
		$this->load->view('NhanVien_edit', $ketqua, FALSE);
	}
	// update du lieu khi sửa thông tin
	public function NhanVien_update()
	{
		$id = $this->input->post('id');
		$ten =$this->input->post('ten');
		$tuoi =$this->input->post('tuoi');
		$sdt =$this->input->post('sdt');
		$linkFB =$this->input->post('linkFB');
		$sodonhang =$this->input->post('sodonhang');
		

		// xy ly anh
		$target_dir = "uploadfile/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// // Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  //  echo "Sorry, your file was not uploaded.";
		
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		      //  echo "Thành công : ". basename( $_FILES["anhavatar"]["name"]);
		    } else {
		        echo "Lỗi upload";
		    }
		}
		$anhavatar =	basename( $_FILES["anhavatar"]["name"]) ;
		if ($anhavatar) {
		// Nếu có upload ảnh gán $anhavatar =
			$anhavatar =base_url()."uploadfile/".basename( $_FILES["anhavatar"]["name"]) ;
		}else{
		// Nếu không upload gọi hidden
			$anhavatar =$this->input->post('anhavatar2');
		}
		$this->load->model('NhanVien_model');

		if($this->NhanVien_model->updateById($id,$ten,$tuoi,$sdt,$anhavatar,$linkFB,$sodonhang)){
			$this->load->model('NhanVien_model');
			$ketqua =$this->NhanVien_model->getAllData();
			$ketqua  = array('mangketqua' => $ketqua);

			$this->load->view('NhanVien_view', $ketqua, FALSE);

		}else{
			echo "không thành công";
		}

		
	}


	// xóa nhân viên
	public function xoa_NhanVien($idnhanvao)
	{
		$this->load->model('NhanVien_model');
		if( $this->NhanVien_model->deleteById($idnhanvao)){
			echo "xóa thành công";
		}else{
			echo "xóa thất bại";
		}
	}

	public function NhanVien_add()
	{
		// xy ly anh

		$target_dir = "uploadfile/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// // Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		      //  echo "Thành công : ". basename( $_FILES["anhavatar"]["name"]);
		    } else {
		        echo "Lỗi upload";
		    }
		}
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sdt = $this->input->post('sdt');
		$linkFB = $this->input->post('linkFB');
		$sodonhang = $this->input->post('sodonhang');
		$anhavatar =base_url()."uploadfile/".basename( $_FILES["anhavatar"]["name"]) ;


		//load model goi ham insertData ->mysql
		$this->load->model('NhanVien_model');
		$trangthai =$this->NhanVien_model->inserDataToMySQL($ten,$tuoi,$sdt,$anhavatar,$linkFB,$sodonhang);
		if ($trangthai) {
			$this->load->view('ThanhCong');

		}else{
			echo "chèn thất bại";
		}
	}
	// add xu ly bằng ajax 
	public function ajax_add()
	{
		$id = $this->input->post('id');
		$ten =$this->input->post('ten');
		$tuoi =$this->input->post('tuoi');
		$sdt =$this->input->post('sdt');
		$linkFB =$this->input->post('linkFB');
		$sodonhang =$this->input->post('sodonhang');
		$anhavatar =$this->input->post('tenfile');
		$this->load->model('NhanVien_model');
		$trangthai =$this->NhanVien_model->inserDataToMySQL($ten,$tuoi,$sdt,$anhavatar,$linkFB,$sodonhang);
		if ($trangthai) {
			echo "Thành công";

		}else{
			echo "chèn thất bại";
		}

	}
	public function uploadfile()
	{
		$uploadfile =new UploadHandler();
	}
}

/* End of file NhanVien.php */
/* Location: ./application/controllers/NhanVien.php */