<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>BM Shop admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for calendar page" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
         <base href = "{{asset('')}}">
         <link rel="icon" type="image/png" href="img/icon/icon2.png" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
      
        <link href="{{asset('admin_asset/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_asset/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_asset/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_asset/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        {{-- thư viện cho up file --}}
         <link href="admin_asset/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" /> 
         
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('admin_asset/assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('admin_asset/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('admin_asset/assets/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_asset/assets/layouts/layout4/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="{{asset('admin_asset/assets/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="admin_asset/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
       

         <link href="{{asset('admin_asset/assets/layouts/layout4/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />

          <link href="{{asset('admin_asset/assets/global/plugins/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet" type="text/css" />
        

       <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('admin_asset/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />


        <link href="{{asset('admin_asset/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('admin_asset/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="admin_asset/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="admin_asset/assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
          <link href="admin_asset/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="admin_asset/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="admin_asset/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
         <!-- END PAGE LEVEL PLUGINS -->
       
        <link rel="shortcut icon" href="favicon.ico" /> 
        {{-- <link  rel="stylesheet"  href="admin_asset/assets/global/css/jquery.Jcrop.min.css"  type="text/css"> --}}
        <link  rel="stylesheet"  href="admin_asset/assets/global/css/mystyle.css"  type="text/css">
        <script src="admin_asset/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="admin_asset/assets/global/scripts/jquery.Jcrop.min.js" type="text/javascript"></script>
            {{-- @yield('scripthead'); --}}

        </head>