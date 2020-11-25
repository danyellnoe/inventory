<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@includeIf($currentViewJs)
@yield("scripts")
