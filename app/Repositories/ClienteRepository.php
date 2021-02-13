<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\ClienteInterface;
use App\Models\Cliente;

class ClienteRepository implements ClienteInterface
{
    
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function all()
    {
        return $this->model->all();
    }
    
    public function create(Cliente $cliente)
    {
        return $cliente->save();
    }
    
    public function update(Cliente $cliente, $id)
    {
        
        return $cliente->save();
    }
    
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function ativos()
    {
        return $this->model->all()->where('ativo','=','1');
    }

}
