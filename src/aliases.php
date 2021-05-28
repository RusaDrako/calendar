<?php

if (class_exists('RD_Calendar', false)) {
    return;
}

$classMap = [
	'RusaDrako\\calendar\\calendar'       => 'RD_Calendar',
	'RusaDrako\\calendar\\localization\\_localization'       => 'RD_Calendar_Local',
];

foreach ($classMap as $class => $alias) {
    class_alias($class, $alias);
}

/*interface RD_Obj_Intf_BD implements RusaDrako\\calendar\\intf_record {
}/**/
