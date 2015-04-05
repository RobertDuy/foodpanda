<?php
class ControllerDealDaily extends Controller {
    public function index() {
        $this->document->setTitle($this->config->get('config_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));

        $this->data['heading_title'] = $this->config->get('config_title');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/deal/dailydeal.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/deal/dailydeal.tpl';
        } else {
            $this->template = 'default/template/deal/dailydeal.tpl';
        }

        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    public function pagination(){
        $this->load->model('deal/productDN');

        $start = 0;
        if(isset($_POST['start'])){
          $start = $_POST['start'];
        }
        $limit = 30;
        if(isset($_POST['limit'])){
            $limit = $_POST['limit'];
        }
        $data = $this->model_deal_productDN->getDealDN($start, $limit);
        $this->response->setOutput(json_encode($data));
    }
}
?>