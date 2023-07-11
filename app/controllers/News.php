<?php
class News extends Controller {
    public $data = [];
    public function index() {
        $this->data['sub_content']['news_title'] = 'tin tức 1';
        $this->data['sub_content']['news_content'] = 'nội dung 1';
        $this->data['sub_content']['news_author'] = 'Thành';
        $this->data['content'] = 'news/list';
        $this->render('layouts/client_layout', $this->data);
    }
}




?>