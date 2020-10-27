<?php
function cargarControlador($controlador)
{
    $nombreControlador= ucwords($controlador)."Controler";
    $archivoControlador='controllers/'.ucwords($controlador).'.php';
    if(!is_file($archivoControlador))
    {
        $archivoControlador='controllers/'.CONTROLADOR_PRINCIPAL.'.php';
    }
    //echo $archivoControlador;
    require_once $archivoControlador;
    $control = new $nombreControlador();
    return $control;
}
function cargarAccion($controler,$accion, $id=null)
{
    if(isset($accion)&& method_exists($controler, $accion))
    {
        if(($id==null))
        {
        $controler->$accion();
        }
 else {
     $controler->$accion($id);
             
 }
    }
    
    else {
        $controler->ACCION_PRINCIPAL();
    }
}
?>
