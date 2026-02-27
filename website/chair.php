<?php
/* Name: Mahi Patel | Date: Feb 27, 2026 | IT-202-004 */
class Chair {
    public $chair_id, $chair_code, $chair_name, $chair_description, $chair_material, $chair_style, $chair_type_id, $chair_buy_price, $chair_sell_price;

    public function __construct($id, $code, $name, $desc, $mat, $sty, $tid, $buy, $sell) {
        $this->chair_id = $id; $this->chair_code = $code; $this->chair_name = $name; $this->chair_description = $desc;
        $this->chair_material = $mat; $this->chair_style = $sty; $this->chair_type_id = $tid; $this->chair_buy_price = $buy; $this->chair_sell_price = $sell;
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO chairs (chair_id, chair_code, chair_name, chair_description, chair_material, chair_style, chair_type_id, chair_buy_price, chair_sell_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssidd", $this->chair_id, $this->chair_code, $this->chair_name, $this->chair_description, $this->chair_material, $this->chair_style, $this->chair_type_id, $this->chair_buy_price, $this->chair_sell_price);
        $stmt->execute();
    }

    public static function listAll($db) { return $db->query("SELECT * FROM chairs"); }

    public function update($db) {
        $stmt = $db->prepare("UPDATE chairs SET chair_code=?, chair_name=?, chair_description=?, chair_material=?, chair_style=?, chair_type_id=?, chair_buy_price=?, chair_sell_price=? WHERE chair_id=?");
        $stmt->bind_param("sssssiddi", $this->chair_code, $this->chair_name, $this->chair_description, $this->chair_material, $this->chair_style, $this->chair_type_id, $this->chair_buy_price, $this->chair_sell_price, $this->chair_id);
        $stmt->execute();
    }

    public static function remove($db, $id) {
        $stmt = $db->prepare("DELETE FROM chairs WHERE chair_id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
    }
}
?>