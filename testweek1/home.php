<?php 
$title="home";
include "layouts/header.php";
include "layouts/nav.php";
if (empty($_SESSION['user'])) {
   header("location:login.php");
  
}
?>
<h1>welcome <?= $_SESSION['user']->name  ?></h1>
<?php 
include "layouts/footer.php";

?>