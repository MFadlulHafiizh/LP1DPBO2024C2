<?php
    $controller = new DprController;
    if($SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])){
        $request = [
            "nama" => $_POST["nama"],
            "bidang" => $_POST["bidang"],
            "partai" => $_POST["partai"]
        ];

        $controller->storeDpr($request, $dprList);
    }
?>