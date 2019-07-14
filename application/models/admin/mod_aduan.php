<?php
class Mod_aduan extends Ci_Model
{

    function select_all()
    {
        // return $this->db->get('aduan');
        $query = "SELECT tb1.aduan_id,tb1.tgl_aduan,tb1.judul,tb1.tgl_aduan,tb2.nama_kec,tb3.status
       FROM aduan as tb1,kecamatan as tb2, sts_aduan as tb3 
       WHERE tb1.kec_id=tb2.kec_id and tb1.sts_id=tb3.sts_id";
        return $this->db->query($query);
    }

    function select_parent()
    {
        //return $this->db->get_where('tabel_member', array('parent' => 0));
    }


    function simpan()
    {
        $data = [
            'user_id' => $this->input->post('id_user'),
            'no_hp' => htmlspecialchars(($this->input->post('telp', true))),
            'kec_id' => htmlspecialchars(($this->input->post('kec', true))),
            'judul' => htmlspecialchars(($this->input->post('judul', true))),
            'alamat_aduan' => htmlspecialchars(($this->input->post('alamat', true))),
            'kateg_id' => htmlspecialchars(($this->input->post('jenis', true))),
            'keterangan' => htmlspecialchars(($this->input->post('ket', true))),
            'sts_id' => 1,
            'tgl_aduan' => date('Y-m-d')
        ];
        $this->db->insert('aduan', $data);
    }


    function update()
    {
        $data = array(
            'nama'     =>  $this->input->post('nama'),
            'email'            =>  $this->input->post('email'),
            'is_active'              =>  $this->input->post('status'),
            'role_id' =>  $this->input->post('level')
        );
        $this->db->where('user_id', $this->input->post('id'));
        $this->db->update('users', $data);
    }
}
