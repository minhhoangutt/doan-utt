<?php
    include("config/connection.php");
    $sql_CountFeedback=mysqli_query($mysqli,"SELECT * FROM phanhoi WHERE Trangthai= '1'");
    $CountFeedback= mysqli_num_rows($sql_CountFeedback);
    $sql_CountFeedback1=mysqli_query($mysqli,"SELECT * FROM phanhoi WHERE Trangthai= '0'");
    $CountFeedback1= mysqli_num_rows($sql_CountFeedback1);
    
    
?>
<div class="card">
        <div class="card-header font-weight-bold">
            PHẢN HỒI
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    while($row=mysqli_fetch_array( $sql_CountFeedback1)){
                    $i++;?>
                    <tr>
                        <th scope="row"><?php echo $i?></th>
                        
                        <td>
                            <?php echo $row['Hoten']?>
                        </td>
                        <td><?php echo $row['Email']?></td>
                        <td><?php echo $row['Sdt']?></a></td>
                        <td><?php echo $row['Chude']?></td>
                        <td><?php echo $row['Noidung']?></td>
                        <td><?php echo $row['Ngaytao']?></td>
                        <td>
                            <a href="modules/manage_feedbacks/change.php?id=<?php echo $row['Id']?>" class="btn btn-danger btn-sm text-white" type="button" data-toggle="tooltip" data-placement="top">Đã xem</a>
                            
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>