<?php
// Generate html for showing a message
// Usage: create_show_message(message)
function show_message($message) {
echo "
<!-- Container for message -->
<div class='left'>
<br><br><br><br>
<span style='color:yellow;font-weight:bold'>$message</span>
</div>
<!-- Empty -->
<div class='right'>
</div>
</body>
</html>";
}
?>