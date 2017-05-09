<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Color;
use App\Madein;
use App\Material;
use App\Sale;
use App\Size;
use App\Type;
use App\cate;
use Auth;// them cai nay moi su dung duoc Auth::user()->id 
//use Illuminate\Http\Request;
use Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Product_image;
use Input,File;
class ProductController extends Controller {

	//
	public function getList()
	{
		$data = Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('data'));
	}
	public function getAdd()
	{
        $data['cate'] = cate::select('name','id','parent_id')->get()->toArray();
        $data['brand'] = Brand::all();
        $data['madein'] = Madein::all();
        $data['color'] = Color::all();
        $data['material'] = Material::all();
        $data['size'] = Size::all();
        $data['type'] = Type::all();
        $data['sale'] = Sale::all();
        return view('admin.product.add',$data);
	}
	public function postAdd(ProductRequest $product_request)
	{
		$img_name = $product_request->file('fImages')->getClientOriginalName();
		$product = new Product();
		$product->name = $product_request->txtName;
		$product->alias = changeTitle($product_request->txtName);
		$product->price = $product_request->txtPrice;
		$product->intro = $product_request->txtIntro;
		$product->content = $product_request->txtContent;
		$product->image = $img_name;
		$product->keywords = $product_request->txtKeywords;
		$product->description = $product_request->txtDescription;
        $product->brand_id = $product_request->sltBrand;
        $product->made_id = $product_request->sltMadein;
        $product->color_id = $product_request->sltColor;
        $product->mate_id = $product_request->sltMaterial;
        $product->size_id = $product_request->sltSize;
        $product->sale_id = $product_request->sltSale;
        $product->type_id = $product_request->sltType;
		$product->user_id = Auth::user()->id;
		$product->cate_id = $product_request->sltParent;
		$product_request->file('fImages')->move('resources/upload/',$img_name);
		$product->save();
		$product_id = $product->id;
		//upload cac anh kem theo vào
		if(Input::hasFile('fProductDetail'))
		{
			foreach(Input::file('fProductDetail') as $file)
			{
				$product_img = new Product_image();
				if(isset($file))
				{
					$product_img->image = $file ->getClientOriginalName();
					$product_img->product_id = $product_id; 
					$file->move('resources/upload/detail/',$file ->getClientOriginalName());
					$product_img->save();
				}
			}
		}
		return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message' => 'success !! complete add product']);
	}
     public function getDelete($id)
	 {
		 $product_detail = Product::find($id)->pimage->toArray();
		 foreach($product_detail as $value)
		 {
			 File::delete('resources/upload/detail/',$value["image"]);
		 }
		 $product = Product::find($id);
		 File::delete('resources/upload/',$product->image);//xoa hinh
		 $product->delete($id);//xoa du lieu trong bang
		 return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message' => 'success !! complete delete product']);
	 }
	public function getEdit($id)
	{
		$data['cate'] = cate::select('id','name','parent_id')->get()->toArray();
        $data['brand'] = Brand::all();
        $data['madein'] = Madein::all();
        $data['color'] = Color::all();
        $data['mate'] = Material::all();
        $data['size'] = Size::all();
        $data['type'] = Type::all();
        $data['sale'] = Sale::all();
		$data['product'] = Product::find($id)->toArray();
		$data['product_image'] = Product::find($id)->pimage;//lay nhung anh thuoc san pham co id
		return view('admin.product.edit',$data);
	}
	public function postEdit($id , Request $request)
	{
		$product = Product::find($id);
		$product->name = Request::input('txtName');
		$product->alias = changeTitle(Request::input('txtName'));
		$product->price = Request::input('txtPrice');
		$product->intro = Request::input('txtIntro');
		$product->content = Request::input('txtContent');
		$product->keywords = Request::input('txtKeywords');
		$product->description =Request::input('description') ;
        $product->brand_id = Request::input('sltBrand');
        $product->made_id = Request::input('sltMadein');
        $product->color_id = Request::input('sltColor');
        $product->mate_id = Request::input('sltMaterial');
        $product->size_id = Request::input('sltSize');
        $product->sale_id = Request::input('sltSale');
        $product->type_id = Request::input('sltType');
		$product->user_id = Auth::user()->id; //Auth::user()->username la id nguoi dung khi dang nhap
		$product->cate_id = Request::input('sltParent');
		$img_current = 'resources/upload/'.Request::input('img_current');
		if(!empty(Request::file('fImages')))
		{
			$file_name = Request::file('fImages')->getClientOriginalName();
			$product->image = $file_name; //cap nhat trong db
			Request::file('fImages')->move('resources/upload/',$file_name);//cho vao trong thu muc
			if(File::exists($img_current))//xoa hinh cu
			{
				File::delete($img_current);
			}
		}
		else
		{
			echo "Ko co file";
		}
		$product->save();
		//them anh kem theo
		if(!empty(Request::file('fEditDetail')))
		{
			foreach(Request::file('fEditDetail') as $file)
			{
				$product_img = new Product_image();
				if(isset($file))
				{
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $id;
					$file->move('resources/upload/detail/',$file->getClientOriginalName());
					$product_img->save();
				}
			}
			
		}
		return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_message' => 'success !! complete update product']);
		
	}
	public function getDelImg($id)
	{
		if(Request::ajax())
		{
			$idHinh = (int)Request::get('idHinh');
			$image_detail = Product_image::find($idHinh);
			if(!empty($image_detail))
			{
				$img = 'resources/upload/detail/'.$image_detail->image;
				if(File::exists($img)) // tồn tại hình trong thư mục thì xóa
				{
					File::delete($img);
				}
				$image_detail->delete(); // xóa hình trong db
			}
			return "OK";
			
		}
	}
        

}
