<script src="{{ asset( mix('vendors/js/font-awesome-6/all.min.js')) }}"></script>

<script src="{{ asset( mix('js/app.js')) }}"></script>

{!! NoCaptcha::renderJs() !!}

@stack('page-scripts')
