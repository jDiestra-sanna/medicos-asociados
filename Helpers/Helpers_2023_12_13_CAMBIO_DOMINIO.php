<?php
function base_url()
{
    // return sprintf(
    //     "%s://%s%s",
    //     isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    //     $_SERVER['SERVER_NAME'],
    //     $_SERVER['REQUEST_URI']
    //   );
    // $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http')."://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/".BASE_ROOT;
	// return $protocol;
    return BASE_URL;
    // $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    // $puerto = $_SERVER['SERVER_PORT'];
    // return $protocol . '://' . $_SERVER['HTTP_HOST'].':'.$puerto.'/sanna-web/';
}
function encabezado($data="")
{
    $VistaH = "Views/Template/header.php";
    require_once($VistaH);
}
function pie($data="")
{
    $VistaP = "Views/Template/footer.php";
    require_once($VistaP);
}
/*function Limpiar($cadena)
{
    $String = trim($String);
    $String = stripslashes($String);
    $String = str_ireplace("<script>", "",$String);
    $String = str_ireplace("<script>", "",$String);
    $String = str_ireplace("<script src>", "",$String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("SELECT * FROM ", "", $String);
    $String = str_ireplace("DELETE FROM", "", $String);
    $String = str_ireplace("INSERT INTO", "", $String);
    $String = str_ireplace("SELECT COUNT(*) FROM", "", $String);
    $String = str_ireplace("DROP TABLE", "", $String);
    $String = str_ireplace("OR '1' = '1", "", $String);
    $String = str_ireplace('OR "1" = "1"', "", $String);
    $String = str_ireplace('OR ´1" = "1"', "", $String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("</script type>", "", $String);
}*/
?>