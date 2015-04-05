<?php
class ModelDealProductDnToCustomer extends Model{
    public function updateSoluong($product_dn_id, $customer_dn_id, $soluong){
        $this->db->query("UPDATE `". DB_PREFIX ."product_dn_to_customer` SET
            number_dn = number_dn + ". (int)$soluong . "WHERE product_dn_id = ". (int)$product_dn_id . "
            AND customer_dn_id = ". (int)$customer_dn_id);
    }

    public function insert($product_dn_id, $customer_dn_id, $soluong){
        $this->db->query("INSERT INTO `" . DB_PREFIX . "product_dn_to_customer` SET product_dn_id = ". (int)$product_dn_id . " ,
                    customer_dn_id = ". (int) $customer_dn_id .",
                    soluong = ". (int)$soluong);
    }

    public function insertOrUpdate($product_dn_id, $customer_dn_id, $soluong){
        $query = $this->db->query("SELECT * FROM `". DB_PREFIX . "product_dn_to_customer` WHERE product_dn_id =". (int)$product_dn_id ." AND customer_dn_id =". (int)$customer_dn_id);
        if(isset($query->rows)){
            $this->updateSoluong($product_dn_id, $customer_dn_id, $soluong);
        }else{
            $this->insert($product_dn_id, $customer_dn_id, $soluong);
        }
    }
}
?>