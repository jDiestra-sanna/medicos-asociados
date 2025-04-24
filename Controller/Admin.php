<?php
    class Admin extends Controllers{
        protected $totalPagar, $tot = 0;
        public function __construct()
        {
            parent::__construct();

        }
        public function Listar()

        {
            $this->views->getView($this, "Listar");
        }
}
