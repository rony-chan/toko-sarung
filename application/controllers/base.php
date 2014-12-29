<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Controller {

      public function __construct(){
            parent::__construct();
      // Your own constructor code
      }

      protected function header($header, $data) {
            //menyimpan variabel header
            $data['header'] = $header;
            //menyisipkan file header.php
            $this->load->view('base/header.php', $data);
      }

      protected function footer($footer, $data) {
            //menyimpan variabel header
            $data['footer'] = $footer;
            //menyisipkan file header.php
            $this->load->view('base/footer.php', $data);
      }

      protected function display_admin($content_admin, $data) {
            //menyimpan variabel content_admin
            $data['content_admin'] = $content_admin;
            //menyisipkan file display-admin.php
            $this->load->view('base/display-admin.php', $data);
      }

      protected function display_user($content_user, $data) {
            //menyimpan variabel content_user
            $data['content_user'] = $content_user;
            //menyisipkan file display-user.php
            $this->load->view('base/display-user.php', $data);
      }

      protected function navbar($navbar, $data) {
            $data['navbar'] = $navbar;
            $this->load->view('user/navbar.php');
      }

      protected function form_search($form_search, $data) {
            $data['form_search'] = $form_search;
            $this->load->view('user/form-search.php');
      }

      protected function menubar($menubar, $data) {
            $data['menubar'] = $menubar;
            $this->load->view('user/menubar.php');
      }

      protected function content_all($content_all, $data) {
            $data['content_all'] = $content_all;
            $this->load->view('user/content-all.php');
      }

      protected function footbar($footbar, $data) {
            $data['footbar'] = $footbar;
            $this->load->view('user/footbar.php', $data);
      }
}
?>