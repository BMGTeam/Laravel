<html>
    <head>
        <title>Laravel and Jcrop</title>
        <meta charset="utf-8">
        	 <base href = "{{asset('')}}">
        <link rel="stylesheet" href="css/jquery.Jcrop.min.css" />
        <script src="admin_asset/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="admin_asset/assets/global/scripts/jquery.Jcrop.min.js" type="text/javascript"></script>
    </head>
    <body>
        <img src="img/sanpham/anh/{{$image}}" id="cropimage" >
        <form method="post" action="admin/sanpham/jcrop"  enctype="multipart/form-data"> 
          <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <input type= "hidden" name="image" id="image" value="{{$image}}"/>
         <input type= "hidden" id="x"  name = "x"/>
          <input type= "hidden" id="y" name = "x"/>
           <input type= "hidden" id="w" name = "x"/>
           <input type="submit" value="crop"/>
        </form>

        <script type="text/javascript">
            $(function() {
                $('#cropimage').Jcrop({
                    onSelect: updateCoords
                });
            });
            function updateCoords(c) {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            };
        </script>
</body>