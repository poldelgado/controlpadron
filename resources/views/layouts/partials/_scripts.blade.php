<script type="text/javascript">
    window.baseURL = "{{env('APP_URL') ?? ''}}";
</script>
<script src="{{asset(mix('js/app.js'))}}"></script>
@yield('scripts')
