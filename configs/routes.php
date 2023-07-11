<?php 
$routes['default_controller'] = 'home';

/**
 * 
 * Đường dẫn ảo => đường dẫn thật
 * 
 */

 $routes['san-pham'] = 'product/index';
 $routes['danh-sach-san-pham']= 'product/list_product';
 $routes['chi-tiet-san-pham'] = 'product/detail_product';
 
 $routes['trang-chu'] = 'home';
 $routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';
?>