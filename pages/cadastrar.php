<?php
    include_once '../classes/Conexao.php';
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
    </style>
</head>
<body class="bg-red-500">
    <div class="container p-4 flex items-center justify-start flex-col h-screen mx-auto">
        <h1 class="text-4xl text-white font-bold my-7">CADASTRO</h1>
        <form method="POST" class="form" name="form" action="/crud/classes/criarGame.php">
            <label class="label" for="nome">Nome</label>
            <input 
            class="input"
            type="text" 
            name="nome" 
            id="nome" 
            placeholder="Nome"
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
            >CADASTRAR JOGO</button>
        </form>
    </div>

</body>
</html>