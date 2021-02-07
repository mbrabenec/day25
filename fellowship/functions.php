<?php

function leave_hobbiton($party)
{
    $party = array_merge($party, [
        'merry' => 'Meriadoc Brandybuck',
        'pippin' => 'Peregrin Took'
    ]);
    return $party;
}

function go_to_bree($party)
{
    $party['strider'] = 'Strider';
    return $party;
}

function go_to_weathertop($party)
{
    $party = array_merge($party, [
        'Witch King of Angmar',
        'Nazgûl #2',
        'Nazgûl #3',
        'Nazgûl #4',
        'Nazgûl #5',
        'Nazgûl #6',
        'Nazgûl #7',
        'Nazgûl #8',
        'Nazgûl #9'
    ]);
    return $party;
}

function meet_arwen($party)
{
    $party['arwen'] = 'Arwen Undómiel';
    array_splice($party, -10, 9);
    return $party;
}

function go_to_rivendell($party)
{
    unset($party['arwen']);

    $party = array_merge($party, [
        'gandalf' => 'Gandalf the Grey',
        'boromir' => 'Boromir',
        'legolas' => 'Legolas',
        'gimli' => 'Gimli'
    ]);

    $party['strider'] = 'Aragorn';

    return $party;
}

function go_to_moria($party)
{
    unset($party['gandalf']);
    return $party;
}

function go_to_falls_of_rauros($party)
{
    $party = array_merge($party, array_fill(0, 10, 'Orc'));
    unset($party['boromir']);
    return $party;
}

function break_fellowship($party) 
{

    $mordor_party = [];

    $hunting_party = [];

    $hungry_party = [];

    foreach($party as $key => $value) {
        if ($key == ('sam'|| 'frodo' || 'ring)')) {
            $mordor_party[$key] = $value;
            unset($party[$key]);
        }
    }

    var_dump($mordor_party);
    die();

    foreach($party as $key => $value) {
        if ($key == ('strider'|| 'legolas' || 'gimli)')) {
            $hunting_party[$key] = $value;
            unset($party[$key]);
        }
    }

    

    $hungry_party = array_diff_key($party, $mordor_party, $hunting_party);

    // return [$mordor_party, $hunting_party, $hungry_party];

}