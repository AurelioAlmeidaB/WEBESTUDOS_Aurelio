<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --azul-escuro: #1a3a5c;
            --azul-medio:  #1e6fa8;
            --azul-claro:  #5bb8f5;
            --vermelho:    #c0392b;
            --amarelo:     #f0c040;
            --creme:       #f5f0e8;
        }

        body {
            background-color: var(--azul-escuro);
            color: var(--creme);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .card-totodile {
            background-color: var(--azul-medio);
            border: 3px solid var(--azul-claro);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 6px 24px rgba(0,0,0,0.4);
            margin-bottom: 1.5rem;
        }

        h1 {
            color: var(--azul-claro);
            font-weight: 700;
            letter-spacing: 1px;
        }

        h2 {
            color: var(--amarelo);
            font-size: 1.3rem;
            font-weight: 600;
        }

        hr { border-color: var(--azul-claro); opacity: 0.4; }

        .form-label { color: var(--azul-claro); font-weight: 600; }

        .form-control {
            background-color: var(--azul-escuro);
            border: 2px solid var(--azul-claro);
            color: var(--creme);
            border-radius: 8px;
        }

        .form-control::placeholder { color: #aac8e0; }
        .form-control:focus {
            background-color: var(--azul-escuro);
            color: var(--creme);
            border-color: var(--amarelo);
            box-shadow: 0 0 0 0.2rem rgba(240,192,64,0.3);
        }

        .form-check-label { color: var(--creme); }

        .form-check-input:checked {
            background-color: var(--amarelo);
            border-color: var(--amarelo);
        }

        .btn-cadastrar {
            background-color: var(--amarelo);
            border: none;
            color: var(--azul-escuro);
            font-weight: 700;
            border-radius: 8px;
            padding: 0.5rem 1.6rem;
            transition: filter 0.2s;
        }

        .btn-cadastrar:hover { filter: brightness(1.1); }

        .btn-apagar {
            background-color: var(--vermelho);
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 8px;
            padding: 0.5rem 1.4rem;
            transition: filter 0.2s;
        }

        .btn-apagar:hover { filter: brightness(1.15); }

        /* Tabela */
        .tabela-tarefas {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 6px;
        }

        .tabela-tarefas thead tr th {
            color: var(--azul-claro);
            font-weight: 700;
            padding: 0.5rem 1rem;
            border-bottom: 2px solid var(--azul-claro);
        }

        .tabela-tarefas tbody tr {
            background-color: var(--azul-escuro);
            border-radius: 8px;
        }

        .tabela-tarefas tbody tr td {
            padding: 0.6rem 1rem;
            color: var(--creme);
        }

        .tabela-tarefas tbody tr td:first-child {
            border-radius: 8px 0 0 8px;
        }

        .tabela-tarefas tbody tr td:last-child {
            border-radius: 0 8px 8px 0;
        }

        .badge-alta   { background-color: #c0392b; color: white; padding: 3px 10px; border-radius: 20px; font-weight: 700; font-size: 0.8rem; }
        .badge-media  { background-color: #f0c040; color: #1a3a5c; padding: 3px 10px; border-radius: 20px; font-weight: 700; font-size: 0.8rem; }
        .badge-baixa  { background-color: #27ae60; color: white; padding: 3px 10px; border-radius: 20px; font-weight: 700; font-size: 0.8rem; }

        a { color: var(--azul-claro); }
        a:hover { color: var(--amarelo); }
    </style>
</head>
<body>

<div class="container" style="max-width: 760px;">

    <!-- Formulário -->
    <div class="card-totodile">
        <h1>💧 Lista de Tarefas</h1>
        <hr>

        <div class="row g-3 align-items-start mt-1">
            <div class="col-md-7">
                <label class="form-label">Descrição da tarefa</label>
                <input type="text" id="descricao" class="form-control" placeholder="Ex: Estudar Ajax...">
            </div>
            <div class="col-md-4">
                <label class="form-label">Prioridade</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="prioridade" value="Alta" checked>
                    <label class="form-check-label">Alta</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="prioridade" value="Média">
                    <label class="form-check-label">Média</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="prioridade" value="Baixa">
                    <label class="form-check-label">Baixa</label>
                </div>
            </div>
        </div>

        <div class="mt-3 d-flex align-items-center gap-3">
            <button class="btn-cadastrar" onclick="cadastrarTarefa()">Cadastrar</button>
            <div id="msgCadastro" class="small"></div>
        </div>
    </div>

    <!-- Lista -->
    <div class="card-totodile">
        <h2>📋 Tarefas cadastradas</h2>
        <div id="tabelaTarefas" class="mt-3"></div>
        <div class="mt-3">
            <button class="btn-apagar" onclick="apagarTodas()">🗑 Apagar todas</button>
        </div>
    </div>

    <a href="#">← Voltar ao menu</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', carregarTarefas);

function cadastrarTarefa() {
    const descricao  = document.getElementById('descricao').value.trim();
    const prioridade = document.querySelector('input[name="prioridade"]:checked').value;
    const msg        = document.getElementById('msgCadastro');

    if (!descricao) {
        msg.textContent = '⚠️ Informe a descrição.';
        msg.style.color = '#f0c040';
        return;
    }

    fetch('tarefas.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'acao=cadastrar&descricao=' + encodeURIComponent(descricao)
             + '&prioridade=' + encodeURIComponent(prioridade)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'ok') {
            document.getElementById('descricao').value = '';
            msg.textContent = '✅ Tarefa cadastrada!';
            msg.style.color = '#2ecc71';
            carregarTarefas();
        } else {
            msg.textContent = '❌ ' + data.mensagem;
            msg.style.color = '#c0392b';
        }
    })
    .catch(() => {
        msg.textContent = '⚠️ Erro na requisição.';
        msg.style.color = '#f0c040';
    });
}

function carregarTarefas() {
    fetch('tarefas.php?acao=listar')
    .then(res => res.json())
    .then(data => {
        const div = document.getElementById('tabelaTarefas');

        if (!data.tarefas || data.tarefas.length === 0) {
            div.innerHTML = '<p style="color:#aac8e0;">Nenhuma tarefa cadastrada.</p>';
            return;
        }

        let html = `<table class="tabela-tarefas">
            <thead><tr><th>Descrição</th><th>Prioridade</th><th>Data</th></tr></thead>
            <tbody>`;

        data.tarefas.forEach(t => {
            let badgeClass = '';
            if (t.prioridade === 'Alta')        badgeClass = 'badge-alta';
            else if (t.prioridade === 'Média')  badgeClass = 'badge-media';
            else                                 badgeClass = 'badge-baixa';

            html += `<tr>
                <td>${escapeHtml(t.descricao)}</td>
                <td><span class="${badgeClass}">${escapeHtml(t.prioridade)}</span></td>
                <td>${escapeHtml(t.data)}</td>
            </tr>`;
        });

        html += '</tbody></table>';
        div.innerHTML = html;
    });
}

function apagarTodas() {
    if (!confirm('Tem certeza? Todas as tarefas serão apagadas.')) return;

    fetch('tarefas.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'acao=apagar'
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'ok') {
            carregarTarefas();
            const msg = document.getElementById('msgCadastro');
            msg.textContent = '🗑 Todas as tarefas foram apagadas.';
            msg.style.color = '#5bb8f5';
        }
    });
}

function escapeHtml(texto) {
    const div = document.createElement('div');
    div.appendChild(document.createTextNode(texto));
    return div.innerHTML;
}
</script>

</body>
</html>
