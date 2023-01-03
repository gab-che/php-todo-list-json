<?php
function readData()
{
    return json_decode(file_get_contents("../tasks.json"), true);
};

$writeData = fn ($data) => file_put_contents("../tasks.json", json_encode($data, JSON_PRETTY_PRINT));
