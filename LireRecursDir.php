<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Lecture de fichier recurs</title>
</head>
<body>
<?php
// connect to database
session_start();
// si la session existe pas soit si l'on est pas connecté on redirige
$con = mysqli_connect('localhost','root','Tnlvk0oIyc3wx8Qk');
mysqli_select_db($con, 'pagination_paris_8');
if(!isset($_SESSION['user'])){?>
  <ul class='nav-bar'>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/index.php">Home</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/LireRecursDir.php">Lecture de fichier recursive</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/connexion.php">Administrateur</a></li>
</ul>
<?php }else{ ?>
  <ul class='nav-bar'>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/index.php">Home</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/">Lecture de fichier recursive</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="/pagination/admin.php">Administrateur</a></li>
  <li class ='bav-b>r-li'><a  class ='nav-bar-a'href="deconnexion.php">Deconnexion</a></li>
</ul>
<?php } ?>
<?php

//Limite le temps d'exécution du script à 500s
set_time_limit (500);
$path= "docs";

//premier appelle de fonction qui permet de explorer une répertoire
explorerDir($path);

function explorerDir($path)//docs 2 //docs/sub1
{
			
	//path à explorer et l'ouverture du dossier (Parent)  dans notre cas c'est /docs
	$folder = opendir($path);// /docs 2 //docs/sub1
	if ($path == "docs") {
			echo "<img src=./icons/dir-close.gif />".$path."<br>";
			print_files($path);
		}
	//la fonction retour un string ou un false si ya plus de dossier
	while($entree = readdir($folder))// /docs
	{	
		
		
		//on ingore les veleur . et .. qui sont des dossier créer par le system par défault qui permet de naviger via CMD-
		if($entree != "." && $entree != "..")
		{
			$file = $path."/".$entree;
			//on vérifie si le fichier est bien un dossier
			if(is_dir($path."/".$entree)) // /docs/sub1 2 //docs/sub1/sub1_2
			{

				//on sauvgarde le path de notre fichier parent
				$sav_path = $path; // /docs // //docs/sub1
				//on ajoute le nom du dossier fils au chemin
				$path .= "/".$entree; //docs/sub1 //docs/sub1/sub1_2
				//Appelle récursive à la fonction exploreDir avec le nouveau chemin parent/fils	
					
							for($i=0;$i<strlen($path);$i++){
								echo "&nbsp";
							}
							echo "<img src=./icons/dir-close.gif />".$path."<br>";
							print_files($path);
							
						
						
			
				
				explorerDir($path); //docs/sub1 2 //docs/sub1/sub1_2
				
				//On écrase le path avec le path parent original
				$path = $sav_path; // docs // //docs/sub1
				
			}
			else
			{
				
				//Dans ce cas on se retrouve avec un path qui n'est pas un dossier mais un fichier de type docs/fichier.extention
				$path_source = $path."/".$entree;				
				$con = mysqli_connect('localhost','root','Tnlvk0oIyc3wx8Qk');
				mysqli_select_db($con, 'pagination_paris_8');
				$ext = pathinfo($path_source, PATHINFO_EXTENSION);
				list($width, $height, $type, $attr) = getimagesize($path_source);
				$imagesize = $width*$height;
				$sql="SELECT * FROM pagination WHERE name='".$path_source."'";
				$result = mysqli_query($con, $sql);
				$number_of_results = mysqli_num_rows($result);
				if(@is_array(getimagesize($path_source)) and $number_of_results ==0){
   				 $sql = "INSERT INTO pagination (name, type, size) VALUES ('".$path_source."', '".$ext."', '".$imagesize."')";
					$con->query($sql);
   				 //$filesize = getimagesize($path_source);
				}
				
				
  				
				
			}
		}
	}
	closedir($folder);
}
function print_files($path){
	$folder = opendir($path);	
	while($entree = readdir($folder))// /docs
	{	
		
		//on ingore les veleur . et .. qui sont des dossier créer par le system par défault qui permet de naviger via CMD-
		if($entree != "." && $entree != "..")
		{
			$file = $path."/".$entree;
			//on vérifie si le fichier est bien un dossier
			if(!is_dir($path."/".$entree)) // /docs/sub1 2 //docs/sub1/sub1_2
			{
				for($i=0;$i<strlen($path);$i++){
					echo "&nbsp";
				}
				echo "&nbsp&nbsp<img src=./icons/file-none.gif />  ".$entree."<br>";
			}
}}}
?>
</body>
</html>