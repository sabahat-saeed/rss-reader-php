<?php
include('setdata.php');
try{
    if ($output == 'html') {
        include('html.php');
    } else if($output == 'text'){
        include('text.php');
    } else {
        throw new Exception('Output is not setup properly');
    }
} catch (exception $e) {
    die($e->getMessage());
}

