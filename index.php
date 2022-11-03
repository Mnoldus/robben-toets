<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <?php
    $naamErr = $EmailErr = "";
    $naam = $Email = "";
    $fields = TRUE;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["naam"])) {
          $naamErr = "Name is required";
          $fields = FALSE;
        } else {
          $naam = test_input($_POST["naam"]);
        }
        
        if (empty($_POST["Email"])) {
          $EmailErr = "Email is vereist";
          $fields = FALSE;
        } else {
          $Email = test_input($_POST["Email"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

<h1>Hallo,<?php echo $naam ?></h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
        Naam: <input type="text" placeholder="Naam" name="naam"></input>
        <span class="error">* <?php echo $naamErr;?></span>
        <br><br>
        Email: <input type="text" placeholder="Email" name="email"></input>
        <span class="error">* <?php echo $EmailErr;?></span>
        <br><br>

        <div class="gender">
        Geslacht <input type="checkbox" onclick="veranderKleur('#FF0000');" ondblclick="wit()">ander</input>
                <input type="checkbox" onclick="veranderKleur('#87CEEB');" ondblclick="wit()">M</input>
                <input type="checkbox" onclick="veranderKleur('#EA899A');" ondblclick="wit()">V</input>
        </div>
                Wilt u beoordelen: <input type="checkbox" id="myCheck" onclick="myFunction()">

        <button>Sumbit</button>
        
    <div id="text" style="display:none">
        Beoordeling:
        <input type="checkbox"><img class="smiley" src="donker groen face trans.png"></input>
        <input type="checkbox"><img class="smiley" src="groen face trans.png"></input>
        <input type="checkbox"><img class="smiley" src="geel face trans.png"></input>
        <input type="checkbox"><img class="smiley" src="oranje face trans.png"></input>
        <input type="checkbox"><img class="smiley" src="Rood face trans.png"></input>
    </div>
    </form>
    
    <script>
        function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

function veranderKleur(kleur) {
                document.body.style.background = kleur;
            }
        
            function wit () {
                document.body.style.backgroundColor="#e9d8a6"
            }

    </script>
</body>
</html>