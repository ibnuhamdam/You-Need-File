<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use App\Models\BidangModel;

class Admin extends BaseController
{

    protected $userModel;
    protected $db;
    protected $bidangModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->bidangModel = new BidangModel();
        $session = session();
        $this->db      = \Config\Database::connect();
        $uri = new \CodeIgniter\HTTP\URI();
    }

    public function index()
    {
        return view('admin/index');
    }

    public function user()
    {
        $this->userModel->select('users.id as id,email,bidangs.nama as bidang, bidangs.id as bid,full_name,user_image,username');
        $this->userModel->join('bidangs', 'users.bidang = bidangs.id');
        $this->userModel->where('users.deleted_at', NULL);
        $data = [
            'users' => $this->userModel->get()->getResult(),
            'bidang' => $this->bidangModel->findAll(),
        ];
        return view('admin/users', $data);
    }

    public function bidang()
    {
        $data['bidangs'] = $this->bidangModel->findAll();

        return view('admin/bidang', $data);
    }

    public function addBidang()
    {
        $data = [
            'nama' => $this->request->getVar('nama')
        ];

        $insert = $this->bidangModel->insert($data);

        if ($insert) {
            $session = session();
            $session->setFlashdata('insert', 'Bidang Has Been Inserted !');

            return redirect()->to("/admin/bidang");
        } else {
            echo "error";
        }
    }

    public function updateBidang()
    {
        $id = $this->request->getVar('id');
        $data = [
            'nama' => $this->request->getVar('nama')
        ];

        // dd($data);
        $this->bidangModel->set($data);
        $update = $this->bidangModel->update(['id' => $id]);

        if ($update) {
            $session = session();
            $session->setFlashdata('update', 'Bidang Has Been Updated !');

            return redirect()->to("/admin/bidang");
        } else {
            echo "error";
        }
    }

    public function deleteBidang($id)
    {
        $delete = $this->bidangModel->delete(['id' => $id]);

        if ($delete) {
            $session = session();
            $session->setFlashdata('delete', 'Bidang Has Been Deleted !');

            return redirect()->to("/admin/bidang");
        } else {
            echo "error";
        }
    }

    public function deleteUser($id)
    {
        $delete = $this->userModel->delete(['id' => $id]);

        if ($delete) {
            $session = session();
            $session->setFlashdata('notif', 'User Data Has Been Deleted !');

            return redirect()->to("/admin/users");
        } else {
            $session = session();
            $session->setFlashdata('error', 'User Data Has Not Been Updated !');

            return redirect()->to("/admin/users");
        }
    }

    public function updateUser()
    {
        $id = $this->request->getVar('id');
        if ($this->request->getFile('user_image')->isValid()) {
            $berkas = $this->request->getFile('user_image');
            $berkas_name = 'avatar-' . $this->request->getVar('username') . '-' . $berkas->getRandomName();
            $berkas->move('uploads', $berkas_name);

            $data = [
                'id'       => $id,
                'username' => $this->request->getVar('username'),
                'full_name' => $this->request->getVar('full_name'),
                'bidang' => $this->request->getVar('bidang'),
                'user_image' => $berkas_name,
            ];
        } else {

            $data = [
                'id'       => $id,
                'username' => $this->request->getVar('username'),
                'full_name' => $this->request->getVar('full_name'),
                'bidang' => $this->request->getVar('bidang'),
            ];
        }

        $update = $this->userModel->save($data);

        if ($update) {
            $session = session();
            $session->setFlashdata('notif', 'User Data Has Been Updated !');

            return redirect()->to("/admin/users");
        } else {
            $session = session();
            $session->setFlashdata('error', 'User Data did not Updated !');

            return redirect()->to("/admin/users");
        }
    }
}
