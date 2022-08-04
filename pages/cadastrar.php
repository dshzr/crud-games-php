<?php
    include_once '../classes/Conexao.php';
    session_start();
    if(isset($_GET['erro'])){
        print_r($_GET);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CRUD PHP</title>

    <style type="text/tailwindcss">
        .form{
            @apply 
            w-full
            mx-auto
            p-4
            bg-white
            rounded
            shadow-lg
            mb-4
            ;
            
        }
        .label{
            @apply 
            font-semibold
            text-xl
            text-gray-700;
        }
        .input{
            @apply 
            my-3
            border-2
            border-black/30
            focus:border-none
            outline-none
            w-full
            p-4
            bg-gray-100
            text-lg
            rounded
            shadow-lg
            focus:outline-red-500
            duration-100;
        }
        .btn{
            @apply
                w-full
                text-center
                py-4
                px-2
                hover:bg-red-400
                bg-red-500
                text-white
                font-semibold
                rounded-sm
                duration-100
            ;
        }

        .link{
            @apply 
                px-5
                py-2
                rounded
                font-bold
                hover:bg-red-600
                text-white
                border-2
                border-white
                outline-red-200
                mt-4
                sm:my-0
            ;
        }
    </style>
</head>
<body class="bg-red-500">
    <div class="container p-4 flex items-center justify-start flex-col h-screen mx-auto w-full  lg:w-2/4">
       
            <h1 class="text-4xl text-white font-bold my-7">CADASTRO</h1>
     <div class="flex w-full justify-end pb-5">
         <a class="link" href="/crud/pages/index.php">VER JOGOS</a>
    </div>
        <form  name="cadastrar" id="cadstrar" method="POST" class="form" action="/crud/classes/Games.php">
            <?php 
                if(!empty($_SESSION['erros'])){
                    foreach($_SESSION['erros'] as $erro){
                        echo '
                            <div class="w-full p-2 bg-red-500 text-white my-2 border-4 border-red-200">
                                <h1> '. $erro .' </h1>
                            </div>
                        ';
                    }
                }
            
            ?>


            <label class="label" for="nome">Nome</label>
            <input required minlength="3"
            class="input"
            type="text" 
            name="nome" 
            id="nome" 
            placeholder="Nome"
            >
            <label class="label" for="descricao">Descrição</label>
            <input required minlength="4"
            class="input"
            type="text" 
            name="descricao" 
            id="descricao" 
            placeholder="Descrição"
            >
            <label class="label" for="valor">Valor</label>
            <input required required 
            class="input"
            type="number" 
            name="valor" 
            id="valor" 
            placeholder="Valor"
            >
            <input required type="hidden" name="submit" value="cadastrar"> 
            <button
            class="btn"
            >CADASTRAR JOGO</button>
        </form>
    </div>

</body>
</html>