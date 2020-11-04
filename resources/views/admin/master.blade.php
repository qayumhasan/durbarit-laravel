<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="assets/images/favicon.png" >
		<!--Page title-->
		<title>Admin DIT</title>
		<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
		<!--font awesome-->
		<link rel="stylesheet" href="{{asset('public/assets/css/all.css')}}">
		<link href="{{asset('public/assets/plugins/icheck/skins/all.css')}}" rel="stylesheet">
		<!-- metis menu -->
		<link rel="stylesheet" href="{{asset('public/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
   		<link rel="stylesheet" href="{{asset('public/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
        <!-- chart -->
        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
		<!-- donut-chart -->
   		<link rel="stylesheet" href="{{asset('public/assets/plugins/donut-chart/dist/style.css')}}">
		<!--Custom CSS-->
		<!-- datatable -->
		<link href="{{asset('public')}}/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css">
		<!-- enddatatable -->
		<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

		<link rel="stylesheet" href="{{asset('public')}}/assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	<body id="page-top">
		<!-- preloader -->
		<!-- <div class="preloader">
			<img src="{{asset('public/assets/images/preloader.gif')}}" alt="">
		</div> -->
		<!-- wrapper -->
		<div class="wrapper" id="app">
        @include('admin.include.header_top')
		@include('admin.include.menu')

            <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<div class="middle_content_wrapper">
					<!-- counter_area -->


                    @yield('contents')


					<!--
						<div class="panel">
							<div class="panel_header">
								<div class="panel_title">
								<span class="panel_icon">icon1</span>
								<span>title</span>
							</div>
							</div>
							<div class="panel_body">

							</div>
						</div>
					-->


				</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->

			@include('admin.include.footer')
		</div><!--/ wrapper -->

		<!-- jquery -->
		<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>

		<script src="{{asset('public/js/app.js')}}"></script>
		<script src="{{asset('public')}}/assets/plugins/datatables/dataTables.min.js"></script>
	  <script src="{{asset('public')}}/assets/plugins/datatables/dataTables-active.js"></script>
		<!-- popper Min Js -->
		<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
		<!-- Bootstrap Min Js -->
		<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
		<!-- Fontawesome-->
		<script src="{{asset('public/assets/js/all.min.js')}}"></script>
		<!-- metis menu -->
		<script src="{{asset('public/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
        <script src="{{asset('public/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
		<!-- nice scroll bar -->
		<script src="{{asset('public/assets/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
		<script src="{{asset('public/assets/plugins/scrollbar/scroll.active.js')}}"></script>
		<!-- counter -->
		<script src="{{asset('public/assets/plugins/counter/js/counter.js')}}"></script>
		<!-- chart -->
		<script src="{{asset('public/assets/plugins/chartjs-bar-chart/Chart.min.js')}}"></script>
		<script src="{{asset('public/assets/plugins/chartjs-bar-chart/chart.js')}}"></script>
		<script src="{{asset('public/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('public/assets/plugins/ckeditor/ckeditor-active.js')}}"></script>
		<!-- pie chart -->
		<!-- <script src="assets/plugins/pie_chart/chart.loader.js"></script> -->
		<!-- <script src="assets/plugins/pie_chart/pie.active.js"></script> -->
		<script src="{{asset('public/assets/plugins/spartan-multi-images/dist/js/spartan-multi-image-picker.js')}}"></script>
		<!-- basic-donut-chart -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
		<script  src="{{asset('public/assets/plugins/basic-donut-chart/dist/script.js')}}"></script>
		<link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  	<!-- <script  src="assets/plugins/donut-chart/dist/script.js"></script> -->
		<!-- Main js -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
		<script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
  <script>

        @if (Session:: has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>
		<script>
		$(document).on("click", "#delete", function(e) {
				e.preventDefault();
				var link = $(this).attr("href");
				swal({
								title: "Are you Want to delete?",
								text: "Once Delete, This will be Permanently Delete!",
								icon: "warning",
								buttons: true,
								dangerMode: true,
						})
						.then((willDelete) => {
								if (willDelete) {
										window.location.href = link;
								} else {
										swal("Safe Data!");
								}
						});
		});
</script>
<script>
        $(function() {

            $("#coba").spartanMultiImagePicker({
                fieldName: 'fileUpload[]',
                directUpload: {
                    status: true,
                    loaderIcon: '<i class="fas fa-sync fa-spin"></i>',
                    url: '../c.php',
                    additionalParam: {
                        name: 'My Name'
                    },
                    success: function(data, textStatus, jqXHR) {},
                    error: function(jqXHR, textStatus, errorThrown) {}
                }
            });
        });

        $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');

        $("#photos").spartanMultiImagePicker({
            fieldName: 'photos[]',
            maxCount: 10,
            rowHeight: '200px',
            groupClassName: 'col-lg-3 col-md-4 col-sm-4 col-xs-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });


        var i = 0;


        $(document).ready(function() {
            $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
            $("#thumbnail_img").spartanMultiImagePicker({
                fieldName: 'thumbnail_img',
                maxCount: 1,
                rowHeight: '200px',
                groupClassName: 'col-lg-3 col-md-4 col-sm-4 col-xs-6',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function(index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function(index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big');
                }
            });

            $("#t_img").spartanMultiImagePicker({
                fieldName: 't_img',
                maxCount: 1,
                rowHeight: '200px',
                groupClassName: 'col-xl-2 col-lg-3 col-md-4 col-sm-4 col-xs-6',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function(index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function(index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big');
                }
            });
        });
    </script>

<script src="{{asset('public')}}/assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>


	</body>
</html>
