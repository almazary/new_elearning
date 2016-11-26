<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class untuk resource email
 *
 * @package   e-Learning Dokumenary Net
 * @author    Almazari <almazary@gmail.com>
 * @copyright Copyright (c) 2013 - 2016, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */


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
        $data['comp_js'] = get_texteditor();

        $this->twig->display('edit-email-template.html', $data);
    }
}
