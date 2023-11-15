<?php 
   
    function load_all_danhmuc(){
        $sql="select * from danhmuc";
        return pdo_query($sql);
    }
?>