<?php if ($root->getDepth() === 0) : ?>
<ul>
<?php endif ?>
    <?php foreach ($root->getChildren() as $node) : ?>
    <li class="<?= $node->get('active') ? ' selected' : '' ?>">
        <a href="<?= $node->getUrl() ?>"><?= $node->title ?></a>
    </li>
    <?php endforeach ?>
<?php if ($root->getDepth() === 0) : ?>
</ul>
<?php endif ?>
