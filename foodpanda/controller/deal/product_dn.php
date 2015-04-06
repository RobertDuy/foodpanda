<?php
class ControllerDealProductDn extends Controller {
    public function index() {
        $url = '';
        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
            $url .= '&page=' . $this->request->get['page'];
        } else {
            $page = 1;
            $url .= '&page=1';
        }
        if (isset($this->session->data['success'])) {
            $this->data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $this->data['success'] = '';
        }

        $this->load->model('deal/product_dn');
        $total = $this->model_deal_product_dn->getTotal();

        $pagination = new Pagination();
        $pagination->total = $total;
        $pagination->page = $page;
        $pagination->limit = 50;
        $pagination->url = $this->url->link('deal/product_dn');
        $this->data['pagination'] = $pagination->render();
        $this->data['productdns'] = $this->model_deal_product_dn->getProducts($page, 50);
        $this->template = 'default/template/deal/product_dn_list.tpl';

        $this->response->setOutput($this->render());
    }

    public function insertOrUpdate(){
        $this->load->model('deal/product_dn');
        $this->model_deal_product_dn->insertOrUpdate($this->request->post);
        $this->response->setOutput(json_encode("success"));
    }

    public function getOrderedLink(){
        $this->load->model('deal/product_dn');
        $data = $this->model_deal_product_dn->getOrderedLink($this->request->get);
        $this->response->setOutput(json_encode($data));
    }
}
?>