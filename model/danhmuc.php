<?php 
   
    function load_all_danhmuc(){
        $sql="select * from danhmuc";
        return pdo_query($sql);
    }
      

    function add_danhmuc($tendm){
        $sql = "insert into danhmuc values(null,'$tendm')";
        pdo_execute($sql);
    }
    function getone_danhmuc($iddm){
        $sql="select * from danhmuc where id=$iddm";
        $result = pdo_query_one($sql);
        return $result;
    }
    function update_danhmuc($iddm, $tendm){
        $sql="update danhmuc set ten_danhmuc='$tendm' where id=$iddm";
        pdo_execute($sql);
    }
    function delete_danhmuc($iddm) {
        $sql="delete from danhmuc where id=$iddm";
        pdo_execute($sql);
    }
?>