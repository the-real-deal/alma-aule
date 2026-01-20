<!DOCTYPE html>
<html lang="it">
<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php"?>
    <?php
        if (isset($page["css"])) {
            foreach ($page["css"] as $stylesheet_src) {
            ?>
                <link rel='stylesheet' href="<?= $stylesheet_src; ?>">
            <?php
            }
        }
    ?>
    <title>Alma Aule<?= isset($page["title"]) ? " - {$page["title"]}" : ""; ?></title>
</head>
<body class="d-flex flex-column">
    <main
        <?= isset($page["container-classes"]) ? 'class="' . $page["container-classes"] . '"' : ""; ?>
        <?= isset($page["container-id"]) ? 'id="' . $page["container-id"] . '"' : ""; ?>
    >
        <?php
            if (isset($page["content"])) {
                require($page["content"]);
            }
        ?>
    </main>
    <!-- Eventualmente un footer -->
    <?php # require './components/navbar.php' ?>   
    <?php
        if (isset($page["js"])) {
            foreach ($page["js"] as $script_src) {
            ?>
                <script src="<?= "{$script_src}"; ?>" defer></script>
            <?php
            }
        }
    ?>
</body>

</html>