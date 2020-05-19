<?php
/**
 *  Set Active Menu
 *
 * @param $path
 * @param string $active
 * @param boolean $boolean
 * @return string
 */
function set_active($path, $active = 'active',$boolean = false)
{
    if (Route::is($path)) {

        if ($boolean) {
        return true;
        }

    return $active;
    }

return (request()->is($path)) ? $active : '';
}

function getStatus($time)
{
    switch ($time) {
        case 0:
            $status = 'Now';
            break;
        case $time < 10:
            $status = 'Online';
            break;
        case $time < 15:
            $status = 'Afk';
            break;
        default:
            $status = 'Offline';
            break;
    }

return $status;
}

function useType($type){
//  return $type;
    switch ($type) {
        case 'food':
            break;
        case 'collectiables':
            break;
        case "weapon":
           return "fire";
            break;
        case 'drug':
            break;
        case 'medical':
            break;
        case 'clothes':
            break;
    }
}

?>
