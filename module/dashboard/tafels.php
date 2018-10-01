<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Foto's - Tafels
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <script type="text/javascript">
        function index(){
            document.getElementById("id-form").value = document.getElementById('id').value;
            document.getElementById("id-form-del").value = document.getElementById('id').value;

            document.getElementById("Titel").value = document.getElementById('naam').value;
            document.getElementById("Beschrijving").value = document.getElementById('text').value;
//            if(document.getElementById("inShowroom").value == 1){ document.getElementById('showroom').value = };
            document.getElementById("form-cat").value = document.getElementById('cat').value;


        }
    </script>
    <div class="row">
        <?php
        error_reporting(E_ALL);
        $db = mysqli_connect("localhost", "root", "root", "progesh");

        $result = mysqli_query($db, "SELECT * FROM image_upload where category = 'Tafels'");

        while ($row = mysqli_fetch_array($result)) {
            echo "<div id='img_div' style='float: left;width: 200px;padding: 10px;display: inline-table;'>";
            echo "<img style='width: 200px' src='/dasmooiFoto".$row['image']."' >";
            echo"</br>";
            echo "<p>Naam: ".$row['title']."</p>";
            echo "<p>Beschr: ".$row['image_text']."</p>";
            echo "<p>Showroom: ".$row['inShowroom']."</p>";
            echo "<input type='hidden' id='id' name='id' value='". $row['id']."'>";
            echo "<input type='hidden' id='naam' name='naam' value='". $row['title']."'>";
            echo "<input type='hidden' id='text' name='text' value='". $row['image_text']."'>";
            echo "<input type='hidden' id='cat' name='cat' value='". $row['category']."'>";
            echo "<input type='hidden' id='showroom' name='showroom' value='". $row['inShowroom']."'>";
            ?>
            <button style="float: left" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit" onclick="index();">
                Aanpassen
            </button>
            <button style="float:right;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" onclick="index();">
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

                        <form class="form-horizontal" method="POST" action="/dasmooiFoto/module/dashboard/controller.php" enctype="multipart/form-data">

                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="Titel">Titel</label>
                                    <div class="col-md-4">
                                        <input id="Titel" name="Titel" type="text" placeholder="Titel" class="form-control input-md" required="">
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
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
                            <input type="hidden" id='id-form' name='id-form'>
                            <button id="Opslaan" type="submit" name="upload" class="btn btn-success">Opslaan</button>
                            </form>

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
                        <form class="form-horizontal" method="POST" action="/dasmooiFoto/module/dashboard/controller.php" enctype="multipart/form-data">

                        <input type='hidden' id='form-cat' name='form-cat'>
                            <input type='hidden' id='id-form-del' name='id-form-del'>

                        <button style="float: left" type="submit" class="btn btn-danger" data-dismiss="modal">Verwijderen</button>
                        <button style="float: right;" type="button" class="btn btn-primary" data-dismiss="modal">Annuleren</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

