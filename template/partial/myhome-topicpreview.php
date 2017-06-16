<?php $replynumber = Home::replynumber($value->tid);?>
<tr>
    <td><?= $value->tid ?></td>
    <td><a href="<?= "$baseurl/showtopic.php?tid=$value->tid" ?>" target="_blank"><?= substr($value->title,0,50) ?></a></td>
    <td><?= substr($value->content,0,70) ?></td>
    <td><?= $value->topdate ?></td>
    <td><?= $replynumber->replynumber ?></td>
</tr>