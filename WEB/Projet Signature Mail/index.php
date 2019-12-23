<?php

//@author Ngallouj basé sur un projet Github.
if (!empty($_REQUEST['Sender'])):
    //Stockage des cookie pour la requête
    $sender = $_REQUEST['Sender'];
    $layout = file_get_contents('./SIG/SEE.html', FILE_USE_INCLUDE_PATH);
    $layout1 = file_get_contents('./SIG/GUIL.html', FILE_USE_INCLUDE_PATH);
    $layout2 = file_get_contents('./SIG/SAELEN.html', FILE_USE_INCLUDE_PATH);
    $layout3 = file_get_contents('./SIG/SEEPROD.html', FILE_USE_INCLUDE_PATH);
    $layout4 = file_get_contents('./SIG/TS.html', FILE_USE_INCLUDE_PATH);
    $layout5 = file_get_contents('./SIG/SCH.html', FILE_USE_INCLUDE_PATH);
    
    $nom = $POST['Nom'];
    $extension = "@groupesee.com";
    $extension1 ="@guillebert.fr";
    $extension2 = "@salen.fr";
    $extension3 = "@seeprodukition.com";
    $extension4 = "@tsindustries.com";
    $extension5 = "@schliesing.com";
       if(isset($_POST['select']))
    
    {
   
        if($_POST['select'] == 'value2')
        {
            
            //SEE
            $layout = $layout1;
            $extension = $extension1;

        }
        if($_POST['select'] == 'value3') {
        //GUIL
        $layout = $layout2;
        $extension = $extension2;
        echo $nom;
        echo $prenom;
        }
        
        if($_POST['select'] == 'value4') {
        //SAELEN
        $layout = $layout3;
        $extension = $extension3;
        echo $nom;
        echo $prenom;
                                         } 
                                   
        if($_POST['select'] == 'value5') {
        
        //TS INDUS
        $layout = $layout4;
        $extension = $extension4;
        echo $nom;
        echo $prenom;
                                         } 
                                   
        if($_POST['select'] == 'value6') {
        //schliesing
        $layout = $layout5;
        $extension = $extension5;
        $nom = $POST['Nom'];
        $prenom = $POST['Prenom'];
                                         } 
    }
        foreach ($sender as $key => $value) {
        $key         = strtoupper($key);
        $start_if    = strpos($layout, '[[IF-' . $key . ']]');
        $end_if      = strpos($layout, '[[ENDIF-' . $key . ']]');
        $length      = strlen('[[ENDIF-' . $key . ']]');
        if (!empty($value)) {
            //Ajoute la valeur entrer entre les Crochets
            $layout = str_replace('[[IF-' . $key . ']]', '', $layout);
            $layout = str_replace('[[ENDIF-' . $key . ']]', '', $layout);
            $layout = str_replace('[[' . $key . ']]', $value, $layout);
        } elseif (is_numeric($start_if)) {
            // Supprime les crochets si il n'y a pas de valeur
            $layout = str_replace(substr($layout, $start_if, $end_if - $start_if + $length), '', $layout);
        } else {
            $layout = str_replace('[[' . $key . ']]', '', $layout);
        }
    }
    $layout = preg_replace("/\[\[IF-(.*?)\]\]([\s\S]*?)\[\[ENDIF-(.*?)\]\]/u", "", $layout);

    if (!empty($_REQUEST['download'])) {
        header('Content-Description: File Transfer');
        header('Content-Type: text/html');
        header('Content-Disposition: attachment; filename=SEEsignature.htm');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
    }
  echo $layout;
