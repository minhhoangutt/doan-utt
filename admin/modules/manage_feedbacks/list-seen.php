<?php
    $query_feedback = mysqli_query($mysqli,"SELECT * FROM phanhoi where Trangthai='1' order by Id DESC");
?>

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Lịch sử phản hồi</h5>
        </div>
     
          
    <table class="table table-striped table-checkall">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Email</th>
                <th scope="col">SDT</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ngày tạo</th>
                
            </tr>
        </thead>
        <tbody>
           <?php 
          
           $num=0;
           while( $row_Feedback=mysqli_fetch_array($query_feedback)){
           
            $num++;
            ?>
            <tr>
                <td><?php echo $num ?></td>
                <td><?php echo $row_Feedback['Hoten']?></td>
                <td><?php echo $row_Feedback['Email']?></td>
                <td><?php echo $row_Feedback['Sdt']?></td>
                <td><?php echo $row_Feedback['Chude']?></td>
                <td><?php echo $row_Feedback['Noidung']?></td>
                <td><?php echo $row_Feedback['Ngaytao']?></td>
                
            </tr>
        <?php
        }
       
        ?>
        <tr>
            <th colspan="2">Số phản hồi đã xem: <?= $num ?></th>
           
        </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>