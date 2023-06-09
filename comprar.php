<?php session_start();
require 'vendor/autoload.php';
$totalCarrito = 0;
MercadoPago\SDK::setAccessToken('TEST-1357491259909844-051504-58f6023bb62d4d0da52c45ef2f9293d5-201929291');
$preference = new MercadoPago\Preference();


if(isset($_SESSION['carrito'])){
    
    $carrito = $_SESSION['carrito'];
    $products=array();
    for($i = 0 ; $i < sizeof($carrito); $i++ ){
        $item = new MercadoPago\Item();
        $item->id = $carrito[$i]['id'];
        $item->title = $carrito[$i]['nombre'];
        $item->quantity = $carrito[$i]['cantidad'];
        $item->unit_price = $carrito[$i]['precio'];
        $item->currency_id = 'ARS';
        array_push($products,$item);
        
    }
    $preference->items = $products;
    $preference->back_urls = array(
        "success"=>"http://localhost/ecommerce/pagoexitoso.php",
        "failure"=>"http://localhost/ecommerce/fallo.php",
        "pending"=>"http://localhost/ecommerce/pendiente.php"

    );
    $preference->auto_return = "approved";
    $preference->binary_mode = true;
    $preference->save();


    
}else{
    header('Location: index.php');
}



include 'views/comprar.view.php';


