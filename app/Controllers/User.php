<?php

namespace App\Controllers;

use function PHPSTORM_META\type;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $session = session();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'header' => false,
            'bottom' => 'file'
        ];
        return view('user/index', $data);
    }

    public function getStarted()
    {
        $data = [
            'header' => false,
            'bottom' => false
        ];
        return view('user/get-started', $data);
    }

    public function profile()
    {
        $data = [
            'header' => [
                'type' => 'no-arrow',
                'title' => 'Profile'
            ],
            'bottom' => 'profile'
        ];
        return view('user/profile', $data);
    }

    public function file($type)
    {
        $data = [
            'header' => [
                'type' => 'with-arrow',
                'title' => $type,
            ],
            'bottom' => 'file'
        ];
        return view('user/file', $data);
    }

    public function meet()
    {
        $data = [
            'header' => [
                'type' => 'with-arrow',
                'title' => 'Meeting',
            ],
            'bottom' => 'meet'
        ];
        return view('user/meet', $data);
    }

    public function edit($id)
    {
        $data = [
            'header' => [
                'type' => 'with-arrow',
                'title' => 'Edit Profile',
            ],
            'bottom' => 'profile',
            'user' => $this->userModel->find($id)
        ];

        return view('user/edit-profile', $data);
    }

    public function update($id)
    {
        $data = [
            'id'       => $id,
            'username' => $this->request->getVar('username'),
            'full_name' => $this->request->getVar('name'),
            'bidang' => $this->request->getVar('bidang'),
        ];

        $update = $this->userModel->save($data);

        if ($update) {
            $session = session();
            $session->setFlashdata('update', 'Your Profile Has Been Updated !');

            return redirect()->to("/user/profile");
        } else {
            var_dump($this->db->getLastQuery());
        }
    }

    public function meetDetail($id)
    {
        $data = [
            'id' => $id,
            'header' => [
                'type' => 'with-arrow',
                'title' => 'Meeting',
            ],
            'bottom' => 'meet'
        ];
        return view('user/detail-meet', $data);
    }

    public function back()
    {
        return redirect()->back();
    }
}
