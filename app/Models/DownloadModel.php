<?php
namespace App\Models;

use CodeIgniter\Model;

class UnityLinkModel extends Model
{
    protected $table = 'unityassetlink_actual';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'link_mshare', 'filesize_byte', 'myassetsdb_link_mshare'];

    public function getResultsmy()
    {
        $query = $db->query('SELECT id,name,link_mshare,filesize FROM unityassetlink');
        $results = $query->getResult();
    }
}