<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Assinaturas;
use App\Models\RedeSociais;
use App\Models\Produtos;
use App\Models\Modelos;
use App\Models\Contatos;
use App\Models\Comentarios;
use App\Models\Vendas;
use App\Models\Clientes;
use PagSeguro;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUser;
use App\Mail\SendMailContact;

class SiteController extends Controller
{
    public function home() {

        $banners = Banners::get();

        $assinaturas = Assinaturas::get();

        $socials = RedeSociais::get();

        $modelo = Modelos::get();

        return view('site.home', compact(['banners', 'assinaturas', 'socials', 'modelo']));
    }

    public function loja() {

        $banners = Banners::get();

        $socials = RedeSociais::get();

        $produtos = Produtos::get();

        $modelo = Modelos::get();

        $md = 'order-md-2';

        $md1 = 'order-md-1';

        return view('site.loja', compact(['socials', 'banners', 'produtos', 'md', 'md1', 'modelo']));
    }

    public function promocao() {

        $banners = Banners::get();

        $socials = RedeSociais::get();

        $produtos = Produtos::where('promocao', '=', 1)->orWhere('novidade', '=', 1)->get();

        $modelo = Modelos::get();

        $md = 'order-md-2';

        $md1 = 'order-md-1';

        return view('site.promo', compact(['socials', 'banners', 'produtos', 'md', 'md1', 'modelo']));
    }

    public function contato() {

        $socials = RedeSociais::get();

        $modelo = Modelos::get();

        return view('site.contato', compact(['socials', 'modelo']));
    }

