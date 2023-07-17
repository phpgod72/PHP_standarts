
<h1>Nach Rezepten Suche</h1>

<?php 

if (isset($_POST["search"]) || isset($_POST["input"])) { ?>
    <h3>Gesucht wurde nach: <?php echo $_POST["search"] ?></h3>

    <?php
        $res = Utils::getwortteil($_POST["search"]);
        if ($res || isset($_POST["input"])) { ?>
            <form method="post" action="">
                <input type="hidden" name="search" value="<?php echo $_POST["search"]?>">
                <label for="searchlist">Ergebnisliste der Suche:</label>

                <select name="input" id="searchlist">
                    <?php
                    foreach ($res as $recipes) {
                        echo "<option value=". $recipes["beruf"].">".$recipes["beruf"] . "</option>";
                    } ?>
                </select><br>
                <input type="submit" value="anzeigen">
            </form>
            <?php if (isset($_POST["input"])) { ?>
                <div id="searchlist">
                    <?php 
                    Utils::Result($_POST["input"]);
                } 
                ?>
                </div>
                
        <?php }
}
else { ?>
    <form action=""method="POST">
        <label for="search">Rezeptnamen suchen (auch Wortteil möglich): </label>
        <input type="text" id="search" name="search"><br>
        <input type="submit" value="Suche">
    </form>
<?php } ?>