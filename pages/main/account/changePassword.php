<?php
$ID_ThanhVien = $_SESSION['ID_ThanhVien'];
$sql_Cus = "SELECT * FROM thanhvien WHERE ID_ThanhVien = $ID_ThanhVien LIMIT 1";
$query_Cus = mysqli_query($mysqli, $sql_Cus);
$row = mysqli_fetch_array($query_Cus);
if (isset($_POST['sua']) && $_POST['old-password'] != "" && $_POST['new-password'] != "" && $_POST['new-password-repeat'] != "") {
  $oldPassword = md5($_POST['old-password']);
  $newPassword = md5($_POST['new-password']);
  $newPasswordRepeat = md5($_POST['new-password-repeat']);
  $MatKhau = $row['MatKhau'];
  if ($oldPassword != $MatKhau)
    echo "<script>alert(\"Mật khẩu không chính xác!\")</script>";
  else if ($newPassword != $newPasswordRepeat)
    echo "<script>alert(\"Mật khẩu không trùng khớp!\")</script>";
  else {
    $sql_add = "UPDATE thanhvien set MatKhau='" . $newPassword . "' WHERE ID_ThanhVien= '$ID_ThanhVien'";
    mysqli_query($mysqli, $sql_add);
    echo "<script>alert(\"Đổi mật khẩu thành công!\")</script>";
  }
}
?>
<div class="container mt-60">
  <div class="card bg-light pt-3 pb-3">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title text-center">Đổi mật khẩu</h4>
      <form action="" method="POST">
        <label style="padding-top: 10px;" for="password">Mật khẩu cũ</label><br>
        <input class="border rounded" type="password" name="old-password" required style="width: 220px;"><br>
        <label style="padding-top: 10px;" for="password-repeat">Mật khẩu mới</label><br>
        <input class="border rounded" type="password" name="new-password" required style="width: 220px;"><br>
        <label style="padding-top: 10px;" for="password-repeat">Nhập lại mật khẩu</label></br>
        <input class="border rounded" type="password" name="new-password-repeat" required style="width: 220px;"></br>
        <input type="submit" class="btn btn-danger btn-block mt-3" name="sua" value="Xác nhận">
      </form>
    </article>
  </div>
</div>