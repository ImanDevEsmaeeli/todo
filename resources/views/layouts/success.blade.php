@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @php
        Session::forget('success');
    @endphp
@endif
