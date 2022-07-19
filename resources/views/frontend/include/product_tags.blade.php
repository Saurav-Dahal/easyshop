    @php
        $productTags = App\Models\Product::groupBy('product_tags')->select('product_tags')->limit(10)->get();
        
    @endphp

        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Product tags</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list">
                    @foreach($productTags as $product)
                    <a class="item active" title="Phone" href="{{url('/product/tag/'.$product->product_tags)}}">{{str_replace(',',' ',$product->product_tags) }}</a>
                    @endforeach
                </div>
              <!-- /.tag-list --> 
            </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 