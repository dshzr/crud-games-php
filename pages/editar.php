<?php
   include '../classes/Games.php';
    if(isset($_GET['editar'])){
        $idgame = $_GET['editar'];
        $allGames = Games::getGames();
        
        foreach($allGames as $oneGame){
            if($oneGame['id'] == $idgame){
                $game = $oneGame;
            }
        }
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
            shadow-lg;
            
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
       
            <h1 class="text-4xl text-white font-bold my-7">EDITAR GAME</h1>
     <div class="flex w-full justify-end pb-5">
         <a class="link" href="/crud/pages/index.php">VER JOGOS</a>
    </div>
    <form name="editar" method="POST" class="form" action="../classes/Games.php">
            <div class="flex w-full justify-end ">
                <span id="close-popup" class=" text-gray-800 text-3xl font-bold cursor-pointer p-4">X</span>
            </div>
            <input type="hidden" name="id-game" value="<?= $game['id'] ?>"> 
            <label class="label" for="nome">Nome</label>
            <input 
                class="input"
                type="text" 
                name="nome-game" 
                id="nome-game" 
                placeholder="Nome"
                value="<?= $game['nome'] ?>"
            >
            <label class="label" for="descricao">Descrição</label>
            <input 
                class="input"
                type="text" 
                name="descricao-game" 
                id="descricao-game" 
                placeholder="Descrição"
                value="<?= $game['descricao'] ?>"
            >
            <label class="label" for="valor">Valor</label>
            <input 
                class="input"
                type="number"
                min="1" 
                step="any" 
                name="valor-game" 
                id="valor-game" 
                placeholder="Valor"
                value="<?= $game['valor'] ?>"
            >
            <input type="hidden" name="submit" value="editar"> 
            <button type="submit" class="btn">
                EDITAR JOGO
            </button>
        </form>
    </div>

</body>
</html>