<?php require 'header.php'; ?>

        <div class="bg-light p-4 mb-4 rounded">
            <h1 class="text-center">Formulário para contato</h1>
        </div>

        <form method="POST" action="destino-contato.php">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-10">
                    <label class="form-label">Mensagem</label>
                    <textarea name="mensagem" class="form-control" rows="5" required></textarea>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-10 text-center">
                    <button type="submit" class="btn btn-primary px-4">Enviar</button>
                    <button type="reset" class="btn btn-warning px-4">Limpar</button>
                </div>
            </div>
        </form>

<?php require 'footer.php'; ?>
