<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


abstract class BaseController extends Controller
{
    protected $session;
    protected $model;
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    protected function SaveAndDirect($model, $data, $url,$name='')
    {
        if ($model->InsertData($data)) {
            $this->session->setFlashdata('success',[
                'general'=> "$name berhasil disimpan."]);
        } else {
            log_message('error', 'Insert data gagal: ' . json_encode($data));
            $this->session->setFlashdata('errors',[
                'general'=> "$name gagal disimpan. Terjadi kesalahan."]);
        }

        return redirect()->to(base_url($url));
    }

    protected function UpdateAndDirect($model, $id,$data, $url,$name='')
    {
        if ($model->UpdateData($id,$data)) {
            $this->session->setFlashdata('success',[
                'general'=> "$name berhasil diubah."]);
        } else {
            log_message('error', 'Insert data gagal: ' . json_encode($data));
            $this->session->setFlashdata('errors',[
                'general'=> "$name gagal diubah. Terjadi kesalahan."]);
        }

        return redirect()->to(base_url($url));
    }



    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        helper("form");
        session();
    }
}
