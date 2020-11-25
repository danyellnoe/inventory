{{-- generate by Mix from resources/css/app.css --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{-- automatically includes partials/_css_{viewname}.blade.php if it exists --}}
{{-- see _makeViewNamesAvailableGlobally() in AppServiceProvider for detail --}}
@includeIf($currentViewCss)
