<?php
$data = array();
$data['dataShow'] = $sub_content;
$data['page_title'] = $page_title;
$data['old'] = $oldData;
$data['img'] = $oldImg;
$data['company'] = $company;
$data['oldComp'] = $oldComp;
$data['CompName'] = $companyName;
$this->render('blocks/header', $sub_content);
$this->render($content, $data);
$this->render('blocks/footer', $sub_content);
?>