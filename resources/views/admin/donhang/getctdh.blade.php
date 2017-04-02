       <table border="1" bgcolor="#ddd" width="100%">
                      <thead>
                        <tr align="center"><b>
                        	<th>STT</th>
                          <th>Sản phẩm</th>
                          <th>Giá</th>
                          <th>Số lượng</th>
                          </b>
                        </tr>
                      </thead>
                        @foreach($ctdh as $key=>$ct )
                         <tr>
                           <td>{{$key}}</td>
                          <td>{{$ct->id_SanPham}}</td>
                          <td>{{$ct->Gia}}</td>
                          <td>{{$ct->SoLuong}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>