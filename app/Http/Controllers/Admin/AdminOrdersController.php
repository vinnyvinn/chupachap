<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
Version: 2.8
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\chupa\Repository\PaymentsRepo;
//validator is builtin class in laravel
use Validator;
use Illuminate\Http\Request;
//to send an email use Mail class in laravel
use Mail;
use App\User;

use App;
use Carbon;

//email

use Session;
use Lang;


use DB;
//for password encryption or hash protected

use Hash;
use App\Administrator;

//for authenitcate login data
use Auth;
//for redirect
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

//for requesting a value 

//use Illuminate\Routing\Controller;

class AdminOrdersController extends Controller
{
	//add listingOrders
	public function orders(){
        $cart_data= PaymentsRepo::init()->cartContent();
		$title = array('pageTitle' => Lang::get("labels.ListingOrders"));
		//$language_id            				=   $request->language_id;
		$language_id            				=   '1';			
		
		$message = array();
		$errorMessage = array();
		
		$orders = DB::table('orders')->orderBy('date_purchased','DESC')->paginate(40);	
		
		$index = 0;
		$total_price = array();
		
		foreach($orders as $orders_data){
			$orders_products = DB::table('orders_products')
				->select('final_price', DB::raw('SUM(final_price) as total_price'))
				->where('orders_id', '=' ,$orders_data->orders_id)
				->get();
				
			$orders[$index]->total_price = $orders_products[0]->total_price;		
			
			$orders_status_history = DB::table('orders_status_history')
				->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
				->select('orders_status.orders_status_name', 'orders_status.orders_status_id')
				->where('orders_id', '=', $orders_data->orders_id)->orderby('orders_status_history.date_added', 'DESC')->limit(1)->get();
				
			//print_r($orders_status_history);
			$orders[$index]->orders_status_id = $orders_status_history[0]->orders_status_id;
			$orders[$index]->orders_status = $orders_status_history[0]->orders_status_name;
			$index++;
		
		}
		
		$ordersData['message'] = $message;
		$ordersData['errorMessage'] = $errorMessage;
		$ordersData['orders'] = $orders;
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$ordersData['currency'] = $myVar->getSetting();
		
		return view("admin.orders",$title)->with('listingOrders', $ordersData)->with('cart_data',$cart_data);
	}
	public function commonContent(){
		
		$languages = DB::table('languages')->where('is_default','1')->get();
		
		if(empty(Session::get('language_id'))){
			session(['language_id' => $languages[0]->languages_id]);
		}
		
		$result = array();		
		
		$data = array('type'=>'header');
		$myVar = new \App\Http\Controllers\Web\CartController();
		
		$cart = $myVar->cart($data);		
		$result['cart'] = $cart;
				
		if(count($result['cart'])==0){
			session(['step' => '0']);
			session(['coupon' => array()]);	
			session(['coupon_discount' => array()]);
			session(['billing_address' => array()]);
			session(['shipping_detail' => array()]);
			session(['payment_method' => array()]);
			session(['braintree_token' => array()]);
			session(['order_comments' => '']);
		}
		
		//produt categories
		$result['categories'] = $this->categories();
		
		
		 
		$popularCategories = DB::table('orders_products')
			->leftJoin('products_to_categories', function($join){
				$join->on('products_to_categories.products_id','=','orders_products.products_id');
			})
			->leftJoin('categories_description','categories_description.categories_id','=','products_to_categories.categories_id')
			->select('categories_description.categories_name as name','orders_products.products_id','products_to_categories.categories_id as id', DB::raw('COUNT(orders_products.products_id) as count'))->where('categories_description.language_id',session('language_id'))->groupby('products_to_categories.categories_id')->orderby('count', 'DESC')->get();
		
		$popularCategories = $popularCategories->toArray();
				
		if(count($popularCategories)>0){			
			$counter = 0;
			$categoriesContent = array();
			foreach($popularCategories as $categories_data){
				if($counter<=9)	{
					$categoriesContent[$counter]['id']   = $categories_data->id;
					$categoriesContent[$counter]['name'] = $categories_data->name;
				}
				$counter++;
			}
			
		}else{
			$counter = 0;
			$categoriesContent = array();
			foreach($result['categories'] as $categories_data){
				if(count($categories_data->sub_categories)>0){
					foreach($categories_data->sub_categories as $key=>$sub_categories_data){
						if($counter<=9)	{
							$categoriesContent[$counter]['id']   = $sub_categories_data->sub_id;
							$categoriesContent[$counter]['name'] = $sub_categories_data->sub_name;
						}
						$counter++;
					}
				}	
			}
		}
		
		$result['popularCategories'] = $categoriesContent;		
		$result['setting'] = DB::table('settings')->get();
		
		
		$result['pages'] = DB::table('pages')
							->leftJoin('pages_description', 'pages_description.page_id', '=', 'pages.page_id')
							->where([['type','2'],['status','1'],['pages_description.language_id',session('language_id')]])->orderBy('pages_description.name', 'ASC')->get();
		
		if(!empty(session('customers_id'))){						
			$wishlist = DB::table('liked_products')->where([
					'liked_customers_id' => session('customers_id')
				])->get();
			$result['totalWishList'] = count($wishlist); 	
		}else{
			$result['totalWishList']=0;
		}
		
		//recent product
		$data = array('page_number'=>0, 'type'=>'', 'limit'=>5, 'categories_id'=>'', 'search'=>'', 'min_price'=>'', 'max_price'=>'' );			
		$products = $this->products($data);
		$result['recentProducts'] = $products;
		
		
		
		return ($result);
	}
	
