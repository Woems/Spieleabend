    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-header">Mails</h1>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#inbox" role="tab" data-toggle="tab">Posteingang</a></li>
            <li role="presentation"><a href="#send" role="tab" data-toggle="tab">Gesendet</a></li>
            <li role="presentation"><a href="#add" role="tab"><span class="glyphicon glyphicon-plus"></span></a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="inbox">
              <ul class="list-group">
              <?php foreach ($mails["inbox"] as $m): ?>
                <li class="list-group-item"><?=$m["From"]?> -> <?=$m["to"]?><br><?=$m["subject"]?></li>
              <?php endforeach ?>
              </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="send">
              <ul class="list-group">
              <?php foreach ($mails["send"] as $m): ?>
                <li class="list-group-item"><?=$m["From"]?> -> <?=$m["to"]?><br><?=$m["subject"]?></li>
              <?php endforeach ?>
              </ul>
            </div>
          </div>
          
          <p><button type="button" class="btn btn-primary">Neue Mail verfassen</button>
          </p>
        </div>
      </div>
    </div>
