   <head>
     <meta charset="utf-8">
     <title></title>

      <script src="admin_asset/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="admin_asset/assets/global/scripts/jquery.validate.js"></script>
   </head>
   <body>
      <form role="form" action="admin/user/editprofile" method="POST" id="form_profile">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                                    <div class="form-group">
                                        <label class="control-label">Full Name</label>
                                        <input type="text" placeholder="Hồ Thị Mỹ Thương" name="fullname"  id="fullname"class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại</label>
                                        <input type="text" name='sdt' placeholder="016xxx" class="form-control" /></div>
                                    <div class="form-group">
                                        <label class="control-label">Chức vụ </label>
                                        <input type="text" name='chucvu' placeholder="Design, Web etc." class="form-control" /></div>
                                    <div class="form-group">
                                        <label class="control-label">Chi tiết</label>
                                        <textarea class="form-control" rows="3" name='chitiet' placeholder="sở thích, mô tả..."></textarea>
                                    </div>
                              
                                    <div class="margiv-top-10">
                                        <input type = 'submit' class="btn green" value='Thay đổi' />
                                       
                                    </div>
                                </form>
            <script >
            
   $(document).ready(function(){
    $('#form_profile').validate({
        rules: {
          fullname: {
              required: true,
              maxlength: 100,
              minlength: 2
          }
        },
        message: {
          fullname: {
            required: "Bạn phải nhập tên đầy đủ",
            maxlength: "Tên khogn6 quá 100 kí tự",
            minlength: "Tên ít nhất 4 kí tự",
          }
        }
      })
   });


</script>
   </body>
   