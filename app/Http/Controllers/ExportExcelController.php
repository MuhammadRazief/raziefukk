<?php



namespace App\Http\Controllers;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Response;


class ExportExcelController extends Controller
{
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        // Header kolom
        $sheet->setCellValue('A1', 'ID Penjualan');
        $sheet->setCellValue('B1', 'Nama Produk');
        $sheet->setCellValue('C1', 'Jumlah');
        $sheet->setCellValue('D1', 'Harga');
        $sheet->setCellValue('E1', 'Tanggal');


        $row = 2;


        // Ambil semua penjualan beserta relasi
        $penjualan = Penjualan::with('penjualanDetil.produk')->get();


        foreach ($penjualan as $data) {
            foreach ($data->penjualanDetil as $detil) {
                $sheet->setCellValue('A' . $row, $data->id);
                $sheet->setCellValue('B' . $row, $detil->produk->nama ?? 'Produk Tidak Ditemukan');
                $sheet->setCellValue('C' . $row, $detil->jumlah ?? 0);
                $sheet->setCellValue('D' . $row, $detil->produk->harga ?? 0);
                $sheet->setCellValue('E' . $row, $data->created_at->format('Y-m-d'));
                $row++;
            }
        }


        // Simpan ke file sementara
        $writer = new Xlsx($spreadsheet);
        $fileName = 'penjualan.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);


        // Unduh file
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}




