<?php 

namespace App\Interfaces;

use App\Models\Cliente;

interface ClienteInterface
{
    public function all();

    public function create(Cliente $cliente);

    public function update(Cliente $cliente, $id);

    public function delete($id);

    public function show($id);

    public function ativos();
}