<?php
// Inclua o autoload do Composer
require __DIR__ . '/vendor/autoload.php';

// Definir o Access Token do Mercado Pago
MercadoPago\SDK::setAccessToken('APP_USR-3031638088616908-091919-fca5c2c37daa9c1102ef8f86e6ca4b0c-1483390300');

// Verifica se a solicitação é um POST (Webhook envia dados via POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura o corpo da solicitação (JSON enviado pelo Mercado Pago)
    $input = file_get_contents("php://input");
    $event = json_decode($input, true);

    // Você pode logar o evento para análise
    file_put_contents('webhook.log', print_r($event, true), FILE_APPEND);

   /* // Processar o evento conforme necessário
    // Aqui você pode verificar o tipo de notificação
    if ($event['type'] == 'payment') {
        // Aqui você pode buscar detalhes do pagamento
        $payment = MercadoPago\Payment::find_by_id($event['data']['id']);

        // Verifica o status do pagamento
        if ($payment->status == 'approved') {
            // Processar o pagamento aprovado
            // Ex: atualizar banco de dados, liberar produto, etc.
        }
    }*/

    // Retorna um status de sucesso para o Mercado Pago
    http_response_code(200);
} else {
    // Caso seja acessado via outro método HTTP
    http_response_code(405); // Método não permitido
}
