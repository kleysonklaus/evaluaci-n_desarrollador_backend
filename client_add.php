<?php
$message = "";
    if (isset($_POST['SubmitButton'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $address1 = $_POST['address1'];
        $city = $_POST['city'];
        $estado = $_POST['estado'];
        $postcode = $_POST['postcode'];
        $country = $_POST['country'];
        $phone = $_POST['phonenumber'];
        $password2 = $_POST['password2'];

        $tipo_documento = $_POST['tipo_documento'];
        $num_documento = $_POST['num_documento'];

        echo $tipo_documento;
        echo $num_documento;


        $ch = curl_init();
        echo $ch;
        curl_setopt($ch, CURLOPT_URL, 'https://empresas.yachay.lat/includes/api.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(
                array(
                    'action' => 'AddClient',
                    // See https://developers.whmcs.com/api/authentication
                    'username' => 'gTxMO3VojXzm6g8vTk6rWt1wjAt5BMdE',
                    'password' => 'dUA5kAV2aJC2xkHDKTrnrNLHECrjxhGG',
                    'accesskey' => 'AccesoTemporal$2022$RCP',
                    
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'custom_fields' => 'RUC',
                    //
                    'address1' => $address1,
                    'city' => $city,
                    'state' => $estado,
                    'postcode' => $postcode,
                    'country' => $country,
                    'phonenumber' => $phone,
                    'password2' => $password2,
                    'customfields' => base64_encode( serialize( array( "1" => $tipo_documento, "2" => $num_documento) ) ),
                    // 'customfields' => $customfield,
                    // 'clientip' => '1.2.3.4',
                    // 'responsetype' => 'json',
                )
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        echo $response;
        curl_close($ch);


        $message = "Se enviaron correctamente";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>api</title>
</head>
<body>
        
<form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" name="first_name" value="" placeholder="Nombres" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Apellidos" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" name="email"  placeholder="E-mail" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="direccion_1" class="form-label">Direccion 1</label>
                    <input type="text" class="form-control" name="address1" placeholder="Dirección 1" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="city" value="Arequipa" placeholder="Ciudad" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="estado" value="Arequipa" placeholder="Provincia" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="postcode" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="postcode" value="20000" placeholder="Código Postal" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="country" class="form-label">Código País</label>
                    <input type="text" class="form-control" name="country" value="PE" placeholder="Código País" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Tel+</label>
                    <input type="text" class="form-control" name="phonenumber" value="123-456-7890" placeholder="Teléfono" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="conrtasena_2" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password2" value="" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                <label for="conrtasena_2" class="form-label">Tipo de Documento</label>
                    <select class="form-select" name="tipo_documento" required>
                        <!-- <option selected>Seleccionar tipo de Documento</option> -->
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="num_documento" class="form-label">Número de Documento</label>
                    <input type="text" class="form-control" name="num_documento" value="" placeholder="Número de documento" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="SubmitButton">Enviar</button>
    </div>
    <?php echo $message; ?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>