    public function storeContato(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'email'=> 'required',
            'mensagem'=> 'required'
          ]);

        $contato = new Contatos([
            'nome' => $request->get('nome'),
            'email'=> $request->get('email'),
            'telefone'=> $request->get('telefone'),
            'mensagem'=> $request->get('mensagem')
          ]);

        $contato->save();

        Mail::to($request->get('email'))->send(new SendMailContact($contato));

        return redirect('contato')->with('success', 'Mensagem enviada!');

    }

    public function comentarios() {

        $comentarios = Comentarios::get();

        $socials = RedeSociais::get();

        $modelo = Modelos::get();

        return view('site.comentario', compact(['comentarios', 'socials', 'modelo']));
    }

    public function storeComentario(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'comentario'=> 'required'
          ]);

        $comentario = new Comentarios([
            'nome' => $request->get('nome'),
            'comentario'=> $request->get('comentario')
          ]);

        $comentario->save();

        $comentarios = Comentarios::get();

        $socials = RedeSociais::get();

        return view('site.comentario', compact(['comentarios', 'socials']));

    }

    public function gifts() {

        $socials = RedeSociais::get();

        $modelo = Modelos::get();

        return view('site.gifts', compact(['socials', 'modelo']));
    }

    public function redirectcheckout(Request $request) {

        $item = [
            'id' => $request->get('id'),
            'titulo' => $request->get('description'),
            'valor' => $request->get('amount'),
            'invoice_number' => $request->get('invoice_number'),
            'paymentMethod' => $request->get('paymentMethod'),
            'tipo_venda' => $request->get('tipo_venda')
        ];

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        if($item['paymentMethod'] == 'creditCard') {
            return view('site.checkoutcard', compact(['modelo', 'socials', 'item']));

        } elseif ($item['paymentMethod'] == 'boleto') {
            return view('site.checkoutboleto', compact(['modelo', 'socials', 'item']));
        }
    }

    public function checkoutcard(Request $request) {

        $item = [
                    'id' => $request->get('id'),
                    'titulo' => $request->get('description'),
                    'valor' => $request->get('amount'),
                    'tipo_venda' => $request->get('tipo_venda'),
                    'invoice_number' => $request->get('invoice_number'),
                    'paymentMethod' => $request->get('paymentMethod')
                ];

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        return view('site.checkoutcard', compact(['modelo', 'socials', 'item']));
        // return redirect('invoice', compact('modelo', 'socials'))->with('success', 'Mensagem enviada!');

    }

    public function checkoutboleto() {
        $item = [
            'id' => $request->get('id'),
            'titulo' => $request->get('description'),
            'valor' => $request->get('amount'),
            'tipo_venda' => $request->get('tipo_venda'),
            'invoice_number' => $request->get('invoice_number'),
            'paymentMethod' => $request->get('paymentMethod')
        ];

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        return view('site.checkoutboleto', compact(['modelo', 'socials', 'item']));
    }

    public function startSession() {

        $email_pagseguro = 'marciohhss@gmail.com';
        $token = '50c6dba5-b21e-4df8-a86b-c90afb1f888fc7a009d54ea4aa3163bfd6bff332e9f3f3bb-d384-45af-8304-0a1f17085a54';

        $Url="https://ws.pagseguro.uol.com.br/v2/sessions?email=".$email_pagseguro."&token=".$token."";
        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,1);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);

        $Xml=simplexml_load_string($Retorno);
        return json_encode($Xml);

    }

    public function paymentmethod(Request $request) {

        $item = [
            'id' => $request->get('id'),
            'description' => $request->get('titulo'),
            'amount' => $request->get('valor'),
            'tipo_venda' => $request->get('tipo_venda')
        ];

        $invoice_number = strtoupper($this->generateRandomString(12));

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        return view('site.paymentmethod', compact(['modelo', 'socials', 'item', 'invoice_number']));

    }

    public function boleto(Request $request) {

        $paymentMethod = $request->get('paymentMethod');
        $HashCard=$_POST['HashCard'];
        $reference = $request->get('invoice_number');

        $nome=$request->get('nome');
        $email=$request->get('email');
        $ddd = substr($request->get('telefone'),1,2);
        $tel = substr($request->get('telefone'),4,10);
        $tel = str_replace('-', '', $tel);
        $data_nascimento = explode('/', $request->get('bornDate'));
        $data_nascimento = $data_nascimento[2].'-'.$data_nascimento[1].'-'.$data_nascimento[0];

        $cpf = str_replace('.', '', $request->get('cpf'));
        $cpf = str_replace('-', '', $cpf);

        $cep=str_replace('-','',$request->get('cep'));
        $endereco=$request->get('endereco');
        $numero=$request->get('numero');
        $complemento=$request->get('complemento');
        $bairro=$request->get('bairro');
        $cidade=$request->get('cidade');
        $uf=$request->get('uf');

        $id=$request->get('id');
        $description=$request->get('description');
        $amount=$request->get('amount');
        $tipo_venda = $request->get('tipo_venda');

        $Data["email"]="marciohhss@gmail.com";
        $Data["token"]="50c6dba5-b21e-4df8-a86b-c90afb1f888fc7a009d54ea4aa3163bfd6bff332e9f3f3bb-d384-45af-8304-0a1f17085a54";
        $Data["paymentMode"]="default";
        $Data["paymentMethod"]=$paymentMethod;
        $Data["receiverEmail"]="marciohhss@gmail.com";
        $Data["currency"]="BRL";
        $Data["itemId1"] = $id;
        $Data["itemDescription1"] = $description;
        $Data["itemAmount1"] = $amount;
        $Data["itemQuantity1"] = 1;
        $Data["notificationURL="]="https://www.meusite.com.br/notificacao.php";
        $Data["reference"]=$reference;
        $Data["senderName"]=$nome;
        $Data["senderCPF"]=$cpf;
        $Data["senderAreaCode"]=$ddd;
        $Data["senderPhone"]=$tel;
        $Data["senderEmail"]="c51994292615446022931@sandbox.pagseguro.com.br";
        $Data["senderHash"]=$HashCard;
        $Data["shippingAddressStreet"]=$endereco;
        $Data["shippingAddressNumber"]=$numero;
        $Data["shippingAddressComplement"]=$complemento;
        $Data["shippingAddressDistrict"]=$bairro;
        $Data["shippingAddressPostalCode"]=$cep;
        $Data["shippingAddressCity"]=$cidade;
        $Data["shippingAddressState"]=$uf;
        $Data["shippingAddressCountry"]="BRA";
        $Data["shippingType"]="1";
        $Data["shippingCost"]="0.00";
        $Data["billingAddressStreet"]=$endereco;
        $Data["billingAddressNumber"]=$numero;
        $Data["billingAddressComplement"]=$complemento;
        $Data["billingAddressDistrict"]=$bairro;
        $Data["billingAddressPostalCode"]=$cep;
        $Data["billingAddressCity"]=$cidade;
        $Data["billingAddressState"]=$uf;
        $Data["billingAddressCountry"]="BRA";

        // monta array cliente
        $cliente = new Clientes([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $request->get('telefone'),
            'data_nascimento' => $data_nascimento,
            'cep' => $cep,
            'endereco' => $endereco,
            'numero' => $numero,
            'complemento' => $complemento,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'uf' => $uf
        ]);

        $cliente->save();
        $cliente_id = $cliente->id;

        if($tipo_venda == 'S') {
            $assinatura_id = $id;
            $produto_id = NULL;

        } elseif($tipo_venda == 'P') {
            $assinatura_id = NULL;
            $produto_id = $id;

        } elseif($tipo_venda == 'G') {
            $assinatura_id = NULL;
            $produto_id = NULL;
        }

        // monta array de venda
        $venda = new Vendas([
                        'reference' => $reference,
                        'produto' => $description,
                        'valor' => $amount,
                        'metodo_pagamento' => $paymentMethod,
                        'tipo_venda' => $tipo_venda,
                        'produto_id' => $produto_id,
                        'assinatura_id' => $assinatura_id,
                        'cliente_id' => $cliente_id
                    ]);
        // salva na tabela de vendas
        $venda->save();

        $BuildQuery=http_build_query($Data);
        $Url="https://ws.pagseguro.uol.com.br/v2/transactions";

        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,true);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);

        $Xml=simplexml_load_string($Retorno);
        /*
        echo "
        <script>
            window.location.href='$Xml->paymentLink';
        </script>";
        */

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        $link = $Xml->paymentLink;
        $codigo = $Xml->code;
        $codigo_pedido = $reference;

        if(!empty($link)) {
            Mail::to($email)->send(new SendMailUser($Data, $codigo));
            return view('site.finalizado', compact(['modelo', 'socials', 'link', 'codigo', 'codigo_pedido']));
        }

    }

    public function pedido(Request $request) {

        $paymentMethod = $request->get('paymentMethod');

        $TokenCard=$_POST['TokenCard'];
        $HashCard=$_POST['HashCard'];
        $QtdParcelas=$request->get('QtdParcelas');
        $ValorParcelas=$request->get('ValorParcelas');

        $reference = $request->get('invoice_number');

        $nome=$request->get('nome');
        $email=$request->get('email');
        $ddd = substr($request->get('telefone'),1,2);
        $tel = substr($request->get('telefone'),4,10);
        $tel = str_replace('-', '', $tel);
        $bornDate = $request->get('bornDate');
        $data_nascimento = explode('/', $request->get('bornDate'));
        $data_nascimento = $data_nascimento[2].'-'.$data_nascimento[1].'-'.$data_nascimento[0];

        $cpf = str_replace('.', '', $request->get('cpf'));
        $cpf = str_replace('-', '', $cpf);

        $cep=str_replace('-','',$request->get('cep'));
        $endereco=$request->get('endereco');
        $numero=$request->get('numero');
        $complemento=$request->get('complemento');
        $bairro=$request->get('bairro');
        $cidade=$request->get('cidade');
        $uf=$request->get('uf');

        $id=$request->get('id');
        $description=$request->get('description');
        $amount=$request->get('amount');
        $tipo_venda = $request->get('tipo_venda');

        $Data["email"]="marciohhss@gmail.com";
        $Data["token"]="50c6dba5-b21e-4df8-a86b-c90afb1f888fc7a009d54ea4aa3163bfd6bff332e9f3f3bb-d384-45af-8304-0a1f17085a54";
        $Data["paymentMode"]="default";
        $Data["paymentMethod"]=$paymentMethod;
        $Data["receiverEmail"]="marciohhss@gmail.com";
        $Data["currency"]="BRL";
        $Data["itemId1"] = $id;
        $Data["itemDescription1"] = $description;
        $Data["itemAmount1"] = $amount;
        $Data["itemQuantity1"] = 1;
        $Data["notificationURL="]="https://www.meusite.com.br/notificacao.php";
        $Data["reference"]=$reference;
        $Data["senderName"]=$nome;
        $Data["senderCPF"]=$cpf;
        $Data["senderAreaCode"]=$ddd;
        $Data["senderPhone"]=$tel;
        $Data["senderEmail"]=$email;
        $Data["senderHash"]=$HashCard;
        $Data["shippingType"]="1";
        $Data["shippingAddressStreet"]=$endereco;
        $Data["shippingAddressNumber"]=$numero;
        $Data["shippingAddressComplement"]=$complemento;
        $Data["shippingAddressDistrict"]=$bairro;
        $Data["shippingAddressPostalCode"]=$cep;
        $Data["shippingAddressCity"]=$cidade;
        $Data["shippingAddressState"]=$uf;
        $Data["shippingAddressCountry"]="BRA";
        $Data["shippingType"]="1";
        $Data["shippingCost"]="0.00";
        $Data["creditCardToken"]=$TokenCard;
        $Data["installmentQuantity"]=$QtdParcelas;
        $Data["installmentValue"]=$ValorParcelas;
        $Data["noInterestInstallmentQuantity"]=2;
        $Data["creditCardHolderName"]=$nome;
        $Data["creditCardHolderCPF"]=$cpf;
        $Data["creditCardHolderBirthDate"]=$bornDate;
        $Data["creditCardHolderAreaCode"]=$ddd;
        $Data["creditCardHolderPhone"]=$tel;
        $Data["billingAddressStreet"]=$endereco;
        $Data["billingAddressNumber"]=$numero;
        $Data["billingAddressComplement"]=$complemento;
        $Data["billingAddressDistrict"]=$bairro;
        $Data["billingAddressPostalCode"]=$cep;
        $Data["billingAddressCity"]=$cidade;
        $Data["billingAddressState"]=$uf;
        $Data["billingAddressCountry"]="BRA";

        // monta array cliente
        $cliente = new Clientes([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $request->get('telefone'),
            'data_nascimento' => $data_nascimento,
            'cep' => $cep,
            'endereco' => $endereco,
            'numero' => $numero,
            'complemento' => $complemento,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'uf' => $uf
        ]);

        $cliente->save();
        $cliente_id = $cliente->id;

        if($tipo_venda == 'S') {
            $assinatura_id = $id;
            $produto_id = NULL;

        } elseif($tipo_venda == 'P') {
            $assinatura_id = NULL;
            $produto_id = $id;

        } elseif($tipo_venda == 'G') {
            $assinatura_id = NULL;
            $produto_id = NULL;

        }

        // monta array de venda
        $venda = new Vendas([
                    'reference' => $reference,
                    'produto' => $description,
                    'valor' => $amount,
                    'metodo_pagamento' => $paymentMethod,
                    'tipo_venda' => $tipo_venda,
                    'produto_id' => $produto_id,
                    'assinatura_id' => $assinatura_id,
                    'cliente_id' => $cliente_id
                ]);
        // salva na tabela de vendas
        $venda->save();

        $BuildQuery=http_build_query($Data);
        $Url="https://ws.pagseguro.uol.com.br/v2/transactions";

        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,true);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);

        $Xml=simplexml_load_string($Retorno);
        // return var_dump($Xml);

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        $codigo = $Xml->code;
        $codigo_pedido = $reference;

        if(!empty($codigo)) {

            Mail::to($email)->send(new SendMailUser($Data, $codigo));
            return view('site.finalizado', compact(['modelo', 'socials', 'codigo', 'codigo_pedido']));
        }
    }

    public function generateRandomString($length = 6) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function finalizado() {
        return view('site.finalizado');
    }

}
