<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends model
{
    protected $table = 'fasilitas';

    public function getFasilitas($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }
    public function saveFasilitas($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
    public function editFasilitas($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        return $builder->update($data);
    }
    public function hapusFasilitas($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id' => $id]);
    }




}