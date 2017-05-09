@extends('admin.master')
@section('controller','Product')
@section('action','Add')
@section('content')
  			<form action="{!! url('/admin/product/add')!!}" method="POST" enctype="multipart/form-data">          
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @include('admin.blocks.error')
                        <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
                        	<div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="sltParent">
                                    <option value="">Please Choose Category</option>
                                    <?php cate_parent($cate , 0 ,"---",old('sltParent')); ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control" name="sltBrand">
                                    <option value="">Please Choose brand</option>
                                    @if(count($brand)>0)
                                        @foreach($brand as $item_brand)
                                            <option value="{!!$item_brand->brand_id!!}">{!!$item_brand->brand_name!!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Made In</label>
                                <select class="form-control" name="sltMadein">
                                    <option value="">Please Choose Made In</option>
                                    @if(count($madein)>0)
                                        @foreach($madein as $item_madein)
                                            <option value="{!!$item_madein->made_id!!}">{!!$item_madein->country!!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Color</label>
                                <select class="form-control" name="sltColor">
                                    <option value="">Please Choose Color</option>
                                    @if(count($color)>0)
                                        @foreach($color as $item_color)
                                            <option value="{!!$item_color->color_id!!}">{!!$item_color->color_name!!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Material</label>
                                <select class="form-control" name="sltMaterial">
                                    <option value="">Please Choose Material</option>
                                    @if(count($material)>0)
                                        @foreach($material as $item_mate)
                                            <option value="{!!$item_mate->mate_id!!}">{!!$item_mate->mate_name!!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <select class="form-control" name="sltSize">
                                    <option value="">Please Choose Size</option>
                                    @if(count($size)>0)
                                        @foreach($size as $item_size)
                                            <option value="{!!$item_size->size_id!!}">{!!$item_size->size_name!!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sale</label>
                                <select class="form-control" name="sltSale">
                                    @if(count($sale)>0)
                                        @foreach($sale as $item_sale)
                                            <option value="{!!$item_sale->sale_id!!}">{!!$item_sale->sale_event!!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="sltType">
                                    <option value="">Please Choose Type</option>
                                    @if(count($type)>0)
                                        @foreach($type as $item_type)
                                            <option value="{!!$item_type->type_id!!}">{!!$item_type->type_name!!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!!old('txtName')!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!!old('txtPrice')!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">
                                {!! old('txtIntro') !!}
                                </textarea>
                                <script type="text/javascript"> ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">
                                   {!! old('txtContent') !!}
                                </textarea>
                                <script type="text/javascript"> ckeditor("txtContent")</script>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages" value ="{!!old('fImages') !!}" >  
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value ="{!!old('txtKeywords') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="txtDescription">
                            		{!!old('txtDescription') !!}    
                                </textarea>
                            </div>
                         <!--   <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>
                            </div>-->
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                     
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-4">
                    	@for($i=1;$i<=10;$i++)
                    	<div class="form-group">
                        	<label>Image Product Detail {!! $i!!}</label>
                            <input type ="file" name = "fProductDetail[]"  />
                        </div>
                        @endfor
                    </div>
                  <form>     

@endsection