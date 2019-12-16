<?php
/**
 * Created by PhpStorm.
 * User: denco
 * Date: 21.12.2018
 * Time: 19:56
 */
//header('location:index.php');
//    function down($arr,$ind){//$arr-элемент массива, $ind -key
//
//        if ($arr != NULL) {
//
//            echo "$ind=$arr ";
//        }
//    }
//    function up($arr,$ind){
//        if ($arr) {
//            echo "$ind";
//        }
//    }
class area_gen
{
    //public $field = 0;
    public $attr = array(

        'required' => false,//false
        'multiple' => NULL,
        'disabled' => NULL,

        'type' => 'text',

        'onclick'=>NULL,
        'size' => NULL,
        'option_count' => NULL,
    );

    public function __construct($a = false,$type='text')
    {
        if ($a != false) $a = true;

        $this->attr['required'] = $a;
        $this->attr['type']=$type;
    }

    public function set_p($attr, $weight)
    {
        $this->attr[$attr] = $weight;
    }

    public function default()
    {
        $this->attr['required'] = 0;
        $this->attr['multiple'] = NULL;
        $this->attr['disabled'] = NULL;


        $this->attr['type'] = 'text';

        $this->attr['onclick']=NULL;
        $this->attr['size'] = NULL;
        $this->attr['option_count'] = NULL;

    }
    public function onclick(){
        $this->attr['onclick']=true;
    }

    public function get_p($attrib)
    {
        return $this->attr[$attrib];
    }

    public function make_input_echo($name, $placeholder = NULL, $pattern = NULL, $value = NULL)
    {

        $attr = $this->attr;

        echo '<input ';
        echo 'name=' . $name . ' ';
        if ($attr['required'] != 0) echo "required ";

        //if ($attr['name'] != NULL) echo "name='" . $attr['name'] . "' ";
        //else

        if ($value != NULL) echo 'value="' . $value . '" ';

        if ($placeholder != NULL) echo 'placeholder="' . $placeholder . '" ';

        if ($pattern != NULL) echo 'pattern="' . $pattern . '" ';

        if ($attr['type'] != NULL) echo "type='" . $attr['type'] . "' ";
        else echo 'type="text" ';

        if ($attr['size'] != NULL) echo "size='" . $attr['size'] . "' ";
        echo '>';
        return 0;
    }

    public function make_hidden($name,$value){
        echo "<input type='hidden' name='$name' value='$value'>";
    }
    public function make_submit($name,$value){
        echo "<input class='__r right __s html_architect' type='submit' name='$name' value='$value'>";
    }
    public function make_select_echo($opt, $name, $selected=NULL,$key=false) {

        $attr = $this->attr;
        //$a=array_keys($opt);
        //var_dump($opt);
        echo '<select ';
        echo "name='$name' ";
        if ($attr['multiple'] != NULL) echo "multiple ";

        if ($attr['placeholder'] != NULL) echo 'placeholder="' . $attr['placeholder'] . '"';

        if ($attr['size'] != NULL) echo 'size="' . $attr['size'] . '"';

        if ($attr['onclick']) echo 'onchange="void this.form.submit(); ';
        echo ' >';

        if ($selected != NULL) echo '<option selected disabled>'. $selected. '</option> ';
//        for ($i = -1; $i < $a; $i++) {
//
//            echo '<option value="'.$i.'">' . $opt[$i] . '</option>';
//        }
        if ($key){
        foreach ($opt as $i=>$var){
            echo '<option value="'.$i.'">' . $var . '</option>';
        }
        }
        else{
            foreach ($opt as $i=>$var){
                echo '<option value="'.$var.'">' . $var . '</option>';
            }
        }

        echo '</select>';
    }
}
//    class area_generator{
//        public $attr = array(
//
//            'required' => false,//false
//            'multiple' => NULL,
//            'disabled' => NULL,
//
//            'type' => NULL,
//
//            'onclick'=>NULL,
//            'size' => NULL,
//            'option_count' => NULL,
//        );
//    public function make_echo ($name, $placeholder = NULL, $pattern = NULL, $value = NULL){
//
//        $attr = $this->attr;
//
//        echo '<input ';
//        echo 'name=' . $name . ' ';
//        if ($attr['required'] != 0) echo "required ";
//
//        //if ($attr['name'] != NULL) echo "name='" . $attr['name'] . "' ";
//        //else
//
//        if ($value != NULL) echo 'value="' . $value . '" ';
//
//        if ($placeholder != NULL) echo 'placeholder="' . $placeholder . '" ';
//
//        if ($pattern != NULL) echo 'pattern="' . $pattern . '" ';
//
//        if ($attr['type'] != NULL) echo "type='" . $attr['type'] . "' ";
//        else echo 'type="text" ';
//
//        if ($attr['size'] != NULL) echo "size='" . $attr['size'] . "' ";
//        echo '>';
//        return 0;
//        }
//    }
//    class hidden extends area_generator {
//
//    }