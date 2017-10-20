{{-- <div id="popup" class='modal'> --}}
<div id="popup" class='modal' hidden>
  <div class="modal-layout small">
      <div>Naam: <b id="first_name"></b></div>
      <div>Achternaam: <b id="last_name"></b></div>
      <div>Adres: <b id="address"></b></div>
      <div>Huisnummer: <b id="address_number"></b></div>
      <div>Stad: <b id="city"></b></div>
      <div>Omschrijving: <b id="description"></b></div>
      {{ Form::open(['url' => '/dossier/remove', 'method' => 'post', 'id' => 'removepatiendossier', 'class' => 'form-layout vertical'])}}
      <div class="group">
        {{ Form::input('text', 'user_id', null, ['id' => 'removepatiendossier', 'class' => 'hidden']) }}
        {{ Form::submit('Ontslaan', ['class' => 'btn warning']) }}
      </div>
      {{ Form::close()}}
  </div>
</div>
