<?php

namespace App;

class Item {
    protected int $id;
    protected string $title;
    protected string $img;
    protected float $price;
    protected bool $bought;
    protected string $buyer;
    protected string $link;
    
    /**
     * __construct
     *
     * @param  int $id Id de l'item
     * @return void
     */
    public function __construct(int $id = 0) {
        if ($id > 0) {
            $this->loadFromId($id);
        }
    }
    
    /**
     * get
     *
     * @param  string $field Nom de l'attribut de l'item
     * @return mixed Valeur de l'attribut
     */
    public function get(string $field) {
        if(isset($this->$field)) {
            return $this->$field;
        }
        return null;
    }
    
    /**
     * set
     *
     * @param  string $field Nom de l'attribut de l'item
     * @param  mixed $val Valeur de l'attribut
     * @return void
     */
    public function set(string $field, $val) {
        $this->$field = $val;
    }
    
    /**
     * loadFromId
     *
     * @param  int $id Id de l'item
     * @return bool
     */
    public function loadFromId(int $id) {
        $sql = "SELECT * FROM `item` WHERE `id` = :id";
        $param = [":id" => $id];
        if (!BDD::Execute($sql, $param)) {
            return false;
        }
        $result = BDD::Fetch();
        if (!$result) {
            return false;
        }
        foreach ($result as $field => $val) {
            $this->set($field, $val);
        }
        return true;
    }
    
    /**
     * loadAll
     *
     * @return array Tableau d'item
     */
    public function loadAll() {
        $sql = "SELECT * FROM `item` ORDER BY `id`";
        if (!BDD::Execute($sql)) {
            return false;
        }
        $array = BDD::FetchAll();
        if (!$array) {
            return false;
        }
        $result = [];
        foreach ($array as $line) {
            $item = new Item();
            foreach($line as $field => $val) {
                $item->set($field, $val);
            }
            $result[] = $item;
        }
        return $result;
    }
    
    /**
     * buy
     *
     * @param  string $name Nom de l'acheteur
     * @return bool
     */
    public function buy(string $name) {
        $sql = "UPDATE `item` SET `buyer` = :buyer, `bought` = :bought WHERE `id` = :id";
        $param = [":buyer" => $name, ":id" => $this->id, ":bought" => true];
        if (!BDD::Execute($sql, $param)) {
            return false;
        }
        return true;
    }


}
