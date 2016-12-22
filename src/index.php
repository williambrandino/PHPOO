<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require __DIR__ . '/../vendor/autoload.php';
require 'Cliente.php';
$arrayClientes = array(
    0 => array(
        "nome" => "Adriana Barros de Carvalho",
        "documento" => "01215548700",
        "endereco" => "Rua das Roseiras, 334, Jd. Tangará, Marília-SP"
    ),
    1 => array(
        "nome" => "Dario Esteves de Faria",
        "documento" => "42589655601",
        "endereco" => "Rua Jericó, 390, Betel, Marília-SP"
    ),
    2 => array(
        "nome" => "Geraldo Henrique Ignácio",
        "documento" => "48559615230",
        "endereco" => "Rua Antonieta Altenfelder, 90, Santa Antonieta, Marília-SP"
    ),
    3 => array(
        "nome" => "João Kléber de Lima",
        "documento" => "57468535210",
        "endereco" => "Avenida Santo Antônio, 101, Centro, Marília-SP"
    ),
    4 => array(
        "nome" => "Maria Nazaré de Oliveira",
        "documento" => "46813579282",
        "endereco" => "Avenida Sampaio Vidal, 990, São Geraldo, Marília-SP"
    ),
    5 => array(
        "nome" => "Paulo Quincas da Rocha",
        "documento" => "14587455685",
        "endereco" => "Rua Antonio Spressão, 3390, Parque das Nações, Marília-SP"
    ),
    6 => array(
        "nome" => "Samara Tobias Urbano",
        "documento" => "51564855201",
        "endereco" => "Rua Cel. Galdino, 330, Centro, Marília-SP"
    ),
    7 => array(
        "nome" => "Vania Ximenes",
        "documento" => "28344920340",
        "endereco" => "Rua 3, 229, Vila Rica, Marília-SP"
    ),
    8 => array(
        "nome" => "William Aparecido Brandino",
        "documento" => "15102015655",
        "endereco" => "Avenida João Martins Coelho, 2194, Santa Antonieta, Marília-SP"
    ),
    9 => array(
        "nome" => "Zuleika Antunes",
        "documento" => "22945833022",
        "endereco" => "Rua Giacomo Zangarinni, 223, Santa Gertrudes, Marília-SP"
    )
);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PHP Orientado a Objeto - Ex01</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
<?php
foreach ($arrayClientes as $key => $value) {
    $linha = new Cliente($value['nome'],$value['documento'],$value['endereco']);

?>
            <tr>
                <td><?=$linha->getNome()?></td>
            </tr>
<?php
}
?>
        </tbody>
    </table>
    </div>
</body>
</html>