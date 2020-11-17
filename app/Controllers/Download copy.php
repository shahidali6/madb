<?php
namespace App\Controllers;

use App\Models\UnityLinkModel;

class Download extends BaseController
{
    public static $calculator = 567890;

    // show users list
    public function index()
    {
        $db = db_connect();

        $query = $db->query('SELECT name,link_mshare,filesize_byte,myassetsdb_link_mshare,content FROM unityassetlink_actual  ORDER BY name ASC LIMIT 200');
        // $query = $this->db->query('SELECT name FROM unityassetlink');
        // $this->db->query('YOUR QUERY HERE');
        $data['unityassetlink'] = $query->getResultArray();

        //$data['download'] = [];

        //print_r($results). "<br>";

        // foreach ($results as $row)
        // {
        //         //echo $row->title;
        //         //$data1['unityassetlink'] = $row->name;
        //         //echo $row['name'] . "<br>";
        //         //echo $row."<br>";
        //         echo $row->link_mshare."<br>";
        //         //echo $row->email;
        // }

        // echo 'Total Results: ' . count($data, COUNT_RECURSIVE) . "<br>";

        //$unityLinkModel = new UnityLinkModel();
        //$data['unityassetlink'] = $unityLinkModel->orderBy('name', 'ASC')->findAll();
        //$data['unityassetlink'] = $unityLinkModel->find(1);
        //echo count($results). "<br>";

        //$data1 = json_decode($data['unityassetlink'], true);
        //$data1 = json_decode($data, true);
        // $quiz_queue_ans_id = $data['id']; // work with decoded data
        //echo count($data1);

        //$results = $unityLinkModel->find($id);
        //$results = $unityLinkModel->first($id);

        //print_r($results);
        //echo "<br>----------------1------------------<br>";
        //$data['unityassetlink_real_filesize'] = $results;
        //$data['unityassetlink_real_filesize'] = $unityLinkModel->find([$id,15,40]);

        //  \var_dump($data);
        //echo "<br>----------------2------------------<br>";
        //print_r($data). "<br>";
        //  echo "<br>----------------3------------------<br>";
        //  echo (count($data) > 1);
        //  echo "<br>-----------------4-----------------<br>";
        //  echo count($data);

// $unityLinkModel = new UnityLinkModel();
        //         $data = [
        //             'name' => $unityLinkModel->paginate(6),
        //             'pager' => $unityLinkModel->pager
        //         ];
        echo view('download_view', $data);
        //return view('download_view', $data);

        // echo \sizeof($data);
        // echo "<br>---------------1-------------------<br>";
        // echo count($data, COUNT_NORMAL);
        // echo "<br>---------------2-------------------<br>";
        // echo count($data, COUNT_RECURSIVE);
        // echo "<br>-----------3----------<br>";
        // $arrayCount = count($data, COUNT_RECURSIVE);
        // echo $arrayCount;
        // echo "<br>-----------4----------<br>";
        // print_r(count($data, COUNT_RECURSIVE));
        // echo "<br>-------------5---------------------<br>";
        // echo count(array_keys($data));
        // echo "<br>----------------6------------------<br>";
        // $uri = $this->request->uri;
        // echo $uri;
        // echo "<br>----------------7------------------<br>";
        // echo service('uri', 'http://localhost/ci4041b/public/');
        // //$db = \Config\Database::connect();
        // echo "<br>------------------8----------------<br>";
        // $db = db_connect();
        // echo $db->getVersion();
        // echo 'Total Results: ' . count($data). \sizeof($data);
        // return view('download_view', $data);
    }

    //encrypt and dycrpt id function
    public function Download($downloadNumber)
    {
        $id = $downloadNumber - Download::$calculator;
        $unityLinkModel = new UnityLinkModel();
        // $data['unityassetlink_real_filesize'] = $unityLinkModel->orderBy('id', 'ASC')->findAll();

        $results = $unityLinkModel->find($id);
        $results = $unityLinkModel->first($id);

        print_r($results);
        echo "<br>----------------1------------------<br>";
        $data['unityassetlink_real_filesize'] = $results;
        //$data['unityassetlink_real_filesize'] = $unityLinkModel->find([$id,15,40]);

        \var_dump($data);
        echo "<br>----------------------------------<br>";
        print_r($data);
        echo "<br>----------------1------------------<br>";
        echo (count($data) > 1);
        echo "<br>-----------------2-----------------<br>";
        echo count($data);
        return view('download_view', $data);
    }

    public function updateMyAssetsDBLink()
    {
        $db = db_connect();
        $calculator = 567890;
        $myassetsdblink = "http://myassetsdb.com/download/unity/mshare/";

        //echo $db->simpleQuery('UPDATE unityassetlink_real_filesize SET myassetsdb_link_mshare = "thiswewerwerweistest" WHERE id=1');

        for ($i = 1; $i < 5995; $i++) {
            $generateNumber = $calculator + $i;
            $populatefinallink = $myassetsdblink . $generateNumber;
            $queryString1 = "UPDATE unityassetlink_real_filesize SET myassetsdb_link_mshare = ";
            $queryString2 = " WHERE id=";
//UPDATE unityassetlink_real_filesize SET myassetsdb_link_mshare = myassetsdb.com/download/unity/mshare/567891 WHERE id=1
            $finalQuery = $queryString1 . '"' . $populatefinallink . '"' . $queryString2 . $i;
//echo $finalQuery;
            //echo "<br>";

            //echo 'UPDATE unityassetlink_real_filesize SET myassetsdb_link_mshare = $populatefinallink WHERE id=$i';
            echo $db->simpleQuery($finalQuery);
            echo "<br>";
        }

        //$query = $db->query('UPDATE unityassetlink_real_filesize SET myassetsdb_link_mshare = "thisistest" WHERE id=1');
        // $query = $this->db->query('SELECT name FROM unityassetlink');
        // $this->db->query('YOUR QUERY HERE');

        //print_r($query);
        //echo $query->update();

        //$userModel = new UserModel();
        //$id = $this->request->getVar('id');
        //$data = [
        //  'name' => $this->request->getVar('name'),
        //    'email'  => $this->request->getVar('email'),
        //];
        //$userModel->update($id, $data);;
    }
    // add user form
    public function create()
    {
        return view('add_user');
    }

    // insert data
    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }

    // show single user
    public function singleUser($id = null)
    {
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('edit_user', $data);
    }

    // update user data
    public function update()
    {
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }

    // delete user
    public function delete($id = null)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }
}
