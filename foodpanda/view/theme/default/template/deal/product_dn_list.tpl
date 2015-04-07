<div class="homepage-1">
    <div class="homepage-banner mbl">
        <h5>Danh sách sản phẩm được đề nghị DEAL nhiều nhất</h5>
        <?php if($product_dns){ ?>
        <?php foreach($product_dns as $product_dn){ ?>
        <?php $link = $product_dn['link'];
              $name = $product_dn['name'];
              $number_dn = $product_dn['number_dn'];
              $max_dn = $product_dn['max_dn'];
        ?>
            <ul class="thumbs clearfix topvendors">
                <li>
                    <p class="top-thumb">
                        Đã có <?php echo $number_dn; ?>/<?php echo $max_dn; ?> đề nghị bán sản phẩm này
                    </p>
                    <a href="">
                        <img src="<?php echo $link; ?>"/>
                    </a>
                    <p>
                        <?php echo $name; ?>
                    </p>
                    <a class="btn-dn" href="javascript:void(0);" onclick="javascript:clickExistedProductDn('<?php echo $link;?>', '<?php echo $name?>', '<?php echo $number_dn;?>', '<?php echo $max_dn?>')">
                        Đề nghị
                    </a>
                </li>
            </ul>
        <?php }} ?>
    </div>
</div>