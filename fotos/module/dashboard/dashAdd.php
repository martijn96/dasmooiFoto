<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Foto toevoegen
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
<!--      <form class="form-horizontal">-->
      <?php
      // Create database connection
      $db = mysqli_connect("localhost", "root", "root", "progesh");

      // Initialize message variable
      $msg = "";

      // If upload button is clicked ...
      if (isset($_POST['upload'])) {
          // Get image name
          $image = $_FILES['image']['name'];
          // Get text

          //description
          $image_text = mysqli_real_escape_string($db, $_POST['Beschrijving']);
          $title = mysqli_real_escape_string($db, $_POST['Titel']);
          $category = mysqli_real_escape_string($db, $_POST['Categorie']);
          $inShowroom = mysqli_real_escape_string($db, $_POST['showroom']);
          $target = "undefined";
          // image file directory
          switch ($category){
              case "Kasten":
                  $target = "/fotos/assets/img/projects/kasten/".basename($image);

                  break;
              case "Tafels":
                  $target = "/fotos/assets/img/projects/tafels/".basename($image);

                  break;
              case "Tuinmeubelen":
                  $target = "/fotos/assets/img/projects/tuinmeubelen/".basename($image);

                  break;
              case "Bloembakken":
                  $target = "/fotos/assets/img/projects/bloembakken/".basename($image);

                  break;
              case "Diversen":
                  $target = "/fotos/assets/img/projects/diversen/".basename($image);

                  break;
              default:
                  $target = "undefined";
                  break;
          }



          $sql = "INSERT INTO image_upload (image, image_text, title, category, inShowroom) VALUES ('$target', '$image_text', '$title','$category', '$inShowroom')";
          // execute query
          mysqli_query($db, $sql);


          $target_dir = $target;
          $target_file = $target_dir . basename($_FILES["image"]["name"]);

//          echo "<pre>";
//          var_dump($_FILES["image"]["tmp_name"]);
//            var_dump($category);
//            var_dump($target);
//          echo "</pre>";


          if (move_uploaded_file($_FILES["image"]["tmp_name"], ".".$target)) {
              echo "<pre> Het bestand: ". basename( $_FILES["image"]["name"]). " is opgeslagen!</pre>";
          }

      }
      ?>

          <form class="form-horizontal" method="POST" action="home.php?action=dashAdd" enctype="multipart/form-data">

          <fieldset>

              <!-- Text input-->
              <div class="form-group">
                  <label class="col-md-4 control-label" for="Titel">Titel</label>
                  <div class="col-md-4">
                      <input id="Titel" name="Titel" type="text" placeholder="Titel" class="form-control input-md" required="">
                      <span class="help-block">Unieke beschrijving</span>
                  </div>
              </div>

              <!-- File Button -->
              <div class="form-group">
                  <label class="col-md-4 control-label" for="Foto">Foto</label>
                  <div class="col-md-4">
                      <input id="image" name="image" class="input-file" type="file" required="">
                  </div>
              </div>

              <!-- Multiple Radios (inline) -->
              <div class="form-group">
                  <label class="col-md-4 control-label" for="Categorie">Categorie</label>
                  <div class="col-md-4">
                      <label class="radio-inline" for="Categorie-0">
                          <input type="radio" name="Categorie" id="Categorie" value="Kasten" checked="checked">
                          Kasten
                      </label>
                      <label class="radio-inline" for="Categorie-1">
                          <input type="radio" name="Categorie" id="Categorie" value="Tafels">
                          Tafels
                      </label>
                      <label class="radio-inline" for="Categorie-2">
                          <input type="radio" name="Categorie" id="Categorie" value="Tuinmeubelen">
                          Tuinmeubelen
                      </label>
                      <label class="radio-inline" for="Categorie-3">
                          <input type="radio" name="Categorie" id="Categorie" value="Bloembakken">
                          Bloembakken
                      </label>
                      <label class="radio-inline" for="Categorie-4">
                          <input type="radio" name="Categorie" id="Categorie" value="Diversen">
                          Diversen
                      </label>
                  </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                  <label class="col-md-4 control-label" for="Beschrijving">Beschrijving</label>
                  <div class="col-md-4">
                      <textarea class="form-control" id="Beschrijving" name="Beschrijving" required=""></textarea>
                  </div>
              </div>

              <!-- Multiple Radios -->
              <div class="form-group">
                  <label class="col-md-4 control-label" for="showroom">In showroom</label>
                  <div class="col-md-4">
                      <div class="radio">
                          <label for="showroom-0">
                              <input type="radio" name="showroom" id="showroom-0" value="1" checked="checked" required="">
                              Ja
                          </label>
                      </div>
                      <div class="radio">
                          <label for="showroom-1">
                              <input type="radio" name="showroom" id="showroom-1" value="0">
                              Nee
                          </label>
                      </div>
                  </div>
              </div>

              <!-- Button -->
              <div class="form-group">
                  <label class="col-md-4 control-label" for="Opslaan"></label>
                  <div class="col-md-4">
                      <button id="Opslaan" type="submit" name="upload" class="btn btn-success">Opslaan</button>
                  </div>
              </div>

          </fieldset>
      </form>




<!--      <!DOCTYPE html>-->
<!--      <html>-->
<!--      <head>-->
<!--          <title>Image Upload</title>-->
<!--          <style type="text/css">-->
<!--              #content{-->
<!--                  width: 50%;-->
<!--                  margin: 20px auto;-->
<!--                  border: 1px solid #cbcbcb;-->
<!--              }-->
<!--              form{-->
<!--                  width: 50%;-->
<!--                  margin: 20px auto;-->
<!--              }-->
<!--              form div{-->
<!--                  margin-top: 5px;-->
<!--              }-->
<!--              #img_div{-->
<!--                  width: 80%;-->
<!--                  padding: 5px;-->
<!--                  margin: 15px auto;-->
<!--                  border: 1px solid #cbcbcb;-->
<!--              }-->
<!--              #img_div:after{-->
<!--                  content: "";-->
<!--                  display: block;-->
<!--                  clear: both;-->
<!--              }-->
<!--              img{-->
<!--                  float: left;-->
<!--                  margin: 5px;-->
<!--                  width: 300px;-->
<!--                  height: 140px;-->
<!--              }-->
<!--          </style>-->
<!--      </head>-->
<!--      <body>-->
<!--      <div id="content">-->
<!--          --><?php
//          while ($row = mysqli_fetch_array($result)) {
//              echo "<div id='img_div'>";
//              echo "<img src='images/".$row['image']."' >";
//              echo "<p>".$row['image_text']."</p>";
//              echo "</div>";
//          }
//          ?>
<!--          <form method="POST" action="dashAdd.php" enctype="multipart/form-data">-->
<!--              <input type="hidden" name="size" value="1000000">-->
<!--              <div>-->
<!--                  <input type="file" name="image">-->
<!--              </div>-->
<!--              <div>-->
<!--      <textarea-->
<!--              id="text"-->
<!--              cols="40"-->
<!--              rows="4"-->
<!--              name="image_text"-->
<!--              placeholder="Say something about this image..."></textarea>-->
<!--              </div>-->
<!--              <div>-->
<!--                  <button type="submit" name="upload">POST</button>-->
<!--              </div>-->
<!--          </form>-->
<!--      </div>-->
<!--      </body>-->
<!--      </html>-->

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->