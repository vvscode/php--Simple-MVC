<div class="footer">
    На обработку страницы ушло <?= sprintf('%f', App::getExecutionTime()) ?> секунд <br />
    Было выполнено <?= App_PDO::getQueryCount() ?> запросов к базе данных
</div>
</body>
</html>