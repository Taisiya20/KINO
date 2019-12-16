<?php
    require_once "area_gen.php";

    class form{
        public  $method;
        public  $action;
        public  $inputs = array();

        public function __construct($method, $action)
        {
            $this->method = $method;
            $this->action = $action;
        }

        public function set_input($input){
            array_push($this->inputs, $input);
        }

        public function display(){
            echo "<form method='$this->method' action='$this->action'>";
        }

        public function end(){
            echo "</form>";
        }
    }