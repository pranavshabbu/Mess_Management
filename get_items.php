<?php
include("connection.php");

if (isset($_POST['category'])) {
    $category = $_POST['category'];
    
    $query = "select item from $category"; 
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $options = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $item = $row['item'];
            $options .= "<option value='$item'>$item</option>";
        }
        echo $options;
    } else {
        echo "<option>No items found</option>";
    }
} else {
    echo "<option>Error: No category selected</option>";
}
?>