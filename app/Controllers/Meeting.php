<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use App\Models\BidangModel;
use App\Models\MeetingModel;
use App\Models\UsersMeeting;

class Meeting extends BaseController
{
    protected $userModel;
    protected $bidangModel;
    protected $meetingModel;
    protected $usersmeetingModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->bidangModel = new BidangModel();
        $this->meetingModel = new MeetingModel();
        $this->usersmeetingModel = new UsersMeeting();
        $uri = new \CodeIgniter\HTTP\URI();
        $this->db      = \Config\Database::connect();
        $session = session();
    }

    public function index()
    {
        $this->meetingModel->select('meeting.id as id,meeting.nama as nama, pengundang,tanggal,tempat,bidangs.nama as bidang,jam,link,undangan,status');
        $this->meetingModel->join('bidangs', 'meeting.bidang_id = bidangs.id');
        $this->meetingModel->where('meeting.deleted_at', NULL);
        $data = [
            'meeting' => $this->meetingModel->get()->getResult(),
        ];

        return view('admin/meeting/index', $data);
    }

    public function add()
    {
        $data = [
            'users' => $this->userModel->findAll(),
            'bidang' => $this->bidangModel->findAll(),
        ];

        return view('admin/meeting/addMeeting', $data);
    }

    public function insert()
    {
        $rules = [
            'nama' => 'required|is_unique[meeting.nama]',
            'pengundang'    => 'required',
            'tanggal'   => 'required|valid_date[Y-m-d]',
            'tempat'   => 'required',
            'bidang_id'   => 'required|integer',
            'jam'   => 'required',
            'undangan' => 'uploaded[undangan]|max_size[undangan,5048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/meeting/add')->withInput()->with('errors', $this->validator->getErrors());
        }

        $berkas = $this->request->getFile('undangan');
        $berkas_name = 'undangan-' . $this->request->getVar('bidang_id') . '-' . $berkas->getRandomName();
        $berkas->move('uploads/undangan', $berkas_name);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'pengundang' => $this->request->getVar('pengundang'),
            'tanggal' => $this->request->getVar('tanggal'),
            'tempat' => $this->request->getVar('tempat'),
            'bidang_id' => $this->request->getVar('bidang_id'),
            'jam' => $this->request->getVar('jam'),
            'meet_id' => $this->request->getVar('meet_id'),
            'meet_pass' => $this->request->getVar('meet_pass'),
            'link' => $this->request->getVar('link'),
            'undangan' => $berkas_name,
            'status' => 'upcoming',
        ];

        $anggota = $this->request->getVar('anggota');

        $insert = $this->meetingModel->save($data);

        if ($insert) {
            // dd($this->db->insertID());
            $id_meet = $this->db->insertID();
            $list = [];
            foreach ($anggota as $a) :
                $arr = ["users_id" => $a, "meeting_id" => $id_meet];
                array_push($list, $arr);
            endforeach;

            $insert2 = $this->usersmeetingModel->insertBatch($list);
            if ($insert2) {
                $session = session();
                $session->setFlashdata('notif', 'Meeting Successfully Added !');

                return redirect()->to("/admin/meeting");
            } else {
                $session = session();
                $session->setFlashdata('error', 'Meeting Did Not Added !');

                return redirect()->to("/admin/meeting");
            }
        } else {
            $session = session();
            $session->setFlashdata('error', 'Meeting Did Not Added !');

            return redirect()->to("/admin/meeting");
        }
    }

    public function detail($id)
    {
        $this->meetingModel->select('meeting.id as id,meeting.nama as nama, pengundang,tanggal,tempat,bidangs.nama as bidang,jam,meet_id,meet_pass,link,undangan,status');
        $this->meetingModel->join('bidangs', 'meeting.bidang_id = bidangs.id');
        $this->meetingModel->where('meeting.deleted_at', NULL);
        $this->meetingModel->where('meeting.id', $id);
        $data = [
            'meeting' => $this->meetingModel->get()->getRow(),
        ];

        return view('admin/meeting/detailMeeting', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');

        $delete = $this->meetingModel->delete(['id' => $id]);

        if ($delete) {
            $session = session();
            $session->setFlashdata('notif', 'Meeting Has Been Deleted !');

            return redirect()->to("/admin/meeting");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Meeting Has Not Been Updated !');

            return redirect()->to("/admin/meeting");
        }
    }

    public function edit($id)
    {
        $this->meetingModel->select('meeting.id as id,meeting.nama as nama, pengundang,tanggal,tempat,bidang_id,bidangs.nama as bidang,jam,meet_id,meet_pass,link,undangan,status');
        $this->meetingModel->join('bidangs', 'meeting.bidang_id = bidangs.id');
        $this->meetingModel->where('meeting.deleted_at', NULL);
        $this->meetingModel->where('meeting.id', $id);
        $data = [
            'meeting' => $this->meetingModel->get()->getRow(),
            'bidang' => $this->bidangModel->findAll(),
        ];

        return view('admin/meeting/editMeeting', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $rules = [
            'nama' => 'required',
            'pengundang'    => 'required',
            'tanggal'   => 'required|valid_date[Y-m-d]',
            'tempat'   => 'required',
            'bidang_id'   => 'required|integer',
            'jam'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to("admin/meeting/edit/$id")->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($this->request->getFile('undangan')->isValid()) {
            $berkas = $this->request->getFile('undangan');
            $berkas_name = 'undangan-' . $this->request->getVar('bidang_id') . '-' . $berkas->getRandomName();
            $berkas->move('uploads/undangan', $berkas_name);

            $data = [
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'pengundang' => $this->request->getVar('pengundang'),
                'tanggal' => $this->request->getVar('tanggal'),
                'tempat' => $this->request->getVar('tempat'),
                'bidang_id' => $this->request->getVar('bidang_id'),
                'jam' => $this->request->getVar('jam'),
                'meet_id' => $this->request->getVar('meet_id'),
                'meet_pass' => $this->request->getVar('meet_pass'),
                'link' => $this->request->getVar('link'),
                'undangan' => $berkas_name,
                'status' => 'upcoming',
            ];
        } else {
            $data = [
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'pengundang' => $this->request->getVar('pengundang'),
                'tanggal' => $this->request->getVar('tanggal'),
                'tempat' => $this->request->getVar('tempat'),
                'bidang_id' => $this->request->getVar('bidang_id'),
                'jam' => $this->request->getVar('jam'),
                'link' => $this->request->getVar('link'),
                'status' => 'upcoming',
            ];
        }

        $update = $this->meetingModel->save($data);

        if ($update) {
            $session = session();
            $session->setFlashdata('notif', 'Meeting Has Been Updated !');

            return redirect()->to("/admin/meeting");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Meeting Failed to Update !');

            return redirect()->to("/admin/meeting");
        }
    }

    public function reminder()
    {
        $meet = $this->meetingModel->findAll();
        $this->meetingModel->select('meeting.id as id,meeting.nama as nama, tanggal,jam,meeting.status as status,users.full_name as uname, users.id as uid, no_hp');
        $this->meetingModel->join('users_meeting', 'meeting.id = users_meeting.meeting_id');
        $this->meetingModel->join('users', 'users_meeting.users_id = users.id');
        $this->meetingModel->where('meeting.deleted_at', NULL);
        $meeting = $this->meetingModel->get()->getResult();

        $meet_user = [];
        foreach ($meet as $m) :
            $users = [];
            foreach ($meeting as $me) :
                if ($me->id === $m['id']) {
                    $tempme = [
                        'id' => $me->uid,
                        'nama' => $me->uname,
                        'no_hp' => $me->no_hp
                    ];
                    array_push($users, $tempme);
                }
            endforeach;
            $temp = [
                'id' => $m['id'],
                'nama' => $m['nama'],
                'jam' => $m['jam'],
                'tanggal' => $m['tanggal'],
                'tempat' => $m['tempat'],
                'users' => $users
            ];
            array_push($meet_user, $temp);
        endforeach;

        $data = [
            'meeting' => $meet_user
        ];

        return view('admin/meeting/meetingReminder', $data);
    }
}
