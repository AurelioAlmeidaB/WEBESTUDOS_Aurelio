<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificação de Email</title>
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
        }

        .card-totodile {
            background-color: var(--azul-medio);
            border: 3px solid var(--azul-claro);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 6px 24px rgba(0,0,0,0.4);
        }

        h1 {
            color: var(--azul-claro);
            font-weight: 700;
            letter-spacing: 1px;
        }

        hr {
            border-color: var(--azul-claro);
            opacity: 0.4;
        }

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

        .form-control.is-valid  { border-color: #2ecc71 !important; }
        .form-control.is-invalid { border-color: var(--vermelho) !important; }

        .btn-verificar {
            background-color: var(--amarelo);
            border: none;
            color: var(--azul-escuro);
            font-weight: 700;
            border-radius: 8px;
            padding: 0.5rem 1.4rem;
            transition: filter 0.2s;
        }

        .btn-verificar:hover { filter: brightness(1.1); }

        a { color: var(--azul-claro); }
        a:hover { color: var(--amarelo); }

        .badge-dente {
            display: inline-block;
            width: 10px; height: 14px;
            background: white;
            border-radius: 2px 2px 4px 4px;
            margin: 0 2px;
            vertical-align: middle;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center py-5">

<div class="container" style="max-width: 520px;">
    <div class="card-totodile">

        <h1 class="mb-1">💧 Verificação de Email</h1>
        <hr>

        <label class="form-label mt-2">Informe seu melhor e-mail</label>
        <div class="d-flex gap-2">
            <input type="email" id="email" class="form-control" placeholder="email@address.com">
            <button class="btn-verificar" onclick="verificarEmail()">Verificar</button>
        </div>
        <div id="mensagem" class="mt-2 small"></div>

        <div class="mt-4">
            <a href="#">← Voltar ao menu</a>
        </div>

    </div>
</div>

<script>
function verificarEmail() {
    const input = document.getElementById('email');
    const email = input.value.trim();
    const msg   = document.getElementById('mensagem');

    input.classList.remove('is-valid', 'is-invalid');
    msg.textContent = '';

    if (!email) {
        msg.textContent = '⚠️ Por favor, informe um e-mail.';
        msg.style.color = '#f0c040';
        return;
    }

    fetch('email_check.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'email=' + encodeURIComponent(email)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'disponivel') {
            input.classList.add('is-valid');
            msg.textContent = '✅ E-mail disponível e cadastrado com sucesso.';
            msg.style.color = '#2ecc71';
        } else if (data.status === 'existente') {
            input.classList.add('is-invalid');
            msg.textContent = '❌ Este e-mail já está cadastrado.';
            msg.style.color = '#c0392b';
        } else {
            msg.textContent = '⚠️ ' + data.mensagem;
            msg.style.color = '#f0c040';
        }
    })
    .catch(() => {
        msg.textContent = '⚠️ Erro na requisição.';
        msg.style.color = '#f0c040';
    });
}
</script>

</body>
</html>
