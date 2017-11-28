<!DOCTYPE html>
<html lang="de">
<?php
        include 'header.php';
        include 'bewerbung.inc.php';
        if (isset($_GET['get']))
        {
            $input = filter_var($_GET['get'], FILTER_SANITIZE_STRING);                          # #6
        }
        if ((!isset($_GET['get'])) || (empty($_GET)))
        {
            flush(); // Flush the buffer
            ob_flush();
            header('Location: index.php');
            die;
        }
        if (isset($input)){                                                                 # Prüfung ob es sich um einen autorisierten Link handelt
           $_SESSION['gets']= auth($_GET['get'], $subfolder);                               # #1
            if (empty($_SESSION['gets']))                                                   # #7 ff
                { // die("Unable to connect to this bad idea");
                    session_destroy();
                    header('Location: index.php');
                    exit;
                }
            if (($_GET['get']==$_SESSION['gets'])&&(!empty($_SESSION['gets'])))             # Hash für den Bewerbungslinkin PDF bzw. QR-Code auf Brief
            {
                $_SESSION['check']=$key;                                                    # Interne Validierung,  sollte geändert werden. Belibig
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
        <?php if ((!isset($_GET['approval']))&&(!isset($_GET['nr']))){$approval=null;}else{$approval=1;}; $session = $_GET['get']; if (isset($_SESSION['check'])): ?>
            <?php if (empty($approval)) : ?>
                <div class="container">
                    <h3>Zugang zu den Bewerbungsunterlagen </h3>
                     <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingrules">
                          <h4 class="panel-title">
                            <a class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#downloadrules" aria-expanded="false" aria-controls="downloadrules">
                              Datenschutz &amp; zulässige Verwendung
                            </a> <span class="glyphicon glyphicon-chevron-down"></span>
                            &emsp;&emsp; | &emsp;&emsp;<a class="btn btn-success" href="bewerbung.php?get=<?php echo $session?>&approval=1"><span class="glyphicon glyphicon-check"></span>  Bestätigen und Kenntnissnahme</a>
                          </h4>
                        </div>
                        <div id="downloadrules" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                           <ul>
                            <li>Die im folgenden aufgeführten Unterlagen, sind Teil eines genormten Bewerbungsprozesses und werden vollumfänglich gem. geltender Bestimmungen, Vorschriften und Gesetze im Gültigkeitsberich der Bundesrepublik Deutschland behandelt, oder werden aussschließlich zu diesem Zwecke Breitgestellt.</li>
                            <li>Die Verwendung ausserhalb eines solchen Bewerbungszweckes sind grundsätlich untersagt.</li>
                            <li>Die Unternehmen verpflichten sich die allg. gültigen Datenschutzbestimmungen anzuerkennen, einzuhalten und durchzusetzen sowie nach Beendigung des Bewerbungsprozessen die Daten unter Wahrung der allg. geltenden Vorschriften und Gesetz zu entsorgen.</li>
                            <li>Die weitergabe der Daten an Dritte ist grundsätzlich unzulässig.</li>
                            <li>Es werden allgemeine unternehmensbezogene Daten erhoben und gespeichert, dem wird ausdrücklich zugestimmt (z.B. IP, Zeit, Eindeutiger Referenz-Link). Keine Personbezogenen.</li>
                            <li>Die Zustimmung dient ausdrücklich nicht dem Zweck einen Vertrag abzuschließen oder der Bestätigung einer Bewerbung.</li>
                            <li>Gemäß der Konfiguration können sowohl Ansicht wie auch Download der Dokumente auf eine Einmalige-Nutzung beschränkt sein.</li>
                           </ul>
                           <a class="btn btn-success text-center" href="bewerbung.php?get=<?php echo $session?>&approval=1"><span class="glyphicon glyphicon-check"></span>  Bestätigen und Kenntnissnahme</a>
                          </div>
                        </div>
                      </div>
                     <object data='read.php' type='application/pdf' style='width:100%;height:0px'></object>
                    </div>
                    <div id="wrap">
                        <div class="container-fluid" id="wrap">
                            <div clas="row" id="cont">
                               <?php endif;?>
               <?php if (!empty($approval)) : ?>
                        <div class="container-fluid">
                            <div clas="row">
                               <?php endif;?>

                                <div class="col-lg-5 col-md-4 col-sm-4"> <img src="<?php echo $subfolder?>/pass.png" height="200px;" />
                                    <h2> Herzlich Willkommen </h2>
                                    <br>
                                    <p>Sie sind nun im Ansicht- und Download-Bereich für die Bewerbungsdokumente</p>
                                    <br>
                                    <!-- Refresh -->
                                    <?php
                                 if ($_SESSION['check']==$key)                                  #1
                                 {

                                     $ordner = $_SESSION['get'];                                #2
                                     include 'counter.inc.php';                                 #2
                                     $counter=counter($subfolder, $ordner, "count.txt");        #2
                                     $counter++;                                                #2
                                     counterSiteUp($subfolder, $ordner,$counter);               #2
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
                                    if (empty($approval))
                                    {
                                        echo "<div clas='hidden-lg hidden-sm hidden-md hidden-xs' id='cont' style='display: none;'>";
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
                                        sfs($_SESSION['get'], $filter, $subfolder);
                                    echo "</div>";
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
                                     if (empty($approval))
                                    {
                                        echo "</div>";
                                    }
                                if ((isset($_GET['approval']))||(isset($_GET['nr'])))
                                {
                                    echo "<div class='col-lg-3 col-sm-4 col-md-4 col-xs-0' style='background-color: azure;; border: 2px inset skyblue; text-align: center; color: white; border-radius: 10%; height=100px;'><a  style='text-decoration: none;' href='".$link.".php?".$methode."=$ordner&nr=$datei_down'><<</a></div>";
                                    echo "<div class='col-lg-3 col-sm-4 col-md-4 col-xs-0' style='background-color: azure;; border: 2px outset skyblue; text-align: center; color: white; border-radius: 10%; height=100px;'><a  style='text-decoration: none;' href='".$link.".php?".$methode."=$ordner&nr=$datei_up'>>></a></div>";
                                    echo "</div>";
                                    echo "<div class='col-lg-6 col-md-8 col-sm-8'>";
                                    echo "Datei: $dateien[$datei]";
                                    echo "<object data='read.php?get=$dateien[$datei]' type='application/pdf' style='width:100%;height:850px'> <a href='download.php?get=$dateien[$datei]'>PDF laden</a> </object>";
                                 }
                                if (empty($approval))
                                {
                                    echo "<div class='col-lg-1 hidden-sm hidden-md hidden-xs' style='background-color: azure;; border: 0px inset skyblue; text-align: center; color: white; border-radius: 10%; height=100px;'><a  style='text-decoration: none;' href='".$link.".php?".$methode."=$ordner&nr=$datei_down'></a></div>";
                                    echo "<div class='col-lg-1 hidden-sm hidden-md hidden-xs'  style='background-color: azure;; border: 0px outset skyblue; text-align: center; color: white; border-radius: 10%; height=100px;'><a  style='text-decoration: none;' href='".$link.".php?".$methode."=$ordner&nr=$datei_up'></a></div>";
                                    echo "</div>";
                                    echo "<div class='hidden-lg hidden-sm hidden-md hidden-xs'";
                                    echo "Datei: $dateien[$datei]";
                                    echo "<object data='read.php?get=$dateien[$datei]' type='application/pdf' style='width:100%;height:850px'> <a href='download.php?get=$dateien[$datei]'>PDF laden</a> </object>";
                                    echo "</div>";
                                 }
                                }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php if (empty($approval)): ?>
                    </div>
                <?php endif;?>
        <?php endif; ?>
      <hr>
   <?php include "footer.php";?>
 </body>
</html>
