<?php
class Mod_user extends Ci_Model
{

    function select_all()
    {
        return $this->db->get('users');
    }

    function select_parent()
    {
        //return $this->db->get_where('tabel_member', array('parent' => 0));
    }


    function simpan()
    {
        $data = [
            'nama' => htmlspecialchars(($this->input->post('nama', true))),
            'email' => htmlspecialchars(($this->input->post('email', true))),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'image' => 'default-image.jpg',
            'kec_id' => $this->input->post('kecamatan'),
            'role_id' => htmlspecialchars(($this->input->post('level', true))),
            'is_active' => htmlspecialchars(($this->input->post('status', true))),
            'created_at' => date('Y-m-d')
        ];
        $this->db->insert('users', $data);
    }


    function update()
    {
        $data = array(
            'nama'     =>  $this->input->post('nama'),
            'email'            =>  $this->input->post('email'),
            'kec_id'    => $this->input->post('kecamatan'),
            'is_active'              =>  $this->input->post('status'),
            'role_id' =>  $this->input->post('level')
        );
        $this->db->where('user_id', $this->input->post('id'));
        $this->db->update('users', $data);
    }
}
