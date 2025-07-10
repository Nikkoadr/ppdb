<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendaftaranExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('pendaftaran')
            ->join('periode', 'pendaftaran.id_periode', '=', 'periode.id')
            ->join('status_siswa', 'pendaftaran.id_status_siswa', '=', 'status_siswa.id')
            ->join('asal_sekolah', 'pendaftaran.id_asal_sekolah', '=', 'asal_sekolah.id')
            ->join('jenis_kelamin', 'pendaftaran.id_jenis_kelamin', '=', 'jenis_kelamin.id')
            ->join('konsentrasi_keahlian', 'pendaftaran.id_konsentrasi_keahlian', '=', 'konsentrasi_keahlian.id')
            ->join('status_orang_tua', 'pendaftaran.id_status_orang_tua', '=', 'status_orang_tua.id')
            ->select(
                'status_siswa.nama_status_siswa',
                'pendaftaran.no_pendaftaran',
                'periode.tahun_ajaran',
                'periode.periode_aktif',
                'pendaftaran.nisn',
                'pendaftaran.no_kk',
                'pendaftaran.no_nik',
                'pendaftaran.nama',
                'jenis_kelamin.nama_jenis_kelamin',
                'pendaftaran.tempat_lahir',
                'pendaftaran.tanggal_lahir',
                'status_orang_tua.nama_status_orang_tua',
                'pendaftaran.nik_ayah',
                'pendaftaran.nama_ayah',
                'pendaftaran.pekerjaan_ayah',
                'pendaftaran.nik_ibu',
                'pendaftaran.nama_ibu',
                'pendaftaran.pekerjaan_ibu',
                'pendaftaran.blok',
                'pendaftaran.rt',
                'pendaftaran.rw',
                'pendaftaran.desa',
                'pendaftaran.kecamatan',
                'pendaftaran.kabupaten',
                'pendaftaran.no_siswa',
                'pendaftaran.no_wali_siswa',
                'asal_sekolah.nama_asal_sekolah',
                'konsentrasi_keahlian.nama_konsentrasi_keahlian',
                'pendaftaran.referensi',
            )
            ->get();
    }
    public function headings(): array
    {
        return [
            'Status Siswa',
            'No. Pendaftaran',
            'Tahun Ajaran',
            'Periode Aktif',
            'NISN',
            'No. KK',
            'No. NIK',
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Status Orang Tua',
            'NIK Ayah',
            'Nama Ayah',
            'Pekerjaan Ayah',
            'NIK Ibu',
            'Nama Ibu',
            'Pekerjaan Ibu',
            'Blok',
            'RT',
            'RW',
            'Desa',
            'Kecamatan',
            'Kabupaten',
            'No. Siswa',
            'No. Wali Siswa',
            'Asal Sekolah',
            'Konsentrasi Keahlian',
            'Referensi',
        ];
    }

    public function map($row): array
    {
        return [
            $row->nama_status_siswa,
            $row->no_pendaftaran,
            $row->tahun_ajaran,
            $row->periode_aktif,
            "'" . $row->nisn,
            "'" . $row->no_kk,
            "'" . $row->no_nik,
            $row->nama,
            $row->nama_jenis_kelamin,
            $row->tempat_lahir,
            $row->tanggal_lahir,
            $row->nama_status_orang_tua,
            "'" . $row->nik_ayah,
            $row->nama_ayah,
            $row->pekerjaan_ayah,
            "'" . $row->nik_ibu,
            $row->nama_ibu,
            $row->pekerjaan_ibu,
            $row->blok,
            $row->rt,
            $row->rw,
            $row->desa,
            $row->kecamatan,
            $row->kabupaten,
            "'" . $row->no_siswa,
            "'" . $row->no_wali_siswa,
            $row->nama_asal_sekolah,
            $row->nama_konsentrasi_keahlian,
            $row->referensi,
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
