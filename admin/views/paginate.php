<nav aria-label="...">
    <ul class="pagination justify-content-center p-2">
        <?php if (isset($page) and $page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">قبلی</a>
            </li>
        <?php endif; ?>
        <?php for ($pageNum = 1; $pageNum <= $totalPage; $pageNum++):?>
            <li class="page-item <?= $pageNum == $page ? 'active' : '' ?>">
                <a class="page-link"
                   href="?page=<?= $pageNum ?>"><?= $pageNum ?></a>
            </li>
        <?php endfor; ?>
        <?php  ?>
        <?php if ($page < $totalPage):  ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page+1 ?>">بعدی</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
