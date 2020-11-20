<?php
$data = "";
$data = urlencode("eyJ0aWtldCI6ICIxIiwibm90YUVzdGF0dXMiOiAiQ09OVEFETyIsImNsaWVudGVSRkMiOiAiVENNOTcwNjI1TUIxIiwiY2xpZW50ZU5vbWJyZSI6ICJTQVJBSCBMRUUiLCJjbGllbnRlTm9tYnJlQ29tcGFuaWEiOiAiU0FSQUggTEVFIiwiZW1wcmVzYU5vbWJyZSI6ICJQVUJMSUsiLCJ0aWtldFRvcCI6ICJHUkFDSUFTIFBPUiBTVSBDT01QUkEgIiwibm90YUZlY2hhRWxhYiI6ICIyMDIwLTExLTE5IDE2OjM2OjQ0Iiwibm90YUZvbGlvIjogIjE3MiIsImVtcHJlc2FSRkMiOiAiU0lOIERBVE9TIiwiZW1wcmVzYURpcmVjY2lvbiI6ICJCTFZELiBHT05aQUxFWiBCT0NBTkVHUkEgIzcwNiIsImVtcHJlc2FDaXVkYWQiOiAiTEVPTiIsImVtcHJlc2FFc3RhZG8iOiAiR1VBTkFKVUFUTyIsImVtcHJlc2FUZWxlZm9ubyI6ICIzMzEgNTMgODgiLCJwcm9kdWN0b3MiOiBbeyJkZXNjcmlwY2lvbiI6ICJBQUFISEhISEgiLCJjYW50aWRhZCI6ICIxLjAwMDAwMCIsInN1YlRvdGFsIjogNjAsImFudGVyaW9yRmFtaWxpYSI6IG51bGwsInN1bWFGYW1pbGlhIjogMTIwLCJjYW50aWRhZEZhbWlsaWEiOiAiMS4wMDAwMDAifSwgeyJkZXNjcmlwY2lvbiI6ICJDQUpBIERFIENFUkVBTCIsImNhbnRpZGFkIjogIjEuMDAwMDAwIiwic3ViVG90YWwiOiAxMDV9LCB7ImRlc2NyaXBjaW9uIjogIkZSQVBQRSBERSBWQUlJTExBIiwiY2FudGlkYWQiOiAiMS4wMDAwMDAiLCJzdWJUb3RhbCI6IDEzOS40ODI3NTl9XSwic3ViVG90YWwiOiAxMzkuNDgyNzU5LCJpdmEiOiAiNS41MTcyNCIsInRvdGFsIjogMTQ0Ljk5OTk5OSwibm90YUZybVBhZ29FZmVjdGl2byI6ICIxNDUiLCJhdGVuZGlvIjogIkNhamVybyIsIm5vdGFUcmFuc2FjIjogIjE2MDU4MjUzMTIwMDEwMDAxIiwibm90YVBhZ29CaWxsZXRlIjogIjAiLCJub3RhQ2FtYmlvIjogIjAiLCJwaWV6YXMiOiAzfQ==");
extract($_GET);

if($data) $data = base64_decode(urldecode($data));
$data = json_decode($data, true);

echo "imprimiendo...</br></br>";

$ticket = $data['notaTransac'];

function file_to_str($nombre_ficheero)
{
    $texto = file($nombre_ficheero);
    $size = sizeof($texto);
    $todo="";
    for($n=0;$n<$size;$n++)
    {
        $todo = $todo . $texto[$n];
    }
    return $todo;
}



//file_put_contents("c:/gama/ok.rtf",$texto);

//exec("wordpad.exe /p \"c:/gama/template.rtf\"");

$filename = "../../template$data[tiket].rtf"; 

$texto = file_to_str($filename);
$matriz = explode("sectd", $texto);
$cabecera = $matriz[0]."sectd";
$inicio = strlen($cabecera);
$final = strpos($texto,"}"); 
$largo = $final - $inicio;
$cuerpo = substr($texto,$inicio,$largo);
$despues = $cuerpo;


//Prmer recorrido para los datos generales
foreach(array_keys($data) as $dato)
{
    if($dato != "productos")
    {
        if($dato != "total")
            $texto = str_replace("#*$dato*#",$data[$dato],$texto);
        else
            $texto = str_replace("#*$dato*#",round($data[$dato],2),$texto);
    }
   
}

$indice_ini = strpos($texto,"@@");
$leng_str = strpos($texto,"**") - $indice_ini;
$str_tabla = substr($texto, $indice_ini+6,$leng_str-6); //Cadena que se buscara luego para ser reemplazada
$tabla_replace = substr($texto, $indice_ini,$leng_str+2);




$tabla_prd="";
$index = count($data['productos']);
for($x=0; $x<$index; $x++)
{
    $aux = $str_tabla;
    foreach(array_keys($data['productos'][$x]) as $productos)
    {
        
        if($productos == "subTotal" || $productos == "cantidad")
            $aux = str_replace("[$productos]",round($data['productos'][$x][$productos],2),$aux);
        else  
            $aux = str_replace("[$productos]",$data['productos'][$x][$productos],$aux);
        //$tabla_prd .= $productos."->".$data['productos'][$x][$productos]."|"; 
        
    }
    $tabla_prd.="$aux";
}

$texto = str_replace($tabla_replace,$tabla_prd,$texto);
$texto = str_replace("\par\par","",$texto);

file_put_contents("../../$ticket.rtf",$texto);
//exec("wordpad.exe /p \"c:/gama/$ticket.rtf\"");
//echo $str_tabla;
?>