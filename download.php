<?php
    session_start();
        include 'bewerbung.inc.php';
        include 'config.inc.php';
        include 'counter.inc.php';
        if (empty($_GET)) {
            header('Location: index.php');
            exit;
        }
        $test = $_SESSION['check'];
        $counterfail=counter($subfolder, "Fail" , "count_Fail.txt");
        if ($_SESSION['check']==$key)
            {
                $foldername =$_SESSION['get'];
                $path = $subfolder.'/'.$foldername.'/pdfs';
                $downloadFile = $_GET['get'];
                if (file_exists("$path/$downloadFile")){
                    $file = file_get_contents("$path/$downloadFile");
                }
                else
                {
                    $path = $subfolder.'/fake';
                    $file = file_get_contents("$path/some.pdf");
                }

            }
        else
        {
            $downloadFile = "anyway";
        }
    if (file_exists("$path/$downloadFile"))
     {
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename=$downloadFile");
        header('Content-Length: ' . strlen($file));
        $counter=counter($subfolder, $foldername, "count_dl.txt");
        $counter++;
        counterDownloadUp($subfolder, $foldername, $counter);
        echo $file;
      }
     else
     {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=some.pdf');
        header('Content-Length: ' . strlen($file));
        $counterfail++;
        counterFailUp($subfolder, $counterfail);
        echo $file;
     }
?>
