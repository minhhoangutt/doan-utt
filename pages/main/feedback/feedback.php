
<?php
// nhận dữ liệu từ người dùng
if (isset($_POST['submit'])) {
  $hoten = $_POST['Hoten'];
  $email = $_POST['Email'];
  $sdt = $_POST['Sdt'];
  $chude = $_POST['Chude'];
  $noidung = $_POST['Noidung'];
  $ngaytao = date("Y-m-d H:i:s");
  $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
  if (isset($_POST['submit']) && $_POST['Hoten'] != "" && $_POST['Email'] != "" && $_POST['Sdt'] != "" && $_POST['Chude'] != "" && $_POST['Noidung'] != "" ) {
     if (!preg_match($partten, $email))
      $checkFeedback = "Email bạn vừa nhập không hợp lệ";
    else if (!preg_match("/^[0-9]{10,12}$/", $sdt))
    $checkFeedback = "Số điện thoại không hợp lệ.";
    else {
      $sql_add = "INSERT INTO phanhoi(Hoten,Email,Sdt,Chude,Noidung,Trangthai,Ngaytao)
      VALUES('" . $hoten . "','" . $email . "','" . $sdt . "','" . $chude . "','" . $noidung . "','0','" . $ngaytao . "')";
      mysqli_query($mysqli, $sql_add);
      $checkFeedback = "Phản hồi thành công";
      
    }
  }
}
?>
<h4 style="padding: 20px 0px 0px 216px;" class="fs-1 text text-danger ">PHẢN HỒI VỚI CỬA HÀNG</h4>
<div class="container" >
	<?php 
	
	if(isset($_SESSION['ID_ThanhVien'])){
		?>

	<form method="post" style="padding-top: 20px;">
	<div class="row">
		<div class="col-md-6">
      <div class="form-group">
			  <input required="true" type="text" class="form-control" id="email" name="Hoten"  placeholder="Nhập họ tên">
			</div>
			<div class="form-group">
			  <input required="true" type="email" class="form-control" id="email"  name="Email" placeholder="Nhập email">
			</div>
			<div class="form-group">
			  <input required="true" type="tel" class="form-control" id="phone"  name="Sdt" placeholder="Nhập sđt">
			</div>
			<div class="form-group">
			  <input required="true" type="text" class="form-control" id="subject_name" name="Chude" placeholder="Nhập chủ đề">
			</div>
			<div class="form-group">
			  <label for="pwd">Nội dung:</label>
			  <textarea class="form-control" rows="3" name="Noidung"></textarea>
			</div>
			<button type="submit" class="btn btn-danger" name="submit">PHẢN HỒI</button>
		</div>
		<div class="col-md-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14899.867849791748!2d105.8619656!3d20.9939614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ada399a028b5%3A0x7e19cdc745b43e46!2sKFC%20TAM%20TRINH!5e0!3m2!1svi!2s!4v1700625563491!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</form>
<?php }
else
{
	?><form method="post" style="padding-top: 20px;">
	<div class="row">
		<div class="col-md-6">
      <div class="form-group">
			  <input required="true" type="text" class="form-control" id="email" name="Hoten"  placeholder="Nhập họ tên">
			</div>
			<div class="form-group">
			  <input required="true" type="email" class="form-control" id="email"  name="Email" placeholder="Nhập email">
			</div>
			<div class="form-group">
			  <input required="true" type="tel" class="form-control" id="phone"  name="Sdt" placeholder="Nhập sđt">
			</div>
			<div class="form-group">
			  <input required="true" type="text" class="form-control" id="subject_name" name="Chude" placeholder="Nhập chủ đề">
			</div>
			<div class="form-group">
			  <label for="pwd">Nội dung:</label>
			  <textarea class="form-control" rows="3" name="Noidung"></textarea>
			</div>
			<button type="submit" class="btn btn-danger" name="submit">PHẢN HỒI</button>
		</div>
		<div class="col-md-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14899.867849791748!2d105.8619656!3d20.9939614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ada399a028b5%3A0x7e19cdc745b43e46!2sKFC%20TAM%20TRINH!5e0!3m2!1svi!2s!4v1700625563491!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</form><?php }?>
</div>