<?php include 'header.html'; ?>
<html>

<body>
    <h1>Build Your PC:
        <input style="font-size: 1.25em; font-family: monospace; text-align: center; width: 12ch; border-radius: 10px"
            type="text" id="build_name" name="build_name" placeholder="Build Name" value="" autocomplete="off"
            oninput="this.style.width = (this.value.length ? (this.value.length + 1) + 'ch' : '12ch');">
    </h1>
    <br>
    <table>
        <tr>
            <td>CPU</td>
            <td><a href="component_finder.php?component=cpu">Select CPU</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
        <tr>
            <td>Motherboard</td>
            <td><a href="component_finder.php?component=motherboard">Select Motherboard</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
        <tr>
            <td>Memory</td>
            <td><a href="component_finder.php?component=ram">Select Memory</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
        <tr>
            <td>Graphics Card</td>
            <td><a href="component_finder.php?component=gpu">Select Graphics Card</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
        <tr>
            <td>Power Supply</td>
            <td><a href="component_finder.php?component=psu">Select Power Supply</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
        <tr>
            <td>Cooler</td>
            <td><a href="component_finder.php?component=cooler">Select Cooler</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
        <tr>
            <td>Storage</td>
            <td><a href="component_finder.php?component=storage">Select Storage</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
        <tr>
            <td>Case</td>
            <td><a href="component_finder.php?component=case">Select Case</a></td>
            <td style="max-width: 10px; padding: 0px;">$0,000.00 <input type="checkbox" class="price_alert"></td>
        </tr>
    </table>
    <br>
    <div style="text-align: center;">
        <span style="text-align: center; font-size: 1.5em; font-weight: bold;">Total: $0,000.00</span>
    </div>
    <br>
    <div style="text-align: center;">
        <button type="button" id="share_button">Share your build!</button>
    </div>
</body>

</html>