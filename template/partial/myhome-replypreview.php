<tr>
    <td><?= $value->rid ?></td>
    <td><?= $value->tid ?></td>
    <td><a href="<?= "$baseurl/showtopic.php?tid=$value->tid" ?>" target="_blank"><?= substr($value->title,0,50) ?></a></td>
    <td><?= substr($value->reply,0,70) ?></td>
    <td><?= $value->repdate ?></td>

</tr>