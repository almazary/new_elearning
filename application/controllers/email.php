<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();

        # harus login sebagai admin
        if (!is_admin()) {
            redirect('welcome');
        }
    }

    function index()
    {
        $this->db->like('id', 'email-template-', 'after');
        $results = $this->db->get('pengaturan');

        $data = array();
        foreach ($results->result_array() as $email) {
            $email_value = json_decode($email['value'], 1);

            $data[] = array(
                'id'      => $email['id'],
                'nama'    => $email['nama'],
                'subject' => $email_value['subject'],
                'body'    => $email_value['body']
            );
        }
        $data['template'] = $data;

        $data['comp_js'] = load_comp_js(array(
            base_url('assets/comp/datatables/jquery.dataTables.js'),
            base_url('assets/comp/datatables/datatable-bootstrap2.js'),
            base_url('assets/comp/datatables/script.js'),
        ));

        $data['comp_css'] = load_comp_css(array(
            base_url('assets/comp/datatables/datatable-bootstrap2.css'),
        ));

        $this->twig->display('list-email-template.html', $data);
    }

    function edit($id = '')
    {
        $retrieve = get_pengaturan($id);
        if (empty($retrieve)) {
            redirect('email');
        }

        if (!empty($_POST) AND !is_demo_app()) {
            $value = array(
                'subject' => $_POST['subject'],
                'body'    => $_POST['body'],
            );

            $this->config_model->update($id, $retrieve['nama'], json_encode($value));
            redirect('email/edit/' . $id);
        }

        $retrieve_value = json_decode($retrieve['value'], 1);

        $data['template'] = array(
            'id'      => $retrieve['id'],
            'nama'    => $retrieve['nama'],
            'subject' => $retrieve_value['subject'],
            'body'    => $retrieve_value['body']
        );
        $data['comp_js'] = get_tinymce('body', 'simple');

        $this->twig->display('edit-email-template.html', $data);
    }
}
