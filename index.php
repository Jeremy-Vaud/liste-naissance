<?php

use App\Item;

require 'vendor/autoload.php';

$item = new Item;
$list = $item->loadAll();
ob_start();
foreach($list as $elt) {
    include "template/card.php";
}
$cards = ob_get_clean();
include 'template/base.php';