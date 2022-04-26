<script src="{{ asset( mix('js/app.js')) }}"></script>

{!! NoCaptcha::renderJs() !!}

@stack('page-scripts')
