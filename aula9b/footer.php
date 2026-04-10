
</div><!-- /.container -->

<footer class="bg-dark text-light mt-5 py-3">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
        <span class="small">&copy; <?= date('Y') ?> Estudos PHP</span>
        <span class="small text-secondary">
            Session ID: <code class="text-light"><?= htmlspecialchars(session_id()) ?></code>
        </span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
