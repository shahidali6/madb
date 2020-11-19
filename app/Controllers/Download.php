<?php
namespace App\Controllers;

use App\Models\UnityLinkModel;

class Download extends BaseController
{
    public static $calculator = 567890;

    // show download list
    public function index()
    {
        $db = db_connect();

        $query = $db->query('SELECT name,link_mshare,filesize_byte,myassetsdb_link_mshare FROM unityassetlink_actual  ORDER BY name ASC LIMIT 500');

        $data['unityassetlink'] = $query->getResultArray();

        //echo \site_url()."/download/SQLSeqrchStartwith/";
        //echo "<br>";
        //echo "Base URL". \base_url();

        echo view('template/header');
        echo view('template/navbar');
        echo view('template/listall');
        echo view('download_view', $data);
        echo view('template/footer');
        //return view('download_view', $data);
    }

    public function SQLSeqrchStartwith($sqlsearchstartwith)
    {
        $db = db_connect();
$string1 = "SELECT * FROM `unityassetlink_actual` WHERE `name` REGEXP '^";
$string2 = "' ORDER BY `name` ASC LIMIT 500";
$finalquery = $string1.$sqlsearchstartwith.$string2;
        $query = $db->query($finalquery);

        $data['unityassetlink'] = $query->getResultArray();

        echo view('template/header');
        echo view('template/navbar');
        echo view('template/listall');
        echo view('download_view', $data);
        echo view('template/footer');
    }
}