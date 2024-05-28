<?php 
include "./include/bootstrap.php";

if(!isset($_SESSION["user"]) || !in_array($_SESSION["user"]["role"], array("Seller", "Admin"))) {
    redirect("./index.php");
}

?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Skapa annons</title>
          
            <link rel="stylesheet" href="css/index.css">
            <link rel="stylesheet" href="css/footer.css">
            <link rel="stylesheet" href="css/index.css">
            <link rel="stylesheet" href="style.css">
      </head>

      <body class="inter-500">
            <?php include "header.php"; ?>

            <div class="center">
                  <form name="createadform" action="trycreatead.php" method="post">
                        <p>
                              <label for="rubrik">Rubrik:</label>
                              <input type="text" name="title" id="rubrik" placeholder="Skriv in en rubrik"> <br>

                              <label for="price">Pris:</label>
                              <input type="number" name="price" id="price" placeholder="$XXX"> <br>

                              <label for="beskrivning">Beskrivning:</label>
                              <textarea type="text" name="description" id="beskrivning"
                                    placeholder="Beskriv det som du vill sälja"></textarea>
                              <br>

                              <label for="category">Kategori:</label>
                              <select name="category" id="category">
                                    <option value="Sittmöbler">Sittmöbler</option>
                                    <option value="Bord">Bord</option>
                                    <option value="Sängar">Sängar</option>
                                    <option value="Förvaring">Förvaring</option>
                                    <option value="Utemöbler">Utemöbler</option>
                                    <option value="Övrigt">Övrigt</option>
                              </select>

                              <label for="bild">Lägg till en bild:</label>
                              <input type="hidden" name="img_url" id="bild" />
                              <iframe src="uploadImage.php">
                                    iframe funkar inte. L
                              </iframe> </br>

                              <label for="adress">Stad:</label>
                              <input type="text" name="city" id="adress" placeholder="Vart finns din vara?"><br>

                              <input type="submit" value="Skapa annons"><br>
                        </p>
                  </form>
            </div>

      </body>
      <script>

            function onImgUpload(img) {
                  console.log("img", img)
                  document.getElementById("bild").value = img
            }
      </script>

      </html>