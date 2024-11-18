<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Data_ukuran_seragamExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('ukuran_seragam_siswa_baru')
                ->join('pendaftaran', 'ukuran_seragam_siswa_baru.id_pendaftaran', '=', 'pendaftaran.id')
                ->join('konsentrasi_keahlian', 'pendaftaran.id_konsentrasi_keahlian', '=', 'konsentrasi_keahlian.id')  // Menambahkan join dengan tabel konsentrasi_keahlian
                ->select(
                    'ukuran_seragam_siswa_baru.*',
                    'pendaftaran.nama',
                    'pendaftaran.no_pendaftaran',
                    'konsentrasi_keahlian.nama_konsentrasi_keahlian'  // Menambahkan kolom nama_konsentrasi_keahlian
                )
                ->get();
    }
    public function headings(): array
    {
        return [
            'No. Pendaftaran',
            'Nama',
            'Konsentrasi Keahlian',
            'Ukuran Baju',
            'Ukuran Celana',
            'Ukuran Sepatu'
        ];
    }

    public function map($row): array
    {
        return [
            $row->no_pendaftaran,
            $row->nama,
            $row->nama_konsentrasi_keahlian,
            $row->ukuran_baju,
            $row->ukuran_celana,
            $row->ukuran_sepatu,
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
