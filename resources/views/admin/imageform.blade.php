	<form   action="imageform" method ="post" enctype="multipart/form-data" >
		<div class="form-group" id="imageform" style="margin: 0 40%; ">
                   <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>   
                          {{--   <a href="img/cat.jpg" class="fancybox-button" data-rel="fancybox-button"> <img src="img/cat.jpg" id="img" alt="Chưa có hình" /></a>   --}}
{{-- 
                            <div class="fileinput-preview fileinput-exists thumbnail" id='crop' style="width: 300px; height:auto;">
                             </div> --}}
                    
                                <span class="btn default btn-file">
                                  {{--   <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists" > Thay đổi </span> --}}

                                    <input type="file" name="image" id="image"> </span>
                  
                                {{-- <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa</a> --}}
                                <input type="submit" class="btn default  fileinput-exists" name="submit" id="submit" value="Thêm"> </span>
                            </div>
                        </div>
</form>