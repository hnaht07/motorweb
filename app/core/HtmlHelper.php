<?php 
class HtmlHelper{
    static function formOpen($method = 'get', $action = ''){
        echo '<form method="' .$method. '" action ="'.$action . '">';

    }
    static function formClose(){
        echo '</form>';
    }
    static function input($type = 'text', $name , $class = '', $id = '', $placeholder = '',$value = '', $wrapOp = '', $wrapCl = ''){
        echo $wrapOp;
        echo '<input type="'.$type.'" name="' . $name . '" class="' . $class . '" id="' .$id. '" placeholder="' . $placeholder . '" value = "'.$value.'" />';
        echo $wrapCl;
    }
    static function submit($label,$class = ''){
        echo '<button type="submit" class = "' . $class . '">'.$label.'</button>';
    }
}

?>