<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/AdminRepository.php';

class AdminController extends AppController {

    public function __construct()
    {
        parent::__construct();
        $this->adminRepository = new AdminRepository();
    }

    public function admin()
    {
        if($this->isAdmin()){
            $users = $this->adminRepository->getUsers();
            $this->render('admin', ['users' => $users]);    
        }
        else{
            die("Brak dostępu");
        }
    }

    public function isAdmin()
    {
        $user_id = $this->isAuthorized();
        $isAdmin = $this->adminRepository->isAdmin($user_id);
        return $isAdmin;
    }

}