<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a
                href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <div class="box">
        <div class="heading">
            <h1><img src="view/image/product.png" alt=""/>Required products</h1>

            <div class="buttons"><a onclick="$('#form').submit();" class="button">Save</a>
                <a href="index.php?route=catalog/product_dn&token=<?php echo $token; ?>" class="button">Cancel</a></div>
        </div>
        <div class="content">
            <form action="index.php?route=catalog/product_dn/edit&token=<?php echo $token;?>" method="post" enctype="multipart/form-data" id="form">
                <div id="tab-general">
                    <table class="form">
                        <tr>
                            <td><span class="required">*</span>Name</td>
                            <td>
                                <input type="text" name="name" size="100" value="<?php echo $productdn['name']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Image Link</td>
                            <td><input type="text" name="image" size="100" value="<?php echo $productdn['image']; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Original product link</td>
                            <td><input type="text" name="link" size="100" value="<?php echo $productdn['link']; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><textarea name="description" id="product_dn_description"><?php echo $productdn['description']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Number DN</td>
                            <td><input type="text" name="number_dn" value="<?php echo $productdn['number_dn']; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Max DN</td>
                            <td><input type="text" name="max_dn" value="<?php echo $productdn['max_dn']; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><select name="status">
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">DeActive</option>
                                </select>
                            </td>
                        </tr>
                        <input type="hidden" name="product_dn_id" value="<?php echo (int)$productdn['product_dn_id']; ?>" />
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('product_dn_description', {
        filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
    });
</script>