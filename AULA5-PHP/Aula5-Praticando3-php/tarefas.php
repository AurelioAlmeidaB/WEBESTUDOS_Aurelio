<?php
header('Content-Type: application/json');

$arquivo = 'tarefas.txt';

$acao = $_SERVER['REQUEST_METHOD'] === 'GET'
    ? ($_GET['acao']  ?? '')
    : ($_POST['acao'] ?? '');

// ─── LISTAR ───────────────────────────────────────────
if ($acao === 'listar') {
    $tarefas = [];
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $tarefas  = json_decode($conteudo, true);
        if (!is_array($tarefas)) $tarefas = [];
    }
    echo json_encode(['status' => 'ok', 'tarefas' => $tarefas]);
    exit;
}

// ─── CADASTRAR ────────────────────────────────────────
if ($acao === 'cadastrar') {
    $descricao  = htmlspecialchars(strip_tags(trim($_POST['descricao']  ?? '')));
    $prioridade = htmlspecialchars(strip_tags(trim($_POST['prioridade'] ?? '')));

    $validas = ['Alta', 'Média', 'Baixa'];
    if (!$descricao || !in_array($prioridade, $validas)) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos.']);
        exit;
    }

    $tarefas = [];
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $tarefas  = json_decode($conteudo, true);
        if (!is_array($tarefas)) $tarefas = [];
    }

    // Cor da prioridade definida por if no PHP (conforme exigido)
    if ($prioridade === 'Alta') {
        $cor = 'alta';
    } elseif ($prioridade === 'Média') {
        $cor = 'media';
    } else {
        $cor = 'baixa';
    }

    $tarefas[] = [
        'descricao'  => $descricao,
        'prioridade' => $prioridade,
        'cor'        => $cor,
        'data'       => date('d/m/Y H:i')
    ];

    file_put_contents($arquivo, json_encode($tarefas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
    echo json_encode(['status' => 'ok']);
    exit;
}

// ─── APAGAR TODAS ─────────────────────────────────────
if ($acao === 'apagar') {
    file_put_contents($arquivo, json_encode([]), LOCK_EX);
    echo json_encode(['status' => 'ok']);
    exit;
}

echo json_encode(['status' => 'erro', 'mensagem' => 'Ação desconhecida.']);
