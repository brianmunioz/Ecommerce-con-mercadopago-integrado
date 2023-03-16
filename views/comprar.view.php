<?php include 'header.php'?>
<script src="https://sdk.mercadopago.com/js/v2"></script>


<div class="prod">
        <?php foreach($carrito as $prod):?>
         
            <h1><?php echo $prod['nombre']  ?></h1>
            <h3>$<?php echo $prod['precio']  ?> c/u - Cantidad: <?php echo $prod['cantidad']  ?></h3>
            <?php $totalCarrito += $prod['precio'] *$prod['cantidad'] ;?>
            
        <?php endforeach; ?>
        <h2>Total: $<?php echo $totalCarrito ?></h2>
          <img src="img/pagos.jpg" alt="">
          <div class="checkout-btn"></div>
        </div>

    
    

<script>
  // Agrega credenciales de SDK
  const mp = new MercadoPago("TEST-d19eb074-4c1a-4e0a-b016-577bca0030b9", {
    locale: "es-AR",
  });

  // Inicializa el checkout
  mp.checkout({
    preference: {
      id: "<?php echo $preference->id;?>",
    },
    render: {
      container: ".checkout-btn", // Indica el nombre de la clase donde se mostrará el botón de pago
      label: "Pagar", // Cambia el texto del botón de pago (opcional)
    },
  });
</script>
    
<?php include 'footer.php'?>