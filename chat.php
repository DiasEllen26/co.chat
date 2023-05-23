<?php
session_start();

if (isset($_SESSION['username'])) {
    include 'app/http/config.php';

    include 'app/ajudantes/usuario.php';
    include 'app/ajudantes/chat.php';
    include 'app/ajudantes/aberto.php';

    include 'app/ajudantes/tempo.php';

    if (!isset($_GET['user'])) {
        header("Location: home.php");
        exit;
    }

    $chatCom = getUser($_GET['user'], $con);

    if (empty($chatCom)) {
        header("Location: home.php");
        exit;
    }

    $chats = getChat($_SESSION['id'], $chatCom['id'], $con);

    aberto($chatCom['id'], $con, $chats);
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Co.chat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
        <div class="w-400 shadow p-4 rounded">
            <a href="home.php" class="fs-4 link-dark">&#8592;</a>

            <div class="d-flex align-items-center">
                <img src="uploads/<?= $chatCom['avatar'] ?>" class="w-25 rounded-circle">

                <h3 class="display-4  m-2" style="font-size: 20px;">
                    <?= $chatCom['nome'] ?> <br>
                    <div class="d-flex
               	              align-items-center" title="online">
                        <?php
                        if (ultimovisto($chatCom['visto']) == "Active") {
                        ?>
                            <div class="online"></div>
                            <small class="d-block p-1">Online</small>
                        <?php } else { ?>
                            <small class="d-block p-1">
                                Visto por ultimo:
                                <?= ultimovisto($chatCom['visto']) ?>
                            </small>
                        <?php } ?>
                    </div>
                </h3>
            </div>

            <div class="shadow p-4 rounded
    	               d-flex flex-column
    	               mt-2 chat-box" id="chatBox">
                <?php
                if (!empty($chats)) {
                    foreach ($chats as $chat) {
                        if ($chat['para_id'] == $_SESSION['id']) { ?>
                            <p class="rtext align-self-end
						        border rounded p-2 mb-1">
                                <?= $chat['menssagem'] ?>
                                <small class="d-block">
                                    <?= $chat['criado_em'] ?>
                                </small>
                            </p>
                        <?php } else { ?>
                            <p class="ltext border 
					         rounded p-2 mb-1">
                                <?= $chat['menssagem'] ?>
                                <small class="d-block">
                                    <?= $chat['criado_em'] ?>
                                </small>
                            </p>
                    <?php }
                    }
                } else { ?>
                    <div class="alert alert-info 
    				            text-center">
                        <i class="fa fa-comments d-block fs-big"></i>
                        Nenhuma mensagem, iniciar conversa
                    </div>
                <?php } ?>
            </div>
            <div class="input-group mb-3">
                <textarea cols="3" id="menssagem" class="form-control"></textarea>
                <button class="btn btn-primary" id="sendBtn">
                    <i class="fa fa-paper-plane"></i>
                </button>
            </div>

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            var scrollDown = function() {
                let chatBox = document.getElementById('chatBox');
                chatBox.scrollTop = chatBox.scrollHeight;
            }

            scrollDown();

            $(document).ready(function() {

                $("#sendBtn").on('click', function() {
                    menssagem = $("#menssagem").val();
                    if (menssagem == "") return;

                    $.post("app/ajax/inserir.php", {
                            menssagem: menssagem,
                            de_id: <?= $chatCom['id'] ?>
                        },
                        function(data, status) {
                            $("#menssagem").val("");
                            $("#chatBox").append(data);
                            scrollDown();
                        });

                let lastSeenUpdate = function() {
                    $.get("app/ajax/visto_ultimo.php");
                }
                lastSeenUpdate();
    
                let fechData = function() {
                    $.post("app/ajax/buscarMensagem.php", {
                            id_2: <?= $chatCom['id'] ?>
                        },
                        function(data, status) {
                            $("#chatBox").append(data);
                            if (data != "") scrollDown();
                        });
                }

                fechData();
                val(fechData, 500);

            });
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit;
}
?>