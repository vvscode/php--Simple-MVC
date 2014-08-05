</div>
<footer class="bs-docs-footer" role="contentinfo">
    <div class="container">
<p>На обработку страницы ушло <?= sprintf('%f', App::getExecutionTime()) ?> секунд <br />
    Было выполнено <?= App_PDO::getQueryCount() ?> запросов к базе данных</p>
</div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.js"></script>
<script src="js/main.js"></script>
</body>
</html>