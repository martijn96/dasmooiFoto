<?php
/**
 * Created by PhpStorm.
 * User: martijnmostert
 * Date: 30/09/2018
 * Time: 23:49
 */

      if (isset($_POST['Titel'])) {
//          var_dump($_POST);
          $db = mysqli_connect("localhost", "root", "root", "progesh");
          $image_text = mysqli_real_escape_string($db, $_POST['Beschrijving']);
          $title = mysqli_real_escape_string($db, $_POST['Titel']);
          $category = mysqli_real_escape_string($db, $_POST['Categorie']);
          $inShowroom = mysqli_real_escape_string($db, $_POST['showroom']);
          $id = mysqli_real_escape_string($db, $_POST['id-form']);
          $sql = "UPDATE image_upload SET image_text ='" . $image_text . "', title ='" . $title . "', category ='" . $category . "', inShowroom=" . $inShowroom . " WHERE id=" . $id ;
          // execute query
          mysqli_query($db, $sql);
          $error = mysqli_error($db);

//          echo ($error);
//          header("Refresh:0");
          header("Refresh:0; url=/dasmooiFoto/fotos/home.php?action=".$category);
echo"<script type=\"text/javascript\">location.href = 'dasmooiFoto/fotos/home.php?action=".$category.";</script> ";
      }

if (isset($_POST['form-image'])) {

    $db = mysqli_connect("localhost", "root", "root", "progesh");
    $id = mysqli_real_escape_string($db, $_POST['id-form-del']);
    $category = mysqli_real_escape_string($db, $_POST['form-cat']);
    $image = mysqli_real_escape_string($db, $_POST['form-image']);
    $image = ".".$image;
    $file = '../../'.$_POST['form-image'];
//    echo"<pre>";
//    var_dump($_POST);
//    var_dump($file);
//
//    get working dir:
//    echo getcwd() . "\n";
//
//    /dasmooiFoto/fotos/assets/img/projects/tafels/Schermafbeelding.png"
//    /pplications/MAMP/htdocs/dasmooiFoto/fotos/module/dashboard
//
//    echo"</pre>";
        if (file_exists($file)) {
            unlink($file);
        } else {
            print_r("file not deleted");
        }


    //$sql = "DELETE FROM image_upload WHERE id=" . $id ;
    // execute query
    //mysqli_query($db, $sql);
    //$error = mysqli_error($db);

//          echo ($error);
//          header("Refresh:0");
    header("Refresh:0; url=/dasmooiFoto/fotos/home.php?action=".$category);
    echo"<script type=\"text/javascript\">location.href = 'dasmooiFoto/fotos/home.php?action=".$category.";</script> ";
}

      ?>

