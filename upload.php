<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Le fichier est une image - " . $check["mime"] . ".";
    $uploadOk = 1;
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
if ($_FILES["fileToUpload"]["size"] > 1500000) {
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
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " Upload à pu se faire Correctement .";
  } else {
    echo "Erreur, nous n'avos pas pu oploader votre fichier.";
  }
}
?>