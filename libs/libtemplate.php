<?php
  class Template
  {
    protected $header="header_menu";
    protected $body="main";
    protected $footer="footer";
    protected $templatedir="templates/template";
    protected $varList=array();
    public function add($name, $value)
    {
      $this->varList[$name]=$value;
    }
    public function header($name)
    {
      if (!file_exists($this->templatedir.$name.".php")) die("Can not read Body: ".$name);
      $this->header=$name;
    }
    public function body($name)
    {
      if (!file_exists($this->templatedir.$name.".php")) die("Can not read Body: ".$name);
      $this->body=$name;
    }
    public function footer($name)
    {
      if (!file_exists($this->templatedir.$name.".php")) die("Can not read Body: ".$name);
      $this->footer=$name;
    }
    public function run()
    {
      foreach ($this->varList as $key => $value)
      {
        ${$key}=$value;
      }
      include($this->templatedir.$this->header.".php");
      include($this->templatedir.$this->body.".php");
      include($this->templatedir.$this->footer.".php");
    }
  }
?>
