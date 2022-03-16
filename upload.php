<?php
// connect to database
$con = mysqli_connect('localhost','root','Tnlvk0oIyc3wx8Qk');
mysqli_select_db($con, 'pagination_paris_8');

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Le fichier est une image - " . $check["mime"] . ".";
    $uploadOk = 1;
    $filetmp = $_FILES["fileToUpload"]["tmp_name"];
    $filename = $_FILES["fileToUpload"]["name"];
    $filetype = $_FILES["fileToUpload"]["type"];
    $filepath = "article_images/".$filename;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }
}
// Vérifier si le fichier existe
if (file_exists($target_file)) {
  echo "Erreur, le fichier existe déja.";
  $uploadOk = 0;
}

// Vérifier la taille du fichier
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Désoler votre fichier est très grand.";
  $uploadOk = 0;
}

// Autoriser que les image
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Error, only JPG, JPEG, PNG & GIF sont les seuls format accepté.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Erreur, Votre fichier n'a pas pu etre copier.";
} else {
  $sql='SELECT * FROM pagination';
  $result = mysqli_query($con, $sql);
  $number_of_results = mysqli_num_rows($result);


  $sql = "INSERT INTO pagination (name, type, size) VALUES (".$number_of_results.", ".$filename.", ".$target_file.")";
  $con->query($sql);
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["tmp_name"])). " Upload à pu se faire Correctement .";
  } else {
    echo "Erreur, nous n'avons pas pu oploader votre fichier.";
  }
}
?>