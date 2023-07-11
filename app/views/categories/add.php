<?php


echo (!empty($msg)) ? $msg : false;
HtmlHelper::formOpen('post',_WEB_ROOT.'/home/post_request');
HtmlHelper::input('text','fullname','','','Họ Tên......',old('fullname'),'<div>','<br/>'.form_errors('fullname', '<span style = "color : red">', '</span>').'</div>');
HtmlHelper::input('text', 'email', '', '', 'Email......', old('email'), '<div>', '<br/>' . form_errors('email', '<span style = "color : red">', '</span>') . '</div>');
HtmlHelper::input('password','password','','','Password......','', '<div>','<br/>'.form_errors('password', '<span style = "color : red">', '</span>').'</div>');
HtmlHelper::input('password', 'confirm_password', '', '', 'Confirm Password......','', '<div>', '<br/>' . form_errors('confirm_password', '<span style = "color : red">', '</span>') . '</div>');
HtmlHelper::submit('Submit','');
HtmlHelper::formClose();
?>
