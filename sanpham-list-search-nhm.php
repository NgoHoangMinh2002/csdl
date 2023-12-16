<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DS</title>
</head>
<body>
    <?php 
        include("ketnoi.php");
        $sql_NHM = "SELECT * FROM SPID_NHM WHERE 1=1 ";
        if(isset($_GET["btnSearch"])){
            $keyword = $_GET["keyword"];
            if(isset($keyword)){
                $sql_NHM .=" and TENSP_NHM like '%$keyword%'";
            }
        }
        $result_NHM = $conn_NHM->query($sql_NHM);


    ?>
    <section>
        <h1>DS</h1>
        <hr/>
        <form action="" method="get">
            <div>
                <label for="keyword">Tên sản phẩm</label>
                <input type="search" name="keyword" value="" id="keyword" placeholder="Nhập tên cần tìm..."/>
                <input type="submit" name="btnSearch" value="Tìm kiếm" />
            </div>
        </form>
        <table width="100%" border="1px">
            <thead>
                <tr>
                <th>STT</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                    <th>Trạng thái</th>
                    <th>Mã loại</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($result_NHM->num_rows>0){
                        $stt=0;
                        while($row_NHM=$result_NHM->fetch_array()):
                            $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $row_NHM["SPID_NHM"]; ?></td>
                        <td><?php echo $row_NHM["TENSP_NHM"]; ?></td>
                        <td><?php echo $row_NHM["SOLUONG_NHM"]; ?></td>
                        <td><?php echo $row_NHM["GIAMUA_NHM"] ?></td>
                        <td><?php echo $row_NHM["GIABAN_NHM"]; ?></td>
                        <td><?php echo $row_NHM["TRANGTHAI_NHM"]; ?></td>
                        <td><?php echo $row_NHM["MADM_NHM"]; ?></td>
                        <td>
                            <a href="sanpham-edit-NHM.php?SPID_NHM=<?php echo $row_NHM["SPID_NHM"];?>">
                                Sửa
                            </a>
                            |
                            <a href="sanpham-list-NHM.php?SPID_NHM=<?php echo $row_NHM["SPID_NHM"];?>"
                                onclick="if(confirm('Bạn có muốn xóa không')){return true;}else{return false;}">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php 
                        endwhile;
                    }else{
                ?>
                    <tr>
                        <td colspan="9">Chưa có dữ liệu</td>
                    </tr>
                <?php
                    };
                ?>
            </tbody>
        </table>
    </section>

    <?php 
        if(isset($_GET["SPID_NHM"])){
            $SPID_NHM = $_GET["SPID_NHM"];
            $sql_delete_NHM = "DELETE FROM PRODUCT_NHM WHERE SPID_NHM='$SPID_NHM'";
            if($conn_NHM->query($sql_delete_NHM)){
                header("Location:sanpham-list-NHM.php");
            }else{
                echo "<script> alert('lỗi xóa'); </script>";
            }
        }
    ?>
</body>
</html>