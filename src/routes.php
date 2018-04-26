<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    
    $args['country_list'] = array();

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/country_list', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    
    $country = $this->get('Country');

    $data = htmlentities(file_get_contents('http://www.umass.edu/microbio/rasmol/country-.txt'));
    
    $data = str_replace("This list obtained from\nhttp://www.ics.uci.edu/pub/websoft/wwwstat/country-codes.txt\n\n", '', $data);
    
    $country->setList($data);

    $args['country_list'] = $country->getList();

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
