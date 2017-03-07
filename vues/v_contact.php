<!-- Container (Contact Section) -->
<br><br>
<div id="contact" class="container">
  <h3 class="text-center"><b><?php echo  $nomDuMenu ?></b></h3>
  <br>
  <p class="text-center"><em>Et la musique fut !</em></p>

  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="object" name="object" placeholder="Object" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="message" name="message" placeholder="Message..." rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Envoyer</button>
        </div>
      </div>
    </div>
  </div>
</div>