<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Laracasts\Flash;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClienteExport;

class ClienteController extends Controller
{

	protected $model;

   	public function __construct(Cliente $cliente)
   	{
    	// set the model
       	$this->model = new ClienteRepository($cliente);
   	}


    public function index(Request $request)
    {
        $clientes = $this->model->all();
        return view('clientes.index')->with('clientes', $clientes);
    }

    public function create()
    {
        return view('clientes.novo');
    }

    public function store(Request $request)
    {

   		try {

	      	$fields = $this->model->getModel()->fillable;
	      	$fields = $request->only($fields);

	      	$cliente = new Cliente([
	      		"nome" 		 => $fields['nome'],
				"galc" 		 => $fields['galc'],
				"porta" 	 => $fields['porta'],
			    "endereco" 	 => $fields['endereco'],
				"velocidade" => $fields['velocidade'],
				"ativo" 	 => $fields['ativo'],

	      	]);

	      	$save = $this->model->create($cliente);

	      	if($save==false){
	      		throw new \Exception('Erro ao Salvar o cliente!');
      		}

      		 \flash('Cliente Salvo com Suceso')->success();
            return redirect()->route('cliente.index');

      	} catch (\Exception $e) {
   			 \flash($e->getMessage())->error();
            return redirect(route('cliente.index'));
   		}

    }

    public function show($id){
    	$cliente = $this->model->show($id);

    	if(empty($cliente)){
    		\flash('Cliente Não encontrado!')->error();
    		return redirect(route('cliente.index'));
    	}

    	return view('clientes.mostrar')->with('cliente', $cliente);
    }

    public function delete($id){

    	$delete = $this->model->delete($id);

    	if($delete==false){
    		\flash('Cliente Não encontrado!')->error();
    		return redirect(route('cliente.index'));
    	}

    	return redirect(route('cliente.index'));

    }

    public function edit($id){
    	$cliente = $this->model->show($id);

    	if(empty($cliente)){
    		\flash('Cliente Não encontrado!')->error();
    		return redirect(route('cliente.index'));
    	}

    	return view('clientes.editar')->with('cliente', $cliente);
    }

    public function update(Request $request, $id){

    	try {

	    	$cliente = $this->model->show($id);

	    	if (empty($cliente)) {
	            throw new \Exception('Erro ao atualizar informações do cliente!');
	        }

	    	$fields = $this->model->getModel()->fillable;
	      	$fields = $request->only($fields);

	    	$cliente->nome 		 = $fields['nome'];
			$cliente->galc 		 = $fields['galc'];
			$cliente->porta 	 = $fields['porta'];
		    $cliente->endereco 	 = $fields['endereco'];
			$cliente->velocidade = $fields['velocidade'];
			$cliente->ativo 	 = $fields['ativo'];

	        $update = $this->model->update($cliente, $id);

	        if($update==false){
	      		throw new \Exception('Erro ao atualizar informações do cliente!');
	  		}

	  		\flash('Cliente Salvo com Suceso')->success();
	        return redirect()->route('cliente.index');

    	} catch (Exception $e) {
    		\flash($e->getMessage())->error();
            return redirect(route('cliente.index'));
    	}

    }

    public function ativar($id){

    	try {
    		$cliente = $this->model->show($id);
    		$cliente->ativo 	 = 1;

    		$update = $this->model->update($cliente, $id);

    		if($update==false){
	      		throw new \Exception('Erro ao atualizar informações do cliente!');
	  		}

	  		\flash('Cliente Salvo com Suceso')->success();
	        return redirect()->route('cliente.index');

    	} catch (Exception $e) {
    		\flash($e->getMessage())->error();
            return redirect(route('cliente.index'));
    	}
    }

    public function desativar($id){

    	try {
    		$cliente = $this->model->show($id);
    		$cliente->ativo 	 = 0;

    		$update = $this->model->update($cliente, $id);

    		if($update==false){
	      		throw new \Exception('Erro ao atualizar informações do cliente!');
	  		}

	  		\flash('Cliente Salvo com Suceso')->success();
	        return redirect()->route('cliente.index');

    	} catch (Exception $e) {
    		\flash($e->getMessage())->error();
            return redirect(route('cliente.index'));
    	}
    }

    public function ativos(){
    	$clientes = $this->model->ativos();
        return view('clientes.ativos')->with('clientes', $clientes);
    }

    public function exportarExcel(){
        return Excel::download(new ClienteExport, 'clientes.xlsx');
    }

    public function exportarPDF(){
        return Excel::download(new ClienteExport, 'clientes.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
}