	//categories 
	public function categories(){
				
		$result 	= 	array();
		
		$categories = DB::table('categories')
			->LeftJoin('categories_description', 'categories_description.categories_id', '=', 'categories.categories_id')
			->select('categories.categories_id as id',
				 'categories.categories_image as image',
				 'categories.categories_icon as icon',
				 'categories.sort_order as order',				 
				 'categories.categories_slug as slug',
				 'categories.parent_id',
				 'categories_description.categories_name as name'
				 )
			->where('categories_description.language_id','=', Session::get('language_id'))
			->where('parent_id','0')
			->get();
		
		$index = 0;
		foreach($categories as $categories_data){
			$categories_id = $categories_data->id;
			
			$products = DB::table('categories')
					->LeftJoin('categories as sub_categories', 'sub_categories.parent_id', '=', 'categories.categories_id')
					->LeftJoin('products_to_categories', 'products_to_categories.categories_id', '=', 'sub_categories.categories_id')
					->LeftJoin('products', 'products.products_id', '=', 'products_to_categories.products_id')
					->select('categories.categories_id', DB::raw('COUNT(DISTINCT products.products_id) as total_products'))
					->where('categories.categories_id','=', $categories_id)
					->get();
			
			$categories_data->total_products = $products[0]->total_products;
			array_push($result,$categories_data);						
			
			$sub_categories = DB::table('categories')
				->LeftJoin('categories_description', 'categories_description.categories_id', '=', 'categories.categories_id')
				->select('categories.categories_id as sub_id',
					 'categories.categories_image as sub_image',
					 'categories.categories_icon as sub_icon',
					 'categories.sort_order as sub_order',				 
				 	'categories.categories_slug as sub_slug',
					 'categories.parent_id',
					 'categories_description.categories_name as sub_name'
					 )
				->where('categories_description.language_id','=', Session::get('language_id'))
				->where('parent_id',$categories_id)
				->get();
			
			$data = array();
			$index2 = 0; 
			foreach($sub_categories as $sub_categories_data){
				$sub_categories_id = $sub_categories_data->sub_id;
								
				$individual_products = DB::table('products_to_categories')
					->LeftJoin('products', 'products.products_id', '=', 'products_to_categories.products_id')
					->select('products_to_categories.categories_id', DB::raw('COUNT(DISTINCT products.products_id) as total_products'))
					->where('products_to_categories.categories_id','=', $sub_categories_id)
					->get();
			
				$sub_categories_data->total_products = $individual_products[0]->total_products;
				$data[$index2++] = $sub_categories_data;				
			
			}
			
			$result[$index++]->sub_categories = $data;
			
		}		
		return($result);		
		
	}
	//products 
	public function products($data){
		
		if(empty($data['page_number']) or $data['page_number'] == 0 ){
			$skip								=   $data['page_number'].'0';
		}else{
			$skip								=   $data['limit']*$data['page_number'];
		}		
		
		$min_price	 							=   $data['min_price'];	
		$max_price	 							=   $data['max_price'];	
		$take									=   $data['limit'];
		$currentDate 							=   time();	
		$type									=	$data['type'];
		
		if($type=="atoz"){
			$sortby								=	"products_name";
			$order								=	"ASC";
		}elseif($type=="ztoa"){
			$sortby								=	"products_name";
			$order								=	"DESC";
		}elseif($type=="hightolow"){
			$sortby								=	"products_price";
			$order								=	"DESC";
		}elseif($type=="lowtohigh"){
			$sortby								=	"products_price";
			$order								=	"ASC";
		}elseif($type=="topseller"){
			$sortby								=	"products_ordered";
			$order								=	"DESC";
		}elseif($type=="mostliked"){
			$sortby								=	"products_liked";
			$order								=	"DESC";
			
		}elseif($type == "special"){ 
			$sortby = "specials.products_id";
			$order = "desc";
		}else{
			$sortby = "products.products_id";
			$order = "desc";
		}	
		
		$filterProducts = array();
		$eliminateRecord = array();
			
			$categories = DB::table('products_to_categories')
				->LeftJoin('products', 'products.products_id', '=', 'products_to_categories.products_id')
				->LeftJoin('categories_description','categories_description.categories_id','=','products_to_categories.categories_id')
				->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
				->leftJoin('manufacturers_info','manufacturers.manufacturers_id','=','manufacturers_info.manufacturers_id')
				->leftJoin('products_description','products_description.products_id','=','products.products_id');
			
			if(!empty($data['filters']) and empty($data['search'])){			
				$categories->leftJoin('products_attributes','products_attributes.products_id','=','products.products_id');
			}
			
			if(!empty($data['search'])){
				$categories->leftJoin('products_attributes','products_attributes.products_id','=','products.products_id')
					->leftJoin('products_options','products_options.products_options_id','=','products_attributes.options_id')
					->leftJoin('products_options_values','products_options_values.products_options_values_id','=','products_attributes.options_values_id');
			}
			//wishlist customer id
			if($type == "wishlist"){
				$categories->LeftJoin('liked_products', 'liked_products.liked_products_id', '=', 'products.products_id');
			}
			
			//parameter special
			elseif($type == "special"){
				$categories->LeftJoin('specials', 'specials.products_id', '=', 'products_to_categories.products_id')
					->select('products.*', 'products_description.*', 'manufacturers.*', 'manufacturers_info.manufacturers_url', 'specials.specials_new_products_price as discount_price', 'specials.specials_new_products_price as discount_price', 'categories_description.*');
			}
			else{
				$categories->LeftJoin('specials', function ($join) use ($currentDate) {  
					$join->on('specials.products_id', '=', 'products_to_categories.products_id')->where('status', '=', '1')->where('expires_date', '>', $currentDate);
				})->select('products.*','products_description.*', 'manufacturers.*', 'manufacturers_info.manufacturers_url', 'specials.specials_new_products_price as discount_price', 'products_to_categories.categories_id', 'categories_description.*');
			}
			
			
			if($type == "special"){ //deals special products
				$categories->where('specials.status','=', '1')->where('expires_date','>',  $currentDate);
			}
			
			//get single category products
			if(!empty($data['categories_id'])){
				$categories->where('products_to_categories.categories_id','=', $data['categories_id']);
			}
			
			//get single products
			if(!empty($data['products_id']) && $data['products_id']!=""){
				$categories->where('products.products_id','=', $data['products_id']);
			}
			
			
			//for min and maximum price
			if(!empty($max_price)){
				$categories->whereBetween('products.products_price', [$min_price, $max_price]);
			}
			
			if(!empty($data['search'])){
				
				$searchValue = $data['search'];
				$categories->where('products_options.products_options_name', 'LIKE', '%'.$searchValue.'%');
								
				if(!empty($data['categories_id'])){
					$categories->where('products_to_categories.categories_id','=', $data['categories_id']);
				}
				
				if(!empty($data['filters'])){			
					$categories->whereIn('products_attributes.options_id', [$data['filters']['options']])
						->whereIn('products_attributes.options_values_id', [$data['filters']['option_value']])
						->where(DB::raw('(select count(*) from `products_attributes` where `products_attributes`.`products_id` = `products`.`products_id` and `products_attributes`.`options_id` in ('.$data['filters']['options'].') and `products_attributes`.`options_values_id` in ('.$data['filters']['option_value'].'))'),'>=',$data['filters']['options_count']);					
				}				
					
				$categories->orWhere('products_options_values.products_options_values_name', 'LIKE', '%'.$searchValue.'%');				
				if(!empty($data['categories_id'])){
					$categories->where('products_to_categories.categories_id','=', $data['categories_id']);
				}
				
				if(!empty($data['filters'])){			
					$categories->whereIn('products_attributes.options_id', [$data['filters']['options']])
						->whereIn('products_attributes.options_values_id', [$data['filters']['option_value']])
						->where(DB::raw('(select count(*) from `products_attributes` where `products_attributes`.`products_id` = `products`.`products_id` and `products_attributes`.`options_id` in ('.$data['filters']['options'].') and `products_attributes`.`options_values_id` in ('.$data['filters']['option_value'].'))'),'>=',$data['filters']['options_count']);					
				}	
				
				$categories->orWhere('products_name', 'LIKE', '%'.$searchValue.'%');				
				if(empty($data['search']) and !empty($data['categories_id'])){
					$categories->where('products_to_categories.categories_id','=', $data['categories_id']);
				}
				
				if(!empty($data['filters'])){			
					$categories->whereIn('products_attributes.options_id', [$data['filters']['options']])
						->whereIn('products_attributes.options_values_id', [$data['filters']['option_value']])
						->where(DB::raw('(select count(*) from `products_attributes` where `products_attributes`.`products_id` = `products`.`products_id` and `products_attributes`.`options_id` in ('.$data['filters']['options'].') and `products_attributes`.`options_values_id` in ('.$data['filters']['option_value'].'))'),'>=',$data['filters']['options_count']);					
				}	
				
				$categories->orWhere('products_model', 'LIKE', '%'.$searchValue.'%');
				
				if(!empty($data['categories_id'])){
					$categories->where('products_to_categories.categories_id','=', $data['categories_id']);
				}
				
				if(!empty($data['filters'])){			
					$categories->whereIn('products_attributes.options_id', [$data['filters']['options']])
						->whereIn('products_attributes.options_values_id', [$data['filters']['option_value']])
						->where(DB::raw('(select count(*) from `products_attributes` where `products_attributes`.`products_id` = `products`.`products_id` and `products_attributes`.`options_id` in ('.$data['filters']['options'].') and `products_attributes`.`options_values_id` in ('.$data['filters']['option_value'].'))'),'>=',$data['filters']['options_count']);					
				}					
			}
						
			if(!empty($data['filters'])){			
				$categories->whereIn('products_attributes.options_id', [$data['filters']['options']])
					->whereIn('products_attributes.options_values_id', [$data['filters']['option_value']])
					->where(DB::raw('(select count(*) from `products_attributes` where `products_attributes`.`products_id` = `products`.`products_id` and `products_attributes`.`options_id` in ('.$data['filters']['options'].') and `products_attributes`.`options_values_id` in ('.$data['filters']['option_value'].'))'),'>=',$data['filters']['options_count']);					
			}	
			
			//wishlist customer id
			if($type == "wishlist"){
				$categories->where('liked_customers_id', '=', session('customers_id'));
			}
			
			//wishlist customer id
			if($type == "is_feature"){
				$categories->where('products.is_feature', '=', 1);
			}
					
			
			$categories->where('products_description.language_id','=',Session::get('language_id'))
				->where('categories_description.language_id','=',Session::get('language_id'))
				->where('products_quantity','>','0')
				->orderBy($sortby, $order);
			
			$categories->groupBy('products.products_id');
				
			//count
			$total_record = $categories->get();
			$products  = $categories->skip($skip)->take($take)->get();
			
			$result = array();
			$result2 = array();
			
			//check if record exist
			if(count($products)>0){
				$index = 0;	
				foreach ($products as $products_data){
				$products_id = $products_data->products_id;
				
				//multiple images
				$products_images = DB::table('products_images')->select('image')->where('products_id','=', $products_id)->orderBy('sort_order', 'ASC')->get();		
				$products_data->images =  $products_images;
				
				array_push($result,$products_data);
				$options = array();
				$attr = array();
				
				//like product
				if(!empty(session('customers_id'))){
					$liked_customers_id						=	session('customers_id');	
					$categories = DB::table('liked_products')->where('liked_products_id', '=', $products_id)->where('liked_customers_id', '=', $liked_customers_id)->get();
					
					if(count($categories)>0){
						$result[$index]->isLiked = '1';
					}else{
						$result[$index]->isLiked = '0';
					}
				}else{
					$result[$index]->isLiked = '0';						
				}
				
				// fetch all options add join from products_options table for option name
				$products_attribute = DB::table('products_attributes')->where('products_id','=', $products_id)->groupBy('options_id')->get();
				if(count($products_attribute)){
				$index2 = 0;
					foreach($products_attribute as $attribute_data){
						$option_name = DB::table('products_options')->where('language_id','=', Session::get('language_id'))->where('products_options_id','=', $attribute_data->options_id)->get();
						
						if(count($option_name)>0){
							
							$temp = array();
							$temp_option['id'] = $attribute_data->options_id;
							$temp_option['name'] = $option_name[0]->products_options_name;
							$temp_option['is_default'] = $attribute_data->is_default;
							$attr[$index2]['option'] = $temp_option;

							// fetch all attributes add join from products_options_values table for option value name
							$attributes_value_query =  DB::table('products_attributes')->where('products_id','=', $products_id)->where('options_id','=', $attribute_data->options_id)->get();
							$k = 0;
							foreach($attributes_value_query as $products_option_value){
								$option_value = DB::table('products_options_values')->where('products_options_values_id','=', $products_option_value->options_values_id)->get();
								$temp_i['id'] = $products_option_value->options_values_id;
								$temp_i['value'] = $option_value[0]->products_options_values_name;
								$temp_i['price'] = $products_option_value->options_values_price;
								$temp_i['price_prefix'] = $products_option_value->price_prefix;
								array_push($temp,$temp_i);

							}
							$attr[$index2]['values'] = $temp;
							$result[$index]->attributes = 	$attr;	
							$index2++;
						}
					}
				}else{
					$result[$index]->attributes = 	array();	
				}
					$index++;
				}
				
					$responseData = array('success'=>'1', 'product_data'=>$result,  'message'=>Lang::get('website.Returned all products'), 'total_record'=>count($total_record));
				}else{
					$responseData = array('success'=>'0', 'product_data'=>$result,  'message'=>Lang::get('website.Empty record'), 'total_record'=>count($total_record));
				}		
		return($responseData);
	
	}	
	
