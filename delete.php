<?php
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM pagination WHERE id=:id";
$query = $bdd->prepare($sql);
$query->execute(array(':id' => $id));

function get_current_page()
{

  if(isset($_GET['page'])) {
    return $_GET['page'];
}
else {
    return 0;
}
}
//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>