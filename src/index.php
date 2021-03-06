<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require __DIR__.'/../vendor/autoload.php';

$arrayClientes = array(
    0 => array(
        "nome" => "Adriana Barros de Carvalho",
        "documento" => "01215548700",
        "endereco" => "Rua das Roseiras, 334, Jd. Tangará, Marília-SP"
    ),
    1 => array(
        "nome" => "Dario Esteves de Faria",
        "documento" => "42589655000115",
        "endereco" => "Rua Jericó, 390, Betel, Marília-SP",
        "cobranca" => "Rua Ananias Cabral, 244, Centro, São Paulo-SP"
    ),
    2 => array(
        "nome" => "Geraldo Henrique Ignácio",
        "documento" => "48559615000101",
        "endereco" => "Rua Antonieta Altenfelder, 90, Santa Antonieta, Marília-SP",
        "cobranca" => "Avenida Paulista,33,Consolação, São Paulo-SP"
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
        "documento" => "14587455000142",
        "endereco" => "Rua Antonio Spressão, 3390, Parque das Nações, Marília-SP",
        "cobranca" => "Avenida Sampaio Vidal, 2010, Centro, Marília-SP"
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
        "documento" => "22945833000122",
        "endereco" => "Rua Giacomo Zangarinni, 223, Santa Gertrudes, Marília-SP",
        "cobranca" => "Rua Giacomo Zangarinni, 450, Santa Gertrudes II, Marília-SP"
    )
);

if (filter_input(INPUT_POST, 'ajax',FILTER_VALIDATE_BOOLEAN)) {
    $id = filter_input(INPUT_POST, 'linha');
    extract($arrayClientes[$id]);

    $resultado = new Cliente\App\Cliente();
    $resultado->setId($id)->setNome($nome)->setEndereco($endereco)->setDocumento($documento);

    switch ($resultado->tipoPessoa($resultado->getDocumento())) {
        case "Física":
            $tipo = new Cliente\App\ClientePF();

            break;

        case "Jurídica":
            $tipo = new Cliente\App\ClientePJ();
            $tipo->setCobranca($cobranca);
            break;
    }

    echo json_encode(array(
        "ok" => true,
        "nome" => $resultado->getNome(),
        "documento" => $resultado->getDocumento(),
        "endereco" => $resultado->getEndereco(),
        "pontuacao" => $tipo->pontuacaoCliente($resultado->getId()),
        "cobranca" => $tipo->getEnderecoCobranca(),
        )
    );
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>PHP Orientado a Objeto - Ex02</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet"  href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">

<script type="text/javascript">
$(function(){
    $(".table").DataTable({
        searching: false,
        paging: false,
        info:false
    });
    $("button[id^=linha_]").click(function(){
        //$("#myModal").modal();
        var valor = $(this).attr("id");
        var separa = valor.split("_");

        $.ajax({
            url:"index.php",
            type:"POST",
            dataType:"JSON",
            data:{
                ajax:true,
                acao:"modal",
                linha:separa[1]
            }
        })
        .done(function(data){
            if (data.ok) {
                $("#nomeAjax").text(data.nome);
                $("#enderecoAjax").text(data.endereco);
                $("#documentoAjax").text(data.documento);
                $("#pontuacaoAjax").text(data.pontuacao);
                $("#cobrancaAjax").text(data.cobranca);

                $("#myModal").modal();
            }
        });
    });
});
</script>

</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Tipo Pessoa</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($arrayClientes as $key => $value) {
                    $linha = new Cliente\App\Cliente();
                    $linha->setId($key)->setNome($value['nome'])->setDocumento($value["documento"]);

                    
?>
                    <tr>
                        <td><?=$linha->getId()?></td>
                        <td><?=$linha->tipoPessoa($linha->getDocumento())?></td>
                        <td><button type="button" class="btn btn-link" id="linha_<?=$linha->getId()?>"><?=$linha->getNome()?></button></td>
                    </tr>
<?php
                }
?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dados de: <span id="nomeAjax"></span></h4>
                </div>
                <div class="modal-body">
                    Endereço: <span id="enderecoAjax"></span><br />
                    Documento: <span id="documentoAjax"></span><br />
                    Pontuação Empresa: <span id="pontuacaoAjax"></span><br />
                    Endereço de Cobrança: <span id="cobrancaAjax"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>
</body>
</html>