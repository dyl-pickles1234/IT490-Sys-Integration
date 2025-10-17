<?php include 'header.html';
$component = $_GET['component'];
?>
<html>

<body>
    <h1>Component Finder:
        <select id="component_dropdown" autocomplete="off"
            onchange="window.location.href='component_finder.php?component='+this.value;">
            <option value="" disabled <?php if ($component == '')
                echo 'selected'; ?>>Choose Part</option>
            <option value="cpu" <?php if ($component == 'cpu')
                echo 'selected'; ?>>CPU</option>
            <option value="motherboard" <?php if ($component == 'motherboard')
                echo 'selected'; ?>>Motherboard</option>
            <option value="ram" <?php if ($component == 'ram')
                echo 'selected'; ?>>RAM</option>
            <option value="gpu" <?php if ($component == 'gpu')
                echo 'selected'; ?>>GPU</option>
            <option value="psu" <?php if ($component == 'psu')
                echo 'selected'; ?>>PSU</option>
            <option value="cooler" <?php if ($component == 'cooler')
                echo 'selected'; ?>>Cooler</option>
            <option value="storage" <?php if ($component == 'storage')
                echo 'selected'; ?>>Storage</option>
            <option value="case" <?php if ($component == 'case')
                echo 'selected'; ?>>Case</option>
        </select>
    </h1>

    <?php
    // grab component info from db
    // save table cols
    $component_table_cols = ['product name', 'speed', 'cores', 'platform', 'price', 'buy from']; // ex
    $query_result = [['Ryzen 7 5800x', '3.8', '8', 'AM4', '0000.00']]; // ex
    ?>

    <table>
        <tr>
            <?php
            for ($i = 0; $i < count($component_table_cols); $i++) {
                echo '<th>' . $component_table_cols[$i] . '</th>';
            }
            ?>
        </tr>
        <?php
        for ($i = 0; $i < count($query_result); $i++) {
            $row = $query_result[$i];
            echo '<tr>';
            for ($j = 0; $j < count($component_table_cols); $j++) {
                echo '<td>' . $row[$j] . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>

</html>