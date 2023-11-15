<?php
    function load_all_size(){
        $sql="select * from size";
        return pdo_query($sql);
    }
    function load_all_color(){
        $sql="select * from mau";
        return pdo_query($sql);
    }



?>