    <footer class="bg-dark text-light mt-5 py-3 rounded">
        <div class="d-flex flex-wrap justify-content-between align-items-center px-3 gap-2">
            <span class="small">&copy; <?= date('Y') ?> Estudos PHP</span>
            <span class="small text-secondary">
                Session ID: <code class="text-light"><?= htmlspecialchars(session_id()) ?></code>
            </span>
        </div>
    </footer>
</div><!-- /.container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
