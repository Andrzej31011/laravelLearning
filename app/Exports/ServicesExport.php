<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Service;

class ServicesExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function headings(): array
    {
        // Zwróć tablicę z nagłówkami kolumn
        return ['Nazwa', 'Opis', 'Cena'];
    }

    public function collection()
    {
        // Zwróć kolekcję danych do eksportu
        return Service::select('name', 'description', 'price')->get();
    }

    public function styles($sheet)
    {
        // Ustawienie stylu dla nagłówka
        $sheet->getStyle('A1:C1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A1:C1')->getFont()->setBold(true);

        // Ustawienie stylu dla kolumn
        $sheet->getStyle('A2:C' . ($this->collection()->count() + 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A2:C' . ($this->collection()->count() + 1))->getFont()->setBold(false);
    }

}
?>