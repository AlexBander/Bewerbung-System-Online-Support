<!DOCTYPE html>
<html lang="de">

<?php include 'header.php'; ?>
    <?php
        include 'bewerbung.inc.php';
        if (isset($_GET['get'])){                                                ## Prüfung ob es sich um einen autorisierten Link handelt
           auth($_GET['get']);
            if ($_GET['get']==$_SESSION['gets'])            # Hash für den Bewerbungslinkin PDF bzw. QR-Code auf Brief
            {
                $_SESSION['check']=123456789;               # Interne Validierung,  sollte geändert werden. Belibig
                $_SESSION['get'] = $_GET['get'];
            }
        }

        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Anhänge zu meiner Bewerbung</h3>
                    <hr>
                    <?php if (!isset($_SESSION['check'])): ?>
                        <div class="row">
                            <div class="hidden-xs col-sm-1 col-md-12 col-lg-3">
                                <div><img src="img/post_640.jpg" height="75" width="100" alt="Erklärung"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg12">
                                <div>
                                    <h4>Bewerbung per Post? (Analog Bewerbung)</h4> Sie finden auf meinem Bewerbungsschreiben, am rechten Rand über dem Datum einen BarCode. In diesem ist für die Bewerbung ein einmaliger Web-Link codiert. Dieser führt Sie direkt auf eine Unterseite mit allen zur Bewerbung dazugehörigen Daten und Unterlagen. </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="hidden-xs col-sm-1 col-md-12 col-lg-12">
                                <div> <img src="img/e-mail2_640.jpg" height="75" alt="Bewerbung mit System"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                                <div class="">
                                    <h4>Bewerbung per E-Mail? (Digital Bewerbung)</h4> Sie haben eine Bewerbungs-E-Mail von mir erhalten und wollen nun mehr über mich erfahren. - Kein Problem.
                                    <br>
                                    <br>
                                    <ul>
                                        <li>1. In meiner E-Mail ist ein PDF-Dokument anhängig "Anschr_Bewerbung-A_Boeck.pdf</li>
                                        <li>2. Sie finden in dem Dokument, ganz unten, rechts, eine Webseite mit einem PC-Maus-Symbol</li>
                                        <li>3. Je nach Software und Betriebssystem kann hier direkt auf den Link geklickt werden oder über das Kontext-Menu der Link kopiert und im Web-Browser eingefügt werden.</li>
                                        <li style="text-align: center"> Fertig. Dannach geht es im Bereich "zu meiner Bewerbung" weiter. Vielen Dank.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
            <!-- Auth -->
            <?php if (isset($_SESSION['check'])): ?>
                <div class="container-fluid">
                    <div clas="row">
                        <div class="col-lg-5 col-md-4 col-sm-4"> <img src="unTerLagen/pass.png" height="200px;" />
                            <h2> Herzlich Willkommen </h2>
                            <br>
                            <p>Sie sind nun im Ansicht- und Download-Bereich für die Bewerbungsdokumente</p>
                            <br>
                            <?php
                                 if ($_SESSION['check']==123456789)
                                 {
                                #    include 'bewerbung.inc.php';
                                    if (isset($_REQUEST['nr']))
                                    {
                                            if (isset($_COOKIE['fnr']))
                                            {
                                                $_COOKIE['fnr'] = $_REQUEST['nr']+$_COOKIE['fnr'];
                                                echo $_COOKIE['fnr'];
                                            }
                                    }
                                    else
                                    {
                                        $_COOKIE['fnr']=2;
                                    }

                                    echo "<h4>Liste verfügbarer Dateien: </h4>";
                                                    # Nach diesen Werten wird im Namen der Dateien gesucht
                                    $search     = array(".txt"  ,".pdf"  ,"_"    ,"-"    ,"Max Mustermann"   ,"Zert"         ,   "+");       # Die ersten 4. Ersetzungen sollten immer bestehen beleiben
                                                    # mit diesen Werten wird das ensprechende Pendant ersetzt
                                                    # Beispiel#
                                                    # Datei:    Meine_Bewerbung_Zert-Max_Mustermann.pdf ->
                                                    # Anzeige:  Meine Bewerbung Zertifikat(e)
                                                    # !ACHTUNG!: Auf den Download Namen hat dies keinen Einfluss
                                    $replace    = array(""      ,""      ," "    ,""     ,""                 ,"Zertifikat(e)",   "-");       # beim 5. wenn du deine Dokumente mit Namen versiehst, bitte anpassen. etc.

                                        $filter=array($search,$replace);
            #                            $filter=array(".txt","_");
                                        sfs($_SESSION['get'], $filter, $subfolder);
                                    echo "</div>";
                                        $ordner = $_SESSION['get'];
                                        $dateien = $_SESSION['dateien'][0];
                                        $dateien_length = count($dateien)-1;                                                                      # Ermittlung der Anzahl an Dateien
                                     if(isset($_GET['nr']))
                                     {
                                         $datei = $_GET['nr'];
                                         if (($datei > $dateien_length) &&  ($datei >= 2))
                                         {
                                             $datei = 2;
                                             $_COOKIE['fnr'] = 2;
                                         }
                                         elseif (($_GET['nr'] < 2) && ($datei <= $dateien_length))
                                         {
                                             $datei=$dateien_length;
                                         }
                                     }
                                     else
                                        {
                                            $datei = 2;
                                        }

                                     $datei_up = $datei+1;
                                     $datei_down=$datei-1;

                                    echo "<div class='col-lg-1 hidden-sm hidden-md' style='background-color: azure;; border: 2px inset skyblue; text-align: center; color: white; border-radius: 10%; height=100px;'><a  style='text-decoration: none;' href='".$link.".php?".$methode."=$ordner&nr=$datei_down'><<</a></div>";
                                    echo "<div class='col-lg-1 hidden-sm hidden-md col-xs-0' style='background-color: azure;; border: 2px outset skyblue; text-align: center; color: white; border-radius: 10%; height=100px;'><a  style='text-decoration: none;' href='".$link.".php?".$methode."=$ordner&nr=$datei_up'>>></a></div>";
                                echo "</div>";
                                echo "<div class='col-lg-6 col-md-8 col-sm-8'>";
                                      echo "Datei: $dateien[$datei]";
                                     echo "<object data='$subfolder/$ordner/pdfs/$dateien[$datei]' type='application/pdf' style='width:100%;height:850px'> <a href='$subfolder/$ordner/pdfs/$dateien[$datei]'>PDF laden</a> </object>";
                                }

                           # echo "</div>";
                                ?> </div>
                        <?php endif; ?>
                    </div>
                    <hr>
        <?php include "footer.php"; ?>
    </body>
</html>
