@extends('user.master')
@section('description','Đây là trang chủ')
@section('author','Bùi Quang Duy')
@section('content')

<section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
      @foreach($product as $item)
        <li class="span3">
          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias])!!}">{!!$item->name!!}<span class="view">({!!$item->view!!} Lượt xem)</span></a>
          <div class="thumbnail">
            @if($item->discount > 0)
              <span class="sale tooltip-test">Sale</span>
            @endif
            <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias])!!}"><img class="haha" alt="" src="{!!asset('resources/upload/'.$item->image)!!}" width="100%" height="100%"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{!!number_format($item->price*(100 - $item->discount)/100,0,",",".")!!}</div>
                @if($item->discount > 0)
                  <div class="priceold">{!!number_format($item->price,0,",",".")!!}</div>
                @endif
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  
  <!-- Latest Product-->
  <section id="latest" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
      <ul class="thumbnails">
      @foreach($product_lastest as $item_2)
        <li class="span3">
          <a class="prdocutname" href="product.html">{!!$item_2->name!!}<span class="view">({!!$item_2->view!!} Lượt xem)</span></a>
          <div class="thumbnail">
            @if($item->discount > 0)
              <span class="sale tooltip-test">Sale</span>
            @endif
            <a href="{!! url('chi-tiet-san-pham',[$item_2->id,$item_2->alias])!!}"><img class="haha" alt="" src="{!!asset('resources/upload/'.$item_2->image)!!}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! url('mua-hang',[$item_2->id,$item_2->alias]) !!}" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{!!number_format($item_2->price*(100 - $item_2->discount)/100,0,",",".")!!}</div>
                @if($item->discount > 0)
                  <div class="priceold">{!!number_format($item_2->price,0,",",".")!!}</div>
                @endif
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
 @endsection