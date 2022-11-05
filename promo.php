<?php
if (!isset($_GET['codigo'])) {
    header('Location: home.php?mensaje=error');
    exit();
}

include 'conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT tl.Entrega, tl.Devolucion , tl.id_Cliente, cl.Nombre , cl.Apellido_paterno ,cl.Telefono, cl.Direccion
  FROM Tiempo_Alquiler tl
  INNER JOIN Clientes cl ON cl.id = tl.id_Cliente 
  WHERE tl.id = ?;");
$sentencia->execute([$codigo]);
$Cliente = $sentencia->fetch(PDO::FETCH_OBJ);

    $url = 'https://whapi.io/api/send';
    $data = [
        "app" => [
            "id" => '51970754567',
            "time" => '1654728819',
            "data" => [
                "recipient" => [
                    "id" => '51'.$Cliente->Telefono
                ],
                "message" => [[
                    "time" => '1654728819',
                    "type" => 'image',
                    "value" => "https://cloudfront-us-east-1.images.arcpublishing.com/infobae/NNC7TA7K2NG5HM2REZSAE244XE.jpg"
                ]]
            ]
        ]
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    header('Location: home.php?codigo='.$Cliente->id_Cliente);
?>
