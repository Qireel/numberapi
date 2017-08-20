<?php
// Routes

$app->get('/api/v1/number/retrieve/{id}', function($request, $response, $args){
	$adapter = new NumberApi\MysqliAdapter();
	$numberMapper = new NumberApi\NumberMapper($adapter);
	$number = $numberMapper->findById($args['id']);
	
	$data = [
		'id' => $number->getId(),
		'value' => $number->getValue()
	];
	
	$this->logger->info("Number with id #".$args['id']." was retrieved");
	
	return $response->withJson($data);
});

$app->get('/api/v1/number/generate/', function($request, $response, $args){
	$adapter = new NumberApi\MysqliAdapter();
	$numberMapper = new NumberApi\NumberMapper($adapter);
	$number = $numberMapper->generate();
	
	$data = [
		'id' => $number->getId(),
		'value' => $number->getValue()
	];
	
	$this->logger->info("Number with id #".$data['id']." was generated");
	
	return $response->withJson($data);
});
