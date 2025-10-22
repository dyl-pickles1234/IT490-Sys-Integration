<?php include 'header.html'; ?>
<html>

<body>
    <h1>Build Your PC:
        <input type="text" id="build_name" name="build_name" placeholder="Build Name" value="" autocomplete="off"
            oninput="this.style.width = (this.value.length ? (this.value.length + 1) + 'ch' : '12ch');">
    </h1>
    <br>

    <table>
        <tr>
            <td>CPU</td>
            <td id="cpu_name_slot"></td>
            <td id="cpu_price_slot" style="max-width: 10px; padding: 0px;">$
                <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Motherboard</td>
            <td id="motherboard_name_slot"></td>
            <td id="motherboard_price_slot" style="max-width: 10px; padding: 0px;">$0,000.00
                <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Memory</td>
            <td id="ram_name_slot"></td>
            <td id="ram_price_slot" style="max-width: 10px; padding: 0px;">$0,000.00
                <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Graphics Card</td>
            <td id="gpu_name_slot"></td>
            <td id="gpu_price_slot" style="max-width: 10px; padding: 0px;">$0,000.00
                <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Power Supply</td>
            <td id="psu_name_slot"></td>
            <td id="psu_price_slot" style="max-width: 10px; padding: 0px;">$0,000.00
                <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Cooler</td>
            <td id="cooler_name_slot"></td>
            <td id="cooler_price_slot" style="max-width: 10px; padding: 0px;">$0,000.00
                <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Storage</td>
            <td id="storage_name_slot"></td>
            <td id="storage_price_slot" style="max-width: 10px; padding: 0px;">$0,000.00
                <input type="checkbox" class="price_alert" id="cpu">
            </td>
        </tr>
        <tr>
            <td>Case</td>
            <td id="case_name_slot"></td>
            <td id="case_price_slot" style="max-width: 10px; padding: 0px;">$0,000.00
                <input type="checkbox" class="price_alert" id="cpu">
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
    <div style="text-align: center;">
        <span id="total_price_slot" style="font-size: 1.5em; font-weight: bold;">Total: $</span>
    </div>
    <br>
    <div id="share_build_div" style="text-align: center;">
        <button type="button" id="share_button" onclick="shareBuild()">Share your build!</button>
    </div>
</body>

<script>
    populateBuild();
</script>

</html>