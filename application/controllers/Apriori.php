<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class Apriori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'adminsuper') {
            $this->session->set_flashdata('message', 'swal("Ops!", "Anda belum login, anda tidak bisa mengakses halaman ini", "error");');
            redirect('auth');
        }

        $this->load->model('M_data');
        $this->load->model('MData');
        $this->load->model('M_admin');
        $this->data = $this->db->get('config')->row();
    }

    public function index()
    {
        echo "cant access";
    }
    public function apri_upload()
    {
        $data['web']    = $this->data;
        $data['list_item'] = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] <> null ? $_POST['action'] : null;
            $config['upload_path'] = './uploads/'; // Specify the path to store uploaded files
            $config['allowed_types'] = 'xls|xlsx'; // Only allow XLSX files
            $config['max_size'] = 2048; // Maximum file size in kilobytes
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_upload')) {
                // File upload failed, display error message
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                // File uploaded successfully, process the data
                $fileInfo = $this->upload->data();
                $filePath = $fileInfo['full_path'];
                $outputapri = $this->extractDataFromExcel($filePath, $action);
                $this->session->set_flashdata('success', 'Data berhasil diupload!');
                $data['list_item'] = $outputapri;
            }
        }
        $data['body']    = 'back/apri_new';
        $data['title']    = 'Apriori';
        $this->load->view('back/template', $data);
    }
    private function extractDataFromExcel($filePath, $action = null)
    {

        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();
        for ($i = 1; $i < count($data); $i++) {
            $datanew = [
                'transaction_date' => date('Y-m-d', strtotime($data[$i][0])),
                'produk' => $data[$i][1]
            ];
            $datanewraw[] = [
                'transaction_date' => date('Y-m-d', strtotime($data[$i][0])),
                'produk' => $data[$i][1]
            ];
            // $this->db->insert('transaksi_apri', $datanew);
        }
        if ($action <> null) {
            foreach ($datanewraw as $datanewraws) {
                $dataraw = explode(",", $datanewraws['produk']);
                foreach ($dataraw as $dataraws) {
                    $cekdata = $this->MData->selectdatawhere('produk_new', ['produk' => $dataraws]);
                    if ($cekdata) {
                        if ($action == "tambah") {
                            $this->MData->edit(['id' => $cekdata->id], 'produk_new', ['qty' => $cekdata->qty + 1]);
                        } else {
                            $this->MData->edit(['id' => $cekdata->id], 'produk_new', ['qty' => $cekdata->qty - 1]);
                        }
                    } else {
                        $datanya = [
                            'produk' => $dataraws,
                            'qty' => 1,
                            'harga' => 0
                        ];
                        $this->MData->tambah('produk_new', $datanya);
                    }
                }
            }
        }
        return $datanewraw;
    }
    public function apri_proses()
    {
        $data['web']    = $this->data;
        $data['body']    = 'back/apri_proses';
        $data['list_item'] = null;
        $data['outputfirst'] = null;
        $data['outputmining'] = null;
        $data['tanggalmulai'] = 0;
        $data['tanggalselesai'] = 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['methodnya'] == "searchrange") {
                $data['tanggalmulai'] = $_POST['tanggal_mulai'];
                $data['tanggalselesai'] = $_POST['tanggal_selesai'];
                $this->db->select('*');
                $this->db->where("DATE(transaction_date) BETWEEN '" . $_POST['tanggal_mulai'] . "' AND '" . $_POST['tanggal_selesai'] . "'", NULL, FALSE);
                $query = $this->db->get('transaksi_apri');
                $data['list_item'] = $query->result();
            } else {
                $dataprocess = $this->processapri();
                $data['outputfirst'] =  $dataprocess['outputfirst'];
                $data['outputmining'] =  $dataprocess['outputmining'];
            }
        }

        $data['title']    = 'Apriori Proses';
        $this->load->view('back/template', $data);
    }
    public function apri_hasil($viewrule = null, $id = null)
    {
        $data['web']    = $this->data;
        $data['body']    = 'back/apri_hasil';
        $data['title']    = 'Apriori Hasil';
        if ($viewrule <> null) {
            $data['body']    = 'back/apri_viewrule';
            $data['title']    = 'Apriori View Rule';
            $sqldataconfidence3 = "SELECT conf.*, log.start_date, log.end_date FROM confidence conf, process_log log WHERE conf.id_process = '$id' AND conf.id_process = log.id AND conf.from_itemset=3 ";
            $data['getdataconfidence3'] = $this->MData->customarray($sqldataconfidence3);
            $sqldataconfidence2 = "SELECT conf.*, log.start_date, log.end_date FROM confidence conf, process_log log WHERE conf.id_process = '$id' AND conf.id_process = log.id AND conf.from_itemset=2 ";
            $data['getdataconfidence2'] = $this->MData->customarray($sqldataconfidence2);
            $data['id_process'] = $id;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
        $data['listlog'] = $this->MData->customarray("SELECT *FROM process_log");
        $this->load->view('back/template', $data);
    }
    private function processapri()
    {
        $field_value = array(
            "start_date" =>  $_POST['tanggal_mulai'],
            "end_date" =>  $_POST['tanggal_selesai'],
            "min_support" => $_POST['min_support'],
            "min_confidence" => $_POST['min_confidence']
        );
        $this->db->insert("process_log", $field_value);
        $id_process = $this->db->insert_id();
        $dataoutputarray = [
            'outputfirst' => $this->getoutputfirst(),
            'outputmining' => $this->mining_process($_POST['min_support'], $_POST['min_confidence'], $_POST['tanggal_mulai'], $_POST['tanggal_selesai'], $id_process)
        ];
        return $dataoutputarray;
    }
    private function getoutputfirst()
    {
        $getdataminsupportrelatif = $this->MData->customrow("SELECT COUNT(*) as total FROM transaksi_apri WHERE transaction_date BETWEEN '{$_POST['tanggal_mulai']}' AND '{$_POST['tanggal_selesai']}'");
        $outputfirst = "Min Support Absolut: " . $_POST['min_support'];
        $outputfirst .= "<br>";
        $minSupportRelatif = ($_POST['min_support'] / $getdataminsupportrelatif->total) * 100;
        $outputfirst .= "Min Support Relatif: " . $minSupportRelatif;
        $outputfirst .= "<br>";
        $outputfirst .= "Min Confidence: " . $_POST['min_confidence'];
        $outputfirst .= "<br>";
        $outputfirst .= "Start Date: " . $_POST['tanggal_mulai'];
        $outputfirst .= "<br>";
        $outputfirst .= "End Date: " . $_POST['tanggal_selesai'];
        $outputfirst .= "<br>";
        return $outputfirst;
    }
    private function mining_process($min_support, $min_confidence, $start_date, $end_date, $id_process)
    {
        //remove reset truncate (change to log mode)
        //reset_temporary($db_object);
        //get  transaksi data to array variable
        $sql_trans = "SELECT * FROM transaksi_apri WHERE transaction_date BETWEEN '$start_date' AND '$end_date' ";
        $result_trans = $this->MData->customarray($sql_trans);
        $dataTransaksi = $item_list = array();
        $jumlah_transaksi = count($result_trans) > 0 ? count($result_trans) : 0;
        $min_support_relative = ($min_support / $jumlah_transaksi) * 100;

        $x = 0;
        foreach ($result_trans as $myrow) {
            $dataTransaksi[$x]['tanggal'] = $myrow['transaction_date'];
            $item_produk = $myrow['produk'] . ",";
            //mencegah ada jarak spasi
            $item_produk = str_replace(" ,", ",", $item_produk);
            $item_produk = str_replace("  ,", ",", $item_produk);
            $item_produk = str_replace("   ,", ",", $item_produk);
            $item_produk = str_replace("    ,", ",", $item_produk);
            $item_produk = str_replace(", ", ",", $item_produk);
            $item_produk = str_replace(",  ", ",", $item_produk);
            $item_produk = str_replace(",   ", ",", $item_produk);
            $item_produk = str_replace(",    ", ",", $item_produk);

            $dataTransaksi[$x]['produk'] = $item_produk;
            $produk = explode(",", $myrow['produk']);
            //all items
            foreach ($produk as $key => $value_produk) {
                //if(!in_array($value_produk, $item_list)){
                if (!in_array(strtoupper($value_produk), array_map('strtoupper', $item_list))) {
                    if (!empty($value_produk)) {
                        $item_list[] = $value_produk;
                    }
                }
            }
            $x++;
        }



        //build itemset 1
        $outputmining = "<br><strong>Itemset 1:</strong><br>";
        $outputmining .= "<table class='table table-bordered table-striped  table-hover'>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Jumlah</th>
                <th>Suppport</th>
                <th>Keterangan</th>
            </tr>";
        $itemset1 = $jumlahItemset1 = $supportItemset1 = $valueIn = array();
        $x = 1;
        foreach ($item_list as $key => $item) {
            $jumlah = $this->jumlah_itemset1($dataTransaksi, $item);
            $support = ($jumlah / $jumlah_transaksi) * 100;
            $lolos = ($support >= $min_support_relative) ? "1" : "0";
            $valueIn[] = "('$item','$jumlah','$support','$lolos','$id_process')";
            if ($lolos) {
                $itemset1[] = $item; //item yg lolos itemset1
                $jumlahItemset1[] = $jumlah;
                $supportItemset1[] = $support;
            }
            $outputmining .= "<tr>";
            $outputmining .= "<td>" . $x . "</td>";
            $outputmining .= "<td>" . $item . "</td>";
            $outputmining .= "<td>" . $jumlah . "</td>";
            $outputmining .= "<td>" . $this->price_format($support) . "</td>";
            $outputmining .= "<td>" . (($lolos == 1) ? "Lolos" : "Tidak Lolos") . "</td>";
            $outputmining .= "</tr>";
            $x++;
        }
        $outputmining .= "</table>";
        //insert into itemset1 one query with many value
        $value_insert = implode(",", $valueIn);
        $sql_insert_itemset1 = "INSERT INTO itemset1 (atribut, jumlah, support, lolos, id_process) "
            . " VALUES " . $value_insert;
        $this->db->query($sql_insert_itemset1);

        //display itemset yg lolos
        $outputmining .= "<br><strong>Itemset 1 yang lolos:</strong><br>";
        $outputmining .= "<table class='table table-bordered table-striped  table-hover'>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Jumlah</th>
                <th>Suppport</th>
            </tr>";
        $x = 1;
        foreach ($itemset1 as $key => $value) {
            $outputmining .= "<tr>";
            $outputmining .= "<td>" . $x . "</td>";
            $outputmining .= "<td>" . $value . "</td>";
            $outputmining .= "<td>" . $jumlahItemset1[$key] . "</td>";
            $outputmining .= "<td>" . $this->price_format($supportItemset1[$key]) . "</td>";
            $outputmining .= "</tr>";
            $x++;
        }
        $outputmining .= "</table>";


        //build itemset2
        $outputmining .= "<br><strong>Itemset 2:</strong><br>";
        $outputmining .= "<table class='table table-bordered table-striped  table-hover'>
            <tr>
                <th>No</th>
                <th>Item1</th>
                <th>Item2</th>
                <th>Jumlah</th>
                <th>Suppport</th>
                <th>Keterangan</th>
            </tr>";
        $NilaiAtribut1 = $NilaiAtribut2 = array();
        $itemset2_var1 = $itemset2_var2 = $jumlahItemset2 = $supportItemset2 = array();
        $valueIn_itemset2 = array();
        $no = 1;
        $a = 0;
        while ($a < count($itemset1)) {
            $b = 0;
            while ($b < count($itemset1)) {
                $variance1 = $itemset1[$a];
                $variance2 = $itemset1[$b];
                if (isset($variance1) && isset($variance2)) {
                    if ($variance1 != $variance2) {
                        if (!$this->is_exist_variasi_itemset($NilaiAtribut1, $NilaiAtribut2, $variance1, $variance2)) {
                            //$jml_itemset2 = get_count_itemset2($db_object, $variance1, $variance2, $start_date, $end_date);
                            $jml_itemset2 = $this->jumlah_itemset2($dataTransaksi, $variance1, $variance2);
                            $NilaiAtribut1[] = $variance1;
                            $NilaiAtribut2[] = $variance2;

                            $support2 = ($jml_itemset2 / $jumlah_transaksi) * 100;
                            $lolos = ($support2 >= $min_support_relative) ? 1 : 0;

                            $valueIn_itemset2[] = "('$variance1','$variance2','$jml_itemset2','$support2','$lolos','$id_process')";
                            if ($lolos) {
                                $itemset2_var1[] = $variance1;
                                $itemset2_var2[] = $variance2;
                                $jumlahItemset2[] = $jml_itemset2;
                                $supportItemset2[] = $support2;
                            }
                            $outputmining .= "<tr>";
                            $outputmining .= "<td>" . $no . "</td>";
                            $outputmining .= "<td>" . $variance1 . "</td>";
                            $outputmining .= "<td>" . $variance2 . "</td>";
                            $outputmining .= "<td>" . $jml_itemset2 . "</td>";
                            $outputmining .= "<td>" . $this->price_format($support2) . "</td>";
                            $outputmining .= "<td>" . (($lolos == 1) ? "Lolos" : "Tidak Lolos") . "</td>";
                            $outputmining .= "</tr>";
                            $no++;
                        }
                    }
                }
                $b++;
            }
            $a++;
        }
        $outputmining .= "</table>";
        //insert into itemset2 one query with many value
        $value_insert_itemset2 = implode(",", $valueIn_itemset2);
        $sql_insert_itemset2 = "INSERT INTO itemset2 (atribut1, atribut2, jumlah, support, lolos, id_process) "
            . " VALUES " . $value_insert_itemset2;
        $this->db->query($sql_insert_itemset2);

        //display itemset yg lolos
        $outputmining .= "<br><strong>Itemset 2 yang lolos:</strong><br>";
        $outputmining .= "<table class='table table-bordered table-striped  table-hover'>
            <tr>
                <th>No</th>
                <th>Item 1</th>
                <th>Item 2</th>
                <th>Jumlah</th>
                <th>Suppport</th>
            </tr>";
        $no = 1;
        foreach ($itemset2_var1 as $key => $value) {
            $outputmining .= "<tr>";
            $outputmining .= "<td>" . $no . "</td>";
            $outputmining .= "<td>" . $value . "</td>";
            $outputmining .= "<td>" . $itemset2_var2[$key] . "</td>";
            $outputmining .= "<td>" . $jumlahItemset2[$key] . "</td>";
            $outputmining .= "<td>" . $this->price_format($supportItemset2[$key]) . "</td>";
            $outputmining .= "</tr>";
            $no++;
        }
        $outputmining .= "</table>";

        //build itemset3
        $outputmining .= "<br><strong>Itemset 3:</strong><br>";
        $outputmining .= "<table class='table table-bordered table-striped  table-hover'>
            <tr>
                <th>No</th>
                <th>Item1</th>
                <th>Item2</th>
                <th>Item3</th>
                <th>Jumlah</th>
                <th>Suppport</th>
                <th>Keterangan</th>
            </tr>";
        $a = 0;
        $tigaVariasiItem = $valueIn_itemset3 =  array();
        $itemset3_var1 = $itemset3_var2 = $itemset3_var3 = $jumlahItemset3 = $supportItemset3 = array();
        $no = 1;
        while ($a < count($itemset2_var1)) {
            $b = 0;
            while ($b < count($itemset2_var1)) {
                if ($a != $b) {
                    $itemset1a = $itemset2_var1[$a];
                    $itemset1b = $itemset2_var1[$b];

                    $itemset2a = $itemset2_var2[$a];
                    $itemset2b = $itemset2_var2[$b];

                    if (!empty($itemset1a) && !empty($itemset1b) && !empty($itemset2a) && !empty($itemset2b)) {

                        $temp_array = $this->get_variasi_itemset3(
                            $tigaVariasiItem,
                            $itemset1a,
                            $itemset1b,
                            $itemset2a,
                            $itemset2b
                        );

                        if (count($temp_array) > 0) {
                            //variasi-variasi itemset isi ke array
                            $tigaVariasiItem = array_merge($tigaVariasiItem, $temp_array);

                            foreach ($temp_array as $idx => $val_nilai) {
                                $itemset1 = $itemset2 = $itemset3 = "";

                                $aaa = 0;
                                foreach ($val_nilai as $idx1 => $v_nilai) {
                                    if ($aaa == 0) {
                                        $itemset1 = $v_nilai;
                                    }
                                    if ($aaa == 1) {
                                        $itemset2 = $v_nilai;
                                    }
                                    if ($aaa == 2) {
                                        $itemset3 = $v_nilai;
                                    }
                                    $aaa++;
                                }

                                //jumlah item set3 dan menghitung supportnya
                                //$jml_itemset3 = get_count_itemset3($db_object, $itemset1, $itemset2, $itemset3, $start_date, $end_date);
                                $jml_itemset3 = $this->jumlah_itemset3($dataTransaksi, $itemset1, $itemset2, $itemset3);
                                $support3 = ($jml_itemset3 / $jumlah_transaksi) * 100;
                                $lolos = ($support3 >= $min_support_relative) ? 1 : 0;

                                $valueIn_itemset3[] = "('$itemset1','$itemset2','$itemset3','$jml_itemset3','$support3','$lolos','$id_process')";

                                if ($lolos) {
                                    $itemset3_var1[] = $itemset1;
                                    $itemset3_var2[] = $itemset2;
                                    $itemset3_var3[] = $itemset3;
                                    $jumlahItemset3[] = $jml_itemset3;
                                    $supportItemset3[] = $support3;
                                }

                                $outputmining .= "<tr>";
                                $outputmining .= "<td>" . $no . "</td>";
                                $outputmining .= "<td>" . $itemset1 . "</td>";
                                $outputmining .= "<td>" . $itemset2 . "</td>";
                                $outputmining .= "<td>" . $itemset3 . "</td>";
                                $outputmining .= "<td>" . $jml_itemset3 . "</td>";
                                $outputmining .= "<td>" . $this->price_format($support3) . "</td>";
                                $outputmining .= "<td>" . (($lolos == 1) ? "Lolos" : "Tidak Lolos") . "</td>";
                                $outputmining .= "</tr>";
                                $no++;
                            }
                        }
                    }
                }
                $b++;
            }
            $a++;
        }
        $outputmining .= "</table>";
        //insert into itemset3 one query with many value
        $value_insert_itemset3 = implode(",", $valueIn_itemset3);
        $sql_insert_itemset3 = "INSERT INTO itemset3(atribut1, atribut2, atribut3, jumlah, support, lolos, id_process) "
            . " VALUES " . $value_insert_itemset3;
        $this->db->query($sql_insert_itemset3);

        //display itemset yg lolos
        $outputmining .= "<br><strong>Itemset 3 yang lolos:</strong><br>";
        $outputmining .= "<table class='table table-bordered table-striped  table-hover'>
            <tr>
                <th>No</th>
                <th>Item 1</th>
                <th>Item 2</th>
                <th>Item 3</th>
                <th>Jumlah</th>
                <th>Suppport</th>
            </tr>";
        $no = 1;
        foreach ($itemset3_var1 as $key => $value) {
            $outputmining .= "<tr>";
            $outputmining .= "<td>" . $no . "</td>";
            $outputmining .= "<td>" . $value . "</td>";
            $outputmining .= "<td>" . $itemset3_var2[$key] . "</td>";
            $outputmining .= "<td>" . $itemset3_var3[$key] . "</td>";
            $outputmining .= "<td>" . $jumlahItemset3[$key] . "</td>";
            $outputmining .= "<td>" . $this->price_format($supportItemset3[$key]) . "</td>";
            $outputmining .= "</tr>";
            $no++;
        }
        $outputmining .= "</table>";


        //hitung confidence
        $confidence_from_itemset = 0;
        //dari itemset 3 jika tidak ada yg lolos ambil dari itemset 2 jika tiak ada gagal mendapatkan confidence
        $sql_3 = "SELECT * FROM itemset3 WHERE lolos = 1 AND id_process = " . $id_process;
        $res_3 = $this->MData->customarray($sql_3);
        $jumlah_itemset3_lolos = $res_3 == false ? 0 : count($res_3);
        if ($jumlah_itemset3_lolos > 0) {
            $confidence_from_itemset = 3;

            foreach ($res_3 as $row_3) {
                $atribut1 = $row_3['atribut1'];
                $atribut2 = $row_3['atribut2'];
                $atribut3 = $row_3['atribut3'];
                $supp_xuy = $row_3['support'];

                //1,2 => 3
                $this->hitung_confidence(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut1,
                    $atribut2,
                    $atribut3,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi
                );

                //2,3 => 1
                $this->hitung_confidence(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut2,
                    $atribut3,
                    $atribut1,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi
                );

                //3,1 => 2
                $this->hitung_confidence(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut3,
                    $atribut1,
                    $atribut2,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi
                );


                //1 => 3,2
                $this->hitung_confidence1(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut1,
                    $atribut3,
                    $atribut2,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi
                );

                //2 => 1,3
                $this->hitung_confidence1(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut2,
                    $atribut1,
                    $atribut3,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi
                );

                //3 => 2,1
                $this->hitung_confidence1(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut3,
                    $atribut2,
                    $atribut1,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi
                );
            }
        }

        //dari itemset 2
        $sql_2 = "SELECT * FROM itemset2 WHERE lolos = 1 AND id_process = " . $id_process;
        $res_2 = $this->MData->customarray($sql_2);
        $jumlah_itemset2_lolos = $res_2 == false ? 0 : count($res_2);
        if ($jumlah_itemset2_lolos > 0) {
            $confidence_from_itemset = 2;
            foreach ($res_2 as $row_2) {
                $atribut1 = $row_2['atribut1'];
                $atribut2 = $row_2['atribut2'];
                $supp_xuy = $row_2['support'];
                //1 => 2
                $this->hitung_confidence2($supp_xuy, $min_support, $min_confidence, $atribut1, $atribut2, $id_process, $dataTransaksi, $jumlah_transaksi);

                //2 => 1
                $this->hitung_confidence2($supp_xuy, $min_support, $min_confidence, $atribut2, $atribut1, $id_process, $dataTransaksi, $jumlah_transaksi);
            }
        }

        if ($confidence_from_itemset == 0) {
            return null;
        }

        return $outputmining;
    }

    private function hitung_confidence(
        $supp_xuy,
        $min_support,
        $min_confidence,
        $atribut1,
        $atribut2,
        $atribut3,
        $id_process,
        $dataTransaksi,
        $jumlah_transaksi
    ) {

        //    $sql1_ = "SELECT support FROM itemset2 "
        //            . " WHERE atribut1 = '".$atribut1."' "
        //            . " AND atribut2 = '".$atribut2."' "
        //            . " AND id_process = ".$id_process;
        //    $res1_ = $db_object->db_query($sql1_);
        //    while($row1_ = $db_object->db_fetch_array($res1_)){
        //hitung nilai support $nilai_support_x seperti di itemset2
        $jml_itemset2 = $this->jumlah_itemset2($dataTransaksi, $atribut1, $atribut2);
        $nilai_support_x = ($jml_itemset2 / $jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1 . " , " . $atribut2;
        $kombinasi2 = $atribut3;
        $supp_x = $nilai_support_x; //$row1_['support'];
        $conf = ($supp_xuy / $supp_x) * 100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence) ? 1 : 0;

        //hitung korelasi lift
        $jumlah_kemunculanAB = $this->jumlah_itemset3($dataTransaksi, $atribut1, $atribut2, $atribut3);
        $PAUB = $jumlah_kemunculanAB / $jumlah_transaksi;

        $jumlah_kemunculanA = $this->jumlah_itemset2($dataTransaksi, $atribut1, $atribut2);
        $jumlah_kemunculanB = $this->jumlah_itemset1($dataTransaksi, $atribut3);

        //$nilai_uji_lift = $PAUB / $jumlah_kemunculanA * $jumlah_kemunculanB;
        $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA / $jumlah_transaksi) * ($jumlah_kemunculanB / $jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift < 1) ? "korelasi negatif" : "korelasi positif";
        if ($nilai_uji_lift == 1) {
            $korelasi_rule = "tidak ada korelasi";
        }

        //masukkan ke table confidence
        $this->db->insert(
            "confidence",
            array(
                "kombinasi1" => $kombinasi1,
                "kombinasi2" => $kombinasi2,
                "support_xUy" => $supp_xuy,
                "support_x" => $supp_x,
                "confidence" => $conf,
                "lolos" => $lolos,
                "min_support" => $min_support,
                "min_confidence" => $min_confidence,
                "nilai_uji_lift" => $nilai_uji_lift,
                "korelasi_rule" => $korelasi_rule,
                "id_process" => $id_process,
                "jumlah_a" => $jumlah_kemunculanA,
                "jumlah_b" => $jumlah_kemunculanB,
                "jumlah_ab" => $jumlah_kemunculanAB,
                "px" => ($jumlah_kemunculanA / $jumlah_transaksi),
                "py" => ($jumlah_kemunculanB / $jumlah_transaksi),
                "pxuy" => $PAUB,
                "from_itemset" => 3
            )
        );
        //    }
    }

    private function hitung_confidence1(
        $supp_xuy,
        $min_support,
        $min_confidence,
        $atribut1,
        $atribut2,
        $atribut3,
        $id_process,
        $dataTransaksi,
        $jumlah_transaksi
    ) {

        //        $sql4_ = "SELECT support FROM itemset1 "
        //                . " WHERE atribut = '".$atribut1."' "
        //                . " AND id_process = ".$id_process;
        //        $res4_ = $db_object->db_query($sql4_);
        //        while($row4_ = $db_object->db_fetch_array($res4_)){
        //hitung nilai support seperti itemset1
        $jml_itemset1 = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $nilai_support_x = ($jml_itemset1 / $jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1;
        $kombinasi2 = $atribut2 . " , " . $atribut3;
        $supp_x = $nilai_support_x; //$row4_['support'];
        $conf = ($supp_xuy / $supp_x) * 100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence) ? 1 : 0;

        //hitung korelasi lift
        $jumlah_kemunculanAB = $this->jumlah_itemset3($dataTransaksi, $atribut1, $atribut2, $atribut3);
        $PAUB = $jumlah_kemunculanAB / $jumlah_transaksi;

        $jumlah_kemunculanA = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $jumlah_kemunculanB = $this->jumlah_itemset2($dataTransaksi, $atribut2, $atribut3);

        $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA / $jumlah_transaksi) * ($jumlah_kemunculanB / $jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift < 1) ? "korelasi negatif" : "korelasi positif";
        if ($nilai_uji_lift == 1) {
            $korelasi_rule = "tidak ada korelasi";
        }


        //masukkan ke table confidence
        $this->db->insert(
            "confidence",
            array(
                "kombinasi1" => $kombinasi1,
                "kombinasi2" => $kombinasi2,
                "support_xUy" => $supp_xuy,
                "support_x" => $supp_x,
                "confidence" => $conf,
                "lolos" => $lolos,
                "min_support" => $min_support,
                "min_confidence" => $min_confidence,
                "nilai_uji_lift" => $nilai_uji_lift,
                "korelasi_rule" => $korelasi_rule,
                "id_process" => $id_process,
                "jumlah_a" => $jumlah_kemunculanA,
                "jumlah_b" => $jumlah_kemunculanB,
                "jumlah_ab" => $jumlah_kemunculanAB,
                "px" => ($jumlah_kemunculanA / $jumlah_transaksi),
                "py" => ($jumlah_kemunculanB / $jumlah_transaksi),
                "pxuy" => $PAUB,
                "from_itemset" => 3
            )
        );
    }


    private function hitung_confidence2(
        $supp_xuy,
        $min_support,
        $min_confidence,
        $atribut1,
        $atribut2,
        $id_process,
        $dataTransaksi,
        $jumlah_transaksi
    ) {

        //        $sql1_ = "SELECT support FROM itemset1 "
        //                    . " WHERE atribut = '".$atribut1."' AND id_process = ".$id_process;
        //        $res1_ = $db_object->db_query($sql1_);
        //        while($row1_ = $db_object->db_fetch_array($res1_)){
        //hitung nilai support seperti itemset1
        $jml_itemset1 = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $nilai_support_x = ($jml_itemset1 / $jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1;
        $kombinasi2 = $atribut2;
        $supp_x = $nilai_support_x; //$row1_['support'];
        $conf = ($supp_xuy / $supp_x) * 100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence) ? 1 : 0;

        //hitung korelasi lift
        $jumlah_kemunculanAB = $this->jumlah_itemset2($dataTransaksi, $atribut1, $atribut2);
        $PAUB = $jumlah_kemunculanAB / $jumlah_transaksi;

        $jumlah_kemunculanA = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $jumlah_kemunculanB = $this->jumlah_itemset1($dataTransaksi, $atribut2);

        $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA / $jumlah_transaksi) * ($jumlah_kemunculanB / $jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift < 1) ? "korelasi negatif" : "korelasi positif";
        if ($nilai_uji_lift == 1) {
            $korelasi_rule = "tidak ada korelasi";
        }

        //masukkan ke table confidence
        $this->db->insert(
            "confidence",
            array(
                "kombinasi1" => $kombinasi1,
                "kombinasi2" => $kombinasi2,
                "support_xUy" => $supp_xuy,
                "support_x" => $supp_x,
                "confidence" => $conf,
                "lolos" => $lolos,
                "min_support" => $min_support,
                "min_confidence" => $min_confidence,
                "nilai_uji_lift" => $nilai_uji_lift,
                "korelasi_rule" => $korelasi_rule,
                "id_process" => $id_process,
                "jumlah_a" => $jumlah_kemunculanA,
                "jumlah_b" => $jumlah_kemunculanB,
                "jumlah_ab" => $jumlah_kemunculanAB,
                "px" => ($jumlah_kemunculanA / $jumlah_transaksi),
                "py" => ($jumlah_kemunculanB / $jumlah_transaksi),
                "pxuy" => $PAUB,
                "from_itemset" => 2
            )
        );
        //        }
    }

    private function jumlah_itemset1($transaksi_list, $produk)
    {
        $count = 0;
        foreach ($transaksi_list as $key => $data) {
            $items = "," . strtoupper($data['produk']);
            $item_cocok = "," . strtoupper($produk) . ",";
            $pos = strpos($items, $item_cocok);
            if ($pos !== false) { //was found at position $pos
                $count++;
            }
        }
        return $count;
    }

    private function jumlah_itemset2($transaksi_list, $variasi1, $variasi2)
    {
        $count = 0;
        foreach ($transaksi_list as $key => $data) {
            $items = "," . strtoupper($data['produk']);
            $item_variasi1 = "," . strtoupper($variasi1) . ",";
            $item_variasi2 = "," . strtoupper($variasi2) . ",";

            $pos1 = strpos($items, $item_variasi1);
            $pos2 = strpos($items, $item_variasi2);
            if ($pos1 !== false && $pos2 !== false) { //was found at position $pos
                $count++;
            }
        }
        return $count;
    }

    private function jumlah_itemset3($transaksi_list, $variasi1, $variasi2, $variasi3)
    {
        $count = 0;
        foreach ($transaksi_list as $key => $data) {
            $items = "," . strtoupper($data['produk']);
            $item_variasi1 = "," . strtoupper($variasi1) . ",";
            $item_variasi2 = "," . strtoupper($variasi2) . ",";
            $item_variasi3 = "," . strtoupper($variasi3) . ",";

            $pos1 = strpos($items, $item_variasi1);
            $pos2 = strpos($items, $item_variasi2);
            $pos3 = strpos($items, $item_variasi3);
            if ($pos1 !== false && $pos2 !== false && $pos3 !== false) { //was found at position $pos
                $count++;
            }
        }
        return $count;
    }
    private function get_variasi_itemset3($array_itemset3, $item1, $item2, $item3, $item4)
    {
        $return = array();

        $return1 = array();
        if (!in_array(strtoupper($item1), array_map('strtoupper', $return1))) {
            $return1[] = $item1;
        }
        if (!in_array(strtoupper($item2), array_map('strtoupper', $return1))) {
            $return1[] = $item2;
        }
        if (!in_array(strtoupper($item3), array_map('strtoupper', $return1))) {
            $return1[] = $item3;
        }

        $return2 = array();
        if (!in_array(strtoupper($item1), array_map('strtoupper', $return2))) {
            $return2[] = $item1;
        }
        if (!in_array(strtoupper($item2), array_map('strtoupper', $return2))) {
            $return2[] = $item2;
        }
        if (!in_array(strtoupper($item4), array_map('strtoupper', $return2))) {
            $return2[] = $item4;
        }

        $return3 = array();
        if (!in_array(strtoupper($item1), array_map('strtoupper', $return3))) {
            $return3[] = $item1;
        }
        if (!in_array(strtoupper($item3), array_map('strtoupper', $return3))) {
            $return3[] = $item3;
        }
        if (!in_array(strtoupper($item4), array_map('strtoupper', $return3))) {
            $return3[] = $item4;
        }

        $return4 = array();
        if (!in_array(strtoupper($item2), array_map('strtoupper', $return4))) {
            $return4[] = $item2;
        }
        if (!in_array(strtoupper($item3), array_map('strtoupper', $return4))) {
            $return4[] = $item3;
        }
        if (!in_array(strtoupper($item4), array_map('strtoupper', $return4))) {
            $return4[] = $item4;
        }

        if (count($return1) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return1)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return1)) {
                    $return[] = $return1;
                }
            }
        }
        if (count($return2) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return2)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return2)) {
                    $return[] = $return2;
                }
            }
        }
        if (count($return3) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return3)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return3)) {
                    $return[] = $return3;
                }
            }
        }
        if (count($return4) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return4)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return4)) {
                    $return[] = $return4;
                }
            }
        }
        return $return;
    }
    private function is_exist_variasi_itemset($array_item1, $array_item2, $item1, $item2)
    {
        $bool1 = array_keys(array_map('strtoupper', $array_item1), strtoupper($item1));
        $bool2 = array_keys(array_map('strtoupper', $array_item2), strtoupper($item2));
        $bool3 = array_keys(array_map('strtoupper', $array_item2), strtoupper($item1));
        $bool4 = array_keys(array_map('strtoupper', $array_item1), strtoupper($item2));

        foreach ($bool1 as $key => $value) {
            $aa = array_search($value, $bool2);
            if (is_numeric($aa)) {
                return true;
            }
        }

        foreach ($bool3 as $key => $value) {
            $aa = array_search($value, $bool4);
            if (is_numeric($aa)) {
                return true;
            }
        }

        return false;
    }
    private function price_format($value)
    {
        return number_format($value, 2, ',', '.');
    }

    private function is_exist_variasi_on_itemset3($array, $tiga_variasi)
    {
        $return = false;

        foreach ($array as $key => $value) {
            $jml = 0;
            foreach ($value as $key1 => $val1) {
                foreach ($tiga_variasi as $key2 => $val2) {
                    if (strtoupper($val1) == strtoupper($val2)) {
                        $jml++;
                    }
                }
            }
            if ($jml == 3) {
                $return = true;
                break;
            }
        }

        return $return;
    }

    private function reset_temporary($db_object)
    {
        $sql1 = "TRUNCATE itemset1";
        $this->db->query($sql1);

        $sql2 = "TRUNCATE itemset2";
        $this->db->query($sql2);

        $sql3 = "TRUNCATE itemset3";
        $this->db->query($sql3);

        $sql4 = "TRUNCATE confidence";
        $this->db->query($sql4);
    }

    private function reset_hitungan($db_object, $id_process)
    {
        $condition = array("id_process" => $id_process);
        $this->db->delete_record("itemset1", $condition);

        //$condition = array("id_process"=>$id_process);
        $this->db->delete_record("itemset2", $condition);

        //$condition = array("id_process"=>$id_process);
        $this->db->delete_record("itemset3", $condition);

        //$condition = array("id_process"=>$id_process);
        $this->db->delete_record("confidence", $condition);
    }
}
