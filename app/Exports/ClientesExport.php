<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ClientesExport implements FromCollection, WithMapping, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    //Defino un contador en cero
    private $contador = 0;

    //Definimos la cabecera (primera fila del documento)
    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'DNI',
            'Telefono',
            'Direccion',
            'Email',
            'Estado',
        ];
    }

    //Estilos cabecera
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFF']
                    ],
                    'fill' => array(
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '000000']
                    )
                ]);
            }
        ];
    }

    //Recuperamos una fila en $grupo
    //para luego mostrar los campos en el orden deseado
    public function map($cliente): array
    {
        //Incremento el valor del contador de uno en uno
        $this->contador++;
        return [
            $this->contador,
            $cliente->nombres,
            $cliente->dni,
            $cliente->telefono,
            $cliente->direccion,
            $cliente->email,
            $cliente->estado,
        ];
    }

    //Esta la origen de la fuente de datos

    public function collection()
    {
        return Cliente::all();
    }
}
