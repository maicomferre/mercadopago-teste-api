<?php

require 'vendor/autoload.php';


use MercadoPago\Client\Preference\PreferenceClient;

use MercadoPago\MercadoPagoConfig;

MercadoPagoConfig::setAccessToken("APP_USR-3031638088616908-091919-fca5c2c37daa9c1102ef8f86e6ca4b0c-1483390300");
MercadoPagoConfig::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Step 2: Set production or sandbox access token

// Step 2.1 (optional - default is SERVER): Set your runtime enviroment from MercadoPagoConfig::RUNTIME_ENVIROMENTS
// In case you want to test in your local machine first, set runtime enviroment to LOCAL
MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

// Step 3: Initialize the API client
$client = new PreferenceClient();
$preference = $client->create([
  "items"=> array(
        array("id" => "001",
        "description" => "Um produto bem produtado",
        "title" => "{$_GET['t']}",
        "quantity" => 1,
        "unit_price" => (double)$_GET['v'],
        "picture_url" => "http://{$_SERVER['HTTP_HOST']}/vestido.jpg",
        )
    ),
    "payment_methods" => array(
        "excluded_payment_methods" => array(
                [ "id" => "visa"],
        ),
        "installments" => 6,
    ),
    "back_urls" => array(
        "success" => "http://{$_SERVER['HTTP_HOST']}/success.php",
        "failure" => "http://{$_SERVER['HTTP_HOST']}/failure.php",
        "pending" => "http://{$_SERVER['HTTP_HOST']}/pending.php",
    ),
    "external_reference" => "maicomferre3242@gmail.com"
]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar <?php echo $_GET['v']; ?></title>
    <style>
        h1,h3{ text-align:center;}
        header{background-color:green;}
        .content{ background-color:blue;}

        .card{
            position:relative;
            float:left;
            border:1px solid #000;
            background-color:#FFF;
            width:500px;
            border-radius:6px;
        }
        img{
            width:300px;
        }
        button{
            position:relative;
            padding:10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Loja de roupa</h1>
        <h3>Loja de roupa feita em 10 minutos</h3>

    </header>
    <div class="content">
        <h1> Carrinho: Você está comprando</h1>
        <div class="card">
            <img src="<?php echo $_GET['foto']; ?>" alt="image" /><br />

            <p>Produto: <?php echo $_GET['t']; ?> </p>
            <p>Valor: <?php echo $_GET['v']; ?> </p>
            <div id="wallet_container"></div>
        </div>
    </div>
</body>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>

const mp = new MercadoPago('APP_USR-038af4a1-5d2b-4dec-8eae-c0f207d8740b');
const bricksBuilder = mp.bricks();

mp.bricks().create("wallet", "wallet_container", {
   initialization: {
       preferenceId: "<?php echo $preference->id; ?>",

   },
customization: {
 texts: {
  valueProp: 'smart_option',
 },
 },
});


</script>
</html>
