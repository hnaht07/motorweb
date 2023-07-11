<?php
    class Home extends Controller{

        public $category , $data;
        
        public function __construct() {
            $this->category = $this->model('HomeModel');
        }
        public function index(){
            $dataIndex = $this->category->getListAll('tbl_product');
            $this->data['content'] = 'home/index';
            $this->data['sub_content'] = $dataIndex;
            
            $this->render('layouts/client_layout',$this->data);
        }

        public function get_request(){
            $this->data['msg'] = Session::flash('msg');
            $this->render('categories/add', $this->data);
        }

        public function post_request(){
            $request = new Request();
            if($request->isPost()){
                // Set Rule
                $request->rules([
                    'fullname' => 'required|min:5|max:30',
                    'email' => 'required|email|min:6|unique:testfunction:email',
                    'password' => 'required|min:2',
                    'confirm_password' => 'required|match:password',
                ]);

                // Set message 

                $request->message([
                    'fullname.required' => 'Họ tên không được để trống',
                    'fullname.min' => 'Họ tên phải lớn hơn 5 kí tự',
                    'fullname.max' => 'Họ tên phải nhỏ hơn 30 kí tự',
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Định dạng email không hợp lệ',
                    'email.min' => 'Email phải lớn hơn 6 kí tự',
                    'email.unique' => 'Email đã tồn tại trong hệ thống',
                    'password.required' => 'Password không được để trống',
                    'password.min' => 'Password phải lớn hơn 2 kí tự',
                    'confirm_password.required' => 'Confirm Password không được để trống',
                    'confirm_password.match' => 'Confirm Password not match',
                ]);

                // Set validate 
                $validation = $request->validate();
                if (!$validation) {
                    Session::flash('msg', 'Có lỗi validation rồi má!!!');
                }
            }
            $response = new Response();
            $response->redirect('home/get_request');
            
            
            
        }

    }