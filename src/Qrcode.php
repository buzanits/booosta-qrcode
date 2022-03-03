<?php
namespace booosta\qrcode;

use \booosta\Framework as b;
b::init_module('qrcode');

class QRCode extends \booosta\base\Module
{ 
  use moduletrait_qrcode;

  protected $data;

  public function __construct($data = null)
  {
    parent::__construct();
    $this->data = $data;
  }

  public function after_instanciation()
  {
    parent::after_instanciation();

    if(is_object($this->topobj) && is_a($this->topobj, "\\booosta\\webapp\\Webapp")):
      $this->topobj->moduleinfo['qrcode'] = true;
      if($this->topobj->moduleinfo['jquery']['use'] == '') $this->topobj->moduleinfo['jquery']['use'] = true;
      $this->topobj->add_includes("<script src='{$this->topobj->base_dir}vendor/cunheise/phpqrcode/jquery-qrcode-0.14.0.min.js'></script>");
    endif;
  }

  public function set_data($data) { $this->data = $data; }

  public function save_file($filename)
  {
    return \QRcode::png($this->data, $filename);
  }

  public function show_js($divtag)
  {
    if(is_object($this->topobj)) $this->topobj->add_jquery_ready("$('#$divtag').qrcode({text: \"$this->data\"});");
  }
}