	//getCart
	public function cart($request){
		
		$cart = DB::table('customers_basket')
			->join('products', 'products.products_id','=', 'customers_basket.products_id')
			->join('products_description', 'products_description.products_id','=', 'products.products_id')
			->select('customers_basket.*', 'products.products_model as model', 'products.products_image as image', 'products_description.products_name as products_name', 'products.products_quantity as quantity', 'products.products_price as price', 'products.products_weight as weight', 'products.products_weight as weight', 'products.products_weight as weight' )->where('customers_basket.is_order', '=', '0')->where('products_description.language_id','=', '1');
			
			if(empty(session('customers_id'))){
				$cart->where('customers_basket.session_id', '=', Session::getId());
			}else{
				$cart->where('customers_basket.customers_id', '=', session('customers_id'));
			}
		
		$baskit = $cart->get();
		return($baskit); 
		
	}
	
	//Order onbehalf of the customer
	public function orderforcustomer() {
        $cart_data= PaymentsRepo::init()->cartContent();
		$title = array('pageTitle' => Lang::get('website.Shop'));
		$result = array();
		
		$result['commonContent'] = $this->commonContent();
		if(!empty(request()->page)){
			$page_number = request()->page;
		}else{
			$page_number = 0;
		}
		
		if(!empty(request()->limit)){
			$limit = request()->limit;
		}else{
			$limit = 15;
		}
		
		if(!empty(request()->type)){
			$type = request()->type;
		}else{
			$type = '';
		}
		
		//min_price
		if(!empty(request()->min_price)){
			$min_price = request()->min_price;
		}else{
			$min_price = '';
		}
		
		//max_price
		if(!empty(request()->max_price)){
			$max_price = request()->max_price;
		}else{
			$max_price = '';
		}	
		
		//category		
		if(!empty(request()->category) and $request->category!='all'){
			$category = DB::table('categories')->leftJoin('categories_description','categories_description.categories_id','=','categories.categories_id')->where('categories_slug',$request->category)->where('language_id',Session::get('language_id'))->get();
			
			$categories_id = $category[0]->categories_id;
			//for main
			if($category[0]->parent_id==0){
				$category_name = $category[0]->categories_name;
				$sub_category_name = '';
				$category_slug = '';
			}else{
			//for sub
				$main_category = DB::table('categories')->leftJoin('categories_description','categories_description.categories_id','=','categories.categories_id')->where('categories.categories_id',$category[0]->parent_id)->where('language_id',Session::get('language_id'))->get();
				
				$category_slug = $main_category[0]->categories_slug;
				$category_name = $main_category[0]->categories_name;
				$sub_category_name = $category[0]->categories_name;
			}
			
		}else{
			$categories_id = '';
			$category_name = '';
			$sub_category_name = '';
			$category_slug = '';
		}
		
		$result['category_name'] = $category_name;
		$result['category_slug'] = $category_slug;
		$result['sub_category_name'] = $sub_category_name;
		 
		//search value
		if(!empty($request->search)){
			$search = $request->search;
		}else{
			$search = '';
		}	
		
		
		$filters = array();
		if(!empty($request->filters_applied) and $request->filters_applied==1){
			$index = 0;
			$options = array();
			$option_values = array();
			$option = DB::table('products_options')->get();
			foreach($option as $key=>$options_data){				
				$option_name = $options_data->products_options_name;	
						
				if(!empty($request->$option_name)){
					$index2 = 0;
					$values = array();
					foreach($request->$option_name as $value)
					{
						$value = DB::table('products_options_values')->where('products_options_values_name',$value)->get();
						$option_values[]=$value[0]->products_options_values_id;
					}
					$options[] = $options_data->products_options_id;
				}					
			}
			
			$filters['options_count'] = count($option_values);
			$filters['options'] = implode($options,',');
			$filters['option_value'] = implode($option_values, ',');
			$result['filter_attribute']['options'] = $options;
			$result['filter_attribute']['option_values'] = $option_values;
		}
		
		//print_r($filters);
		$myVar = new \App\Http\Controllers\Web\DataController();	
		$data = array('page_number'=>$page_number, 'type'=>$type, 'limit'=>$limit, 'categories_id'=>$categories_id, 'search'=>$search, 'filters'=>$filters, 'limit'=>$limit, 'min_price'=>$min_price, 'max_price'=>$max_price );	
		
		$products = $myVar->products($data);
		$result['products'] = $products;
		
		$data = array('limit'=>$limit, 'categories_id'=>$categories_id );
		$filters = $this->filters($data);
		$result['filters'] = $filters;
		
		$cart = '';
		$myVar = new \App\Http\Controllers\Web\CartController();
		$result['cartArray'] = $myVar->cartIdArray($cart);		
		
		if($limit > $result['products']['total_record']){		
			$result['limit'] = $result['products']['total_record'];
		}else{
			$result['limit'] = $limit;
		}

		//liked products
		//$result['liked_products'] = $this->likedProducts();		
		return view("admin.customerorder", $title)->with('result', $result)->with('cart_data',$cart_data);
	}
//filters
public function filters($data){
		
	$categories_id      =   $data['categories_id'];				
	$currentDate		=	time();		
			
	$price = DB::table('products_to_categories')
					->join('products', 'products.products_id', '=', 'products_to_categories.products_id');
					if(isset($categories_id) and !empty($categories_id)){
						$price->where('products_to_categories.categories_id','=', $categories_id);
					}
					
	$priceContent 	=	$price->max('products_price');			
	if(!empty($priceContent) and count($priceContent)>0){
		$maxPrice = round($priceContent+1);	
	}else{
		$maxPrice = '';
	}
	
	$product = DB::table('products_to_categories')
		->join('products', 'products.products_id', '=', 'products_to_categories.products_id')
		->leftJoin('products_description','products_description.products_id','=','products.products_id')
		->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
		->leftJoin('manufacturers_info','manufacturers.manufacturers_id','=','manufacturers_info.manufacturers_id')
		->LeftJoin('specials', function ($join) use ($currentDate) {  
			$join->on('specials.products_id', '=', 'products_to_categories.products_id')->where('status', '=', '1')->where('expires_date', '>', $currentDate);
		})
		
		->select('products_to_categories.*', 'products.*','products_description.*','manufacturers.*','manufacturers_info.manufacturers_url', 'specials.specials_new_products_price as discount_price')
		->where('products_description.language_id','=', Session::get('language_id'));
		
		if(isset($categories_id) and !empty($categories_id)){
			$product->where('products_to_categories.categories_id','=', $categories_id);
		}
		
	$products = $product->get();
	
	$index = 0;
	$optionsIdArray = array();
	$valueIdArray = array();
	foreach($products as $products_data){
		$option_name = DB::table('products_attributes')->where('products_id', '=', $products_data->products_id)->get();
		foreach($option_name as $option_data){
			
			if(!in_array($option_data->options_id, $optionsIdArray)){
				$optionsIdArray[] = $option_data->options_id;
			}
			
			if(!in_array($option_data->options_values_id, $valueIdArray)){
				$valueIdArray[] = $option_data->options_values_id;
			}
		}
	}
	
	if(!empty($optionsIdArray)){
		
		$index3 = 0;
		$result = array();
		foreach($optionsIdArray as $optionsIdArray){
			$option_name = DB::table('products_options')->where('language_id', Session::get('language_id'))->where('products_options_id', $optionsIdArray)->get();
			if(count($option_name)>0){
				$attribute_opt_val = DB::table('products_options_values_to_products_options')->where('products_options_id', $optionsIdArray)->get();			
				if(count($attribute_opt_val)>0){
				$temp = array();
				$temp_name['name'] = $option_name[0]->products_options_name;
				$attr[$index3]['option'] = $temp_name;
				
				foreach($attribute_opt_val as $attribute_opt_val_data){
				
					$attribute_value = DB::table('products_options_values')->where('products_options_values_id', $attribute_opt_val_data->products_options_values_id )->get();
					
					foreach($attribute_value as $attribute_value_data){
						
						if(in_array($attribute_value_data->products_options_values_id,$valueIdArray)){
							$temp_value['value'] = $attribute_value_data->products_options_values_name;
							$temp_value['value_id'] = $attribute_value_data->products_options_values_id;
							
							array_push($temp, $temp_value);
						}
					}
						$attr[$index3]['values'] = $temp;
				}
				$index3++;
				}
				$response = array('success'=>'1', 'attr_data'=>$attr, 'message'=> Lang::get('website.Returned all filters successfully'), 'maxPrice'=>$maxPrice);
			}
		
		}
		
	}else{
		$response = array('success'=>'0', 'attr_data'=>array(), 'message'=>Lang::get('website.Filter is empty for this category'), 'maxPrice'=>$maxPrice);
	}
	
	return($response);
	}

