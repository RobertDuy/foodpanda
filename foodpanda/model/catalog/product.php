<?php
class ModelCatalogProduct extends Model{
    public function getNewProductListReceive($type, $start, $limit){
        $start = $start * $limit;

        if($type == 'newReceived'){
            $query = $this->db->query("SELECT res1.product_id, res1.image, res1.price, res1.name, res1.duration, res1.date_added, pdis.price as pricedis, pdis.date_start, pdis.date_end FROM (SELECT p.product_id, p.price, p.image, pd.name, pd.duration, p.date_added FROM product as p LEFT JOIN product_description as pd ON p.product_id = pd.product_id) as res1 LEFT JOIN product_discount as pdis ON res1.product_id = pdis.product_id AND SUBTIME(CURTIME(), '30 0:0:0.000000') <= res1.date_added ORDER BY res1.date_added DESC LIMIT " . (int)$start . "," . (int)$limit);
        }else if($type == 'special'){
            //TODO : rewrite SQL HERE FOR SPECIAL
            $query = $this->db->query("SELECT res1.product_id, res1.image, res1.price, res1.name, res1.duration, res1.date_added, pdis.price as pricedis, pdis.date_start, pdis.date_end FROM (SELECT p.product_id, p.price, p.image, pd.name, pd.duration, p.date_added FROM product as p LEFT JOIN product_description as pd ON p.product_id = pd.product_id) as res1 LEFT JOIN product_discount as pdis ON res1.product_id = pdis.product_id AND SUBTIME(CURTIME(), '30 0:0:0.000000') <= res1.date_added ORDER BY res1.date_added DESC LIMIT " . (int)$start . "," . (int)$limit);
        }else if($type == 'full'){
            $query = $this->db->query("SELECT * FROM" . DB_PREFIX . "product DESC LIMIT " . (int)$start . "," . (int)$limit);
        }
        return $query->rows;
    }
    
    public function getDetailProduct($prdId){
        $query = $this->db->query("SELECT * FROM" . DB_PREFIX . " product p, product_description pd where p.product_id = pd.product_id AND p.product_id = $prdId");
        return $query->rows;
    }
    
    public function getProductImage($prdId){
        $query = $this->db->query("SELECT * FROM" . DB_PREFIX . " product p, product_image pi where p.product_id = pi.product_id AND p.product_id = $prdId");
        return $query->rows;
    }
    
    public function getProductInfo($prdId){
        $query = $this->db->query("SELECT * FROM" . DB_PREFIX . " product p where p.product_id = $prdId");
        return $query->rows;
    }
    
    public function getProductDiscount($prdId){
        $query = $this->db->query("SELECT pdis.price FROM" . DB_PREFIX . " product p, product_discount pdis where p.product_id = pdis.product_id AND p.product_id = $prdId");
        return $query->rows;
    }
    
    public function getProductRelated($prdId){
        $query = $this->db->query("SELECT * FROM" . DB_PREFIX . " product p, product_related pr where p.product_id = pr.product_id AND p.product_id = $prdId");
        return $query->rows;
    }
}
?>