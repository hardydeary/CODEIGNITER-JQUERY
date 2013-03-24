<?php
class Cmahasiswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('modelmahasiswa');
    }
    
    function index(){
        $data['judul'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->modelmahasiswa->getDataMahasiswa();
        $this->load->view('v_mahasiswa',$data);
    }
    
    function add_mahasiswa(){
        if($_POST == NULL) {
            $data['judul'] = 'Input Data Mahasiswa';
            $this->load->view('inputmahasiswa');
        }
        else {
            $nim 		= $this->input->post('nim');
            $nama 		= $this->input->post('nama');
            $jurusan 	= $this->input->post('jurusan');
            $angkatan 	= $this->input->post('angkatan');                
            
            $data=array(
                'nim' 		=> $nim,
                'nama'    	=> $nama,
                'jurusan'   => $jurusan,
                'angkatan'  => $angkatan
            );
            
            $this->modelmahasiswa->insertDataMahasiswa($data);            
            $out['mahasiswa'] = $this->modelmahasiswa->getDataMahasiswa();
			//$this->load->view("data",$out);            
        
        }
    }
	
	function edit($id_mhs = "") {
        $data['mahasiswa'] = $this->modelmahasiswa->DataMahasiswa($id_mhs);
        $this->load->view('editmahasiswa',$data);    
    }
    
    function update(){
		$id_mhs 	= $this->input->post('id_mhs');
        $nim 		= $this->input->post('nim');
        $nama 		= $this->input->post('nama');
        $jurusan 	= $this->input->post('jurusan');
        $angkatan 	= $this->input->post('angkatan');               
        
        $data=array(			
            'id_mhs' 	=> $id_mhs,
            'nim' 		=> $nim,
            'nama'    	=> $nama,
            'jurusan'   => $jurusan,
            'angkatan'  => $angkatan                    
        );
        
        $this->modelmahasiswa->updateMahasiswa($data);
           
    }
    
    function delete($nim){        
        $this->modelmahasiswa->deleteMahasiswa($nim);    
    }
}
?>