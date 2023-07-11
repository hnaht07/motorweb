<?php 
class ParamsMiddleware extends Middlewares{
    public function handle(){
        if(!empty($_SERVER['QUERY_STRING'])){
            if ($_GET['id']) {
                $id = $_GET['id'];
                if (is_numeric($id)) {
                    if ($_SERVER['QUERY_STRING'] = 'id=' . $id) {
                        return $id;
                    } else {
                        $response = new Response();
                        $response->redirect(Route::getFullUrl());
                    }
                } else {
                    $response = new Response();
                    $response->redirect(Route::getFullUrl());
                }
            }
        }

    }
}
?>