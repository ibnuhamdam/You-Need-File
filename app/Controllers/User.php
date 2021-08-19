<?php

namespace App\Controllers;

use function PHPSTORM_META\type;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User as UserEnt;
use App\Models\MeetingModel;
use App\Models\BidangModel;
use App\Models\FilesModel;

class User extends BaseController
{
    protected $auth;

    /**
     * @var AuthConfig
     */
    protected $config;

    protected $userModel;
    protected $db;
    protected $meetingModel;
    protected $bidangModel;
    protected $filesModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $session = session();
        $this->db      = \Config\Database::connect();
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth = service('authentication');
        $this->meetingModel = new MeetingModel();
        $this->bidangModel = new BidangModel();
        $this->filesModel = new FilesModel();
    }

    public function index()
    {
        $data = [
            'header' => false,
            'bottom' => 'file'
        ];
        return view('user/index', $data);
    }

    public function deleteUser($id)
    {
        $delete = $this->userModel->delete(['id' => $id]);

        if ($delete) {
            $session = session();
            $session->setFlashdata('delete', 'User Has Been Deleted !');

            return redirect()->to("/admin/users");
        } else {
        }
    }

    public function getStarted()
    {
        $data = [
            'header' => false,
            'bottom' => false
        ];
        return view('user/get-started', $data);
    }

    public function profile($id)
    {
        $data = [
            'header' => [
                'type' => 'no-arrow',
                'title' => 'Profile'
            ],
            'bottom' => 'profile',
            'user' => $this->userModel->find($id)
        ];
        return view('user/profile', $data);
    }

    public function file($title, $type)
    {
        // Meeting 
        $this->meetingModel->select('id,nama');
        $files = $this->meetingModel->get()->getResult();
        // Files
        $meet_file = [];

        foreach ($files as $f) :
            $this->filesModel->select('nama,link');
            $this->filesModel->where('meeting_id', $f->id);
            $this->filesModel->where('type', $type);
            $this->filesModel->where('deleted_at', NULL);
            $files = $this->filesModel->get()->getResult();
            array_push($meet_file, ['nama_meet' => $f->nama, 'files' => $files]);
        endforeach;

        $data = [
            'header' => [
                'type' => 'with-arrow',
                'title' => $title,
            ],
            'bottom' => 'file',
            'files' => $meet_file,
            'file_type' => $type
        ];

        return view('user/file', $data);
    }

    public function meet()
    {
        $meet = $this->meetingModel->findAll();
        foreach ($meet as $m) :
            if ($m['tanggal'] < date('Y-m-d')) :
                $data = [
                    'id' => $m['id'],
                    'status' => 'completed'
                ];
                $this->meetingModel->save($data);
            endif;
        endforeach;
        $this->meetingModel->select('meeting.id as id,meeting.nama as nama, pengundang,tanggal,tempat,bidangs.nama as bidang,jam,meet_id,meet_pass,link,undangan,status');
        $this->meetingModel->join('bidangs', 'meeting.bidang_id = bidangs.id');
        $this->meetingModel->where('meeting.deleted_at', NULL);
        $this->meetingModel->where('status', 'upcoming');
        $upcoming = $this->meetingModel->get(4);
        $this->meetingModel->select('meeting.id as id,meeting.nama as nama, pengundang,tanggal,tempat,bidangs.nama as bidang,jam,meet_id,meet_pass,link,undangan,status');
        $this->meetingModel->join('bidangs', 'meeting.bidang_id = bidangs.id');
        $this->meetingModel->where('meeting.deleted_at', NULL);
        $this->meetingModel->where('status', 'completed');
        $completed = $this->meetingModel->get(4);
        $data = [
            'header' => [
                'type' => 'with-arrow',
                'title' => 'Meeting',
            ],
            'bottom' => 'meet',
            'upcoming' => $upcoming->getResult(),
            'completed' => $completed->getResult(),
        ];

        return view('user/meet', $data);
    }

    public function edit($id)
    {
        $this->userModel->select('users.id as id,email,bidangs.nama as bidang, bidangs.id as bid,full_name,user_image,username,no_hp');
        $this->userModel->join('bidangs', 'users.bidang = bidangs.id');
        $this->userModel->where('users.deleted_at', NULL);
        $this->userModel->where('users.id', $id);
        $data = [
            'header' => [
                'type' => 'with-arrow',
                'title' => 'Edit Profile',
            ],
            'bottom' => 'profile',
            'bidang' => $this->bidangModel->findAll(),
            'user' => $this->userModel->get()->getRow()
        ];

        return view('user/edit-profile', $data);
    }

    public function update($id)
    {

        if ($this->request->getFile('user_image')->isValid()) {
            $berkas = $this->request->getFile('user_image');
            $berkas_name = 'avatar-' . $this->request->getVar('username') . '-' . $berkas->getRandomName();
            $berkas->move('uploads', $berkas_name);

            $data = [
                'id'       => $id,
                'username' => $this->request->getVar('username'),
                'full_name' => $this->request->getVar('name'),
                'bidang' => $this->request->getVar('bidang'),
                'user_image' => $berkas_name,
            ];
        } else {
            $data = [
                'id'       => $id,
                'username' => $this->request->getVar('username'),
                'full_name' => $this->request->getVar('name'),
                'bidang' => $this->request->getVar('bidang'),
            ];
        }

        $update = $this->userModel->save($data);

        if ($update) {
            $session = session();
            $session->setFlashdata('update', 'Your Profile Has Been Updated !');

            return redirect()->to("/user/profile/$id");
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
            'bottom' => 'meet',
            'meeting' => $this->meetingModel->find($id),
        ];
        return view('user/detail-meet', $data);
    }

    public function back()
    {
        return redirect()->back();
    }

    public function addUser()
    {
        // Check if registration is allowed
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $users = model(UserModel::class);

        // Validate basics first since some password rules rely on these fields
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'bidang'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);

        // Check user_image if uploaded or not

        if ($this->request->getFile('user_image')->isValid()) {
            $berkas = $this->request->getFile('user_image');
            $berkas_name = 'avatar-' . $this->request->getVar('username') . '-' . $berkas->getRandomName();
            $berkas->move('uploads', $berkas_name);
            $user = new UserEnt(array_merge($this->request->getVar($allowedPostFields), ['user_image' => $berkas_name]));
        } else {
            $user = new UserEnt(array_merge($this->request->getVar($allowedPostFields)));
        }

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->route('admin/users')->with('message', lang('Auth.activationSuccess'));
        }

        // Success!
        $session = session();
        $session->setFlashdata('notif', 'User Has Been Successfully Inserted !');
        return redirect()->route('admin/users')->with('message', lang('Auth.registerSuccess'));
    }
}
