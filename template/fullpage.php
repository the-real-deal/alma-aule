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
    <?php
        if (isset($page["title"])) {
            echo "<title>Alma Aule — {$page['title']}</title>";
        } else {
            echo "<title>Alma Aule</title>";
        }
    ?>
</head>
<body class="d-flex flex-column">
    <?php
        $main_classes = $page["container-classes"] ?? "";
        $main_id = $page["container-id"] ?? "";

        echo "<main class='{$main_classes}' id='{$main_id}'>"; 
    ?>
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