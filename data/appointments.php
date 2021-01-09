<?php
function haveAppointment($username){
    global $appointments;
    foreach ($appointments as $appoints) {
        foreach ($appoints['users'] as $user) {
            if($user == $username){
                return true;
            }
        }
    }
    return false;
}

define('JAN','Január');
define('FEB','Február');
define('MAR','Március');
define('APR','Április');
define('MAY','Május');

$months = [JAN,FEB,MAR,APR,MAY];

$appointments = [
    'appid1' => [
        'time' => '2021-01-04 15:00',
        'month' => JAN,
        'capacity' => '2',
        'users' => [
            'user1','user2'
        ]
    ],
    'appid2' => [
        'time' => '2021-01-05 16:00',
        'month' => JAN,
        'capacity' => '5', 
        'users' => [
            'user3','admin'
        ]
    ],
    'appid3' => [
        'time' => '2021-01-05 20:00',
        'month' => JAN,
        'capacity' => '1',
        'users' => []
    ],
    'appid4' => [
        'time' => '2021-01-20 15:00',
        'month' => JAN,
        'capacity' => '2',
        'users' => ['test4','test3']
    ],
    'appid5' => [
        'time' => '2021-02-10 12:00',
        'month' => FEB,
        'capacity' => '3',
        'users' => ['test5','test6','test7']
    ],
    'appid6' => [
        'time' => '2021-02-18 10:00',
        'month' => FEB,
        'capacity' => '1',
        'users' => ['test8']
    ],
    'appid7' => [
        'time' => '2021-03-04 08:00',
        'month' => MAR,
        'capacity' => '5',
        'users' => ['']
    ],
    'appid8' => [
        'time' => '2021-03-11 11:00',
        'month' => MAR,
        'capacity' => '2',
        'users' => ['test9']
    ],
    'appid9' => [
        'time' => '2021-03-18 15:00',
        'month' => MAR,
        'capacity' => '7',
        'users' => ['test10']
    ],
    'appid10' => [
        'time' => '2021-04-01 23:00',
        'month' => APR,
        'capacity' => '2',
        'users' => ['test11']
    ],
    'appid11' => [
        'time' => '2021-04-20 04:20',
        'month' => APR,
        'capacity' => '20',
        'users' => ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p']
    ],
    'appid12' => [
        'time' => '2021-04-20 12:00',
        'month' => APR,
        'capacity' => '3',
        'users' => ['test12']
    ],
    'appid13' => [
        'time' => '2021-05-12 17:00',
        'month' => MAY,
        'capacity' => '2',
        'users' => ['']
    ]
];

?>