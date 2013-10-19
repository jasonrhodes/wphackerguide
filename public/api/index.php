<?php

require '../../config/wordpress.php';
header("Content-type: application/json");

$api = new \Slim\Slim();

$api->get("/:type", function ($type) use ($api) {
	$args = ['post_type' => $type] + $api->request()->get();
	$payload = \app\models\WPObject::find($args);

	echo json_encode($payload);
});

$api->get("/:type/random", function ($type) use ($api) {
	$args = ['post_type' => $type, 'posts_per_page' => 1, 'orderby' => 'rand'] + $api->request()->get();
	$payload = \app\models\WPObject::find($args);

	echo json_encode($payload);
});

$api->get("/:type/:id", function ($type, $id) use ($api) {
	$payload = \app\models\WPObject::find($id);

	echo json_encode($payload);
});


/**
 * Create a new object
 */
$api->post("/:type", function ($type) use ($api) {
	$data = json_decode($api->request()->getBody(), true);
	$data['post_type'] = $type;

	$result = wp_insert_post($data);
	$location = "http://project.me/api/{$type}/{$result}";

	$response = $api->response();
	$response->status(201);
	$response['Content-Type'] = "application/json";

	echo json_encode(['location' => $location]);
});


/**
 * Update an existing object
 */
$api->map("/:type/:id(/)", function ($type, $id) use ($api) {
    $body = $api->request()->getBody();
    $data = json_decode($body, true);
    $data['ID'] = $id;

    $return = wp_update_post($data);

    $response = $api->response();
    $response->status(200);
    $response['Content-Type'] = 'application/json';

    echo json_encode($return);
})->via("PUT", "PATCH");


/**
 * Delete an existing object
 */
$api->delete("/:type/:id(/)", function ($type, $id) {
    $return = wp_delete_post($id);
    echo json_encode($return);
});



$api->run();