<?php
class Template
{
    protected $_ci;

    public function __construct()
    {
        $this->_ci = &get_instance();
    }

    public function display_page($title = "Codeigniter Ajax Title", $nav = "home", $content, $data = null)
    {
        $data['_title'] = $title;
        $data['_nav_active'] = $nav;
        $data['_nav'] = $this->_ci->load->view('template/nav', $data, true);
        $data['_content'] = $this->_ci->load->view($content, $data, true);
        $this->_ci->load->view('index', $data);
    }
    public function display_content($title = "Codeigniter Ajax Title", $nav = "home", $content, $data = null)
    {
        if (!$this->is_ajax()) {
            $data['_title'] = $title;
            $data['_nav_active'] = $nav;
            $data['_nav'] = $this->_ci->load->view('template/nav', $data, true);
            $data['_content'] = $this->_ci->load->view($content, $data, true);
            $this->_ci->load->view('index', $data);
        } else {
            $this->_ci->load->view($content, $data);
        }
    }

    public function is_ajax()
    {
        return ($this->_ci->input->server('HTTP_X_REQUESTED_WITH') && ($this->_ci->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest'));
    }
}
