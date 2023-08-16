<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function index()
    {
        $this->load->view('partial/header');
        $this->load->view('partial/hero');
        // One Page Slide
        $this->load->view('home/v_about');
        $this->load->view('home/v_facts');
        $this->load->view('home/v_skills');
        $this->load->view('home/v_resume');
        $this->load->view('home/v_portfolio');
        $this->load->view('home/v_services');
        $this->load->view('home/v_testimoni');
        $this->load->view('home/v_contact');
        // End One Page
        $this->load->view('partial/footer');
    }
}
