<?php
    $db_hostname = 'localhost';
    $db_database = 'dev_220';
    $db_username = 'root';
    $db_password = 'root';

    $connect = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connection Successfull";

    function selectCmsBlocks ($connect, $blockId) {
        $sql = "SELECT content FROM cms_block WHERE block_id = {$blockId}";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row['content'];
            }
        } else {
            echo "Query fetch 0 results";
        }
    }
