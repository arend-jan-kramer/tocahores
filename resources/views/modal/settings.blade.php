@if(!empty($emails))
<div id="settings" class='modal' hidden>
  <div class="modal-layout small">
    {{ Form::open(['url' => '/user/new', 'method' => 'post', 'class' => 'form-layout vertical']) }}
    <div class="group {{ $errors->has('email') ? 'error' : ''}}">
      <label>Toevoegen</label>
      {{ Form::input('text', 'create_email', null, ["placeholder" => "naam@ziekenhuis-rotterdam.nl", 'autofocus' => true]) }}
      {{-- {{ Form::submit("send") }} --}}
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
