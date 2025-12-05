$(document).ready(function() {
    
    // Configuração da API
    const API_CONFIG = {
        listar: "https://epansani.com.br/2025/dwe1/ajax/list.php",
        inserir: "https://epansani.com.br/2025/dwe1/ajax/ins.php", 
        excluir: "https://epansani.com.br/2025/dwe1/ajax/rem.php"
    };

    // Estado da aplicação
    const appState = {
        carregando: false,
        ultimaAtualizacao: null
    };

    // Inicialização
    function init() {
        atualizarTabela();
        setupEventListeners();
        atualizarStatus();
    }

    // Configuração de eventos
    function setupEventListeners() {
        $('#formCadastro').on('submit', handleFormSubmit);
        $('#btnAtualizar').on('click', handleAtualizar);
        $('#btnLimpar').on('click', handleLimpar);
        $(document).on('click', '.btn-excluir', handleExcluir);
    }

    // Manipulador do formulário
    async function handleFormSubmit(e) {
        e.preventDefault();
        
        const formData = getFormData();
        
        if (!validarFormulario(formData)) {
            return;
        }

        await executarOperacao('inserir', formData, {
            mensagemSucesso: 'Registro adicionado com sucesso!',
            callback: () => {
                resetarFormulario();
                atualizarTabela();
            }
        });
    }

    // Manipulador de atualização
    function handleAtualizar() {
        atualizarTabela();
        showNotification('🔃 Lista atualizada', 'info');
    }

    // Manipulador de limpar
    function handleLimpar() {
        resetarFormulario();
        showNotification('🧹 Formulário limpo', 'info');
        $('#inputNome').trigger('focus');
    }

    // Manipulador de exclusão
    async function handleExcluir() {
        const $botao = $(this);
        const id = $botao.data('id');
        const nome = $botao.data('nome');

        const confirmacao = await showConfirmationDialog(
            'Excluir Registro',
            `Tem certeza que deseja excluir <strong>"${nome}"</strong>?`,
            'warning'
        );

        if (confirmacao) {
            await executarOperacao('excluir', { id: id }, {
                mensagemSucesso: 'Registro excluído com sucesso!',
                callback: atualizarTabela
            });
        }
    }

    // Obter dados do formulário
    function getFormData() {
        return {
            nome: $('#inputNome').val().trim(),
            email: $('#inputEmail').val().trim()
        };
    }

    // Validar formulário
    function validarFormulario(dados) {
        if (!dados.nome || !dados.email) {
            showNotification('⚠️ Preencha todos os campos!', 'warning');
            return false;
        }

        if (!isValidEmail(dados.email)) {
            showNotification('📧 E-mail inválido!', 'warning');
            return false;
        }

        return true;
    }

    // Resetar formulário
    function resetarFormulario() {
        $('#formCadastro')[0].reset();
    }

    // Executar operações na API
    async function executarOperacao(operacao, dados, opcoes = {}) {
        if (appState.carregando) return;

        try {
            appState.carregando = true;
            toggleLoadingState(true);

            const resultado = await fetchAPI(API_CONFIG[operacao], dados);
            
            if (resultado) {
                opcoes.mensagemSucesso && showNotification(opcoes.mensagemSucesso, 'success');
                opcoes.callback && opcoes.callback();
            } else {
                showNotification('❌ Operação falhou!', 'error');
            }

            return resultado;

        } catch (erro) {
            console.error(`Erro na operação ${operacao}:`, erro);
            showNotification('🌐 Erro de conexão!', 'error');
            return false;
        } finally {
            appState.carregando = false;
            toggleLoadingState(false);
        }
    }

    // Função genérica para chamadas API
    async function fetchAPI(url, dados) {
        const parametros = new URLSearchParams();
        
        Object.keys(dados).forEach(chave => {
            parametros.append(chave, dados[chave]);
        });

        const resposta = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: parametros.toString()
        });

        if (!resposta.ok) {
            throw new Error(`HTTP error! status: ${resposta.status}`);
        }

        const textoResposta = await resposta.text();
        return textoResposta.trim() === "true";
    }

    // Atualizar tabela
    async function atualizarTabela() {
        const $tbody = $('#tabelaDados');
        
        $tbody.html(`
            <tr>
                <td colspan="3" class="text-center py-4">
                    <div class="spinner-border text-primary spinner-border-sm me-2"></div>
                    Carregando registros...
                </td>
            </tr>
        `);

        try {
            const resposta = await fetch(API_CONFIG.listar);
            
            if (!resposta.ok) {
                throw new Error('Falha ao carregar dados');
            }

            const dados = await resposta.json();
            renderizarTabela(dados);
            appState.ultimaAtualizacao = new Date();
            atualizarStatus();

        } catch (erro) {
            console.error('Erro ao carregar tabela:', erro);
            $tbody.html(`
                <tr>
                    <td colspan="3" class="text-center text-danger py-4">
                        <i class="fas fa-wifi-slash me-2"></i>
                        Erro ao carregar dados
                    </td>
                </tr>
            `);
        }
    }

    // Renderizar tabela
    function renderizarTabela(dados) {
        const $tbody = $('#tabelaDados');
        
        if (!dados || dados.length === 0) {
            $tbody.html(`
                <tr>
                    <td colspan="3" class="text-center py-4 text-muted">
                        <i class="fas fa-inbox me-2"></i>
                        Nenhum registro encontrado
                    </td>
                </tr>
            `);
            return;
        }

        const html = dados.map(registro => `
            <tr class="animate__animated animate__fadeIn">
                <td class="ps-4 fw-semibold">
                    <i class="fas fa-user-circle me-2 text-primary"></i>
                    ${escapeHTML(registro.nome)}
                </td>
                <td>
                    <i class="fas fa-envelope me-2 text-secondary"></i>
                    ${escapeHTML(registro.email)}
                </td>
                <td class="text-center">
                    <button class="btn btn-outline-danger btn-sm btn-excluir shadow-sm" 
                            data-id="${registro.id}" 
                            data-nome="${escapeHTML(registro.nome)}"
                            title="Excluir registro">
                        <i class="fas fa-trash-can me-1"></i>
                        Remover
                    </button>
                </td>
            </tr>
        `).join('');

        $tbody.html(html);
    }

    // Controle de estado de loading
    function toggleLoadingState(estado) {
        const $btnGravar = $('#btnGravar');
        
        if (estado) {
            $btnGravar.html('<i class="fas fa-circle-notch fa-spin me-2"></i>Processando...')
                     .prop('disabled', true)
                     .addClass('loading');
            $('input, button').prop('disabled', true);
        } else {
            $btnGravar.html('<i class="fas fa-save me-2"></i>Gravar Registro')
                     .prop('disabled', false)
                     .removeClass('loading');
            $('input, button').prop('disabled', false);
        }
    }

    // Atualizar status
    function atualizarStatus() {
        const status = appState.ultimaAtualizacao 
            ? `Última atualização: ${appState.ultimaAtualizacao.toLocaleTimeString()}`
            : 'Sistema pronto';
        
        // Pode adicionar um elemento de status se quiser
        console.log(status);
    }

    // Sistema de notificações
    function showNotification(mensagem, tipo = 'info') {
        const icon = {
            success: '✅',
            error: '❌',
            warning: '⚠️',
            info: 'ℹ️'
        }[tipo];

        // Usando Toast do SweetAlert2
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: tipo,
            title: mensagem,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#fff',
            color: '#333'
        });
    }

    // Diálogo de confirmação
    async function showConfirmationDialog(titulo, texto, icone = 'warning') {
        const resultado = await Swal.fire({
            title: titulo,
            html: texto,
            icon: icone,
            showCancelButton: true,
            confirmButtonText: 'Sim, confirmar!',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            reverseButtons: true,
            customClass: {
                popup: 'animate__animated animate__zoomIn'
            }
        });

        return resultado.isConfirmed;
    }

    // Validação de e-mail
    function isValidEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Escape HTML
    function escapeHTML(texto) {
        const div = document.createElement('div');
        div.textContent = texto;
        return div.innerHTML;
    }

    // Inicializar aplicação
    init();
});
