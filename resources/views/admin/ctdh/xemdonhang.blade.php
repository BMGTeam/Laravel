  @foreach($ctdh as $value)  
                      <div class="portlet-body">
                          <div class="alert alert-block alert-info fade in">                  
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                       <div class = 'col-md-8' style="padding: 0; margin:0;"> 
                     <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" onclick="xemchitiet({{$value->id_donhang}},{{$value->id_SanPham}})"> chi tiết <span class="fa fa-angle-right"></span> </div>
                       <div class = 'key' style = "color: black">
                         <span style =" color: blue; font-size: 15px"><b>Số đơn hàng: {{$value->id_donhang}}</b></span> <br>
                     <span style =" color: green; font-size: 17px">sản phẩm: <?php $tensanpham = App\sanpham::find($value->id_SanPham);
                      echo $tensanpham->TenSanPham; ?> <br> </span>
                     
                      Giá : {{$value->Gia}}<br>
                       Số Lượng : {{$value->SoLuong}}<br>
                      
                         </div>
                         </div>
             
                         </div>
                    </div>
                                    </div>
                    
                            </div>
                    @endforeach

                    {{-- end nội dung 1 --}}
              {!! $ctdh-> links()!!}