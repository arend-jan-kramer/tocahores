{{-- <div id="popup" class='modal'> --}}
<div id="popup" class='modal' hidden>
  <div class="modal-layout small">
      <div class="header"><b id="first_name"></b> <b id="last_name"></b> Ontslaan</div>

      {{-- <div>Adres: <b id="address"></b></div>
      <div>Huisnummer: <b id="address_number"></b></div>
      <div>Stad: <b id="city"></b></div>
      <div>Omschrijving: <b id="description"></b></div> --}}
      {{ Form::open(['url' => '/dossier/remove', 'method' => 'post', 'id' => 'removepatiendossier', 'class' => 'form-layout vertical'])}}
      <div class="group">
        {{ Form::input('text', 'user_id', null, ['id' => 'removepatiendossier', 'class' => 'hidden', 'autofocus' => true]) }}
        {{ Form::submit('Ja', ['class' => 'btn btn-warning']) }}
      </div>
      <div class="group">
        {{ Html::link('/1', 'Nee', ['class' => 'btn btn-cancel']) }}
      </div>
      {{ Form::close()}}
  </div>
</div>
