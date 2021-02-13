<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClienteExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Cliente::select('id','nome','galc','endereco','velocidade','porta','created_at')->where('ativo','=','1')->get();
    }

    public function headings(): array
    {
        return ['id', 'Nome', 'Galc', 'Endereço', 'Velocidade', 'Porta','Data de Cadastro'];
    }

     public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

}