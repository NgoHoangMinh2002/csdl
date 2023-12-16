<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
        include("ketnoi.php");
        $sql_NHM = "SELECT * FROM sanpham_NHM WHERE 1=1";
        $result_NHM = $conn_NHM->query($sql_NHM);
        //Duyệt và hiển thị kết quả -> tbody
    ?>
    <section class="container">
        <h1>Danh sách sản phẩm</h1>
        <hr/>
        <a href="sanpham-create-NHM.php" class="btn">Thêm mới sản phẩm</a>
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
                        while($row_NHM = $result_NHM->fetch_array()):
                        $stt++;
                ?>
                <tr>
                    <td><?php echo $stt;?></td>
                    <td><?php echo $row_NHM["SPID_NHM"];?></td>
                    <td><?php echo $row_NHM["TENSP_NHM"];?></td>
                    <td><?php echo $row_NHM["SOLUONG_NHM"];?></td>
                    <td><?php echo $row_NHM["GIAMUA_NHM"];?></td>
                    <td><?php echo $row_NHM["GIABAN_NHM"];?></td>
                    <td><?php echo $row_NHM["TRANGTHAI_NHM"];?></td>
                    <td><?php echo $row_NHM["MADM"];?></td>
                    <td>
                        <a href="sanpham-edit-NHM.php?spid_NHM=<?php echo $row_NHM["SPID_NHM"];?>">Sửa</a>|
                        <a href="sanpham-list-NHM.php?spid_NHM=<?php echo $row_NHM["SPID_NHM"];?>">Xóa</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                }
                ?>
            </tbody>
        </table>
        <a href="sanpham-create-NHM.php" class="btn">Thêm mới sản phẩm</a>
    </section>
    <?php
        if(isset($_GET["spid_NHM"])){
            $proid_NHM = $_GET["spid_NHM"];
            $sql_delete_NHM = "DELETE FROM SANPHAM_NHM where SPID_NHM='$spid_NHM'";
            if($conn_NHM->query($sql_delete_NHM)){
                header("Location:sanpham-list-NHM.php");
            }else{
                echo "<script> alert('lỗi xóa'; </script>";
            }
        }
    ?>
</body>
</html>