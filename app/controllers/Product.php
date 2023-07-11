<?php
class Product extends Controller{

    public $data = [];
    public $products;

    public function __construct() {
        $this->products = $this->model('ProductModel');
    }

    public function index(){
        echo " Trang Danh Sách";
        $dataIndex = $this->products->getListAll('tbl_product');
        $this->data['content'] = 'products/index';
        $this->data['page_title'] = 'Trang Chủ Sản Phẩm';
        $this->data['sub_content'] = $dataIndex;
        
        //Render views
        $this->render('layouts/index_layout', $this->data);
            
    }

    public function list_product(){
        $dataList = $this->products->getWith('tbl_company cp', 'cp.company_Id', 'tbl_product pr', 'pr.company_Id');
        $this->data['content']= 'products/list';
        $this->data['page_title'] = 'Trang Danh Sản Phẩm';
        $this->data['sub_content'] = $dataList;
        
        
        //Render views
        $this->render('layouts/client_layout', $this->data);
    }

    public function detail_product($id=0){
        $id = 3;
        $dataDetail = $this->products->getById($id, 'tbl_product');
        $this->data['content'] = 'products/detail';
        $this->data['page_title'] = "Chi tiết sản phẩm";
        $this->data['sub_content'] = $dataDetail;
        
        //Render view
        $this->render('layouts/client_layout', $this->data);
    }

    
    public function insert_product(){
        $dataList = $this->products->getListAll('tbl_product');
        $this->data['content'] = 'products/insert';
        $this->data['page_title'] = 'Thêm Sản Phẩm';
        $this->data['sub_content'] = $dataList;
        $dataCompany = $this->products->getListAll('tbl_company');
        $this->data['company'] = $dataCompany;
        $oldId = $_GET['id'];
        $oldData = $this->products->getById($oldId, 'tbl_product');
        $oldImg = $this->products->getAllById($oldId, 'tbl_product_img','product_Id');
        $oldComp = $this->products->getAllById($oldId, 'tbl_company','company_Id');
        $this->data['oldData'] = $oldData;
        $this->data['oldImg'] = $oldImg;
        $this->data['oldComp'] = $oldComp;
        //Render views
        $this->render('layouts/client_layout', $this->data);
    }

    public function render_update(){
        $idUpdate = $_POST['idsp'];
        $table = 'tbl_product';
        $img = $this->products->getById($idUpdate, $table);
        $dataUpdate = [];
        if ($_POST['submit']) {
            $dataUpdate['product_Id'] =  $_POST['idsp'];
            $dataUpdate['product_Name'] = $_POST['tensp'];
            $dataUpdate['product_Price'] = $_POST['giasp'];
            if ($_POST['giamgiasp'] != '') {
                $dataUpdate['product_downPrice'] = $_POST['giamgiasp'];
            } else {
                $dataUpdate['product_downPrice'] = '0';
            }
            if ($_FILES['hinhsp']['name'] != '') {

                $upload_dir = SITE_ROOT . "/public/assets/admin/uploads/";
                $upload_file = $upload_dir . basename($_FILES['hinhsp']['name']);
                $target_dir = "/public/assets/admin/uploads/";
                $target_img = $target_dir . basename($_FILES['hinhsp']['name']);



                if (move_uploaded_file($_FILES['hinhsp']['tmp_name'], $upload_file)) {
                    echo "Update Hình OK.\n";
                } else {
                    echo "Update Hình failed";
                }
                $dataUpdate['product_Img'] = $target_img;
            } else {
                $dataUpdate['product_Img'] = $img['product_Img'];
            }
            $dataUpdate['company_Id'] = $_POST['nameHang'];
        }
        $this->products->update($dataUpdate, $idUpdate,'tbl_product');
        $response = new Response();
        $response->redirect('product/list_product');
    }

    public function render_insert()
    {

        $dataInsert = [];
        $dataImg = [];
        if ($_POST['submit']) {

            // render info product

            $dataInsert['product_Id'] = '';
            $dataInsert['product_Name'] = $_POST['tensp'];
            $dataInsert['product_Price'] = $_POST['giasp'];
            if($_POST['giamgiasp'] != '') {
                $dataInsert['product_downPrice'] = $_POST['giamgiasp'];
            }else{
                $dataInsert['product_downPrice'] = '0';
            }
            if ($_FILES['hinhsp']['name'] != '') {

                $upload_dir = SITE_ROOT . "/public/assets/admin/uploads/";
                $upload_file = $upload_dir . basename($_FILES['hinhsp']['name']);
                $target_dir ="/public/assets/admin/uploads/";
                $target_img = $target_dir . basename($_FILES['hinhsp']['name']);
                move_uploaded_file($_FILES['hinhsp']['tmp_name'], $upload_file);

                $dataInsert['product_Img'] = $target_img;
            } else {
                $dataInsert['product_Img'] = 'không có hình mô tả';
            }
            $dataInsert['company_Id'] = $_POST['nameHang'];
            $this->products->insert($dataInsert, 'tbl_product');

            //render images

            $lastId = $this->products->getLastId();
            $dataImg['img_Id'] = '';
            $dataImg['product_Id'] = $lastId;
            if ($_FILES['hinhsps']['name'] != '') {

                foreach ($_FILES['hinhsps']['name'] as $key => $value) {
                    $upload_dir = SITE_ROOT . "/public/assets/admin/uploads/";
                    $upload_files = $upload_dir . basename($_FILES['hinhsps']['name'][$key]);
                    $target_dir = "/public/assets/admin/uploads/";
                    $target_img = $target_dir . basename($_FILES['hinhsps']['name'][$key]);


                    move_uploaded_file($_FILES['hinhsps']['tmp_name'][$key], $upload_files);

                    $dataImg['img_Detail'] = $target_img;
                    $this->products->insert($dataImg, 'tbl_product_img');
                }
                
            } else {
                $dataImg['img_Detail'] = 'không có hình chi tiết';
                $this->products->insert($dataImg, 'tbl_product_img');
            }

            
        }
        
        $response = new Response();
        $response->redirect('product/list_product');
    }
    public function delete_product(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->products->delete($id, 'tbl_product');
            
        }
        $response = new Response();
        $response->redirect('product/list_product');
    }
}