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
                $downloadFile = filter_var($_GET['get'], FILTER_SANITIZE_STRING); #6
                if (file_exists("$path/$downloadFile")){
                    $file = "$path/$downloadFile";
                }
                else
                {
                    $path = $subfolder.'/fake';
                    $file = "$path/some.pdf";
                }

            }
        else
        {
            $downloadFile = "anyway";
        }
    if (file_exists("$path/$downloadFile"))
     {
        header('Content-type:application/pdf');
        header("Content-Disposition:inline;filename=$downloadFile");
        header('Cache-control: private');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file);
      }
     else
     {
        $counterfail++;
        counterFailUp($subfolder, $counterfail);
        header('Location: index.php');
        exit;
     }
?>
