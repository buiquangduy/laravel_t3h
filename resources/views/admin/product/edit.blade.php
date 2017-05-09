@extends('admin.master')
@section('controller','Product')
@section('action','Edit')
@section('content')
<style>
	.img-current{
			width:150px;
	}
	.img_detail{
			width:200px;
			margin-bottom:20px;
			margin-top:10px;
	}
	.icon_del{
			position:relative;
			top: -55px;
			left:-20px ;
			background:red;
		}
	#insert{
		margin-top:20px;		
	}
</style>
 <!-- /.col-lg-12 -->
 	<button class="btn btn-primary" id="addImages">Add Images </button>
   <form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
                    <div class="col-lg-7" style="padding-bottom:120px">
                      
                      	@include('admin.blocks.error')
                        <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
                        	<div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="sltParent">
                                    <option value="0">Please Choose Category</option>
                                  	   <?php cate_parent($cate , 0 ,"---",$product['cate_id']); ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control" name="sltBrand">
                                    <option value="">Please Choose brand</option>
                                    @foreach($brand as $item_brand)
                                        @if($product['brand_id'] == $item_brand['brand_id'])
                                            <option value="{!!$item_brand->brand_id!!}" selected="selected">{!!$item_brand->brand_name!!}</option>
                                        @else
                                            <option value="{!!$item_brand->brand_id!!}">{!!$item_brand->brand_name!!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Made In</label>
                                <select class="form-control" name="sltMadein">
                                    <option value="">Please Choose made in</option>
                                    @foreach($madein as $item_made)
                                        @if($product['made_id'] == $item_made['made_id'])
                                            <option value="{!!$item_made->made_id!!}" selected="selected">{!!$item_made->country!!}</option>
                                        @else
                                            <option value="{!!$item_made->made_id!!}">{!!$item_made->country!!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Coloer</label>
                                <select class="form-control" name="sltColor">
                                    <option value="">Please Choose color</option>
                                    @foreach($color as $item_color)
                                        @if($product['color_id'] == $item_color['color_id'])
                                            <option value="{!!$item_color->color_id!!}" selected="selected">{!!$item_color->color_name!!}</option>
                                        @else
                                            <option value="{!!$item_color->color_id!!}">{!!$item_color->color_name!!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Material</label>
                                <select class="form-control" name="sltMaterial">
                                    <option value="">Please Choose Material</option>
                                    @foreach($mate as $item_mate)
                                        @if($product['mate_id'] == $item_mate['mate_id'])
                                            <option value="{!!$item_mate->mate_id!!}" selected="selected">{!!$item_mate->mate_name!!}</option>
                                        @else
                                            <option value="{!!$item_mate->mate_id!!}">{!!$item_mate->mate_name!!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <select class="form-control" name="sltSize">
                                    <option value="">Please Choose Size</option>
                                    @foreach($size as $item_size)
                                        @if($product['size_id'] == $item_size['size_id'])
                                            <option value="{!!$item_size->size_id!!}" selected="selected">{!!$item_size->size_name!!}</option>
                                        @else
                                            <option value="{!!$item_size->size_id!!}">{!!$item_size->size_name!!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sale</label>
                                <select class="form-control" name="sltSale">
                                    @foreach($sale as $item_sale)
                                        @if($product['sale_id'] == $item_sale['sale_id'])
                                            <option value="{!!$item_sale->sale_id!!}" selected="selected">{!!$item_sale->sale_event!!}</option>
                                        @else
                                            <option value="{!!$item_sale->sale_id!!}">{!!$item_sale->sale_event!!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="sltType">
                                    <option value="">Please Choose type</option>
                                    @foreach($type as $item_type)
                                        @if($product['type_id'] == $item_type['type_id'])
                                            <option value="{!!$item_type->type_id!!}" selected="selected">{!!$item_type->type_name!!}</option>
                                        @else
                                            <option value="{!!$item_type->type_id!!}">{!!$item_type->type_name!!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!!old('txtName',isset($product)?$product['name'] : null)!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!!old('txtPrice',isset($product)?$product['price'] : null)!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">
                                {!!old('txtIntro',isset($product)?$product['intro'] : null)!!}
                                </textarea>
                                <script type="text/javascript">ckeditor('txtIntro')</script>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">
                                 {!!old('txtContent',isset($product)?$product['content'] : null)!!}
                                </textarea>
                                 <script type="text/javascript">ckeditor('txtContent')</script>
                            </div>
                            <div class="form-group">
                                <label>Images Current</label>
                                <img src="{!!asset('resources/upload/'.$product['image'])!!}" class="img-current" />
                               <input type="hidden" name = "img_current" value="{!! $product['image'] !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                             
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" placeholder="Please Enter product Keywords" value="{!!old('txtKeywords',isset($product)?$product['keywords'] : null)!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="description">
                                {!!old('description',isset($product)?$product['description'] : null)!!}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                      
                    </div>
                    <div class="col-md-1">   </div>
                    <div class="col-md-4"> 
                    	@foreach($product_image as $key => $item)
                            <div class="form-group" id="{!! $key !!}">
                  <img src="{!!asset('resources/upload/detail/'.$item['image'])!!}" class="img_detail" idHinh="{!! $item['id'] !!}"
                  id="{!! $key !!}" />
                             
                         	<a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del">
                            	<i class="fa fa-times"></i>
                            </a>   
                           </div>
                         @endforeach
                         <div id="insert"></div>
                     </div>
                    
                     
                    	
                 
                    
   <form>
  
                         
@endsection