<?php
    class Utils{

    public static function tratarInjection($texto){
        return addslashes(strip_tags($texto));
    }

}
?>