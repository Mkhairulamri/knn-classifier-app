<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

require 'vendor/autoload.php';


class klasifikasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model("LatihModel");
		$this->load->model("Batita_model");
		// $this->load->library(array('excel'));
		// $this->load->library('PHPSpreadsheet');
		// $this->load->model('excel_model');


		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alertdismissible fade show" role="alert"> Anda Belum Login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
			redirect('administrator/auth');
		}
	}

	public function input()
	{

		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Input Data klasifikasi";


		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		//memanggilView,namunkitamenambahkan$datauntukmembawadatadarimodelkedalamView,sehingga$datadalamviewmerupakansebuaharrayyangberisidatadarimodel

		$this->load->view('administrator/input_klasifikasi', $data);
		$this->load->view('template_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
            Isi data dengan benar !
            <button type="button"class="close"data-dismiss="alert"aria-label="Close">
            <spanaria-hidden="true">&times;
            </span>
            </button>
            </div>');
			redirect('administrator/klasifikasi/input');
		} else {
			$data = array(

				'id_user' => $this->input->post('id_user', TRUE),
				'ibu' => $this->input->post('ibu', TRUE),
				'nama' => $this->input->post('nama', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'umur' => $this->input->post('umur', TRUE),
				'kelamin' => $this->input->post('kelamin', TRUE),
				'berat' => $this->input->post('berat', TRUE),
				'tinggi' => $this->input->post('tinggi', TRUE),
				'imt' => $this->input->post('imt', TRUE),
			);

			$this->klasifikasi_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
            Data klasifikasi Berhasil Ditambahkan!
            <button type="button"class="close"data-dismiss="alert"aria-label="Close">
            <spanaria-hidden="true">&times;
            </span>
            </button>
            </div>');
			redirect('administrator/klasifikasi');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama wajib di isi!']);
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', ['required' => 'Tanggal lahir wajib di isi!']);
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', ['required' => 'Jenis Kelamin wajib di isi!']);
		$this->form_validation->set_rules('berat', 'berat', 'required', ['required' => 'Berat Badan wajib di isi!']);
		$this->form_validation->set_rules('tinggi', 'tinggi', 'required', ['required' => 'Tinggi Badan wajib di isi!']);
	}

	public function data_latih_rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama wajib di isi!']);
		$this->form_validation->set_rules('kelamin', 'kelamin', 'required', ['required' => 'Jenis Kelamin wajib di isi!']);
		$this->form_validation->set_rules('berat', 'berat', 'required', ['required' => 'Berat badan wajib di isi!']);
		$this->form_validation->set_rules('tinggi', 'tinggi', 'required', ['required' => 'Tinggi Badan wajib di isi!']);
		$this->form_validation->set_rules('diagnosa', 'diagnosa', 'required', ['required' => 'Diagnosa Bayi wajib di isi!']);
	}

	public function update($id)
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Data klasifikasi";

		$where = array('id_klasifikasi' => $id);
		$data['klasifikasi'] = $this->klasifikasi_model->edit_data($where, 'klasifikasi')->result();
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/update_klasifikasi', $data);
		$this->load->view('template_administrator/footer');
	}

	public function update_aksi()
	{ //menangkapdatayangdimasukkankedalamjurusan_update
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level' => $data->level,
		);

		$id = $this->input->post('id_klasifikasi');
		//methodpostuntukmengambildata
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$umur = $this->input->post('umur');
		$kelamin = $this->input->post('kelamin');
		$tinggi = $this->input->post('tinggi');
		$berat = $this->input->post('berat');
		$beratbadan = $this->input->post('beratbadan');
		$imt = $this->input->post('imt');
		//masukkankedalamvariabeldatakemudianmasukkedalamarray
		$data = array('nama' => $nama, 'nik' => $nik, 'umur' => $umur, 'kelamin' => $kelamin, 'berat' => $berat, 'tinggi' => $tinggi, 'beratbadan' => $beratbadan, 'imt' => $imt);
		//variabelwhereuntukmengubahidnyamenjadiarray
		$where = array('id_klasifikasi' => $id);
		//masukkandatakedalamtabeljurusanmelaluijurusan_model//update_datamerupakanfunctiondarijurusan_model
		$this->klasifikasi_model->update_data($where, $data, 'klasifikasi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show"role="alert">Data klasifikasi Berhasil Update!
    <button type="button"class="close"data-dismiss="alert"aria-label="Close">
    <span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/klasifikasi');
	}

	// ============ Data Batita ================

	public function index()
	{

		// echo json_encode($this->session->userdata()); die();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Data Batita";
		$data['max_date'] = date("Y-m-d");

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['klasifikasi'] = $this->Batita_model->getDataBatita();

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/DataBatita/Index', $data);
		$this->load->view('template_administrator/footer');
	}

	public function input_batita()
	{

		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Input Data klasifikasi";

		$data['max_date'] = date("Y-m-d");

		$latih = $this->LatihModel->countData();

		var_dump($latih);

		if ($latih == 0) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Latih Masih Kosong, Mohon Diisi Data Latih terlebih Dahulu!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi');
		} else {
			$this->load->view('template_administrator/header');
			$this->load->view('template_administrator/sidebar', $data);
			$this->load->view('administrator/DataBatita/Input', $data);
			$this->load->view('template_administrator/footer');
		}
	}

	public function save_batita()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
            Isi data dengan benar !
            <button type="button"class="close"data-dismiss="alert"aria-label="Close">
            <spanaria-hidden="true">&times;
            </span>
            </button>
            </div>');
			redirect('administrator/klasifikasi/input_batita');
		} else {
			$usia_diagnosa = $this->hitung_umur($this->input->post('tanggal_lahir'));
			$diagnosa = $this->diagnosa($this->input->post('berat'), $this->input->post('tinggi'));
			// die();
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'usia_diagnosa' => $usia_diagnosa,
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'berat' => $this->input->post('berat', TRUE),
				'tinggi' => $this->input->post('tinggi', TRUE),
				'diagnosa_awal' => $this->input->post('diagnosa', TRUE),
				'jarak' => $diagnosa['data'],
				'diagnosa' => $diagnosa['value'],
				'tipe' => 'Uji',
				'terdekat' => $diagnosa['terdekat']
			);
			// var_dump($data);
			// die();

			if ($usia_diagnosa > "3 tahun, 0 bulan, 0 hari") {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Umur Batita Tidak Boleh Lebih Dari 3 Tahun!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi/input_batita');
			}

			$query = $this->Batita_model->insert($data);
			// var_dump($query);
			// die();
			// Untuk Mengubah kata-kata
			if ($query) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Berhasil Ditambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data  Gagal Ditambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi');
			}
		}
	}

	public function edit_batita($id)
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Edit Batita";
		$data['max_date'] = date("Y-m-d");

		$data['klasifikasi'] = $this->Batita_model->get($id);

		// var_dump($data);
		// die();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/DataBatita/update', $data);
		$this->load->view('template_administrator/footer');
	}

	public function update_batita()
	{
		$this->_rules();

		// var_dump($this->form_validation->run());
		// die();

		if ($this->form_validation->run() == FALSE) {

			$previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'default_fallback_url';

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
            Isi data dengan benar !
            <button type="button"class="close"data-dismiss="alert"aria-label="Close">
            <spanaria-hidden="true">&times;
            </span>
            </button>
            </div>');
			redirect($previous_url);
		} else {
			$data['max_date'] = date("Y-m-d");
			$usia_diagnosa = $this->hitung_umur($this->input->post('tanggal_lahir'));
			$diagnosa = $this->diagnosa($this->input->post('berat'), $this->input->post('tinggi'));
			// die();
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'usia_diagnosa' => $usia_diagnosa,
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'berat' => $this->input->post('berat', TRUE),
				'tinggi' => $this->input->post('tinggi', TRUE),
				'diagnosa_awal' => $this->input->post('diagnosa', TRUE),
				'jarak' => $diagnosa['data'],
				'diagnosa' => $diagnosa['value'],
				'tipe' => 'Uji',
				'terdekat' => $diagnosa['terdekat']
			);
			$query = $this->Batita_model->update($data, $this->input->post('id'));
			// var_dump($query);
			// die();
			if ($query) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Berhasil DiUpdate!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi', $data);
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Gagal DiUpdate!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi');
			}
		}
	}

	public function hapus_batita($id)
	{
		$query = $this->Batita_model->delete($id);

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Berhasil Di Hapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Gagal Di Hapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi');
		}
	}

	public function reset_batita()
	{
		$query = $this->Batita_model->reset();

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
			Data Batita Berhasil Direset!
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/klasifikasi');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
			Data Batita Gagal Direset!
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/klasifikasi');
		}
	}

	public function input_batch_batita()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Input Batch Data Latih";

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/DataBatita/Batch', $data);
		$this->load->view('template_administrator/footer');
	}

	public function save_batch_batita()
	{
		// Misalnya, Anda mendapatkan file Excel sebagai data POST dari formulir
		$excelData = $_FILES['batch']['tmp_name'];
		$reader = new Xlsx();
		$spreadsheet = $reader->load($excelData);
		$worksheet = $spreadsheet->getActiveSheet();
		$highestRow = $worksheet->getHighestRow();

		$rowData = array();

		$index = 0;

		for ($row = 2; $row <= $highestRow; $row++) {
			$kelamin = null;
			$tipe = null;

			if ($worksheet->getCell('C' . $row)->getValue() == 'P') {
				$kelamin = 'Perempuan';
			} else if ($worksheet->getCell('C' . $row)->getValue() == 'L') {
				$kelamin = 'Laki-Laki';
			}

			if ($worksheet->getCell('G' . $row)->getValue() == 'Gizi Lebih Baik') {
				$tipe = 1;
			} else if ($worksheet->getCell('G' . $row)->getValue() == 'Resiko Gizi Lebih Baik') {
				$tipe = 2;
			} else if ($worksheet->getCell('G' . $row)->getValue() == 'Gizi Baik') {
				$tipe = 3;
			} else if ($worksheet->getCell('G' . $row)->getValue() == 'Resiko Gizi Baik') {
				$tipe = 4;
			} else if ($worksheet->getCell('G' . $row)->getValue() == 'Gizi Lebih Baik')

				// Create an associative array
				$data = array(
					'nama' => $worksheet->getCell('B' . $row)->getValue(),
					'jenis_kelamin' => $kelamin,
					'berat' => $worksheet->getCell('D' . $row)->getValue(),
					'tinggi' => $worksheet->getCell('E' . $row)->getValue(),
					'status' => $tipe,
					'tipe' => 1 //Data Latih
				);
			$rowData[$index] = $data;
			$index++;
		}

		var_dump($rowData);
		die();

		$query = $this->LatihModel->insert_batch($rowData);

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Latih Batch Berhasil Di Tambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/data_latih');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Latih Batch Gagal Di Tambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/data_latih');
		}
	}

	// ============ End Batita =================

	// ============= Data Latih ================
	public function data_latih()
	{
		// echo json_encode($this->session->userdata()); die();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Data Latih";


		// menghubungkan controller dengan model yang kita buat
		// $data['biodata'] = $this->biodata_model->tampil_data()->result();
		$id_user = $this->session->userdata('id');

		$data['klasifikasi'] = $this->LatihModel->getAll()->result();

		// var_dump("ini di data_latih", $data);
		// die();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/DataLatih/Index', $data);
		$this->load->view('template_administrator/footer');
	}

	public function data_uji()
	{

		// echo json_encode($this->session->userdata()); die();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Data Batita";
		$data['max_date'] = date("Y-m-d");

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['klasifikasi'] = $this->Batita_model->getDataUji()->result();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/Penghitungan/data_uji', $data);
		$this->load->view('template_administrator/footer');
	}

	public function input_latih()
	{

		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Input Data Latih";

		$data['max_date'] = date("Y-m-d");

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/DataLatih/Input', $data);
		$this->load->view('template_administrator/footer');
	}

	public function save_latih()
	{
		$this->data_latih_rules();

		// var_dump($this->input->post());
		// 	die();

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
            Mohon isi Data dengan Benar!
            <button type="button"class="close"data-dismiss="alert"aria-label="Close">
            <spanaria-hidden="true">&times;
            </span>
            </button>
            </div>');
			redirect('administrator/klasifikasi/input_latih');
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'jenis_kelamin' => $this->input->post('kelamin', TRUE),
				'tanggal_lahir' =>$this->input->post('tanggal_lahir',TRUE),
				'berat' => $this->input->post('berat', TRUE),
				'tinggi' => $this->input->post('tinggi', TRUE),
				'diagnosa_awal' => $this->input->post('diagnosa', TRUE),
				'tipe'=>'Latih'
			);

			$query = $this->LatihModel->insert($data);

			if ($query) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Latih Berhasil Ditambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi/data_latih');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Latih Gagal Ditambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi/data_latih');
			}
		}
	}

	public function edit_latih($id)
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Data klasifikasi";

		$data['max_date'] = date("Y-m-d");

		$id_latih = array('id_klasifikasi' => $id);

		$data['klasifikasi'] = $this->LatihModel->get($id);

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/DataLatih/update', $data);
		$this->load->view('template_administrator/footer');
	}

	public function update_latih()
	{
		$this->data_latih_rules();

		// var_dump($this->input->post());
		// 	die();

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
            Mohon isi Data dengan Benar!
            <button type="button"class="close"data-dismiss="alert"aria-label="Close">
            <spanaria-hidden="true">&times;
            </span>
            </button>
            </div>');
			redirect('administrator/klasifikasi/input_latih');
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'jenis_kelamin' => $this->input->post('kelamin', TRUE),
				'tanggal_lahir' =>$this->input->post('tanggal_lahir',TRUE),
				'berat' => $this->input->post('berat', TRUE),
				'tinggi' => $this->input->post('tinggi', TRUE),
				'diagnosa_awal' => $this->input->post('diagnosa', TRUE)
			);
			$id = $this->input->post('id');

			$query = $this->LatihModel->update($data, $id);

			if ($query) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Latih Berhasil Di Update!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi/data_latih');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Latih Gagal Di Update!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/klasifikasi/data_latih');
			}
		}
	}

	public function hapus_latih($id)
	{
		// die($id);
		$query = $this->LatihModel->delete($id);

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Latih Berhasil Di Hapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/data_latih');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Latih Gagal Di Hapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/data_latih');
		}
	}

	public function input_batch()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Input Batch Data Latih";

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/DataLatih/Batch', $data);
		$this->load->view('template_administrator/footer');
	}

	public function reset_latih()
	{
		$query = $this->LatihModel->deleteAll();

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Latih Berhasil Di Hapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/data_latih');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Latih Gagal Di Hapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/data_latih');
		}
	}
	// ================= End Data Latih ================

	public function laporan_diagnosa()
	{
		// echo json_encode($this->session->userdata()); die();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Hasil Klasifikasi";
		$data['max_date'] = date("Y-m-d");

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['klasifikasi'] = $this->Batita_model->getDataBatita();
		$data['latih'] = $this->LatihModel->getAll()->result();

		// var_dump($data['klasifikasi']);
		// die();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/Penghitungan/diagnosa', $data);
		$this->load->view('template_administrator/footer');
	}

	function hasil_penghitungan(){
		// echo json_encode($this->session->userdata()); die();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);
		$data['title'] = "Hasil Penghitungan Proses Klasifikasi";
		
		$data['hasil'] = $this->excel_model->penghitungan()->result();

		// var_dump($data['klasifikasi']);
		// die();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/Penghitungan/akurasi', $data);
		$this->load->view('template_administrator/footer');
	}

	// ================= Penghitungan ==================

	public function hitung_umur($tanggal_lahir)
	{
		// Tanggal lain yang ingin Anda hitung selisihnya
		$otherDate = new DateTime($tanggal_lahir); // Ganti dengan tanggal yang Anda inginkan

		// Tanggal sekarang
		$now = new DateTime();

		// Menghitung selisih antara dua tanggal
		$interval = $now->diff($otherDate);

		// Mendapatkan selisih tahun, bulan, hari, jam, menit, dan detik
		$years = $interval->y;
		$months = $interval->m;
		$days = $interval->d;
		$hours = $interval->h;
		$minutes = $interval->i;
		$seconds = $interval->s;

		return ("$years tahun, $months bulan, $days hari");
	}

	public function diagnosa($berat, $tinggi)
	{

		$data = $this->LatihModel->getAll()->result();

		$newData = array();
		foreach ($data as $key => $dr) {
			$newData[$key]['value'] = $dr->diagnosa_awal;
			$newData[$key]['data'] = sqrt((pow(($berat - $dr->berat), 2)) + (pow(($tinggi - $dr->tinggi), 2)));
			$newData[$key]['terdekat'] = $dr->id;
		}

		$temp = PHP_INT_MAX; // Set to a large initial value
		$param = array();

		foreach ($newData as $d) {
			if ($d['data'] < $temp) {
				// Update minimum data value and corresponding object
				$temp = $d['data'];
				$param['value'] = $d['value'];
				$param['data'] = $d['data'];
				$param['terdekat'] = $d['terdekat'];
			}
		}
		return $param;
	}

	function proses_klasifikasi(){
		$Uji = $this->Batita_model->getDataBatita()->result();
		
		$jumlah = count($Uji);
		$sukses = 0;

		foreach($Uji as $key => $j){
			$usia_diagnosa = $this->hitung_umur($j->tanggal_lahir);
			$diagnosa = $this->diagnosa($j->berat, $j->tinggi);
			$data = array(
				'usia_diagnosa' => $usia_diagnosa,
				'jarak' => $diagnosa['data'],
				'diagnosa' => $diagnosa['value'],
				'terdekat' => $diagnosa['terdekat']
			);
			$query = $this->Batita_model->update($data, $j->id);

			if($query){
				$sukses +=1;
			}
		}

		if($jumlah == $sukses){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Klasifikasi Berhasil Dilakukan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/laporan_diagnosa');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Klasifikasi Tidak berhasil Diproses Semua, Data Diproses '+$sukses +' dari ' +$jumlah +' Jumlah Data!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/laporan_diagnosa');
		}
	}

	function hitung_akurasi(){
		$data = $this->Batita_model->getDataLaporan()->result();
		$uji = count($data);
		$latih = count($this->LatihModel->getAll()->result());
		$Tpositif = 0;
		$Tnegatif = 0;
		$Fpositif = 0;
		$Fnegatif = 0;

		foreach($data as $dt){
			if($dt->diagnosa == 'Gizi Baik' || $dt->diagnosa == 'Gizi Lebih' || $dt->diagnosa == 'Risiko Gizi Lebih' ){
				if($dt->diagnosa_awal == $dt->diagnosa){
					$Tpositif +=1;
				}else{
					$Fpositif +=1;
				}
			}else if($dt->diagnosa == 'Gizi Kurang' || $dt->diagnosa == 'Gizi Buruk' || $dt->diagnosa == 'Obesitas' ){
				if($dt->diagnosa_awal == $dt->diagnosa){
					$Tnegatif +=1;
				}else{
					$Fnegatif +=1;
				}
			}
		}

		date_default_timezone_set("Asia/Jakarta");


		$akurasi = ($Tpositif + $Tnegatif)/($Tpositif + $Tnegatif + $Fpositif + $Fnegatif) *100;

		$data = array(
			'data_latih'=>$latih,
			'data_uji'=>$uji,
			'true_positif'=>$Tpositif,
			'true_negatif'=>$Tnegatif,
			'false_positif'=>$Fpositif,
			'false_negatif'=>$Fnegatif,
			'akurasi'=>$akurasi,
			'update'=>date('Y-m-d h:i:s a', time())
		);

		// var_dump($this->excel_model->update_akurasi($data));
		// die();

		$query = $this->excel_model->update_akurasi($data);

		if($query){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Penghitungan Akurasi Berhasil Dilakukan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/hasil_penghitungan');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Penghitungan Akurasi Gagal Dilakukan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/klasifikasi/hasil_penghitungan');
		}
	}

	// ================= End Penhitungan ===============


	public function import_excel()
	{

		// var_dump($_FILES["batch"]['name'] == "");
		// die();

		if ($_FILES["batch"]['name'] != "") {
			$path = $_FILES["batch"]["tmp_name"];
			$object = ReaderEntityFactory::createXLSXReader();
			$object->open($path);

			$cellData = array();
			$newData = array();

			foreach ($object->getSheetIterator() as $sheet) {
				foreach ($sheet->getRowIterator() as $key => $row) {
					// Proses data di setiap baris
					$cellData[$key] = $row->toArray();
					$kelamin = null;
					if (strpos($cellData[$key]['2'], 'L') !== false) {
						$kelamin = 'Laki-Laki';
					} else if (strpos($cellData[$key]['2'], 'P') !== false){
						$kelamin = 'Perempuan';
					} else {
						$kelamin = 'Error Inputan';
					}

					$newData[$key] = array(
						'nama'	=> $cellData[$key][1],
						'jenis_kelamin'	=> $kelamin,
						'tanggal_lahir' => $cellData[$key][3],
						'berat'	=> $cellData[$key][4],
						'tinggi'	=> $cellData[$key][5],
						'diagnosa_awal'	=> $cellData[$key][6],
						'tipe' => $this->input->post('tipe')
					);
				}
			}
			$object->close();
			$data = array_slice($newData, 1);

			// var_dump($data);
			// die();
			
			$this->load->model('excel_model');
			$insert = $this->excel_model->insert($data);

			if ($insert) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Batch Excel Berhasil Ditambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				if($this->input->post('tipe') == "Latih"){	
					redirect('administrator/klasifikasi/data_latih');
				}else{
					redirect('administrator/klasifikasi/');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Batch Excel Gagal Ditambahkan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				if($this->input->post('tipe') == "Latih"){	
					redirect('administrator/klasifikasi/data_latih');
				}else{
					redirect('administrator/klasifikasi/');
				}
			}
		} else {
			$this->session->set_flashdata('status', '<div class="alert alert-danger alertdismissible fade show" role="alert">File yang Di Import Tidak Ada!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function hasil_batita()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level' => $data->level,
		);
		$data['title'] = "Hasil Pencarian Klasifikasi";
		$data['max_date'] = date("Y-m-d");
		$data1['cari'] = $this->Batita_model->cari();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/Penghitungan/hasil_cari', $data1);
		$this->load->view('template_administrator/footer');
	}

	public function cetak_batita()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level' => $data->level,
		);

		$data = array(
			'title' => 'Rekap_Data_Batita',
			'klasifikasi' => $this->Batita_model->getDataLaporan()->result()
		);
		$data['d'] = "SUNGAI ALAM";

		$this->load->view('administrator/Penghitungan/cetak_hasil', $data);
	}
}
