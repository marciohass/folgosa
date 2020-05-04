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
use PagSeguro;

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

    public function invoice(Request $request) {

        $item = [
                    'id' => $request->get('id'),
                    'titulo' => $request->get('description'),
                    'valor' => $request->get('amount'),
                    'invoice_number' => $request->get('invoice_number'),
                    'paymentMethod' => $request->get('paymentMethod')
                ];

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        return view('site.invoice', compact(['modelo', 'socials', 'item']));
        // return redirect('invoice', compact('modelo', 'socials'))->with('success', 'Mensagem enviada!');

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

    public function checkout(Request $request) {

        $ddd = substr($request->get('telefone'),1,2);
        $tel = substr($request->get('telefone'),4,10);
        $tel = str_replace('-', '', $tel);

        $bornDate = explode('/', $request->get('bornDate'));
        $bornDate = $bornDate[2].'-'.$bornDate[1].'-'.$bornDate[0];

        $cpf = str_replace('.', '', $request->get('cpf'));
        $cpf = str_replace('-', '', $cpf);

        $data = [
            'items' => [
                [
                    'id' => "'".$request->get('id')."'",
                    'description' => "'".$request->get('description')."'",
                    'quantity' => '1',
                    'amount' => "'".$request->get('amount')."'",
                    'weight' => '45',
                    'shippingCost' => '3.5',
                    'width' => '50',
                    'height' => '45',
                    'length' => '60',
                ],
                [
                    'id' => '19',
                    'description' => 'Item Dois',
                    'quantity' => '1',
                    'amount' => '3.15',
                    'weight' => '50',
                    'shippingCost' => '8.5',
                    'width' => '40',
                    'height' => '50',
                    'length' => '80',
                ],
            ],
            'shipping' => [
                'address' => [
                    'postalCode' => '06410030',
                    'street' => 'Rua Leonardo Arruda',
                    'number' => '12',
                    'district' => 'Jardim dos Camargos',
                    'city' => 'Barueri',
                    'state' => 'SP',
                    'country' => 'BRA',
                ],
                'type' => 2,
                'cost' => 30.4,
            ],
            'sender' => [
                'email' => "'".$request->get('email')."'",
                'name' => "'".$request->get('nome')."'",
                'documents' => [
                    [
                        'number' => "'".$cpf."'",
                        'type' => 'CPF'
                    ]
                ],
                'phone' => [
                    'number' => "'".$tel."'",
                    'areaCode' => "'".$ddd."'",
                ],
                'bornDate' => "'".$bornDate."'",
            ]
        ];
        // print_r($data); die;
        $checkout = PagSeguro::checkout()->createFromArray($data);

        $credentials = PagSeguro::credentials()->get();
        print_r($credentials); die;
        $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
        if ($information) {
            print_r($information->getCode());
            print_r($information->getDate());
            print_r($information->getLink());
            $code = $information->getCode();

            $credentials = PagSeguro::credentials()->get();
            $transaction = PagSeguro::transaction()->get($code, $credentials);
            $information2 = $transaction->getInformation();
            if($information2) {
                print_r($information2);
            }
        }

    }

    public function paymentmethod(Request $request) {

        $item = [
            'id' => $request->get('id'),
            'description' => $request->get('titulo'),
            'amount' => $request->get('valor')
        ];

        $invoice_number = strtoupper($this->generateRandomString(10));

        $modelo = Modelos::get();

        $socials = RedeSociais::get();

        return view('site.paymentmethod', compact(['modelo', 'socials', 'item', 'invoice_number']));

    }

    public function pedido(Request $request) {

        $paymentMethod = $request->get('paymentMethod');

        $TokenCard=$_POST['TokenCard'];
        $HashCard=$_POST['HashCard'];
        $QtdParcelas=filter_input(INPUT_POST,'QtdParcelas',FILTER_SANITIZE_SPECIAL_CHARS);
        $ValorParcelas=filter_input(INPUT_POST,'ValorParcelas',FILTER_SANITIZE_SPECIAL_CHARS);

        $nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
        $ddd = substr(filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_SPECIAL_CHARS),1,2);
        $tel = substr(filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_SPECIAL_CHARS),4,10);
        $tel = str_replace('-', '', $tel);
        $bornDate = filter_input(INPUT_POST,'bornDate',FILTER_SANITIZE_SPECIAL_CHARS);

        $cpf = str_replace('.', '', filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_SPECIAL_CHARS));
        $cpf = str_replace('-', '', $cpf);

        $cep=str_replace('-','',filter_input(INPUT_POST,'cep',FILTER_SANITIZE_SPECIAL_CHARS));
        $endereco=filter_input(INPUT_POST,'endereco',FILTER_SANITIZE_SPECIAL_CHARS);
        $numero=filter_input(INPUT_POST,'numero',FILTER_SANITIZE_SPECIAL_CHARS);
        $complemento=filter_input(INPUT_POST,'complemento',FILTER_SANITIZE_SPECIAL_CHARS);
        $bairro=filter_input(INPUT_POST,'bairro',FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade=filter_input(INPUT_POST,'cidade',FILTER_SANITIZE_SPECIAL_CHARS);
        $uf=filter_input(INPUT_POST,'uf',FILTER_SANITIZE_SPECIAL_CHARS);

        $id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);
        $description=filter_input(INPUT_POST,'description',FILTER_SANITIZE_SPECIAL_CHARS);
        $amount=filter_input(INPUT_POST,'amount',FILTER_SANITIZE_SPECIAL_CHARS);

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
        $Data["reference"]="83783783737";
        $Data["senderName"]=$nome;
        $Data["senderCPF"]=$cpf;
        $Data["senderAreaCode"]=$ddd;
        $Data["senderPhone"]=$tel;
        $Data["senderEmail"]="c51994292615446022931@sandbox.pagseguro.com.br";
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
        $Data["creditCardHolderName"]='Jose Comprador';
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
        return var_dump($Xml);
    }

    public function generateRandomString($length = 6) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

}
