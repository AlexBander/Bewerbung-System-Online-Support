<?php function sfs($ordner, $filter, $subfolder){ $dateien[] = scandir($subfolder.'/'.$ordner.'/pdfs/'); foreach ($dateien as $datei) { $k=count($datei); $i=0; foreach ($datei as $datei){ $i++; if (($i >2)&&($i <= $k)) { $bezeichnung = str_replace($filter[0],$filter[1],$datei); echo "<a href='$subfolder/$ordner/pdfs/$datei'>$bezeichnung</a> | <a href='$subfolder/$ordner/pdfs/$datei' download>(download)</a><br />"; } } }; $_SESSION['dateien'] = $dateien; return $_SESSION['dateien']; }function auth($ordner) { $gets[] = scandir('unTerLagen/'); foreach ($gets[0] as $auth => $key) { if ($key === $ordner) { $_SESSION['gets'] = $ordner; return $_SESSION['gets']; } } }?>