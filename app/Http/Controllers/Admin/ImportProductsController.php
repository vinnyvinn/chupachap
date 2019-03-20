<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\App\CategoriesController;
//use App\Http\Controllers\App\ManufacturerController;
use App\chupa\Repository\PaymentsRepo;
//validator is builtin class in laravel
use Validator;
use App;
use Lang;
use DB;
//for password encryption or hash protected
use Hash;
use App\Administrator;
use Keygen;

//for authenitcate login data
use Config;
use Auth;

//for requesting a value
use Illuminate\Http\Request;
use Excel;
class ImportProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = array('pageTitle' => 'Import Data');
        return view('admin.import',$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function downloadExcel($type)
    {
        $data = DB::table('products')->orderby('products_id','desc')->select('products_name','products_description','categories_name','products_image','products_price','products_weight','products_weight_unit')->take(3)->get()->toArray();
        $data= json_decode( json_encode($data), true);
        return Excel::create('chupachap-sample-stock', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        $title = array('pageTitle' => Lang::get("labels.AddAttributes"));
        $language_id      =   '1';
        $date_added	= date('Y-m-d h:i:s');
        $arr =[];
        $descr =[];
        //get function from other controller
        $myVar = new AdminSiteSettingController();

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
//'resources/assets/images/product_images/'.$value->products_image,
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['products_image'  => $value->products_image,
                    'manufacturers_id'		 =>   0,
                    'products_quantity'		 =>   $value->products_weight,
                    'products_model'		 =>   '',
                    'serial'                 =>   null,
                    'products_price'		 =>   $value->products_price,
                    'products_date_added'	 =>   $date_added,
                    'products_weight'		 =>   $value->products_weight,
                    'products_weight_unit'	 =>	  $value->products_weight_unit,
                    'products_status'		 =>   1,
                    'products_tax_class_id'  =>   1,
                    'low_limit'				 =>   20,
                    'products_name' => $value->products_name,
                    'products_description' => $value->products_description,
                    'categories_name' => $value->categories_name

                ];

            }

            if(!empty($arr)){
                DB::table('products')->insert($arr);
                $get_products_inserted = DB::table('products')->orderby('products_date_added','desc')->take(count($arr))->get();
                 $get_products_inserted->map(function ($value) use($myVar) {

                     DB::table('products_description')->insert([
                         'products_name'  	     =>   $value->products_name,
                         'language_id'			 =>   1,
                         'products_id'			 =>   $value->products_id,
                         'products_url'			 =>   null,
                         'products_description'	 =>   addslashes($value->products_description)
                     ]);

                     $cat_id = DB::table('categories_description')->where('categories_name',$value->categories_name)->first();

                     DB::table('products_to_categories')->insert([
                         'products_id'   	=>     $value->products_id,
                         'categories_id'     =>     $cat_id ? $cat_id->categories_id : 1
                     ]);

                     DB::table('products')->where('products_id',$value->products_id)->update([
                         'products_slug'	 =>   $myVar->slugify($value->products_name)
                     ]);
                });

            }


        }

        return back()->with('success', 'Import Record successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
