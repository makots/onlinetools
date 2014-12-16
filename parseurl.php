<!DOCTYPE HTML>
<html>
<head>
<title>Parse URL</title>
</head>
<body>
<h1>Parse URL</h1>
<form method="GET" action="<?=$_SERVER['PHP_SELF']?>">
<label>URL</label>
<input type="text" name="url" value="<?=empty($_GET['url'])?'':htmlspecialchars($_GET['url'])?>" size="60"/>
<input type="submit" value="Parse" />
</form>

<?php if (!empty($_GET['url'])): ?>
<?php
    $urlinfo = parse_url($_GET['url']);
    $names = array(
        'scheme',
        'host',
        'port',
        'user',
        'pass',
        'path',
        'query',
        'fragment'
    );
?>
<table>
<?php foreach ($names as $name): ?>
  <?php if (!empty($urlinfo[$name])): ?>
    <tr>
      <th><?=htmlspecialchars($name)?></th>
      <td><?=htmlspecialchars($urlinfo[$name])?></td>
    </tr>
  <?php endif; ?>
<?php endforeach; ?>
</table>

<?php if (!empty($urlinfo['query'])): ?>
<?php parse_str($urlinfo['query'], $query); ?>
<table>
  <?php foreach ($query as $k => $v): ?>
    <tr>
      <th><?=htmlspecialchars($k)?></th>
      <td><?=htmlspecialchars($v)?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>

<?php endif; ?>

</body>
</html>
