<?php
session_start();
if (isset($_SESSION['username'])) {
    //conexão com banco de dados
    include './app/http/config.php';
    include './app/ajudantes/usuario.php';
    include './app/ajudantes/conversa.php';
    include './app/ajudantes/tempo.php';
    include './app/ajudantes/ultima_conversa.php';

    $usuario = getUser($_SESSION['username'], $con);
    $conversas = getConversa($usuario['id'], $con);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>co.chat</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    </head>

    <body class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-2 w-400 rounded shadow">

            <div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="./uploads/<?= $usuario['avatar'] ?>" class="w-25 rounded-circle">
                    <h3 class="fs-xs m-2"><?= $usuario['nome'] ?></h3>
                </div>
                <a href="./sair.php" class="btn btn-dark">Sair</a>
            </div>

            <div class="input-group mb-3">
                <input type="text" placeholder="Procurar..." id="buscaTexto" class="form-control">
                <button class="btn btn-primary" id="prucuraBtn">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <ul id="chatLista" class="list-group mvh-50 overflow-auto">
                <?php if (!empty($conversas)) {

                    foreach ($conversas as $conversa) {  ?>
                        <li class="list-group-item">
                            <a href="./chat.php?user=<?= $conversa['username'] ?>" class="d-flex justify-content-center align-items-center p-2">
                                <div class="d-flex align-items-center">
                                    <img src="./uploads/<?= $conversa['avatar'] ?>" class="v-10 rounded-circle">
                                    <h3 class="fs-xs m-2"><?= $conversa['nome'] ?>
                                        <small>
                                            <?php
                                            echo ultimaConversa($_SESSION['id'], $conversa['id'], $con);
                                            ?>
                                        </small>
                                    </h3>
                                </div>
                                <?php
                                if (ultimovisto($conversa['visto']) == "Ativo") { ?>
                                    <div class="online">
                                        <div class="online"></div>
                                    </div>
                                <?php }
                                ?>
                            </a>
                        </li>
                    <?php }
                } else { ?>
                    <div class="alert alter-info text-center">
                        <i class="fa fa-comments d-block fs-big"></i>
                        Nenhuma mensagem, iniciar conversa
                    </div>
                <?php } ?>
            </ul>
        </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                $("#buscaTexto").on("input", function() {
                    let buscaTexto = $(this).val();
                    if (buscaTexto == "") return;

                    $.post('app/ajax/busca.php', {
                        corpo: buscaTexto
                    }, function(data, status) {
                        $("#chatLista").html(data)
                    })
                });

                //atualização automática vista pela última vez para usuário logado
                let lastSeenUpdate = function() {
                    $.get("app/ajax/visto_ultimo.php", );
                }
                lastSeenUpdate();
                //a atualização automática é vista a cada 10 segundos
                setInterval(lastSeenUpdate, 100000);
            })
        </script>


    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit;
}
?>