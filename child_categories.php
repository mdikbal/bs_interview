<?php
// include('db_connection_open.php');
function categoryChild($id, $connection) {
    $sql = "SELECT categoryId FROM catetory_relations WHERE ParentcategoryId = $id";
    // dd($sql);
    $result = $connection->query($sql);
    $children = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $cate_id = $row['categoryId'];
            $sql2 = "SELECT * FROM category WHERE Id = $cate_id";
            $result2 = $connection->query($sql2);
            $children[$row['categoryId']] = $result2->fetch_assoc();
            $children[$row['categoryId']]['child_info'] = categoryChild($row['categoryId'], $connection);
        }
    }
    return $children;
}

?>