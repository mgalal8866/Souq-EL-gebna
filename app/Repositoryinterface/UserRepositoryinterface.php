<?php
namespace App\Repositoryinterface;

interface UserRepositoryinterface{

    public function getuserdata();
    public function login($request);
    public function edit($request);
    public function register($request);
    public function editprofile($request);
    public function getusers($pg = 30);
    public function logout();
    public function sendtoken($token);
    public function sendotp($request);
    public function checkanswer($request);
    public function verificationcode($request);
    public function checkphone($phone);

}

