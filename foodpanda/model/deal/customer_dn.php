<?php
class ModelDealCustomerDn extends Model{
    public function getCustomerDn($data){
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_dn` WHERE fullname = '". $this->db->escape($data['fullname']) ."' AND email = '". $this->db->escape($data['email']) ."' AND phone = '". $this->db->escape($data['phone']). "'");
        return $query->row;
    }

    public function insertOrUpdateCustomerDn($data, $product_dn_id){
        $this->load->model('deal/product_dn_to_customer');
        $customerDn = $this->getCustomerDn($data);
        if(isset($customerDn['customer_dn_id'])){
            $customerDn_id = (int)$customerDn['customer_dn_id'];
            $this->model_deal_product_dn_to_customer->insertOrUpdate($product_dn_id, $customerDn_id, $data['soluong']);
        }else{
            $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_dn` SET fullname = '". $this->db->escape($data['fullname']) . "' ,
                    email = '". $this->db->escape($data['email']) ."',
                    phone = '". $this->db->escape($data['phone']) ."' ,
                    date = NOW()");
            $customerDn_id = $this->db->getLastId();

            // insert into product_dn_tocustomer
            $this->db->query("INSERT INTO `" . DB_PREFIX . "product_dn_to_customer` SET product_dn_id = ". (int)$product_dn_id . " ,
                    customer_dn_id = ". (int)$customerDn_id ." ,
                    soluong = ". (int)$data['soluong']);
        }
    }
}
?>