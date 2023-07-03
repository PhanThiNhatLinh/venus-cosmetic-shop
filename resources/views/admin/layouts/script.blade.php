<!-- jQuery -->
<script src="{{asset('/admin/js/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/admin/asset/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/admin/js/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('/admin/asset/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('/admin/asset/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('/admin/asset/iCheck/icheck.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('/admin/js/custom.min.js')}}"></script>
<!-- My sj file -->
<script src="{{asset('/admin/js/linh-js.js')}}"></script>
<!-- ckeditor Scripts -->
<script src="{{asset('/admin/js/ckeditor/ckeditor.js')}}"></script>
<script> 
    CKEDITOR.replace( 'ckeditor', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>