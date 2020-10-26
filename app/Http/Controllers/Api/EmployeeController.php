
application/x-httpd-php ProductController.php ( C++ source, ASCII text, with CRLF line terminators )
<?php

namespace App\Http\Controllers\Api;

use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        $employees = [];
        foreach($employee as $key => $data){
            $pro_data = [];
            $pro_data['id'] = $data->id;
            $pro_data['first_name'] = $data->name;
            $pro_data['last_name'] = $data->last_name;
            $pro_data['email'] = $data->email;
            $pro_data['phone'] = $data->phone;
            $pro_data['company_id'] = $data->company_id;
            $pro_data['user_id'] = $data->user_id;
            $employees[]=$pro_data;
        }
        $response['data'] = $employees;
        $response['success'] = true;
        $response['status'] = 200;
        return $response;
    }
}