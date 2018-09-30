<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Foto's - Tuinmeubelen
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
      <?php
      $db = mysqli_connect("localhost", "root", "root", "progesh");

      $result = mysqli_query($db, "SELECT * FROM image_upload where category = 'Tuinmeubelen'");

      while ($row = mysqli_fetch_array($result)) {
          echo "<div id='img_div' style='float: left;width: 250px;padding: 10px;'>";
          echo "<img style='width: 250px' src='/dasmooiFoto".$row['image']."' >";
          echo "<p>Naam: ".$row['image_text']."</p>";
          ?>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
              Aanpassen
          </button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
              Verwijderen
          </button>
          <?
          echo "</div>";
      }
      ?>
      <!-- The Modal -->
<div class="modal" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Foto aanpassen</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


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
              </fieldset>
          </form>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <div class="form-group">
                  <button id="Opslaan" type="submit" name="upload" class="btn btn-success">Opslaan</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>

          </div>
      </div>

    </div>
  </div>
</div>


      <!-- The Modal -->
      <div class="modal" id="delete">
          <div class="modal-dialog">
              <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                      <h4 class="modal-title">Foto verwijderen</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      Weet je zeker dat je deze foto wil verwijderen?
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button style="float: left" type="button" class="btn btn-danger" data-dismiss="modal">Verwijderen</button>
                      <button style="float: right;" type="button" class="btn btn-primary" data-dismiss="modal">Annuleren</button>

                  </div>

              </div>
          </div>
      </div>

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