	//view order detail
	public function vieworder(Request $request,$id){
        $cart_data= PaymentsRepo::init()->cartContent();
		$title = array('pageTitle' => Lang::get("labels.ViewOrder"));
		$language_id             =   '1';
		$orders_id        	 	 =   $request->id;

		$message = array();
		$errorMessage = array();

		DB::table('orders')->where('orders_id', '=', $orders_id)->update(['is_seen' => 1 ]);

		$order = DB::table('orders')
				->LeftJoin('orders_status_history', 'orders_status_history.orders_id', '=', 'orders.orders_id')
				->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
				->where('orders.orders_id', '=', $orders_id)->orderby('orders_status_history.date_added', 'DESC')->get();

		//foreach
		foreach($order as $data){
			$orders_id	 = $data->orders_id;

			$orders_products = DB::table('orders_products')
				->join('products', 'products.products_id','=', 'orders_products.products_id')
				->select('orders_products.*', 'products.products_image as image')
				->where('orders_products.orders_id', '=', $orders_id)->get();
				$i = 0;
				$total_price  = 0;
				$total_tax	  = 0;
				$product = array();
				$subtotal = 0;
				foreach($orders_products as $orders_products_data){
					$product_attribute = DB::table('orders_products_attributes')
						->where([
							['orders_products_id', '=', $orders_products_data->orders_products_id],
							['orders_id', '=', $orders_products_data->orders_id],
						])
						->get();

					$orders_products_data->attribute = $product_attribute;
					$product[$i] = $orders_products_data;
					$total_price = $total_price+$orders_products[$i]->final_price;

					$subtotal += $orders_products[$i]->final_price;

					$i++;
				}
			$data->data = $product;
			$orders_data[] = $data;
		}

		$orders_status_history = DB::table('orders_status_history')
			->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
			->orderBy('orders_status_history.date_added', 'desc')
			->where('orders_id', '=', $orders_id)->get();

		$orders_status = DB::table('orders_status')->get();

		$ordersData['message'] 					=	$message;
		$ordersData['errorMessage']				=	$errorMessage;
		$ordersData['orders_data']		 	 	=	$orders_data;
		$ordersData['total_price']  			=	$total_price;
		$ordersData['orders_status']			=	$orders_status;
		$ordersData['orders_status_history']    =	$orders_status_history;
		$ordersData['subtotal']    				=	$subtotal;


		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$ordersData['currency'] = $myVar->getSetting();

		return view("admin.vieworder", $title)->with('data', $ordersData)->with('cart_data',$cart_data);
	}
	
	
	//update order
	public function updateOrder(Request $request){
		 $orders_status 		=	 $request->orders_status;
		 $comments 	 			=	 $request->comments;
		 $orders_id 			= 	 $request->orders_id;
		 $old_orders_status 	= 	 $request->old_orders_status;
		 $date_added			=    date('Y-m-d h:i:s');
		 
		 //get function from other controller
		 $myVar = new AdminSiteSettingController();
		 $setting = $myVar->getSetting();
		 
		 $status = DB::table('orders_status')->where('orders_status_id', '=', $orders_status)->get();
		
		
		 if($old_orders_status==$orders_status){
			 return redirect()->back()->with('error', Lang::get("labels.StatusChangeError"));
		 }else{
		 
		 //orders status history
		 $orders_history_id = DB::table('orders_status_history')->insertGetId(
			[	 'orders_id'  => $orders_id,
				 'orders_status_id' => $orders_status,
				 'date_added'  => $date_added,
				 'customer_notified' =>'1',
				 'comments'  =>  $comments
			]);
		
			if($orders_status=='2'){
				
				$orders_products = DB::table('orders_products')->where('orders_id', '=', $orders_id)->get();
				
				foreach($orders_products as $products_data){
					DB::table('products')->where('products_id', $products_data->products_id)->update([
						'products_quantity' => DB::raw('products_quantity - "'.$products_data->products_quantity.'"'),
						'products_ordered'  => DB::raw('products_ordered + 1')
						]);
				}
			}
		
		$orders = DB::table('orders')->where('orders_id', '=', $orders_id)->get();
		
		$data = array();
		$data['customers_id'] = $orders[0]->customers_id;
		$data['orders_id'] = $orders_id;
		$data['status'] = $status[0]->orders_status_name;
		
		//notify user		
		$myVar = new AdminAlertController();
		$myVar->orderStatusChange($data);
						
		return redirect()->back()->with('message', Lang::get("labels.OrderStatusChangedMessage"));
		
		}
		
	}
	
	//deleteorders
	public function deleteOrder(Request $request){
		DB::table('orders')->where('orders_id', $request->orders_id)->delete();
		DB::table('orders_products')->where('orders_id', $request->orders_id)->delete();
		return redirect()->back()->withErrors([Lang::get("labels.OrderDeletedMessage")]);
	}
	
}
