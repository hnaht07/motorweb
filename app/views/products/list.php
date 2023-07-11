<h1>Danh Sách Sản Phẩm</h1>

<table>
    <thead>
        <tr>
            <th>Id Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Giảm Giá</th>
            <th>Hãng Xe</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['dataShow'] as $key => $value) {


        ?>
            <tr>
                <td><?php echo $value['product_Id'] ?></td>
                <td><img src="<?php echo  _WEB_ROOT.$value['product_Img'] ?>" alt="" style="width: 200px;"></br><?php echo $value['product_Img'] ?></td>
                <td><?php echo $value['product_Name'] ?></td>
                <td><?php echo $value['product_Price'] ?></td>
                <td><?php echo $value['product_downPrice'] ?></td>
                <td><?php echo $value['company_Name'] ?></td>
                <td><a href="<?php echo _WEB_ROOT ?>/product/delete_product?id=<?php echo $value['product_Id'] ?>"><input type="button" value="Xóa" name="submit"></a></td>
                <td><a href="<?php echo _WEB_ROOT ?>/product/insert_product?id=<?php echo $value['product_Id'] ?>"><input type="button" value="Sửa" name="submit"></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href=" <?php echo _WEB_ROOT ?>/product/insert_product"><input type="button" value="thêm sản phẩm"></a>
<?php





?>