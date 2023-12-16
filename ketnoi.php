<?php
     $conn_NHM = new mysqli("localhost","root","","database/csdl-ngohoangminh.sql");
     if(!$conn_NHM){
        echo "<h2> Lỗi: ". mysqli_error($conn_NHM). "</h2>";
     }else{
        echo "<h2>Xin chào ,Minh Ngo-2210900037 </h2>";
     }
     ?>