else:

    ?>
    <html lang="fr">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Naïm Gallouj,Julien Guislain-Pawlowski">

        <title>SEE Mail Signature</title>

        <link href="./style.css" rel="stylesheet">


    </head>

    <body>
    <div id="wrap">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="https://julienguislain.files.wordpress.com/2019/11/see-2019v2-inverse-1.png" width="75" height="35"></a>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="page-header">
                <h1>Generate a Signature for your Email !</h1>
            </div>
            <form class="form-horizontal" role="form" method="post" target="preview" id="form">

                <div class="form-group">
                    <label for="Name" class="control-label col-xs-2">Company</label>

                    <div class="col-xs-10">
                        <select name="select" class="form-control" id="selecto">
                            <option value="value1" id="1">SEE</option>
                            <option value="value2" id = "2">Guillebert</option>
                            <option value="value3" id = "3">Saelen</option>
                            <option value="value4" id ="4">SEE Produktion</option>
                            <option value="value5" id ="5">TS-Industrie</option>
                            <option value="value6" id="6">Schliesing</option>
                        </select>
                    </div>
                </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <div class="form-group">
                    <label for="Name" class="control-label col-xs-2">Firstname</label>
      <div class="col-xs-10">
<input type="text"  class="form-control" id="field1" name="Sender[name1]" value="">
</div>
</div>
 <div class="form-group">
                    <label for="Name" class="control-label col-xs-2"> Name</label>
   <div class="col-xs-10">
<p></p><input type="text" onkeyup="this.value = this.value.toUpperCase();" class="form-control" id="field2" name="Sender[name]" value="">
</div>
</div>
 <div class="form-group">
                    <label for="Name" class="control-label col-xs-2"> Email</label>
   <div class="col-xs-10">
<input type="text" onkeyup="this.value = this.value.toLowerCase();" class="form-control" id="result" name="Sender[email]" value="">
    </div>
    </div>
    <script type="text/javascript">
    var a = "groupesee.com";
    var b = "guillebert.fr";
    var c = "@saelen.fr"; 
    var d = "@see-produktion.net;"
    var e = "@ts-industrie.de";
    var g = "@schliesing.net";
    var x;
    
        $("#field1, #field2").keyup(function(){
    update();
});

function update() {
      var a = "@groupesee.com";
    var b = "@guillebert.fr";
    var c = "@saelen.fr"; 
    var d = "@see-produktion.net;"
    var e = "@ts-industrie.de";
    var g = "@schliesing.net";
    var x;
    
     var elt = document.getElementById(selecto);
     if(document.getElementById('selecto').value == "value1") {
     x = a;
   
   } if(document.getElementById('selecto').value == "value2") {
     x = b;
}
    if(document.getElementById('selecto').value == "value3") {
     x = c;
}
 if(document.getElementById('selecto').value == "value4") {
     x = d;
}
 if(document.getElementById('selecto').value == "value5") {
     x = e;
}
 if(document.getElementById('selecto').value == "value6") {
     x = g;
}

  $("#result").val($('#field1').val().substr(0,1).toLowerCase() + $('#field2').val().toLowerCase()+x);
}
    </script>



                <div class="form-group">
                    <label for="Name" class="control-label col-xs-2"> Job</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="POSITION" name="Sender[position]" placeholder="Enter your position" required="true">
                    </div>
                </div>


                <div class="form-group">
                    <label for="Mobile" class="control-label col-xs-2">Phone (Office)</label>
                    <div class="input-group col-xs-10">
                        <input type="phone" class="form-control" id="Mobile1" name="Sender[mobile1]" placeholder="Enter your Phone number" required="true">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Mobile" class="control-label col-xs-2">Mobile / Fax</label>
                    <div class="input-group col-xs-10">
                        <input type="phone" class="form-control" id="Mobile" name="Sender[mobile]" placeholder="Enter your mobile phone number" required="true">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <button id="preview" type="submit" class="btn btn-primary">Preview</button>
                            <button id="download" class="btn btn-default">Download</button>
                            <input type="hidden" name="download" id="will-download" value="">
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center siggy">
                        Preview (Prévisualisation de la Signature)
                    </div>
                </div>
            </div>
           <iframe src="about:blank" name="preview" width="100%" height="300"></iframe> 
        </div>

    </div>

    <div id="footer">
        <div class="container">
            <p class="text-muted credit">Copyright Service Informatique ©2019 GroupeSEE
            </p>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $("#download").bind( "click", function() {
                $('#will-download').val('true');
                $('#form').removeAttr('target').submit();
            });

            $("#preview").bind( "click", function() {
                $('#will-download').val('');
                $('#form').attr('target','preview');
            });

        });
    </script>
    </body>
    </html>
<?php endif;