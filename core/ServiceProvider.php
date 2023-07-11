<?php 
abstract class ServiceProvider{
    public $serviceDb = null;
    abstract public function boot();
}


?>