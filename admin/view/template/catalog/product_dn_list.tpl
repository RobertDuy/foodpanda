<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="success"><?php echo $success; ?></div>
    <?php } ?>
    <div class="box">
        <div class="heading">
            <h1><img src="view/image/product.png" alt="" /> Required Products</h1>
            <div class="buttons">
                <!--<a href="<?php echo $insert; ?>" class="button"><?php echo $button_insert; ?></a> -->
                <a onclick="$('form').submit();" class="button">Delete</a>
            </div>
        </div>
        <div class="content">
            <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
                <table class="list">
                    <thead>
                    <tr>
                        <td width="1" style="text-align: center;">
                            <input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" />
                        </td>
                        <td class="center">Images</td>
                        <td class="center">Product name</td>
                        <td class="left">Link</td>
                        <td class="center">Number of required!!!</td>
                        <td class="right">Action</td>
                    </tr>
                    </thead>
                        <tbody>
                        <?php if ($productdns) { ?>
                            <?php foreach ($productdns as $productdn) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <input type="checkbox" name="selected[]" value="<?php echo $productdn['product_dn_id']; ?>"/>
                                    </td>
                                    <td class="center"><img src="<?php echo $productdn['image']; ?>" alt="<?php echo $productdn['name']; ?>" style="padding: 1px; border: 1px solid #DDDDDD;" /></td>
                                    <td class="left"><?php echo $productdn['name']; ?></td>
                                    <td class="left"><?php echo $productdn['link']; ?></td>
                                    <td class="left"><?php echo $productdn['number_dn']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td class="center" colspan="8">Hiện tại chưa có sản phẩm nào được yêu cầu. </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
            <div class="pagination"><?php echo $pagination; ?></div>
        </div>
    </div>
</div>
<?php echo $footer; ?>