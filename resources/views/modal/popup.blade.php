{{-- <div id="popup" class='modal'> --}}
<div id="popup" class='modal' hidden>
  <div class="modal-layout">
      <div class="header">Patiënt: <b id="first_name"></b></div>
      <div class="content">
        <div class="group"><label for="">Naam:</label><b id="first_name"></b></div>
        <div class="group"><label for="">Tussenvoegsel:</label><b id="insection"></b></div>
        <div class="group"><label for="">Achternaam:</label><b id="last_name"></b></div>
        <div class="group"><label for="">Geboortedatum:</label><b id="date_of_birth"></b></div>
        <div class="group"><label for="">Adres:</label><b class="twee-3" id="address"></b> <b class="een-3" id="address_number"></b></div>
        <div class="group"><label for="">Woonplaats:</label><b id="city"></b></div>
        <div class="group full-width"><label for="">Reden opnamen:</label><b id="description"></b></div>
        <div class="group">
          {{ Form::open(['url' => '/dossier/remove', 'method' => 'post', 'id' => 'removepatiendossier', 'class' => 'form-layout vertical'])}}
          {{ Form::input('text', 'user_id', null, ['id' => 'removepatiendossier', 'class' => 'hidden', 'autofocus' => true]) }}
          <label for="">Ontslaan:</label>
          {{ Form::submit('Patient ontslaan', ['class' => 'btn btn-warning']) }}
          {{ Form::close()}}
        </div>
      </div>
  </div>
</div>
