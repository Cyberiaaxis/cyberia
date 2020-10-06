<?php declare(strict_types=1);


/**
 * The App
 */
// Source: https://www.berries.com/blog/types-of-fruit
$fruits = [
    'apple' => 'Apples come in hundreds of color and flavor varieties. This versatile fruit can be enjoyed as a snack, mashed into sauce or even cooked into desserts. Even though the old adage “an apple a day keeps the doctor away” is not a scientific fact, these fleshy fruits have plenty of health benefits.',
    'cherry' => 'Though often associated with berries, these sweet red fruits are classified as drupes. Fresh cherries can be cooked with red meats, used as a garnish for desserts and of course, eaten as a fresh snack. These low-calorie fruits are packed with nutrients.',
    'cranberry' => 'In the United States, these bright red berries are often added to Thanksgiving and Christmas meals. Fresh cranberries are quite tart in flavor so they are often dried or used in jams and juices with added sugar. This superfood is also packed with antioxidants and other nutrients.',
    'dragonfruit' => 'This vibrant fruit is known for its red skin and white pulp. This unique fruit can be enjoyed with salads, yogurt or as a standalone snack. Dragonfruit has been called a superfood due to its nutrient content.',
    'grape' => 'Grapes are one of the most versatile fruits that people all over the world enjoy. They come in a variety of flavors and colors and are used in juice, jelly and wines, as well as eaten raw. These sweet snacks have high sugar content when fresh and low sugar content when fermented.',
    'kiwi' => 'The kiwi is a sweet, green fruit filled with black seeds. This juicy fruit is surrounded in a furry skin and provide impressive nutritional content. Kiwifruit is often used in dessert items like tarts or eaten by itself.',
    'peach' => 'This fuzzy fruit is the pride and joy of the South. Peaches are baked in desserts, served with ice cream and mixed into jams. If you don’t have access to fresh peaches, don’t worry! Canned unpeeled peaches have similar amounts of vitamins and minerals — just make sure there is no added sugar.',
    'pear' => 'This sweet and crunchy snack comes in a variety of colors and shapes. Pears can be enjoyed fresh, cooked in cinnamon or baked into desserts. Though not particularly high in any specific nutrient, the pear boasts a range of micronutrients.',
    'plum' => 'This sweet fruit has a dark purple skin that encases juicy insides that can range from yellow to red in color. Plums are quite bitter before they are ripe. To ensure you buy a ripe fruit, make sure to choose one that is heavy, slightly soft and has a sweet scent. This little fruit can be enjoyed fresh or in its dried form, known as a prune.',
    'pomegranate' => 'Pomegranates are made up of a thick red skin and hundreds of red seeds inside. These bright red treats are used in desserts, juices and as garnishes.',
    'starfruit' => 'This special fruit lives up to its name. Cut a slice out of this small yellow fruit and it will be shaped like a perfect star. Star fruit has a tasty combination of sweet and sour and is low in calories. Try adding it to your salad or just slice and eat!',
    'watermelon' => 'A watermelon, as the name suggests, has an extremely high water content. This sweet fruit has a green rind and is filled with juicy red fruit. This low-calorie snack will keep you hydrated and happy on even the hottest day.'
];


/**
 * Cross-Origin Resource Sharing (CORS) Headers
 */
header('Access-Control-Allow-Origin: http://example.test');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Accept, Origin, Authorization');


/**
 * JSON response
 * Response using JSend format: https://github.com/omniti-labs/jsend
 */
header('Content-Type: application/json; charset=utf-8');


/**
 * Get input from request
 */
// We should use PSR-7 instead
$body = file_get_contents('php://input');
$input = json_decode($body, true);
$input['fruit'] ? $input['fruit'] : null;


/**
 * Input validation
 */
$errors = 0;

if (!isset($input['fruit'])) {
    $response = [
        'status' => 'error',
        'message' => 'Please specify a fruit.'
    ];
    $errors += 1;
}

if (!array_key_exists($input['fruit'], $fruits)) {
    $response = [
        'status' => 'error',
        'message' => 'Invalid choice of fruit.'
    ];
    $errors += 1;
}


/**
 * Success
 */
if ($errors === 0) {
    $response = [
        'status' => 'success',
        'data' => [
            'name' => $input['fruit'],
            'description' => $fruits[$input['fruit']]
        ]
    ];
}


/**
 * Make a json string, and then echo it for our response
 */
echo json_encode($response);
