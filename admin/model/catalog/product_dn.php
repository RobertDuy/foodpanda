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
        return $query->row['COUNT(*)'];
    }

    public function getProductDN($product_dn_id){
        $query = $this->db->query("SELECT * FROM `". DB_PREFIX . "product_dn` WHERE product_dn_id =". (int)$product_dn_id);
        return $query->row;
    }

    public function updateProductDn($data){
        $this->db->query("UPDATE `". DB_PREFIX ."product_dn` SET
            name= '". $this->db->escape($data['name']) ."' ,
            image= '". $this->db->escape($data['image'])."' ,
            link= '". $this->db->escape($data['link']). "' ,
            description= '". $this->db->escape($data['description']) ."',
            number_dn=". (int)$data['number_dn'] .",
            max_dn=". (int)$data['max_dn'] . ",
            status=". (int)$data['status'] . "
            WHERE product_dn_id = ". (int)$data['product_dn_id']);
    }
}
?>