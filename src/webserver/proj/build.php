<?php include 'header.html'; ?>
<html>

<body>
    <h1>Build Your PC:
        <input type="text" id="build_name" name="build_name" placeholder="Build Name" value="" autocomplete="off"
            oninput="this.style.width = (this.value.length ? (this.value.length + 1) + 'ch' : '12ch');">
    </h1>
    <br>

    <?php
    // grab selected components from db
    $selected_cpu = 'Ryzen 7 5800x'; // ex
    ?>

    <table>
        <tr>
            <td>CPU</td>
            <td>
                <?php
                echo $selected_cpu . ' ';
                echo '<a href="component_finder.php?component=cpu">';
                if ($selected_cpu)
                    echo "(change)";
                else
                    echo 'Select CPU';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Motherboard</td>
            <td>
                <?php
                echo $selected_motherboard . ' ';
                echo '<a href="component_finder.php?component=motherboard">';
                if ($selected_motherboard)
                    echo "(change)";
                else
                    echo 'Select Motherboard';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"
                    id="motherboard"></td>
        </tr>
        <tr>
            <td>Memory</td>
            <td>
                <?php
                echo $selected_ram . ' ';
                echo '<a href="component_finder.php?component=ram">';
                if ($selected_ram)
                    echo "(change)";
                else
                    echo 'Select RAM';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert" id="ram">
            </td>
        </tr>
        <tr>
            <td>Graphics Card</td>
            <td>
                <?php
                echo $selected_gpu . ' ';
                echo '<a href="component_finder.php?component=gpu">';
                if ($selected_gpu)
                    echo "(change)";
                else
                    echo 'Select GPU';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert" id="gpu">
            </td>
        </tr>
        <tr>
            <td>Power Supply</td>
            <td>
                <?php
                echo $selected_psu . ' ';
                echo '<a href="component_finder.php?component=psu">';
                if ($selected_psu)
                    echo "(change)";
                else
                    echo 'Select PSU';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert" id="psu">
            </td>
        </tr>
        <tr>
            <td>Cooler</td>
            <td>
                <?php
                echo $selected_cooler . ' ';
                echo '<a href="component_finder.php?component=cooler">';
                if ($selected_cooler)
                    echo "(change)";
                else
                    echo 'Select Cooler';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert" id="cooler">
            </td>
        </tr>
        <tr>
            <td>Storage</td>
            <td>
                <?php
                echo $selected_storage . ' ';
                echo '<a href="component_finder.php?component=storage">';
                if ($selected_storage)
                    echo "(change)";
                else
                    echo 'Select Storage';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"
                    id="storage">
            </td>
        </tr>
        <tr>
            <td>Case</td>
            <td>
                <?php
                echo $selected_case . ' ';
                echo '<a href="component_finder.php?component=case">';
                if ($selected_case)
                    echo "(change)";
                else
                    echo 'Select Case';
                echo '</a>';
                ?>
            </td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert" id="case">
            </td>
        </tr>
    </table>
    <br>
    <?php if (!$all_selected): ?>
        <div id="autocomplete_div" style="text-align: center;">
            <span style="font-size: 1.35em; font-weight: bold;">Auto-complete my PC!</span>
            <span style="font-size: 1.35em;"> - I want to prioritize </span>
            <button type="button" id="lowest_price">lowest price</button>
            <button type="button" id="most_performance">most performance</button>
            <button type="button" id="best_value">best value</button>
        </div>
        <br>
    <?php endif; ?>
    <div id="total_price_div" style="text-align: center;">
        <span style="font-size: 1.5em; font-weight: bold;">Total: $0,000.00</span>
    </div>
    <br>
    <div id="share_build_div" style="text-align: center;">
        <button type="button" id="share_button">Share your build!</button>
    </div>
</body>

</html>