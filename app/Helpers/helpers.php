<?php
    function generalSettings(){
        $generalSettings = App\Models\generalSettings::latest()->first();
        return $generalSettings;
    }

use App\Models\Service;
use App\Models\HitCounter;

function services()
{
    return Service::where('status', 'Active')->get();
}
function hitCounter()
{
    return HitCounter::latest()->first();
}

