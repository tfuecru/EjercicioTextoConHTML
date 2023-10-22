<?php

require('classes/BasicFileManager.php');


$bfm = new BasicFileManager();
$result = $bfm->set('head','head');
$result = $bfm->set('header','head');
$result = $bfm->set('main','head');
$result = $bfm->set('footer','head');
header('Location: resultado.php?result='.$result);