<?php

require 'vendor/autoload.php';

$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_NUMBER_INT);
$name = htmlspecialchars($_POST["name"]);

try {
    if($id < 1) {
        throw new Exception("Id invalide");
    }
    if($name === "") {
        throw new Exception("Nom invalide");
    }
    $item = new App\Item;
    if(!$item->loadFromId($id)) {
        throw new Exception("Item introuvable");
    }
    if($item->get("bought")) {
        throw new Exception("Déjà acheté");
    }
    if(!$item->buy($name)) {
        throw new Exception("Erreur update bdd");
    }
    echo json_encode(["Success" => true]);
} catch (Exception $e) {
    echo json_encode(["Error" => $e->getMessage()]);
}