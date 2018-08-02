<?php

include_once '../vendor/autoload.php';


$dotenv = new Dotenv\Dotenv(__DIR__ . '/..', '.env');
$dotenv->load();


$request = $_SERVER;


//\Libs\Helper::printBlock($request);
//\Libs\Helper::printBlock($request['REDIRECT_URL']);
//\Libs\Helper::printBlock($request['REQUEST_METHOD']);

//\Libs\Helper::printBlock($request);

if ($request['REDIRECT_URL'] == '/products' && $request['REQUEST_METHOD'] == 'GET') {
    return (new \App\Controllers\ProductController())->index();
} elseif ($request['REDIRECT_URL'] == '/products' && $request['REQUEST_METHOD'] == 'POST') {
    (new \App\Controllers\ProductController())->store();
} elseif (preg_match('/^\/products\/([0-9]+)$/i', $request['REDIRECT_URL'], $matched) && $request['REQUEST_METHOD'] == 'GET') {
    $productId = isset($matched[1]) ? $matched[1] : null;
    (new \App\Controllers\ProductController())->show($productId);
} elseif (preg_match('/^\/products\/([0-9]+)$/i', $request['REDIRECT_URL'], $matched) && $request['REQUEST_METHOD'] == 'PUT') {
    $productId = isset($matched[1]) ? $matched[1] : null;
    (new \App\Controllers\ProductController())->update($productId);
} elseif (preg_match('/^\/products\/([0-9]+)$/i', $request['REDIRECT_URL'], $matched) && $request['REQUEST_METHOD'] == 'DELETE') {
    $productId = isset($matched[1]) ? $matched[1] : null;
    (new \App\Controllers\ProductController())->delete($productId);
} else if ($request['REDIRECT_URL'] == '/help') {
    \Libs\Helper::printBlock($request);
} else {
//    echo '404';
    http_response_code(403);
}


return;


$app = \Libs\Container::getInstance();

$app->bind(\Repository\Products\IProduct::class, \Repository\Products\File::class);


$data = $_SERVER;


\Libs\Helper::printBlock(getenv('APP_NAME'));
echo '<hr>';

//\Libs\Helper::printBlock($data );

echo '<hr>';

if (getenv('REDIRECT_URL') == '/products' && getenv('REQUEST_METHOD') == 'GET') {
    (new \App\Controllers\ProductController)->index();
} else {
    \Libs\Helper::printBlock($data['REDIRECT_URL']);
}


//new \App\Models\Product();