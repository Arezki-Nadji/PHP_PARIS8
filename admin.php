<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Admin</title>
</head>
<body>
<?php
// connect to database
session_start();
// si la session existe pas soit si l'on est pas connecté on redirige
$con = mysqli_connect('localhost','root','Tnlvk0oIyc3wx8Qk');
mysqli_select_db($con, 'pagination_paris_8');
if(!isset($_SESSION['user'])){
  if(!isset($_SESSION['user'])){
          header('Location:index.php');
          die();
      }
      ?>
</ul>

<?php }else{ ?>
  <ul class='nav-bar'>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/index.php">Home</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/LireRecursDir.php">Lecture de fichier recursive</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/admin.php">Administrateur</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="deconnexion.php">Deconnexion</a></li>
</ul>
<?php } ?>

<div class='upload'>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Selectionner une image afin de la copier:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</div>
<?php
// connect to database
$con = mysqli_connect('localhost','root','Tnlvk0oIyc3wx8Qk');
mysqli_select_db($con, 'pagination_paris_8');

// Definir le nombre de résultat voulu par page
$results_per_page =6 ;

// Nombre total de résultat dans la base de données
$sql='SELECT * FROM pagination';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);

// Determiner le nombre de page affichabe
$number_of_pages = ceil($number_of_results/$results_per_page);

// Determiner sur quel page est l'utilisateur acctuelement
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// Determiner le nombre de résultat afficher par page
$this_page_first_result = ($page-1)*$results_per_page;

// Récupération des résultat dans la base de données 
$sql='SELECT * FROM pagination LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);
echo "<div class='wrapper'>";
while($row = mysqli_fetch_array($result)) {
  echo "<div><img class='imagin' src='".$row['name']."' title ='".$row['name']."'><br><a href=\"delete.php?id=".$row['id']."\" onClick=\"return confirm('Vous voulez vraiment supprimer l'image?')\">
  Supprimer</a><br></div>";
}
// Affichage des liens 
echo "</div>";
echo "<div class='pagination'>";
$prec =0;
$last =0;
function get_current_page()
{

  if(isset($_GET['page'])) {
    return $_GET['page'];
}
else {
    return 0;
}
}
if(get_current_page()>1){
  $prec = get_current_page();
  $prec--;  
echo '<a href="admin.php?page=' . $prec. '">  <<    </a>';
}else{
  echo '<a href="admin.php?page=' . $prec . '">      </a>';
}
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="admin.php?page=' . $page . '">  ' . $page . '    </a>';
  $last =$page;
}
if(get_current_page()<$number_of_pages){
  $last = get_current_page();
  $last++;  
  echo '<a href="admin.php?page=' . $last. '">  >>    </a>';
}else{
  echo '<a href="admin.php?page=' . $last. '">      </a>';
}
echo "</div>";
?>
</body>
</html>