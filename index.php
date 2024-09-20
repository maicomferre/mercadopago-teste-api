<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Roupas</title>
    <style>
        h1,h3{ text-align:center;}
        header{background-color:green;}
        .content{ background-color:blue;}

        .card{
            position:relative;
            float:left;
            border:1px solid #000;
            background-color:#FFF;
            width:300px;
            border-radius:6px;
        }
        img{
            width:300px;
        }
        button{
            position:relative;
            left:70px;
            padding:10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Loja de roupa</h1>
        <h3>Loja de roupa feita em 10 minutos</h3>

    </header>
    <div class="content">
        <div class="card">
            <img src="vestido.jpg" /><br />
            <p> Otimo vestido feito na Suíça do norte, proximo a estação central da modlávia</p>
            <p> R$ 350,00 </p>
            <a href="comprar.php?t=vestido&v=350&foto=vestido.jpg"><button>Adicionar ao carrinho</button></a>
        </div>

    </div> 
</body>
</html>