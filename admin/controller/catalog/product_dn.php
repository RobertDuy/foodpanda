<?php
class ControllerCatalogProductDn extends Controller {
    private $error = array();

    public function index() {
        $this->document->setTitle('Required Products');
        $this->load->model('catalog/product_dn');
        $this->getList();
    }
    public function delete() {
        $this->document->setTitle('Required Products');
        $this->load->model('catalog/product_dn');

        if (isset($this->request->post['selected']) && $this->validateDelete()) {
            $this->model_catalog_product_dn->deleteProductDn($this->request->post['selected']);
        }

        $this->getList();
    }

    protected function getList() {
        // current Page
        $url = '';

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
            $url .= '&page=' . $this->request->get['page'];
        } else {
            $page = 1;
            $url .= '&page=1';
        }

        // BreadCrumbs
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => 'Required Products',
            'href'      => $this->url->link('catalog/product_dn', 'token=' . $this->session->data['token'] . $url, 'SSL'),
            'separator' => ' :: '
        );
        // success
        if (isset($this->session->data['success'])) {
            $this->data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $this->data['success'] = '';
        }
        // error warning
        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        $total = $this->model_catalog_product_dn->getTotal();
        $total = $total['COUNT(*)'] ;

        $pagination = new Pagination();
        $pagination->total = $total;
        $pagination->page = $page;
        $pagination->limit = 50;
        $pagination->url = $this->url->link('catalog/product_dn', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
        $this->data['pagination'] = $pagination->render();

        $this->data['productdns'] = $this->model_catalog_product_dn->getProducts($page, 50);
        $this->template = 'catalog/product_dn_list.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );
        $this->response->setOutput($this->render());
    }

    protected function validateDelete() {
        if (!$this->user->hasPermission('modify', 'catalog/product_dn')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}
?>