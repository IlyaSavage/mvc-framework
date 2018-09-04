<h3>Список статей</h3>
<?php foreach($articles as $val): ?>
    <h3><?=$val['title'];?></h3>
    <p><?=$val['description'];?></p>
    <p><?=$val['author'];?></p>
    <br>
<?php endforeach; ?>