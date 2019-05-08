<?php
    include_once("app\User.php");

    function listAll(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        echo json_encode(User::get());
    }

    function get($id){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        $user = User::find(['id' => $id]);
        if(!$user){
            http_response_code(404);
            echo json_encode([
                'status' => false,
                'message' => 'User Not Found.',
                'data' => ''
            ]);
            exit;
        }
        echo json_encode($user);
    }

    function create(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        $data = json_decode(file_get_contents('PHP://input'), true);
        try{
            $user_id = User::create($data);
            echo json_encode([
                'status' => true,
                'message' => '',
                'data' => $user_id
            ]);
        } catch(Exception $e){
            http_response_code(400);
            echo json_encode([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => ''
            ]);
        }
    }

    function update($id){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        $user = User::find(['id' => $id]);
        if(!$user){
            http_response_code(404);
            echo json_encode([
                'status' => false,
                'message' => 'User Not Found.',
                'data' => ''
            ]);
            exit;
        }
        $data = json_decode(file_get_contents('PHP://input'), true);
        try{
            User::update($data, ['id' => $id]);
            echo json_encode([
                'status' => true,
                'message' => '',
                'data' => ''
            ]);
        } catch(Exception $e){
            http_response_code(400);
            echo json_encode([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => ''
            ]);
        }
    }

    function delete($id){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        $user = User::find(['id' => $id]);
        if(!$user){
            http_response_code(404);
            echo json_encode([
                'status' => false,
                'message' => 'User Not Found.',
                'data' => ''
            ]);
            exit;
        }
        try{
            User::delete(['id' => $id]);
            echo json_encode([
                'status' => true,
                'message' => '',
                'data' => ''
            ]);
        } catch(Exception $e){
            http_response_code(400);
            echo json_encode([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => ''
            ]);
        }
    }