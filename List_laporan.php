<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : list_laporan (list_laporanController)
 * list_laporan Class to control all list_laporan related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class list_laporan extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('list_laporan_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the list_laporan
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Monitoring list_laporan : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the list_laporan list
     */
        function list_laporanListing()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE  )
    {
            $this->load->model('list_laporan_model');
        
         
            $id_atmText = $this->input->post('id_atmText');

            $data['id_atmText'] = $id_atmText;

            $this->load->library('pagination');
            
            $count = $this->list_laporan_model->list_laporanListingCount($id_atmText);
            
            $returns = $this->paginationCompress ( "list_laporanListing/", $count, 5 );
            
            $data['list_laporanRecords'] = 
            $this->list_laporan_model->list_laporanListing($id_atmText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Monitoring list_laporan : list_laporan Listing';
            
            $this->loadViews("list_laporans", $this->global, $data, NULL);
        }
        else
        {
            $this->loadThis();
        }
}

    
    function addnew3a()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE  )
    {

            $this->load->model('list_laporan_model');
            
            $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';

            $this->loadViews("addNew3a",  $this->global, NULL);
        }
    }

    function cek_id_atm()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE  )
    {
            $this->load->model('list_laporan_model');
            
            $id_atm = $this->input->post('id_atm');
            $latitude_longitude = $this->input->post('latitude_longitude');
            $data['id_atm'] = $id_atm;
            $data['latitude_longitude'] = $latitude_longitude;
            $data['list_laporanRecords'] = $this->list_laporan_model->cek_id_atm_detail($id_atm);
            
            if(count($data['list_laporanRecords']) > 0){
                 $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';
                 $this->loadViews("addNew3b", $this->global, $data, NULL);
            }
            else{
                $this->session->set_flashdata('error', 'ID ATM salah / Bukan dalam pengelolaan anda');
                 $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';
                 $this->loadViews("addNew3a", $this->global, $data, NULL);
            }
           
        }
    }

    function addnew3b()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE  )
    {
            $this->load->model('list_laporan_model');
            
            $id_atm = $this->input->post('id_atm');
            $lokasi = $this->input->post('lokasi');
            $alamat = $this->input->post('alamat');
            $provinsi = $this->input->post('provinsi');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $latitude_longitude = $this->input->post('latitude_longitude');

            $data['id_atm'] = $id_atm;
            $data['lokasi'] = $lokasi;
            $data['alamat'] = $alamat;
            $data['provinsi'] = $provinsi;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['latitude_longitude'] = $latitude_longitude;
            $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';

            $this->loadViews("addNew3c", $this->global, $data, NULL);
        }
    }

    function addnew3c()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE  )
    {
            $this->load->model('list_laporan_model');
            
            $id_atm = $this->input->post('id_atm');
            $lokasi = $this->input->post('lokasi');
            $alamat = $this->input->post('alamat');
            $provinsi = $this->input->post('provinsi');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $latitude_longitude = $this->input->post('latitude_longitude');

            $data['id_atm'] = $id_atm;
            $data['lokasi'] = $lokasi;
            $data['alamat'] = $alamat;
            $data['provinsi'] = $provinsi;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['latitude_longitude'] = $latitude_longitude;

            $nama_petugas = $this->input->post('nama_petugas');
            $npp = $this->input->post('npp');
            $aktivitas = implode(",",$this->input->post('aktivitas'));

            $data['nama_petugas'] = $nama_petugas;
            $data['npp'] = $npp;
            $data['aktivitas'] = $aktivitas;

            $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';

            $this->loadViews("addNew3d", $this->global, $data, NULL);
        }
    }

    function addnew3d()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE  )
    {
            $this->load->model('list_laporan_model');
            
            $id_atm = $this->input->post('id_atm');
            $lokasi = $this->input->post('lokasi');
            $alamat = $this->input->post('alamat');
            $provinsi = $this->input->post('provinsi');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $latitude_longitude = $this->input->post('latitude_longitude');

            $data['id_atm'] = $id_atm;
            $data['lokasi'] = $lokasi;
            $data['alamat'] = $alamat;
            $data['provinsi'] = $provinsi;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['latitude_longitude'] = $latitude_longitude;

            /////////////////////////////////////////////////////////////

            $nama_petugas = $this->input->post('nama_petugas');
            $npp = $this->input->post('npp');
            $aktivitas = $this->input->post('aktivitas');

            $data['nama_petugas'] = $nama_petugas;
            $data['npp'] = $npp;
            $data['aktivitas'] = $aktivitas;

            /////////////////////////////////////////////////////////////
            
            $ketersediaan_kamera_cctv = $this->input->post('ketersediaan_kamera_cctv');
            $kondisi_kamera_cctv_dvr = $this->input->post('kondisi_kamera_cctv_dvr');
            $ketersediaan_ups = $this->input->post('ketersediaan_ups');
            $kondisi_ups = $this->input->post('kondisi_ups');
            $kondisi_pin_cover = $this->input->post('kondisi_pin_cover');
            $kondisi_bagian_mulut_card_reader_cocor_bebek = $this->input->post('kondisi_bagian_mulut_card_reader_cocor_bebek');
            $kelengkapan_angkur = $this->input->post('kelengkapan_angkur');           
            $cek_stiker_bni_call_palsu = $this->input->post('cek_stiker_bni_call_palsu');
            $cek_kondisi_booth_atm_bagian_atas = $this->input->post('cek_kondisi_booth_atm_bagian_atas');
            $cek_kondisi_staker_colokan_listrik = $this->input->post('cek_kondisi_staker_colokan_listrik');
            $lokasi_rawan_vandal = $this->input->post('lokasi_rawan_vandal');

            $data['ketersediaan_kamera_cctv'] = $ketersediaan_kamera_cctv;
            $data['kondisi_kamera_cctv_dvr'] = $kondisi_kamera_cctv_dvr;
            $data['ketersediaan_ups'] = $ketersediaan_ups;
            $data['kondisi_ups'] = $kondisi_ups;
            $data['kondisi_pin_cover'] = $kondisi_pin_cover;
            $data['kondisi_bagian_mulut_card_reader_cocor_bebek'] = $kondisi_bagian_mulut_card_reader_cocor_bebek;
            $data['kelengkapan_angkur'] = $kelengkapan_angkur;
            $data['cek_stiker_bni_call_palsu'] = $cek_stiker_bni_call_palsu;
            $data['cek_kondisi_booth_atm_bagian_atas'] = $cek_kondisi_booth_atm_bagian_atas;
            $data['cek_kondisi_staker_colokan_listrik'] = $cek_kondisi_staker_colokan_listrik;
            $data['lokasi_rawan_vandal'] = $lokasi_rawan_vandal;


            $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';

            $this->loadViews("addNew3e", $this->global, $data, NULL);
        }
    }

    function addnew3e()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE  )
    {
            $this->load->model('list_laporan_model');
            
            $id_atm = $this->input->post('id_atm');
            $lokasi = $this->input->post('lokasi');
            $alamat = $this->input->post('alamat');
            $provinsi = $this->input->post('provinsi');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $latitude_longitude = $this->input->post('latitude_longitude');

            $data['id_atm'] = $id_atm;
            $data['lokasi'] = $lokasi;
            $data['alamat'] = $alamat;
            $data['provinsi'] = $provinsi;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['latitude_longitude'] = $latitude_longitude;

            /////////////////////////////////////////////////////////////

            $nama_petugas = $this->input->post('nama_petugas');
            $npp = $this->input->post('npp');
            $aktivitas = $this->input->post('aktivitas');

            $data['nama_petugas'] = $nama_petugas;
            $data['npp'] = $npp;
            $data['aktivitas'] = $aktivitas;

            /////////////////////////////////////////////////////////////
            
            $ketersediaan_kamera_cctv = $this->input->post('ketersediaan_kamera_cctv');
            $kondisi_kamera_cctv_dvr = $this->input->post('kondisi_kamera_cctv_dvr');
            $ketersediaan_ups = $this->input->post('ketersediaan_ups');
            $kondisi_ups = $this->input->post('kondisi_ups');
            $kondisi_pin_cover = $this->input->post('kondisi_pin_cover');
            $kondisi_bagian_mulut_card_reader_cocor_bebek = $this->input->post('kondisi_bagian_mulut_card_reader_cocor_bebek');
            $kelengkapan_angkur = $this->input->post('kelengkapan_angkur');  
            $cek_stiker_bni_call_palsu = $this->input->post('cek_stiker_bni_call_palsu');
            $cek_kondisi_booth_atm_bagian_atas = $this->input->post('cek_kondisi_booth_atm_bagian_atas');
            $cek_kondisi_staker_colokan_listrik = $this->input->post('cek_kondisi_staker_colokan_listrik');
            $lokasi_rawan_vandal = $this->input->post('lokasi_rawan_vandal');

            $data['ketersediaan_kamera_cctv'] = $ketersediaan_kamera_cctv;
            $data['kondisi_kamera_cctv_dvr'] = $kondisi_kamera_cctv_dvr;
            $data['ketersediaan_ups'] = $ketersediaan_ups;
            $data['kondisi_ups'] = $kondisi_ups;
            $data['kondisi_pin_cover'] = $kondisi_pin_cover;
            $data['kondisi_bagian_mulut_card_reader_cocor_bebek'] = $kondisi_bagian_mulut_card_reader_cocor_bebek;
            $data['kelengkapan_angkur'] = $kelengkapan_angkur;
            $data['cek_stiker_bni_call_palsu'] = $cek_stiker_bni_call_palsu;
            $data['cek_kondisi_booth_atm_bagian_atas'] = $cek_kondisi_booth_atm_bagian_atas;
            $data['cek_kondisi_staker_colokan_listrik'] = $cek_kondisi_staker_colokan_listrik;
            $data['lokasi_rawan_vandal'] = $lokasi_rawan_vandal;

            //////////////////////////////////////////////////////////////////////////////////////////////////

            $kondisi_kebersihan_lokasi_ruang_atm = $this->input->post('kondisi_kebersihan_lokasi_ruang_atm');
            $ket_kondisi_kebersihan_lokasi_ruang_atm = $this->input->post('ket_kondisi_kebersihan_lokasi_ruang_atm');
            $kondisi_ac = $this->input->post('kondisi_ac');
            $kondisi_atm = $this->input->post('kondisi_atm');
            $ketersediaan_tempat_sampah = $this->input->post('ketersediaan_tempat_sampah');
            $ceklist_kebersihan_atm_harian = implode(",",$this->input->post('ceklist_kebersihan_atm_harian'));
            $ceklist_kebersihan_atm_bulanan = implode(",",$this->input->post('ceklist_kebersihan_atm_bulanan'));

            $data['kondisi_kebersihan_lokasi_ruang_atm'] = $kondisi_kebersihan_lokasi_ruang_atm;
            $data['ket_kondisi_kebersihan_lokasi_ruang_atm'] = $ket_kondisi_kebersihan_lokasi_ruang_atm;
            $data['kondisi_ac'] = $kondisi_ac;
            $data['kondisi_atm'] = $kondisi_atm;
            $data['ketersediaan_tempat_sampah'] = $ketersediaan_tempat_sampah;
            $data['ceklist_kebersihan_atm_harian'] = $ceklist_kebersihan_atm_harian;
            $data['ceklist_kebersihan_atm_bulanan'] = $ceklist_kebersihan_atm_bulanan;

            ////////////////////////////////////////////////////////////////////////////////////////

            $tgl_kunjungan = date('Y-m-d');
            date_default_timezone_set("Asia/Bangkok");//set you countary name from below timezone list
            $jam_kunjungan = date('H:i:s');
            $pihak_yang_melakukan_kunjungan = $_SESSION["name"];
            $config['image_library']='gd2';
            $config['upload_path']          = '/opt/lampp/htdocs/simpanse/uploads/laporan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['quality']= '50%';
            $config['width']= 600;
            $config['height']= 400;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('foto_aktivitas_kebersihan_atm'))
            {
                $error = array('error' => $this->upload->display_errors());

                redirect('addNew3a');
            }
            else
            {
                $data_name = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $data = array('upload_data' => $this->upload->data());
  
                $foto_aktivitas_kebersihan_atm = $data_name['file_name'];
                        
                $data['foto_aktivitas_kebersihan_atm'] = $foto_aktivitas_kebersihan_atm;

                $list_laporanInfo = array(
                'tgl_kunjungan'=>$tgl_kunjungan,
                'jam_kunjungan'=>$jam_kunjungan,
                'id_atm'=>$id_atm ,
                'nama_petugas'=>$nama_petugas ,
                'npp'=>$npp ,
                'wilayah'=>$wilayah,
                'pihak_yang_melakukan_kunjungan'=>$pihak_yang_melakukan_kunjungan,
                'aktivitas'=>$aktivitas ,
                'ketersediaan_kamera_cctv'=>$ketersediaan_kamera_cctv ,
                'kondisi_kamera_cctv_dvr'=>$kondisi_kamera_cctv_dvr ,
                'ketersediaan_ups'=>$ketersediaan_ups ,
                'kondisi_ups'=>$kondisi_ups ,
                'kondisi_pin_cover'=>$kondisi_pin_cover ,
                'kondisi_bagian_mulut_card_reader_cocor_bebek'=>$kondisi_bagian_mulut_card_reader_cocor_bebek ,
                'kelengkapan_angkur'=>$kelengkapan_angkur ,
                'cek_stiker_bni_call_palsu'=>$cek_stiker_bni_call_palsu ,
                'cek_kondisi_booth_atm_bagian_atas'=>$cek_kondisi_booth_atm_bagian_atas ,
                'cek_kondisi_staker_colokan_listrik'=>$cek_kondisi_staker_colokan_listrik ,
                'lokasi_rawan_vandal'=>$lokasi_rawan_vandal ,
                'kondisi_kebersihan_lokasi_ruang_atm'=>$kondisi_kebersihan_lokasi_ruang_atm ,
                'ket_kondisi_kebersihan_lokasi_ruang_atm'=>$ket_kondisi_kebersihan_lokasi_ruang_atm ,
                'kondisi_ac'=>$kondisi_ac ,
                'kondisi_atm'=>$kondisi_atm ,
                'ketersediaan_tempat_sampah'=>$ketersediaan_tempat_sampah ,
                'ceklist_kebersihan_atm_harian'=>$ceklist_kebersihan_atm_harian ,
                'ceklist_kebersihan_atm_bulanan'=>$ceklist_kebersihan_atm_bulanan,
                'latitude_longitude'=>$latitude_longitude,
                'foto_aktivitas_kebersihan_atm'=>$foto_aktivitas_kebersihan_atm
                );

                $this->load->model('list_laporan_model');
                $result = $this->list_laporan_model->addNewlist_laporan($list_laporanInfo);
                
                redirect('list_laporanListing');
                }
            
        }
    }

    function editOld3($id = NULL)
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE)
        {
            if($id == null)
            {
                redirect('list_laporanListing');
            }
    
            $data['list_laporanInfo'] = $this->list_laporan_model->getlist_laporanInfo($id);
            
            $this->global['pageTitle'] = 'Monitoring SIMPANSE : Edit list_laporan';
            
            $this->loadViews("editOld3", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the visa_retail information
     */
    function editlist_laporan()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE)
        {
            $id = $this->input->post('id');
            $id_atm = $this->input->post('id_atm');
            $lokasi = $this->input->post('lokasi');
            $alamat = $this->input->post('alamat');
            $provinsi = $this->input->post('provinsi');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $latitude_longitude = $this->input->post('latitude_longitude');

            $nama_petugas = $this->input->post('nama_petugas');
            $npp = $this->input->post('npp');
            $aktivitas = $this->input->post('aktivitas');

            $ketersediaan_kamera_cctv = $this->input->post('ketersediaan_kamera_cctv');
            $kondisi_kamera_cctv_dvr = $this->input->post('kondisi_kamera_cctv_dvr');
            $ketersediaan_ups = $this->input->post('ketersediaan_ups');
            $kondisi_ups = $this->input->post('kondisi_ups');
            $kondisi_pin_cover = $this->input->post('kondisi_pin_cover');
            $kondisi_bagian_mulut_card_reader_cocor_bebek = $this->input->post('kondisi_bagian_mulut_card_reader_cocor_bebek');
            $kelengkapan_angkur = $this->input->post('kelengkapan_angkur');  
            $cek_stiker_bni_call_palsu = $this->input->post('cek_stiker_bni_call_palsu');
            $cek_kondisi_booth_atm_bagian_atas = $this->input->post('cek_kondisi_booth_atm_bagian_atas');
            $cek_kondisi_staker_colokan_listrik = $this->input->post('cek_kondisi_staker_colokan_listrik');
            $lokasi_rawan_vandal = $this->input->post('lokasi_rawan_vandal');


            $kondisi_kebersihan_lokasi_ruang_atm = $this->input->post('kondisi_kebersihan_lokasi_ruang_atm');
            $ket_kondisi_kebersihan_lokasi_ruang_atm = $this->input->post('ket_kondisi_kebersihan_lokasi_ruang_atm');
            $kondisi_ac = $this->input->post('kondisi_ac');
            $kondisi_atm = $this->input->post('kondisi_atm');
            $ketersediaan_tempat_sampah = $this->input->post('ketersediaan_tempat_sampah');
            $ceklist_kebersihan_atm_harian = $this->input->post('ceklist_kebersihan_atm_harian');
            $ceklist_kebersihan_atm_bulanan = $this->input->post('ceklist_kebersihan_atm_bulanan');

            $tgl_kunjungan = $this->input->post('tgl_kunjungan');
            $jam_kunjungan = $this->input->post('jam_kunjungan');
            $pihak_yang_melakukan_kunjungan = $this->input->post('pihak_yang_melakukan_kunjungan');


            $data['id'] = $id;
            $data['id_atm'] = $id_atm;
            $data['lokasi'] = $lokasi;
            $data['alamat'] = $alamat;
            $data['provinsi'] = $provinsi;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['latitude_longitude'] = $latitude_longitude;

            $data['nama_petugas'] = $nama_petugas;
            $data['npp'] = $npp;
            $data['aktivitas'] = $aktivitas;

            $data['ketersediaan_kamera_cctv'] = $ketersediaan_kamera_cctv;
            $data['kondisi_kamera_cctv_dvr'] = $kondisi_kamera_cctv_dvr;
            $data['ketersediaan_ups'] = $ketersediaan_ups;
            $data['kondisi_ups'] = $kondisi_ups;
            $data['kondisi_pin_cover'] = $kondisi_pin_cover;
            $data['kondisi_bagian_mulut_card_reader_cocor_bebek'] = $kondisi_bagian_mulut_card_reader_cocor_bebek;
            $data['kelengkapan_angkur'] = $kelengkapan_angkur;
            $data['cek_stiker_bni_call_palsu'] = $cek_stiker_bni_call_palsu;
            $data['cek_kondisi_booth_atm_bagian_atas'] = $cek_kondisi_booth_atm_bagian_atas;
            $data['cek_kondisi_staker_colokan_listrik'] = $cek_kondisi_staker_colokan_listrik;
            $data['lokasi_rawan_vandal'] = $lokasi_rawan_vandal;

            $data['kondisi_kebersihan_lokasi_ruang_atm'] = $kondisi_kebersihan_lokasi_ruang_atm;
            $data['ket_kondisi_kebersihan_lokasi_ruang_atm'] = $ket_kondisi_kebersihan_lokasi_ruang_atm;
            $data['kondisi_ac'] = $kondisi_ac;
            $data['kondisi_atm'] = $kondisi_atm;
            $data['ketersediaan_tempat_sampah'] = $ketersediaan_tempat_sampah;
            $data['ceklist_kebersihan_atm_harian'] = $ceklist_kebersihan_atm_harian;
            $data['ceklist_kebersihan_atm_bulanan'] = $ceklist_kebersihan_atm_bulanan;

            $data['tgl_kunjungan'] = $tgl_kunjungan;
            $data['jam_kunjungan'] = $jam_kunjungan;
            $data['pihak_yang_melakukan_kunjungan'] = $pihak_yang_melakukan_kunjungan;
            ////////////////////////////////////////////////////////////////////////////////////////

            $list_laporanInfo = array(
                'id'=>$id,
                'tgl_kunjungan'=>$tgl_kunjungan,
                'jam_kunjungan'=>$jam_kunjungan,
                'id_atm'=>$id_atm ,
                'nama_petugas'=>$nama_petugas ,
                'npp'=>$npp ,
                'wilayah'=>$wilayah,
                'pihak_yang_melakukan_kunjungan'=>$pihak_yang_melakukan_kunjungan,
                'aktivitas'=>$aktivitas ,
                'ketersediaan_kamera_cctv'=>$ketersediaan_kamera_cctv ,
                'kondisi_kamera_cctv_dvr'=>$kondisi_kamera_cctv_dvr ,
                'ketersediaan_ups'=>$ketersediaan_ups ,
                'kondisi_ups'=>$kondisi_ups ,
                'kondisi_pin_cover'=>$kondisi_pin_cover ,
                'kondisi_bagian_mulut_card_reader_cocor_bebek'=>$kondisi_bagian_mulut_card_reader_cocor_bebek ,
                'kelengkapan_angkur'=>$kelengkapan_angkur ,
                'cek_stiker_bni_call_palsu'=>$cek_stiker_bni_call_palsu ,
                'cek_kondisi_booth_atm_bagian_atas'=>$cek_kondisi_booth_atm_bagian_atas ,
                'cek_kondisi_staker_colokan_listrik'=>$cek_kondisi_staker_colokan_listrik ,
                'lokasi_rawan_vandal'=>$lokasi_rawan_vandal ,
                'kondisi_kebersihan_lokasi_ruang_atm'=>$kondisi_kebersihan_lokasi_ruang_atm ,
                'ket_kondisi_kebersihan_lokasi_ruang_atm'=>$ket_kondisi_kebersihan_lokasi_ruang_atm ,
                'kondisi_ac'=>$kondisi_ac ,
                'kondisi_atm'=>$kondisi_atm ,
                'ketersediaan_tempat_sampah'=>$ketersediaan_tempat_sampah ,
                'ceklist_kebersihan_atm_harian'=>$ceklist_kebersihan_atm_harian ,
                'ceklist_kebersihan_atm_bulanan'=>$ceklist_kebersihan_atm_bulanan ,
                'latitude_longitude'=>$latitude_longitude
                );
                
            $result = $this->list_laporan_model->editlist_laporan($list_laporanInfo, $id);
                
            redirect('list_laporanListing');
            
        }
    }

    function deletelist_laporan()
    {
            $id = $this->input->post('id');
            
            $result = $this->list_laporan_model->deletelist_laporan($id);
        redirect('list_laporanListing');
    }


}

    
   