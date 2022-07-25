<?php
    include_once '../classes/Games.php';
    include_once '../classes/getGames.php';

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CRUD PHP</title>

    <style type="text/tailwindcss">
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
            text-black
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

        .hide{
            display: none;
        }
        .game-card{
            @apply 
            duration-300
            p-4
            bg-white
            w-full
            shadow-lg
            rounded
            text-gray-800
            mt-5
            ;
        }

        .btn-action{
            @apply
            w-full
            sm:w-min
            px-5 py-2
            text-center
            font-bold
            rounded
            cursor-pointer
            shadow-lg
            text-white
            ;
        }
    </style>
</head>
<body class="bg-red-500 ">
    <div class="container mx-auto text-white flex flex-col items-center px-4">
        <div class="flex justify-between flex-wrap items-center w-full mt-5">
            <h1 class="text-4xl font-bold ">LISTA DE GAMES</h1>
            <a class="link" href="./cadastrar.php">CADASTRAR</a>
        </div>

        
            <?php
                foreach($allGames as $game){
                    echo "
                            <div 
                                id='$game[id]'
                                class='
                                game-card 
                            '>
                        <div class='flex justify-between h-8 mb-5 items-center'>
                            <h3 class='text-lg  font-semibold '>
                                $game[nome]
                            </h3>
                            <span class='font-bold text-green-600'>R$ $game[valor]</span>
                        </div>
                        <p>
                        $game[descricao]
                        </p>
                        <div class='flex w-full justify-start flex-wrap sm:justify-end gap-3 sm:my-0 my-4'>
                            <button name='btn-detalhes' type='submit' class='btn-detalhes btn-action bg-blue-500 hover:bg-blue-400 '>VER DETALHES</button>
                            <button name='btn-deletar' type='submit' class='btn-deletar btn-action bg-red-500 hover:bg-red-400 '>DELETAR</button>
                        </div>
                    </div>
                    ";
                }
            ?>
     
<!-- POPUP EDITAR GAME -->


                <div id="popup-editar" class="hidefixed z-100 w-screen h-screen bg-black/50 m-auto p-10 ">
                    <form method="POST" class="form" name="form" action="/crud/classes/editarGame.php">
                        <div class="flex w-full justify-end ">
                            <span id="close-popup" class=" text-gray-800 text-3xl font-bold cursor-pointer p-4">X</span>
                        </div>
                        <label class="label" for="nome">Nome</label>
                        <input 
                            class="input"
                            type="text" 
                            name="nome" 
                            id="nome" 
                            placeholder="Nome"
                            value="a"
                        >
                        <label class="label" for="descricao">Descrição</label>
                        <input 
                            class="input"
                            type="text" 
                            name="descricao" 
                            id="descricao" 
                            placeholder="Descrição"
                        >
                        <label class="label" for="valor">Valor</label>
                        <input 
                            class="input"
                            type="number" 
                            name="valor" 
                            id="valor" 
                            placeholder="Valor"
                        >
                        <button
                        class="btn"
                        >EDITAR JOGO</button>
                    </form>
                </div>
          
 
<!-- POPUP EDITAR GAME -->
        
    </div>
       
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../js/index.js"></script>
</body>
</html>