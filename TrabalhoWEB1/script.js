$(document).ready(function() {
    
    // --- URLs da API (Conforme o PDF) ---
    const API_LISTAR = "https://epansani.com.br/2025/dwe1/ajax/list.php"; // [cite: 27]
    const API_INSERIR = "https://epansani.com.br/2025/dwe1/ajax/ins.php"; // [cite: 30]
    const API_EXCLUIR = "https://epansani.com.br/2025/dwe1/ajax/rem.php"; // [cite: 34]

    // 1. Carrega a lista ao abrir a página
    listarDados();

    // 2. Botão Atualizar
    $("#btnAtualizar").click(function() {
        listarDados();
    });

    // 3. Botão Limpar
    $("#btnLimpar").click(function() {
        $("#formUsuario")[0].reset();
        $("#campoNome").focus();
    });

    // ---------------------------------------------------------
    // 4. GRAVAR (Adicionar)
    // ---------------------------------------------------------
    $("#formUsuario").submit(function(e) {
        e.preventDefault(); // Não recarregar a página

        let nome = $("#campoNome").val().trim();
        let email = $("#campoEmail").val().trim();

        if (nome === "" || email === "") {
            Swal.fire('Atenção', 'Preencha nome e e-mail!', 'warning');
            return;
        }

        // Monta o JSON conforme pedido no PDF
        let dadosJSON = JSON.stringify({
            nome: nome,
            email: email
        });

        // Feedback visual no botão
        let btn = $(this).find('button[type="submit"]');
        let txtOriginal = btn.html();
        btn.html('<i class="fa-solid fa-spinner fa-spin"></i> Salvando...').prop('disabled', true);

        $.ajax({
            url: API_INSERIR,
            type: 'POST',
            contentType: 'application/json', // Obrigatório formato JSON [cite: 20]
            data: dadosJSON,
            success: function(retorno) {
                // O servidor retorna true ou false [cite: 32]
                if(retorno === true || retorno === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'O e-mail foi adicionado corretamente!', // Mensagem solicitada
                        timer: 3000
                    });
                    $("#formUsuario")[0].reset();
                    listarDados();
                } else {
                    Swal.fire('Erro', 'O servidor não aceitou a gravação.', 'error');
                }
            },
            error: function(xhr) {
                console.error(xhr);
                Swal.fire('Erro na Conexão', 'Verifique se o Live Server está rodando ou se há bloqueio CORS.', 'error');
            },
            complete: function() {
                btn.html(txtOriginal).prop('disabled', false);
            }
        });
    });

    // ---------------------------------------------------------
    // 5. APAGAR (Excluir)
    // ---------------------------------------------------------
    // Usamos 'on' para funcionar em botões criados dinamicamente
    $(document).on('click', '.btn-excluir', function() {
        let idUsuario = $(this).data('id');

        Swal.fire({
            title: 'Tem certeza?',
            text: "Deseja realmente excluir este registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, apagar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                let dadosJSON = JSON.stringify({ id: idUsuario }); // [cite: 35]

                $.ajax({
                    url: API_EXCLUIR,
                    type: 'POST',
                    contentType: 'application/json',
                    data: dadosJSON,
                    success: function(retorno) {
                        // O servidor retorna true ou false [cite: 36]
                        if(retorno === true || retorno === "true") {
                            Swal.fire(
                                'Excluído!',
                                'O e-mail foi excluído corretamente!', // Mensagem solicitada
                                'success'
                            );
                            listarDados();
                        } else {
                            Swal.fire('Erro', 'O registro não foi excluído.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Erro', 'Falha ao comunicar com o servidor.', 'error');
                    }
                });
            }
        });
    });

    // ---------------------------------------------------------
    // 6. LISTAR (Exibir Tabela)
    // ---------------------------------------------------------
    function listarDados() {
        let tbody = $("#tabelaCorpo");
        tbody.html('<tr><td colspan="3" class="text-center text-muted py-3">Carregando dados...</td></tr>');

        $.ajax({
            url: API_LISTAR,
            type: 'GET',
            dataType: 'json', // [cite: 28]
            success: function(dados) {
                tbody.empty();

                if (!dados || dados.length === 0) {
                    tbody.html('<tr><td colspan="3" class="text-center py-3">Nenhum registro encontrado.</td></tr>');
                    return;
                }

                // Percorre os dados recebidos
                $.each(dados, function(index, user) {
                    // Proteção caso o email venha escrito diferente no JSON
                    let emailShow = user.email || user.Email || '---';

                    let linha = `
                        <tr>
                            <td class="ps-4 fw-bold text-dark">${user.nome}</td>
                            <td>${emailShow}</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm btn-excluir" data-id="${user.id}">
                                    <i class="fa-solid fa-trash me-1"></i> Apagar
                                </button>
                            </td>
                        </tr>
                    `;
                    tbody.append(linha);
                });
            },
            error: function() {
                tbody.html('<tr><td colspan="3" class="text-center text-danger">Falha ao carregar lista (Verifique o CORS).</td></tr>');
            }
        });
    }
});