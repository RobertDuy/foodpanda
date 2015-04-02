<?php
class ModelDealProductDN extends Model{

    public function getDealDN($start, $limit){
        /**
        select p.image as promotion_img, p.price as price, p_dis.price as discount
        from
        product_dn pdn
        left outer join product p on pdn.product_id = p.product_id
        left outer join product_image p_img on p.product_id = p_img.product_id
        left outer join product_discount p_dis on p_img.product_id = p_dis.product_id
        left outer join product_description p_des on p_dis.product_id = p_des.product_id
        limit 0, 30
         **/
        $start = $start * $limit;
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p, product_dn pdn WHERE p.product_id = pdn.product_id ORDER BY pdn.number_dn DESC LIMIT " . (int)$start . "," . (int)$limit);
        return $query->rows;
    }
}
?>