@if ($message = Session::get('success'))

<<x-adminlte-alert theme="success" title="Success" dismissable>
    <strong>{{ $message }}</strong>!
</x-adminlte-alert>

@endif



@if ($message = Session::get('error'))

<x-adminlte-alert theme="danger" title="Error" dismissable>
    <strong>{{ $message }}</strong>!
</x-adminlte-alert>

@endif



@if ($message = Session::get('warning'))

<x-adminlte-alert theme="warning" title="Warning" dismissable>
    <strong>{{ $message }}</strong>!
</x-adminlte-alert>

@endif



@if ($message = Session::get('info'))
<x-adminlte-alert theme="info" title="Success" dismissable>
    <strong>{{ $message }}</strong>
</x-adminlte-alert>

@endif
