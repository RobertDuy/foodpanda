<?php
class ModelCatalogProductDn extends Model {
    public function getProducts($page, $limit){
        $start = ($page - 1) * $limit;
        $query = $this->db->query("SELECT * FROM `". DB_PREFIX . "product_dn` ORDER BY number_dn DESC LIMIT ". (int)$start. "," . (int)$limit);
        return $query->rows;
    }

    public function deleteProductDn($arrayId) {
        $this->db->query("DELETE FROM `". DB_PREFIX . "product_dn` WHERE product_dn_id in (" . implode(',', $arrayId) . ")");
    }

    public function getTotal(){
        $query = $this->db->query("SELECT COUNT(*) FROM `". DB_PREFIX . "product_dn`");
        return $query->row;
    }
}
?>