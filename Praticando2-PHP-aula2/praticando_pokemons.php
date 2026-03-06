<?php
// Array contendo os dados dos Pokémons solicitados
$pokemons = [
    'Totodile' => [
        'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/158.png',
        'info' => [
            'Totodile é um Pokémon inicial do tipo Água introduzido na região de Johto (Segunda Geração). Ele se assemelha a um pequeno crocodilo bípede.',
            'Apesar de seu tamanho pequeno, Totodile tem mandíbulas extremamente fortes. Ele tem o hábito de morder qualquer coisa que se mova à sua frente, o que às vezes causa problemas até mesmo para seu treinador.'
        ]
    ],
    'Froakie' => [
        'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/656.png',
        'info' => [
            'Froakie é um Pokémon inicial do tipo Água da região de Kalos (Sexta Geração). Ele tem a aparência de um sapinho e produz bolhas flexíveis em seu pescoço e costas, chamadas de "Frubbles".',
            'Essas bolhas servem para reduzir o dano de ataques adversários. Ele é um Pokémon leve e ágil, capaz de pular alto e se mover rapidamente para confundir seus oponentes durante as batalhas.'
        ]
    ],
    'Mudkip' => [
        'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/258.png',
        'info' => [
            'Mudkip é o Pokémon inicial do tipo Água da região de Hoenn (Terceira Geração). É conhecido como o Pokémon "Peixe-Lama" e possui uma barbatana em sua cabeça que atua como um radar altamente sensível.',
            'Essa barbatana permite que ele sinta movimentos na água e no ar. Na água, Mudkip usa suas brânquias para respirar, e ele tem força suficiente para esmagar rochas maiores do que ele mesmo.'
        ]
    ],
    'Piplup' => [
        'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/393.png',
        'info' => [
            'Piplup é o adorável Pokémon inicial do tipo Água da região de Sinnoh (Quarta Geração). Ele é baseado em um pinguim e tem um forte senso de orgulho, o que muitas vezes o impede de aceitar comida das pessoas.',
            'Por ser muito orgulhoso, é um Pokémon que pode ser difícil de treinar no início. Além disso, a penugem espessa em seu corpo o protege perfeitamente do frio, permitindo que ele mergulhe em águas congelantes.'
        ]
    ]
];

// Verifica qual Pokémon foi clicado (se houver) via método GET
$pokemonSelecionado = isset($_GET['pokemon']) ? $_GET['pokemon'] : null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Praticando Pokémons</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        
        /* Uso do Flexbox para alinhar lado a lado */
        .galeria {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card-pokemon {
            cursor: pointer;
            text-align: center;
        }
        
        .card-pokemon img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            border: 3px solid transparent; 
            border-radius: 8px;
            background-color: #f0f0f0;
            transition: 0.2s;
        }
        
        .card-pokemon img:hover {
            transform: scale(1.05);
        }

        /* Borda de destaque para a imagem clicada */
        .selecionado img {
            border-color: red;
        }

        .info-box {
            background-color: #eaf6ff;
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #007bff;
        }

        .btn-limpar {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2>Praticando Pokémons de Água</h2>

    <div class="galeria">
        <?php foreach ($pokemons as $nome => $dados): ?>
            <a href="?pokemon=<?= urlencode($nome) ?>" class="card-pokemon <?= ($pokemonSelecionado === $nome) ? 'selecionado' : '' ?>">
                <img src="<?= $dados['img'] ?>" alt="Imagem do <?= $nome ?>">
            </a>
        <?php endforeach; ?>
    </div>

    <?php if ($pokemonSelecionado && array_key_exists($pokemonSelecionado, $pokemons)): ?>
        <div class="info-box">
            <h3>Você clicou no <?= htmlspecialchars($pokemonSelecionado) ?>.</h3>
            
            <p><?= $pokemons[$pokemonSelecionado]['info'][0] ?></p>
            <p><?= $pokemons[$pokemonSelecionado]['info'][1] ?></p>
            
            <a href="praticando_pokemons.php" class="btn-limpar">Limpar tudo</a>
        </div>
    <?php endif; ?>

</body>
</html>