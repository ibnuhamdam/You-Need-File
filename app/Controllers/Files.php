<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use App\Models\BidangModel;
use App\Models\MeetingModel;
use App\Models\UsersMeeting;
use App\Models\FilesModel;

class Files extends BaseController
{
    protected $userModel;
    protected $bidangModel;
    protected $meetingModel;
    protected $usersmeetingModel;
    protected $filesModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->bidangModel = new BidangModel();
        $this->meetingModel = new MeetingModel();
        $this->usersmeetingModel = new UsersMeeting();
        $this->filesModel = new FilesModel();
        $uri = new \CodeIgniter\HTTP\URI();
        $this->db      = \Config\Database::connect();
        $session = session();
    }

    // Paparan

    public function paparan()
    {
        $this->filesModel->select('files.id as id,files.nama as nama, meeting.nama as mnama,meeting_id, users.full_name as unama');
        $this->filesModel->join('meeting', 'files.meeting_id = meeting.id');
        $this->filesModel->join('users', 'files.users_id = users.id');
        $this->filesModel->where('files.type', 'paparan');
        $this->filesModel->where('files.deleted_at', NULL);
        $data = [
            'files' => $this->filesModel->get()->getResult(),
        ];

        return view('admin/paparan/index', $data);
    }

    public function addPaparan()
    {
        $data = [
            'meeting' => $this->meetingModel->findAll(),
        ];

        return view('admin/paparan/addPaparan', $data);
    }

    public function insertPaparan()
    {
        $rules = [
            'meeting' => 'required',
            'deskripsi'    => 'required',
            'paparan'   => 'uploaded[paparan]|max_size[paparan,10048]|ext_in[paparan,pdf]'
        ];

        if (!$this->validate($rules)) {
            // dd($this->validator->getErrors());
            return redirect()->to("admin/files/paparan/add")->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [];

        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['paparan'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $berkas_name = 'Files-paparan-' . $this->request->getVar('meeting') . '-' . $file->getRandomName();
                    $file->move('uploads/berkas/paparan', $berkas_name);
                    $temp = [
                        'nama'      => $berkas_name,
                        'type'      => 'paparan',
                        'meeting_id' => $this->request->getVar('meeting'),
                        'users_id'      => user()->id,
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                }
            }
        }

        $insert = $this->filesModel->insertBatch($data);

        if ($insert) {
            $session = session();
            $session->setFlashdata('notif', 'File Successfully Inserted !');

            return redirect()->to("/admin/files/paparan");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files cannot inserted');

            return redirect()->to("/admin/files/paparan");
        }
    }

    public function editPaparan($id)
    {
        $this->filesModel->select('files.id as id,files.nama as nama, deskripsi, meeting.nama as mnama, meeting.id as mid');
        $this->filesModel->join('meeting', 'files.meeting_id = meeting.id');
        $this->filesModel->where('files.type', 'paparan');
        $this->filesModel->where('users_id', user()->id);
        $data = [
            'files' => $this->filesModel->getWhere(['meeting.id' => $id, 'files.deleted_at' => null])->getResult(),
            'meeting' => $this->meetingModel->findAll(),
        ];

        // dd($data);

        return view('admin/paparan/editPaparan', $data);
    }

    public function updatePaparan()
    {
        $rules = [
            'meeting' => 'required',
            'deskripsi'    => 'required',
            'paparan'   => 'max_size[paparan,10048]|ext_in[paparan,pdf]'
        ];

        $mid = $this->request->getVar('meet_id');

        if (!$this->validate($rules)) {
            return redirect()->to("admin/files/paparan/edit/$mid")->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [];

        if ($this->request->getFiles()) {
            $imagefile = $this->request->getFiles();
            $i = 0;
            foreach ($imagefile['paparan'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $berkas_name = 'Files-paparan-' . $this->request->getVar('meeting') . '-' . $file->getRandomName();
                    $file->move('uploads/berkas/paparan', $berkas_name);
                    $temp = [
                        'id'        => $this->request->getVar('id')[$i++],
                        'nama'      => $berkas_name,
                        'meeting_id' => $this->request->getVar('meeting'),
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                } else {
                    $temp = [
                        'id'        => $this->request->getVar('id')[$i++],
                        'meeting_id' => $this->request->getVar('meeting'),
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                }
            }
        }

        $update = $this->filesModel->updateBatch($data, 'id');

        if ($update) {
            $session = session();
            $session->setFlashdata('notif', 'File Successfully Updated !');

            return redirect()->to("/admin/files/paparan");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files cannot inserted');

            return redirect()->to("/admin/files/paparan");
        }
    }

    public function deletePaparan()
    {
        $id = $this->request->getPost('id');

        $delete = $this->filesModel->delete(['id' => $id]);

        if ($delete) {
            $session = session();
            $session->setFlashdata('notif', 'Files Has Been Deleted !');

            return redirect()->to("/admin/files/paparan");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files Has Not Been Updated !');

            return redirect()->to("/admin/files/paparan");
        }
    }

    // Dokumentasi

    public function dokumentasi()
    {
        $this->filesModel->select('files.id as id,files.nama as nama, meeting.nama as mnama,meeting_id, users.full_name as unama');
        $this->filesModel->join('meeting', 'files.meeting_id = meeting.id');
        $this->filesModel->join('users', 'files.users_id = users.id');
        $this->filesModel->where('files.type', 'dokumentasi');
        $this->filesModel->where('files.deleted_at', NULL);
        $data = [
            'files' => $this->filesModel->get()->getResult(),
        ];

        return view('admin/dokumentasi/index', $data);
    }

    public function addDokumentasi()
    {
        $data = [
            'meeting' => $this->meetingModel->findAll(),
        ];

        return view('admin/dokumentasi/addDokumentasi', $data);
    }

    public function insertDokumentasi()
    {
        $rules = [
            'meeting' => 'required',
            'deskripsi'    => 'required',
            'image'   => 'uploaded[image]|max_size[image,10048]|ext_in[image,jpg,jpeg,png]|is_image[image]'
        ];

        if (!$this->validate($rules)) {
            // dd($this->validator->getErrors());
            return redirect()->to("admin/files/dokumentasi/add")->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [];

        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['image'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $berkas_name = 'Files-dokumentasi-' . $this->request->getVar('meeting') . '-' . $file->getRandomName();
                    $file->move('uploads/berkas/dokumentasi', $berkas_name);
                    $temp = [
                        'nama'      => $berkas_name,
                        'type'      => 'dokumentasi',
                        'meeting_id' => $this->request->getVar('meeting'),
                        'users_id'      => user()->id,
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                }
            }
        }

        $insert = $this->filesModel->insertBatch($data);

        if ($insert) {
            $session = session();
            $session->setFlashdata('notif', 'File Successfully Inserted !');

            return redirect()->to("/admin/files/dokumentasi");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files cannot inserted');

            return redirect()->to("/admin/files/dokumentasi");
        }
    }

    public function editDokumentasi($id)
    {
        $this->filesModel->select('files.id as id,files.nama as nama, deskripsi, meeting.nama as mnama, meeting.id as mid');
        $this->filesModel->join('meeting', 'files.meeting_id = meeting.id');
        $this->filesModel->where('files.type', 'dokumentasi');
        $this->filesModel->where('users_id', user()->id);
        $data = [
            'files' => $this->filesModel->getWhere(['meeting.id' => $id, 'files.deleted_at' => null])->getResult(),
            'meeting' => $this->meetingModel->findAll(),
        ];

        // dd($data);

        return view('admin/dokumentasi/editDokumentasi', $data);
    }

    public function updateDokumentasi()
    {
        $rules = [
            'meeting' => 'required',
            'deskripsi'    => 'required',
            'image'   => 'max_size[image,6048]|ext_in[image,jpg,jpeg,png]|is_image[image]'
        ];

        $mid = $this->request->getVar('meet_id');
        if (!$this->validate($rules)) {
            return redirect()->to("admin/files/dokumentasi/edit/$mid")->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [];

        if ($this->request->getFiles()) {
            $imagefile = $this->request->getFiles();
            $i = 0;
            foreach ($imagefile['image'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $berkas_name = 'Files-dokumentasi-' . $this->request->getVar('meeting') . '-' . $file->getRandomName();
                    $file->move('uploads/berkas/dokumentasi', $berkas_name);
                    $temp = [
                        'id'        => $this->request->getVar('id')[$i++],
                        'nama'      => $berkas_name,
                        'meeting_id' => $this->request->getVar('meeting'),
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                } else {
                    $temp = [
                        'id'        => $this->request->getVar('id')[$i++],
                        'meeting_id' => $this->request->getVar('meeting'),
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                }
            }
        }

        $update = $this->filesModel->updateBatch($data, 'id');

        if ($update) {
            $session = session();
            $session->setFlashdata('notif', 'File Successfully Updated !');

            return redirect()->to("/admin/files/dokumentasi");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files cannot inserted');

            return redirect()->to("/admin/files/dokumentasi");
        }
    }

    public function deleteDokumentasi()
    {
        $id = $this->request->getPost('id');

        $delete = $this->filesModel->delete(['id' => $id]);

        if ($delete) {
            $session = session();
            $session->setFlashdata('notif', 'Files Has Been Deleted !');

            return redirect()->to("/admin/files/dokumentasi");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files Has Not Been Updated !');

            return redirect()->to("/admin/files/dokumentasi");
        }
    }

    // Attendes (daftar hadir)

    public function attendes()
    {
        $this->filesModel->select('files.id as id,files.nama as nama, files.link as flink, meeting.nama as mnama,meeting_id, users.full_name as unama');
        $this->filesModel->join('meeting', 'files.meeting_id = meeting.id');
        $this->filesModel->join('users', 'files.users_id = users.id');
        $this->filesModel->where('files.type', 'attendes');
        $this->filesModel->where('files.deleted_at', NULL);
        $data = [
            'files' => $this->filesModel->get()->getResult(),
        ];

        return view('admin/attendes/index', $data);
    }

    public function addAttendes()
    {
        $data = [
            'meeting' => $this->meetingModel->findAll(),
        ];

        return view('admin/attendes/addAttendes', $data);
    }

    public function insertAttendes()
    {
        $rules = [
            'meeting'   => 'required',
            'deskripsi' => 'required',
            'link'      => 'string|required_with[link,files]',
            'files'     => 'uploaded[files]|max_size[files,10048]|ext_in[files,pdf]'
        ];

        if (!$this->validate($rules)) {
            // dd($this->validator->getErrors());
            return redirect()->to("admin/files/attendes/add")->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [];

        if ($files = $this->request->getFiles()) {
            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $berkas_name = 'Files-daftarHadir-' . $this->request->getVar('meeting') . '-' . $file->getRandomName();
                    $file->move('uploads/berkas/attendes', $berkas_name);
                    $temp = [
                        'nama'      => $berkas_name,
                        'type'      => 'attendes',
                        'link'      => $this->request->getVar('link'),
                        'meeting_id' => $this->request->getVar('meeting'),
                        'users_id'      => user()->id,
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                } else {
                    $temp = [
                        'type'      => 'attendes',
                        'link'      => $this->request->getVar('link'),
                        'meeting_id' => $this->request->getVar('meeting'),
                        'users_id'      => user()->id,
                        'deskripsi' => $this->request->getVar('deskripsi'),
                    ];
                    array_push($data, $temp);
                }
            }
        }

        $insert = $this->filesModel->insertBatch($data);

        if ($insert) {
            $session = session();
            $session->setFlashdata('notif', 'File Successfully Inserted !');

            return redirect()->to("/admin/files/attendes");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files cannot inserted');

            return redirect()->to("/admin/files/attendes");
        }
    }

    public function editAttendes($id)
    {
        $this->filesModel->select('files.id as id,files.nama as nama, deskripsi, files.link as flink, meeting.nama as mnama, meeting.id as mid');
        $this->filesModel->join('meeting', 'files.meeting_id = meeting.id');
        $this->filesModel->where('files.type', 'attendes');
        $this->filesModel->where('users_id', user()->id);
        $data = [
            'files' => $this->filesModel->getWhere(['files.id' => $id, 'files.deleted_at' => null])->getResult(),
            'meeting' => $this->meetingModel->findAll(),
        ];

        // dd($data);

        return view('admin/attendes/editAttendes', $data);
    }

    public function updateAttendes()
    {
        $rules = [
            'meeting' => 'required',
            'deskripsi'    => 'required',
            'link'      => 'string|required_with[link,files]',
            'files'   => 'max_size[files,6048]'
        ];

        $mid = $this->request->getVar('meet_id');
        if (!$this->validate($rules)) {
            return redirect()->to("admin/files/attendes/edit/$mid")->withInput()->with('errors', $this->validator->getErrors());
        }
        if ($this->request->getFiles()) {
            $imagefile = $this->request->getFiles(['files']);
            $i = 0;

            if ($imagefile['files']->isValid() && !$imagefile['files']->hasMoved()) {
                $file = $imagefile['files'];
                $berkas_name = 'Files-attendes-' . $this->request->getVar('meeting') . '-' . $file->getRandomName();
                $file->move('uploads/berkas/attendes', $berkas_name);
                $data = [
                    'id'        => $this->request->getVar('id'),
                    'nama'      => $berkas_name,
                    'link'      => $this->request->getVar('link'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                ];
            } else {
                $data = [
                    'id'        => $this->request->getVar('id'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'link'      => $this->request->getVar('link'),
                ];
            }
            // foreach ($imagefile['files'] as $file) {
            //     if ($file->isValid() && !$file->hasMoved()) {
            //         $berkas_name = 'Files-attendes-' . $this->request->getVar('meeting') . '-' . $file->getRandomName();
            //         $file->move('uploads/berkas/attendes', $berkas_name);
            //         $temp = [
            //             'id'        => $this->request->getVar('id')[$i++],
            //             'nama'      => $berkas_name,
            //             'meeting_id' => $this->request->getVar('meeting'),
            //             'deskripsi' => $this->request->getVar('deskripsi'),
            //         ];
            //         array_push($data, $temp);
            //     } else {
            //         $temp = [
            //             'id'        => $this->request->getVar('id')[$i++],
            //             'meeting_id' => $this->request->getVar('meeting'),
            //             'deskripsi' => $this->request->getVar('deskripsi'),
            //         ];
            //         array_push($data, $temp);
            //     }
            // }
        }

        $update = $this->filesModel->save($data);

        if ($update) {
            $session = session();
            $session->setFlashdata('notif', 'File Successfully Updated !');

            return redirect()->to("/admin/files/attendes");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files cannot inserted');

            return redirect()->to("/admin/files/attendes");
        }
    }

    public function deleteAttendes()
    {
        $id = $this->request->getPost('id');

        $delete = $this->filesModel->delete(['id' => $id]);

        if ($delete) {
            $session = session();
            $session->setFlashdata('notif', 'Files Has Been Deleted !');

            return redirect()->to("/admin/files/attendes");
        } else {
            $session = session();
            $session->setFlashdata('error', 'Files Has Not Been Updated !');

            return redirect()->to("/admin/files/attendes");
        }
    }
}
