
application/x-httpd-php ProductController.php ( C++ source, ASCII text, with CRLF line terminators )
<?php

namespace App\Http\Controllers\Api;

use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        $companies = [];
        foreach($company as $key => $data){
            $pro_data = [];
            $pro_data['id'] = $data->id;
            $pro_data['name'] = $data->name;
            $pro_data['email'] = $data->email;
            $pro_data['website'] = $data->website;
            $pro_data['user_id'] = $data->user_id;
            $companies[]=$pro_data;
        }
        $response['data'] = $companies;
        $response['success'] = true;
        $response['status'] = 200;
        return $response;
    }
}