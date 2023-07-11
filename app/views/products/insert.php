<?php
$paramInsert = 'render_insert';
$paramUpdate = 'render_update';
?>
<form action="<?php echo _WEB_ROOT ?>/product/<?php echo (empty($_GET['id']) ? $paramInsert : $paramUpdate) ?>" method="post" enctype="multipart/form-data">
    <label for="" <?php echo (empty($_GET['id'])) ? 'hidden'  : false ?>>Id sản phẩm</label>
    <input type="text" name="idsp" value="<?php echo (!empty($_GET['id'])) ?  $data['old']['product_Id'] : false ?>" readonly <?php echo (empty($_GET['id'])) ?  'hidden' : false ?>><br />
    <label for="">tên sản phẩm</label>
    <input type="text" name="tensp" value="<?php echo (!empty($_GET['id'])) ?  $data['old']['product_Name'] : false ?>"><br />
    <label for="">giá</label>
    <input type="text" name="giasp" value="<?php echo (!empty($_GET['id'])) ? $data['old']['product_Price'] : false ?>"><br />
    <label for="">giảm giá</label>
    <input type="text" name="giamgiasp" value="<?php echo (!empty($_GET['id'])) ? $data['old']['product_downPrice'] : false ?>"><br />
    <label for="">hình ảnh mô tả</label>
    <?php
    if (!empty($_GET['id'])) {
    ?>
        <img src="<?php echo $data['old']['product_Img'] ?>" alt="" id="img" style="width: 100px ;height: 100px;"><br />
        <input type="file" name="hinhsp" id="imgFile" onchange="chooseFile(this)"><br />
    <?php
    } else {
    ?>
        <img src="" alt="" id="img" style="width: 100px ;height: 100px;"><br />
        <input type="file" name="hinhsp" id="imgFile" onchange="chooseFile(this)"><br />
    <?php
    }
    ?>
    <label for="">hình ảnh chi tiết Cũ :</label>
    <?php
    if (!empty($_GET['id'])) {

        foreach ($data['img'] as $key => $value) {
    ?>
            <img src="<?php echo $value['img_Detail'] ?>" alt="" id="img" style="width: 100px ;height: 100px;">
        <?php
        }
        ?>

        <input type="file" name="hinhsps[]" id="imgFiles" multiple="multiple" onchange="preview()"><br />
        <label for="imgFiles">Chọn hình Mới</label>
        <p id="num-of-files">0</p>
        <div id="preImages"></div>
    <?php
    } else {
    ?>
        <input type="file" name="hinhsps[]" id="imgFiles" multiple="multiple" onchange="preview()"><br />
        <label for="imgFiles">Chọn hình Mới</label>
        <div id="preImages"></div>
    <?php
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <label for="">Tên hãng xe</label>

    <select name="nameHang" id="">
        <option value="">---Chọn Nhãn Hàng---</option>
        <?php
        foreach ($data['company'] as $key => $value) {
        ?>
            <option value="<?php echo (empty($_GET['id'])) ? $value['company_Id'] : $data['old']['company_Id'] ?>"><?php echo (empty($_GET['id'])) ? $value['company_Name'] : $data['old']['company_Name'] ?></option>
        <?php
        }
        ?>
    </select><br>
    <?php
    if (empty($_GET['id'])) {
    ?>
        <input type="submit" value="nhập" name="submit">

    <?php
    } else {
    ?>
        <input type="submit" value="sửa" name="submit">
    <?php
    }
    ?>
    <a href="<?php echo _WEB_ROOT ?>/product/list_product"><input type="button" value="danh sách" name="submit"></a>
</form>

<?php
?>