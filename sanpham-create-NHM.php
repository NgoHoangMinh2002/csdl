<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thông tin sản phẩm</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
        include("ketnoi.php");
        $sql_pb_NHM = "SELECT * FROM danhmuc_NHM WHERE 1=1";
        $res_pb_NHM = $conn_NHM->query($sql_pb_NHM);
      
        $error_message_NHM ="";
        if(isset($_POST["btnSubmit_NHM"])){
            // lấy dữ liệu trên form
            $SPID_NHM = $_POST["SPID_NHM"];
            $TENSP_NHM = $_POST["TENSP_NHM"];
            $SOLUONG_NHM = $_POST["SOLUONG_NHM"];
            $GIAMUA_NHM = $_POST["GIAMUA_NHM"];
            $GIABAN_NHM = $_POST["GIABAN_NHM"];
            $TRANGTHAI_NHM = $_POST["TRANGTHAI_NHM"];
            $MADM_NHM = $_POST["MADM_NHM"];
            //kiểm trả khóa chính không được trùng
            $sql_check_NHM = "SELECT SPID_NHM FROM SANPHAM_NHM WHERE SPID_NHM = 'SPID_NHM' ";
            $res_check_NHM = $conn_NHM->query($sql_check_NHM);
            if($res_check_NHM->num_rows>0){
                $error_message_NHM="Lỗi trùng khóa chính.";
            }
            $sql_insert_NHM = "INSERT INTO `sanpham_NHM` (`SPID_NHM`, `TENSP_NHM`, `SOLUONG_NHM`,`GIAMUA_NHM`, `GIABAN_NHM`, `TRANGTHAI_NHM`, `MADM_NHM`)";
            $sql_insert_NHM.="VALUES ('$SPID_NHM','$TENSP_NHM','$SOLUONG_NHM','$GIAMUA_NHM','$GIABAN_NHM','$TRANGTHAI_NHM','$MADM_NHM');";
            if($conn_NHM->query($sql_insert_NHM)){
                   header("Location: sanpham-list-NHM.php"); 
            }else{
                $error_message_NHM="Lỗi thêm mới". mysqli_error($conn_NHM);
            }
        }
        ?>
    <section class="container">
        <h1>Thêm mới thông tin sản phẩm</h1>
        <form name="frm_NHM" method="post" action="">
            <table border="1" width="100%" cellspacing="5" cellpadding="5">
                <tbody>
                    <tr>
                        <td>Mã</td>
                        <td>
                            <input type="text" name="SPID_NHM" id="SPID_NHM">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>
                            <input type="text" name="TENSP_NHM" id="TENSP_NHM">
                        </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <input type="text" name="SOLUONG_NHM" id="SOLUONG_NHM">
                        </td>
                    </tr>
                    <tr>
                        <td>Giá bán</td>
                        <td>
                            <input type="text" name="GIABAN_NHM" id="GIABAN_NHM">
                        </td>
                    </tr>
                    <tr>
                        <td>Giá mua</td>
                        <td>
                            <input type="text" name="GIAMUA_NHM" id="GIAMUA_NHM">
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <select name="TRANGTHAI_NHM" >
                                <option value="1" selected>Hoạt động</option>
                                <option value="0" selected>Không hoạt động</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mã loại</td>
                        <td>
                            <select name="MADM_NHM" id="MADM_NHM">
                                <?php
                                    while($row = $res_pb_NHM->fetch_array()):        
                                ?>
                                <option value="<?php echo $row["MADM_NHM"]?>">
                                    <?php echo $row["TENDM_NHM"]?>
                                </option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Thêm" name="btnSubmit_NHM">
                            <input type="reset" value="Làm lại" name="btnReset_NHM">
                        </td>
                    </tr>
                </tbody>
            </table>    
            <div>
                <?php echo $error_message_NHM;?>
            </div>
        </form>
        <a href="sanpham-list-NHM.php">Danh sách nhân viên</a>
    </section>
</body>
</html>