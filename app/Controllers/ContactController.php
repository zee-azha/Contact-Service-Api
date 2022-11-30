<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Contact;

class ContactController extends BaseController
{
    use responseTrait;
    public function index(){
        $model = new Contact();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null){
	$model = new Contact();
	$data = $model->getWhere(['contact_id' => $id])->getResult();
	if($data){
		return $this->respond($data);
	}else{
		return $this->failNotFound('No Data Found with id '.$id);
	}
}

public function create(){
    $model = new Contact();
    $data = [
    'phone_number' => $this->request->getPost('phone_number'),
    'name' => $this->request->getPost('name')
    ];
    $model->insert($data);
    $response = [
        'status' => 201,
        'error' => null,
        'messages' => [
            'success' => 'Data Saved'
        ]
    ];
    return $this->respondCreated($response);
}

public function update($id = null){
    $model = new Contact();
    $json = $this->request->getJSON();
    if($json){
        $data = [
            'phone_number' => $json->phone_number,
            'name' => $json-> name
        ];
    }else{
        $input = $this->request->getRawInput();
        $data = [
            'phone_number' => $input['phone_number'],
            'name' =>$input['name']
        ];
    }
    $model ->update($id,$data);
    $response = [
        'status' => 200,
        'error' => null,
        'messages' => [
           'success' => 'Data Update'
        ]
    ];
    return $this->respond($response);
    
}

public function delete($id = null){
    $model = new Contact();
    $data = $model->find($id);
    if($data){
        $model -> delete($id);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Deleted' 
            ]
        ];
        return $this->respondDeleted($response);        
    }else{
        return $this->failNotFound('No Data Found with id '.$id);
    }
}


}
