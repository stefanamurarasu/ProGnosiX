
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="">
    <title>RSS feed</title>
</head>
<body>

<?php
    $rss = simplexml_load_file("../../public/rss.xml");

    foreach ($rss->children() as $node) {
        foreach ($node as $child) {
            if ($child->children()) {
                foreach ($child->children() as $leaf) {
                    if ($leaf->getName() === 'title') {
                        echo "<h1>{$leaf}</h1>";
                    } else {
                        echo "<p>{$leaf}</p>";
                    }
                    echo '<br>';
                }
            } else {
                if ($child->getName() === 'title') {
                    echo "<h1>{$child}</h1>";
                } else {
                    echo "<h3>{$child}</h3>";
                }
                echo "<BR>";
            }
        }
    }
?>

</body>
</html>