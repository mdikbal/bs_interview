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
    $sql = "SELECT categoryId,(
        SELECT NAME FROM category WHERE category.Id=categoryId) AS category_name,COUNT(item.Id) AS total_products FROM `item_category_relations` LEFT JOIN item ON item_category_relations.ItemNumber=item.Number WHERE categoryId !=0 GROUP BY categoryId ORDER BY COUNT(item.Id) DESC";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        ?>
        <table>
            <tr>
                <th>Category Name</th>
                <th>Total Items</th>
            </tr>
        
        <?php
        while($row = $result->fetch_assoc()) {

            ?>
                <tr>
                    <td><?php echo $row['category_name']?></td>
                    <td><?php echo $row['total_products']?></td>
                </tr>
            <?php
                
        }
        ?>
        </table>
        <?php
    } else {
        echo "no data found in database";
    }
    $connection->close();
    ?>
</body>
</html>