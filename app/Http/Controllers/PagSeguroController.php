<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PagSeguro;

class PagSeguroController extends Controller
{
    public function index()
    {
        return view('pagseguro');
    }
    public function boleto(Request $request)
    {
        $pagseguro = PagSeguro::setReference('1')
            ->setSenderInfo([
                'senderName' => 'Juan Melo', //Deve conter nome e sobrenome
                'senderPhone' => '(75) 9245-9686', //Código de área enviado junto com o telefone
                'senderEmail' => 'juan@email.com',
                'senderHash' => $request->pagseguro_token,
                'senderCPF' => '34297763095' //Ou CNPJ se for Pessoa Júridica
            ])

            ->setItems([
                [
                    'itemId' => '1',
                    'itemDescription' => 'Teste',
                    'itemAmount' => 50.00, //Valor unitário
                    'itemQuantity' => '2', // Quantidade de itens
                ],
            ])
            ->send([
                'paymentMethod' => 'boleto'
            ]);
        dd($pagseguro, $pagseguro->paymentLink);
    }
}