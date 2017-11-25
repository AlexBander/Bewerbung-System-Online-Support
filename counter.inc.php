<?php
function counter($subfolder, $ordner, $counterfile)
    {
        if ($counterfile == "count_Fail.txt")
        {
            $counterFile = "$subfolder/$counterfile";
        }
        else
        {
            $counterFile = "$subfolder/$ordner/$counterfile";
        }
        if (!file_exists($counterFile))
        {
            fopen($counterFile, "w");
            fwrite($counterFile, $txt);
            fclose($counterFile);
        }

        $counterFileLink = file_get_contents("$counterFile", FILE_USE_INCLUDE_PATH);
        fclose($counterFileLink);
        return $counterFileLink;
    }
function counterDownloadUp($subfolder, $ordner, $counter)
    {
        $counterFile = "$subfolder/$ordner/count_dl.txt";
           $fp = fopen($counterFile, 'w');
            fwrite($fp, $counter);
            if ($fwrite === false)
            {
                return "Error on write";
            }
            fclose($fp);
    }
function counterReadUp($subfolder, $ordner, $counter)
    {
        $counterFile = "$subfolder/$ordner/count_rd.txt";
           $fp = fopen($counterFile, 'w');
            fwrite($fp, $counter);
            if ($fwrite === false)
            {
                return "Error on write";
            }
            fclose($fp);
    }
function counterSiteUp($subfolder, $ordner, $counter)
    {
        $counterFile = "$subfolder/$ordner/count.txt";
           $fp = fopen($counterFile, 'w');
            fwrite($fp, $counter);
            if ($fwrite === false)
            {
                return "Error on write";
            }
            fclose($fp);
    }
function counterFailUp($subfolder, $counter)
    {
        $counterFile = "$subfolder/count_Fail.txt";
           $fp = fopen($counterFile, 'w');
            fwrite($fp, $counter);
            if ($fwrite === false)
            {
                return "Error on write";
            }
            fclose($fp);
    }
?>
