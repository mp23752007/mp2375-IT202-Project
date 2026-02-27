<?php
/* Name: Mahi Patel | Date: Feb 27, 2026 | IT-202-004 */
class ChairType {
    public $chair_type_id, $chair_type_code, $chair_type_name, $chair_aisle_number;

    public function __construct($id, $code, $name, $aisle) {
        $this->chair_type_id = $id; $this->chair_type_code = $code;
        $this->chair_type_name = $name; $this->chair_aisle_number = $aisle;
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO chair_types (chair_type_id, chair_type_code, chair_type_name, chair_aisle_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $this->chair_type_id, $this->chair_type_code, $this->chair_type_name, $this->chair_aisle_number);
        $stmt->execute();
    }

    public static function listAll($db) { return $db->query("SELECT * FROM chair_types"); }

    public function update($db) {
        $stmt = $db->prepare("UPDATE chair_types SET chair_type_code=?, chair_type_name=?, chair_aisle_number=? WHERE chair_type_id=?");
        $stmt->bind_param("ssii", $this->chair_type_code, $this->chair_type_name, $this->chair_aisle_number, $this->chair_type_id);
        $stmt->execute();
    }

    public static function remove($db, $id) {
        $stmt = $db->prepare("DELETE FROM chair_types WHERE chair_type_id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
    }
}
?>