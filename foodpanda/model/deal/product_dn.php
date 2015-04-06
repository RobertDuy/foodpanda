<?php
class ModelDealProductDn extends Model{
    public function insertOrUpdate($data){
        $this->load->model('deal/customer_dn');
        $this->load->model('deal/product_dn_to_customer');

        if(isset($data['link'])){
            $queryRow = $this->getProductDnByLink($data['link']);

            if(isset($queryRow['product_dn_id'])){
                $product_dn_id = (int)$queryRow['product_dn_id'];
                $customer_dn = $this->model_deal_customer_dn->getCustomerDn($data);
                // update product_ dn
                $this->db->query("UPDATE `". DB_PREFIX ."product_dn` SET number_dn = number_dn + ". (int)$data['soluong'] ." WHERE product_dn_id = ". $product_dn_id);
                // update product_dn to customer
                $this->model_deal_product_dn_to_customer->updateSoluong($product_dn_id, $customer_dn['customer_dn_id'], $data['soluong']);
            }else{
                $this->db->query("INSERT INTO `" . DB_PREFIX . "product_dn` SET link = '". $this->db->escape($data['link']) . "' , number_dn = 1, status = 1");
                $product_dn_id = $this->db->getLastId();
                $this->model_deal_customer_dn->insertOrUpdateCustomerDn($data, $product_dn_id);
            }
        }
    }

    public function getProducts($page, $limit){
        $start = ($page - 1) * $limit;
        $query = $this->db->query("SELECT * FROM `". DB_PREFIX . "product_dn` ORDER BY number_dn DESC LIMIT ". (int)$start. "," . (int)$limit);
        return $query->rows;
    }

    public function getProductDnByLink($link){
        $query = $this->db->query("SELECT * FROM `". DB_PREFIX . "product_dn` WHERE link = '". $this->db->escape($link) . "'");
        return $query->row;
    }

    public function getTotal(){
        $query = $this->db->query("SELECT COUNT(*) FROM `". DB_PREFIX . "product_dn`");
        return $query->row['COUNT(*)'];
    }

    public function getOrderedLink($get){
        $query = $this->db->query("SELECT number_dn, max_dn FROM `". DB_PREFIX . "product_dn`
            WHERE link = '". $this->db->escape($get['link']) . "'");
        return $query->row;
    }
}
?>