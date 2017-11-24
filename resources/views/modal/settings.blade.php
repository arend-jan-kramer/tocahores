@if(!empty($emails))
<div id="settings" class='modal' hidden>
  <div class="modal-layout small">
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    {{ Form::open(['url' => '/user/new', 'method' => 'post', 'class' => 'form-layout vertical']) }}
    <div class="group {{ $errors->has('email') ? 'error' : ''}}">
      <label>Toevoegen</label>
      {{ Form::input('text', 'create_email', null, ["placeholder" => "naam", 'autofocus' => true, "autocomplete" => "off"]) }}
      {{-- {{ Form::submit("send") }} --}}
      @if($errors->get('create_email'))<b class="warning" style="padding-top:10px; float:left;">Het email adres met deze naam bestaat al</b>@endif
      {{ Form::submit("send", ["class" => 'hidden']) }}
    </div>
    {{ Form::close() }}

    {{ Form::open(['url' => '/user/delete', 'method' => 'post', 'class' => 'form-layout vertical']) }}
    <div class="group">
      <label>Verwijderen</label>
      {{ Form::select('delete_email', $emails, null) }}
      {{ Form::submit("Verwijderen", ['class' => 'btn btn-warning']) }}
      {{-- {{ Form::submit("send", ["class" => 'hidden']) }} --}}
    </div>
    {{ Form::close() }}
  </div>
</div>
@endif
