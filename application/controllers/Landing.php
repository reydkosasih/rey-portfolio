<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }

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

    public function send_email()
    {
        // Form validation (customize this as per your requirements)
        $this->form_validation->set_rules('recipient', 'Recipient', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/v_contact');
        } else {
            $recipient = $this->input->post('recipient');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            // Send email
            $this->email->from($recipient);
            $this->email->to('eiraiden.gen1@gmail.com');
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                // Email sent successfully
                echo 'Email sent!';
            } else {
                // Email sending failed
                show_error($this->email->print_debugger());
            }
        }
    }
}
