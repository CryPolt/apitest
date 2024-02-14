<?php

$user = request()->user();
if ($user) {
    return redirect()->route('home');
}

?>
