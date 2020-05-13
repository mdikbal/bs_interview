<?php
    include('db_connection_open.php');
    include('child_categories.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainstation Practical Test</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <?php
    $connection = connection_open();
    $sql = "SELECT * FROM category";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $cate_data = [];
        while($row = $result->fetch_assoc()) {
            $row['child_info'] = categoryChild($row['Id'], $connection);
            $row['all_child'] = '';
            $cate_data[] = $row;
        }




        dd($cate_data);

    } else {
        echo "no data found in database";
    }
    $connection->close();
    ?>
</body>
</html>