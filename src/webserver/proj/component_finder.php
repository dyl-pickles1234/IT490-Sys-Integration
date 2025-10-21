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

    <search style="text-align: center;">
        <input type="text" id="component_search" placeholder="Search Components" value="" autocomplete="off"
            style="width: 300px;">
        <button type="button"
            onclick="populateProductsTable('<?php echo $component; ?>', document.getElementById('component_search').value)">Search</button>
    </search>
    <br>
    <?php if (!$component)
        exit();
    ?>
    <table id="products_table">
    </table>
</body>

<script>
    populateProductsTable('<?php echo $component; ?>');
</script>

</html>