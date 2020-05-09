<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;
use App\Models\Modelos;
use App\Models\Vendas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // quadros de totais
        $count_vendas = Vendas::count();
        $count_assinantes = Vendas::where('tipo_venda', '=', 'S')->count();
        $count_presentes = Vendas::where('tipo_venda', '=', 'G')->count();
        $count_produtos = Vendas::where('tipo_venda', '=', 'P')->count();

        // gráfico mês
        $ano_atual = date('Y');

        for($x=1; $x<=12;$x++) {
            $mes = str_pad($x, 2, 0, STR_PAD_LEFT);
            $qtd_venda_mes[] = Vendas::whereYear('created_at', '=', $ano_atual)->whereMonth('created_at', '=', $mes)->count();
        }
        $total_meses = implode(',',$qtd_venda_mes);


        // gráfico diário
        $mes_atual = date('m');

        $numero_dias = cal_days_in_month(CAL_GREGORIAN, $mes_atual, $ano_atual);

        for($x=1; $x<=$numero_dias; $x++) {
            $dia = str_pad($x, 2, 0, STR_PAD_LEFT);
            $dia_grafico[] = $dia;
            $cores_grafico[] = "#6610f2";
            $qtd_venda_dia[] = Vendas::whereYear('created_at', '=', $ano_atual)->whereMonth('created_at', '=', $mes_atual)->whereDay('created_at', '=', $dia)->count();
        }
        $total_dias = implode(',', $qtd_venda_dia);
        $dias_grafico = implode(',', $dia_grafico);
        $cores = "'".implode("','", $cores_grafico)."'";
        $a = htmlentities($cores);
        $cores = html_entity_decode($a);

        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d');
        $mes_extenso = strftime("%B", strtotime( $date ));


        $modelos = Modelos::where('user_id', '=', auth()->user()->id)->get();

        return view('admin/dashboard', compact('count_vendas','count_assinantes','count_presentes','count_produtos','modelos', 'total_meses', 'total_dias', 'dias_grafico', 'cores', 'mes_extenso'));
    }
}
