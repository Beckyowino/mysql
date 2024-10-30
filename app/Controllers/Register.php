<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StudentModel;

class Register extends Controller
{
    protected $studentModel;
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        helper(['url']);

    }
    public function index()
    {
       $data['students'] = $this->studentModel->get()->getResult();
       $data['showSearchBar'] = false;

       return view('register_student', $data);
    }
    public function saveStudent()
    {
        helper(['form', 'url']);
    
        if ($this->request->getMethod() == 'POST') {
            $firstname = $this->request->getPost('firstname');
            $lastname = $this->request->getPost('lastname');
            $dateOfBirth = $this->request->getPost('date_of_birth');
            $photo = $this->request->getFile('photo');
    
            // Check if photo is valid
            if (!$photo) {
                return redirect()->to('/register_student')->with('error', 'No file uploaded!');
            }
    
            if (!$photo->isValid()) {
                return redirect()->to('/register_student')->with('error', 'Invalid file: ' . $photo->getErrorString());
            }
    
            // Define the upload path
            $uploadPath = FCPATH . 'uploads';
    
            $newFileName = $photo->getRandomName();
            if (!$photo->move($uploadPath, $newFileName)) {
                return redirect()->to( '/register_student')->with('error', 'Failed to move uploaded file!');
            } else {
                log_message('info', 'File uploaded successfully!');
            }
    
            $this->studentModel->save([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'photo' => $newFileName,
                'date_of_birth' => $dateOfBirth
            ]);
    
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Student registration successful',
            ]);
        }
    
        // If it's not a POST request, return an error
        return $this->response->setStatusCode(405)->setBody('Method Not Allowed');    

    }

    public function view_students()
        {
            $data['students'] = $this->studentModel->orderBy('id', 'DESC')->findAll();
            $data['showSearchBar'] = true;

            return view('view_students', $data);
        }

    public function edit($id)
        {
        $student = $this->studentModel->find($id);

        if (!$student) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Student not found');
        }

        if($this->request->getPost())
        {
            $row = (object) $this->studentModel->find($id);
            $post = (object) $this->request->getPost();
            
            $row->firstname =  $post->firstname;
            $row->lastname =  $post->lastname;
            $row->DOB =  $post->date_of_birth;
            $photo = $this->request->getFile('photo');
            if ($photo && $photo->isValid() && !$photo->hasMoved()) {
                // Generate a unique name for the uploaded file
                $newPhotoName = $photo->getRandomName();
        
                // Define the path where the file should be moved (e.g., 'public/uploads/photos')
                $uploadPath = FCPATH . 'uploads/';
        
                // Ensure the upload directory exists, create it if not
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
        
                // Move the uploaded file to the 'uploads/photos' directory
                $photo->move($uploadPath, $newPhotoName);
        
                // Delete the old photo if necessary
                if (!empty($row->photo) && file_exists($uploadPath . $row->photo)) {
                    unlink($uploadPath . $row->photo);
                }
        
                // Save the new photo name in the database
                $row->photo = $newPhotoName;
            }
        
            // Save the updated student record
            $ok = $this->studentModel->save($row);
        
            if ($ok) {
                return redirect()->to('/register_student')->with('success', 'Student updated successfully!');
            } else {
                return redirect()->to('/register_student')->with('error', 'Failed to update student!');
            }

        }

        $data = [
            'title' => 'Edit Students',
            'student' => $student,
        ];
        $data['showSearchBar'] = false;

        return view('edit', $data);
        }

    public function update($id)
        {
        $students = $this->studentModel->find($id);
        $data = [];

        foreach($students as $student) {
            $data[] = [
                'id' => $student->id,
                'firstname' => $this->request->getPost('firstname[]'),
                'lastname' => $this->request->getPost('lastname[]'),
                'date_of_birth' => $this->request->getPost('date_of_birth[]'),
                'photo' => $this->request->getFile('photo[]'),
            ];
        }

        $this->studentModel->updateBatch($data);

        return redirect()->to('/register_student');
        }

        public function delete($id)
        {
            $this->studentModel->delete($id);
            return redirect()->to('/view_students');
        }

        public function view($id)
        {
            $student = $this->studentModel->find($id);
            if (!$student) {
                return redirect()->to( uri: '/register_student')->with('error', 'Student not found');

            }
            $data['student'] = $student;
            return view('view', $data);
        }
        
}

    
