<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Emprestimo;
use App\Models\Aluno;
use App\Models\Prof;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use DateTime;
use DatePeriod;
use DateInterval;

class EmprestimoController extends Controller
{
    public function index(Request $request)
    {
        $alunos = Aluno::all();

        if (!empty($request->cod_aluno)) {
            if(!empty($request->meses)){
                $emprestimos = Emprestimo::where('cod_aluno',$request->cod_aluno)
                ->whereMonth('created_at',"$request->meses")->get();
                $meses =  ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho',
                'Agosto','Setembro','Outubro','Novembro','Dezembro'];
                $mes = $meses[intval($request->meses - 1)];
                $aluno = Aluno::where('cod_aluno',$request->cod_aluno)->first();
            }else{
                $emprestimos = Emprestimo::where('cod_aluno',$request->cod_aluno)->get();
                $aluno = Aluno::where('cod_aluno',$request->cod_aluno)->first('nome');
                $mes = "Todos os meses";
            }
        }else{
            $emprestimos = null;
            $mes = null;
        }
        $data = [
            'alunos' => $alunos,
            'emprestimos' => $emprestimos,
            'mes' => $mes
        ];
        return view('emprestimos',$data);
    }

    public function cadastro()
    {
        $alunos = Aluno::all();
        $livros = Livro::all();
        $profs = Prof::all();

        $data = [
            'alunos' => $alunos,
            'livros' => $livros,
            'profs' => $profs
        ];

        return view('cadastros.cadastroemprestimo',$data);
    }

    public function store( Request $request )
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d');

        //ACRESCENTA UM INTERVALO DE 7 DIAS
        if($request->intervalo == '1'){
            $data_retorno = DateTime::createFromFormat('Y-m-d', $hoje);
            $data_retorno->add(new DateInterval('P7D'));
            $data_retorno = $data_retorno->format('Y-m-d');

            $emprestimo = new Emprestimo();
            $emprestimo->cod_aluno = $request->cod_aluno;
            $emprestimo->num_reg = $request->num_reg;
            $emprestimo->data_emp = $hoje;
            $emprestimo->cod_prof = $request->cod_prof;
            $emprestimo->data_retorno = $data_retorno;

            $emprestimo->save();

        }
        //ACRESCENTA INTERVALO DE 14 DIAS
        else{
            $data_retorno = DateTime::createFromFormat('Y-m-d', $hoje);
            $data_retorno->add(new DateInterval('P14D'));
            $data_retorno = $data_retorno->format('Y-m-d');

            $emprestimo = new Emprestimo();
            $emprestimo->cod_aluno = $request->cod_aluno;
            $emprestimo->num_reg = $request->num_reg;
            $emprestimo->data_emp = $hoje;
            $emprestimo->cod_prof = $request->cod_prof;
            $emprestimo->data_retorno = $data_retorno;

            $emprestimo->save();
        }

        $data = [
            'disponivel' => 0
        ];

        Livro::where('num_reg',$request->num_reg)->update($data);

        return redirect()->route('emprestimos-index');
}

    public function edit($id)
    {
        $alunos = Aluno::all();
        $livros = Livro::all();
        $profs = Prof::all();
        $emprestimo = Emprestimo::where('num_reg',$id)->first();

       if(!empty($emprestimo)){
        $data = [
            'alunos' => $alunos,
            'livros' => $livros,
            'profs' => $profs,
            'emprestimo' => $emprestimo
        ];

            return view('edit.editemprestimo',$data);

        }
        else{
        return redirect()->route('emprestimos-index');
        }
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d');

    if($request->intervalo == '1'){
        $data_retorno = DateTime::createFromFormat('Y-m-d', $hoje);
        $data_retorno->add(new DateInterval('P7D'));
        $data_retorno = $data_retorno->format('Y-m-d');

        $data = [
            'cod_aluno' => $request->cod_aluno,
            'num_reg' => $request->num_reg,
            'data_emp' => $hoje,
            'cod_prof' => $request->cod_prof,
            'data_retorno' => $data_retorno,
            'status' => 0
        ];
    }else{
        $data_retorno = DateTime::createFromFormat('Y-m-d', $hoje);
        $data_retorno->add(new DateInterval('P14D'));
        $data_retorno = $data_retorno->format('Y-m-d');

        $data = [
            'cod_aluno' => $request->cod_aluno,
            'num_reg' => $request->num_reg,
            'data_emp' => $hoje,
            'cod_prof' => $request->cod_prof,
            'data_retorno' => $data_retorno,
            'status' => 0
        ];
    }

        $data1 = [
            'disponivel' => 0
        ];

        Livro::where('num_reg',$request->num_reg)->update($data1);

        Emprestimo::where('cod_emp',$id)->update($data);
        return redirect()->route('emprestimos-index');
    }

    public function devolverLivro($id){
        $num_reg = Emprestimo::where('cod_emp',$id)->first('num_reg')->num_reg;
        $livro = Livro::where('num_reg',$num_reg)->first('disponivel')->disponivel;
        if ($livro) {
            return redirect()->route('emprestimos-index');
        } else {
            $data = [
                'disponivel' => 1
            ];
            $data1 = [
                'status' => 1
            ];
            Livro::where('num_reg',$num_reg)->update($data);
            Emprestimo::where('cod_emp',$id)->update($data1);
            return redirect()->route('emprestimos-index');
        }
    }

    public function destroy($id)
    {
        Emprestimo::where('cod_emp',$id)->delete();

        return redirect()->route('emprestimos-index');
    }
}
