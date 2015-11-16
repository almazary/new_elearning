<?php

/* donation.html */
class __TwigTemplate_d2b0a480a00f767bcd251f32fb223805d4951946a3a740634dcbe60592f08662 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"btn-controls\">
    <div class=\"btn-box-row row-fluid\">
        <div class=\"span12\">
            <div class=\"well well-small\" style=\"box-shadow: none;background-color: #FFF;\">
                <b><i class=\"icon icon-heart\"></i> DONASI</b>
                <hr style=\"margin-top:5px; margin-bottom: 10px;\">
                <p>
                    Buat temen - temen yang berbaik hati ingin berdonasi untuk aplikasi e-learning ini silahkan kirimkan ke rekening berikut : <br>
                </p>
                <p><label class=\"label label-info\">Mandiri A.N Almazari 9000021575973</label></p>

                Cara transfer dari bank lain ke mandiri via ATM:
                <div class=\"row-fluid\">
                    <div class=\"span6\">
                        <div class=\"well well-sm\" style=\"padding: 10px;\">
                        <b>BRI ke MANDIRI</b>
                        <ul>
                            <li>Pilih Transaksi Lainnya</li>
                            <li>Pilih Transfer</li>
                            <li>Kemudian pilih Bank Lain</li>
                            <li>Masukan Kode Bank + Nomor Rekening yang dituju, yaitu 008 + No. Rekening</li>
                            <li>Ikuti langkah - langkah yang tampil pada layar hingga selesai.</li>
                        </ul>
                        </div>
                    </div>
                    <div class=\"span6\">
                        <div class=\"well well-sm\" style=\"padding: 10px;\">
                        <b>BCA ke MANDIRI</b>
                        <ul>
                            <li>Pilih Transaksi Lainnya</li>
                            <li>Pilih Transfer</li>
                            <li>Akan muncul 2 menu transfer yaitu Ke Rek BCA dan Rek Bank Lain</li>
                            <li>Pilih Rek Bank lain</li>
                            <li>Lalu anda akan diminta memasukan Kode Bank, jika kita tidak ingat disana ada menu Daftar Kode Bank, untuk kode Bank Mandiri Ialah 008</li>
                            <li>Masukan nominal uang yang akan ditransfer</li>
                            <li>Setelah itu masukan nomor rekening bank mandiri yang akan dituju</li>
                            <li>Ikuti langkah - langkah yang tampil pada layar hingga selesai.</li>
                        </ul>
                        </div>
                    </div>
                </div>

                <p>Selain cara-cara diatas, prinsip transfer antar bank adalah sama, yaitu kita harus tau kode bank tujuan transfer, kode bank untuk mandiri adalah 008.</p>

                <p>Ijinkan saya mengucapkan terimakasih dengan mengkonfirmasi melalui email <a href=\"mailto:almazary@gmail\"><b>almazary@gmail.com</b></a></p>

                <p>Terimakasih telah menggunakan aplikasi e-learning ini.</p>

            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "donation.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
