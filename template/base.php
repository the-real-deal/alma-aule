<!DOCTYPE html>
<html lang="it">
<head>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/head.php"?>
    <?php
        if (isset($page["css"])) {
            foreach ($page["css"] as $stylesheet_src) {
                echo "<link rel='stylesheet' href={$stylesheet_src}>";
            }
        }
    ?>
    <title>
        Alma Aule <?php 
            if (isset($page["title"])) {
                echo "— " . $page["title"];
            }
        ?>
    </title>
</head>
<body>
    <?php require "{$_SERVER['DOCUMENT_ROOT']}/components/common/navbar/navbar.php" ?>
    <main>
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
                echo "<script src={$script_src} defer></script>";
            }
        }
    ?>
</body>

</html>