<?php
// načtení a dekódování profilu
$json = file_get_contents(__DIR__ . '/profile.json');
$profile = json_decode($json, true);

// bezpečnostní pomocná funkce
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($profile['name']) ? h($profile['name']) : 'Profil'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo isset($profile['name']) ? h($profile['name']) : ''; ?></h1>

    <?php if (!empty($profile['skills'])): ?>
        <section>
            <h2>Dovednosti</h2>
            <ul>
                <?php foreach ($profile['skills'] as $skill): ?>
                    <li><?php echo h($skill); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($profile['interests'])): ?>
        <section>
            <h2>Zájmy / Projekty</h2>
            <ul>
                <?php foreach ($profile['interests'] as $item): ?>
                    <li><?php echo h($item); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

</body>
</html>