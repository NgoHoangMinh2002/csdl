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
        //đọc dữ liệu cần sửa
        if(isset($_GET["spid_NHM"])){
            //lấy mã nhân viên cần sửa
            $SPID_NHM= $_GET["spid_NHM"];
            //tạo truy vấn đọc dữ liệu từ bảng nhân viên
            $sql_edit_NHM= "SELECT * FROM `sanpham_NHM` WHERE SPID_NHM='$SPID_NHM'";
            // thực thi câu lệnh truy vấn
            $result_edit_NHM = $conn_NHM->query($sql_edit_NHM);
            //đọc bản ghi từ kết quả
            $row_edit_NHM = $result_edit_NHM->fetch_array();
        }else{
            header("Location: sanpham-list-NHM.php");
        }
        //đọc dữ liệu phòng ban
        $sql_pb_NHM = "SELECT * FROM DANHMUC_NHM WHERE 1=1";
        $res_pb_NHM = $conn_NHM->query($sql_pb_NHM);
        // => hiển thị trong điều khiển select
        // Thực hiện thêm dữ liệu
        $error_message_NHM ="";
        if(isset($_POST["btnSubmit_NHM"])){
            // lấy dữ liệu trên form
            $SPID_NHM = $_POST["SPID_NHM"];
            $TENSP_NHM = $_POST["TENSP_NHM"];
            $SOLUONG_NHM = $_POST["SOLUONG_NHM"];
            $GIABAN_NHM = $_POST["GIABAN_NHM"];
            $GIAMUA_NHM = $_POST["GIAMUA_NHM"];
            $TRANGTHAI_NHM = $_POST["TRANGTHAI_NHM"];
            $MADM = $_POST["MADM"];
            $sql_update_NHM= "UPDATE `sanpham_NHM` SET";
            $sql_update_NHM.="TENSP_NHM='$TENSP_NHM',";
            $sql_update_NHM.="SOLUONG_NHM='$SOLUONG_NHM',";
            $sql_update_NHM.="GIABAN_NHM='$GIABAN_NHM',";
            $sql_update_NHM.="GIAMUA_NHM='$GIAMUA_NHM',";
            $sql_update_NHM.="TRANGTHAI_NHM='$TRANGTHAI_NHM',";
            $sql_update_NHM.="MADM='$MADM'";
            $sql_update_NHM.=" WHERE SPID_NHM='$SPID_NHM'";
            if($conn_NHM->query($sql_update_NHM)){
                   header("Location:sanpham-list-NHM.php"); 
            }else{
                $error_message_NHM="Lỗi sửa dữ liệu". mysqli_error($conn_NHM);
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
                            <input type="text" name="SPID_NHM" id="SPID_NHM" readonly
                                value="<?php echo  $row_edit_NHM["SPID_NHM"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>
                            <input type="text" name="TENSP_NHM" id="TENSP_NHM"
                                value="<?php echo  $row_edit_NHM["TENSP_NHM"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <input type="text" name="SOLUONG_NHM" id="SOLUONG_NHM"
                                value="<?php echo  $row_edit_NHM["SOLUONG_NHM"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td>
                        <input type="text" name="GIABAN_NHM" id="GIABAN_NHM"
                                value="<?php echo  $row_edit_NHM["GIABAN_NHM"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td>
                        <input type="text" name="GIAMUA_NHM" id="GIAMUA_NHM"
                                value="<?php echo  $row_edit_NHM["GIAMUA_NHM"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <select name="TRANGTHAI_NHM" >
                                <option value="1" <?php if($row_edit_NHM["TRANGTHAI_NHM"]==1){echo "selected";}?>>Hoạt động</option>
                                <option value="0" <?php if($row_edit_NHM["TRANGTHAI_NHM"]==0){echo "selected";}?>>Không hoạt động</option>
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
                                <option value="<?php echo $row["MADM_NHM"]?>"
                                <?php
                                    if($row["MADM_NHM"]==$row_edit_NHM["MADM_NHM"]){
                                        echo "selected";
                                    }
                                ?>
                                >
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
        <a href="sanpham-list-NHM.php">Danh sách sản phẩm</a>
    </section>
</body>
</html>