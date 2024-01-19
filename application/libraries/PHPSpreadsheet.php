<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PHPSpreadsheet {

    protected $spreadsheet;

    public function __construct() {
        $this->spreadsheet = new Spreadsheet();
    }

    public function loadExcelFile($filename) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $this->spreadsheet = $reader->load($filename);
    }

    public function addDataToSheet($data, $sheetIndex = 0) {
        $this->spreadsheet->setActiveSheetIndex($sheetIndex);
        $sheet = $this->spreadsheet->getActiveSheet();

        // Add your data to the sheet, for example:
        // $sheet->setCellValue('A1', $data['A1']);
        // $sheet->setCellValue('B1', $data['B1']);
        // ...

        // Or you can use a loop to add data dynamically:
        foreach ($data as $cell => $value) {
            $sheet->setCellValue($cell, $value);
        }
    }

    public function save($filename) {
        $writer = new Xlsx($this->spreadsheet);
        $writer->save($filename);
    }
}
