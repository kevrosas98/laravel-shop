<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use App\Helpers\Util;

class VentasExport implements FromCollection, WithMapping, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    //Definimos la cabecera (primera fila del documento)
    public function headings(): array
    {
        return [
            'Pedido',
            'Estado',
            'Fecha',
            'Cliente',
            'Total',
            'Forma Envio',
            'Forma Pago',
            'Pagado',
        ];
    }

    //Estilos cabecera
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:H1')->applyFromArray([
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
    public function map($venta): array
    {
        //Incremento el valor del contador de uno en uno
        return [
            sprintf('%08d', $venta->id),
            Util::formatoEstado($venta->estado),
            Util::formatoFecha($venta->fecha_registro),
            $venta->cliente->nombres,
            number_format($venta->total,2),
            Util::formaEnvio($venta->forma_envio),
            Util::formaPago($venta->forma_pago),
            Util::pagado($venta->pago)
        ];
    }

    //Esta la origen de la fuente de datos

    public function collection()
    {
        return Venta::all();
    }
}
