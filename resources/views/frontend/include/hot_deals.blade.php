
<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            @foreach($hotDeals as $product)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> 
                    <img src="{{url($product->product_thumbnail)}}" alt=""> 
                  </div>
                  
                  @php
                    $discount = (($product->selling_price - $product->discount_price)/$product->selling_price)*100;
                  @endphp

                  @if($product->discount_price == NULL || $product->discount_price == $product->selling_price)
                    <div class="sale-offer-tag"><span>Hot<br>Deal</span></div>
                    @else
                    <div class="sale-offer-tag"><span>{{round($discount)}}%<br>off</span></div>
                  @endif

                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> 
                    <span class="price"> ${{$product->discount_price == NULL || $product->discount_price == $product->selling_price ? $product->selling_price : $product->discount_price}} </span> 
                    <span class="price-before-discount">{{$product->discount_price == NULL || $product->discount_price == $product->selling_price ? ' ' : '$'.$product->selling_price}} </span> 
                  </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
            @endforeach
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== --> 