    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img class="img-responsive img-rounded" style="width:250px; height:250px; margin-top:20px; margin-bottom:20px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
        </div>
        <div class="col-md-9">
          <h1 class="page-header"><?=$game["name"]?></h1>
          <p><?=$game["description"]?></p>
          <p>
            <table class="table table-condensed">
              <? if ($game["minPlayer"]!=0 || $game["maxPlayer"]!=0): ?>
              <tr><th>Spieler:</th><td><?=$game["minPlayer"]?> bis <?=$game["maxPlayer"]?></td></tr>
              <? endif ?>
              <? if ($game["minLength"]!=0 || $game["maxLength"]!=0): ?>
              <tr><th>Spieldauer:</th><td><?=$game["minLength"]?> bis <?=$game["maxLength"]?></td></tr>
              <? endif ?>
              <? if ($game["age"]!=0): ?>
              <tr><th>Alter:</th><td>ab <?=$game["age"]?> Jahre</td></tr>
              <? endif ?>
              <? if ($game["boxSizeLength"]!=0 || $game["boxSizeWidth"]!=0 || $game["boxSizeHeight"]!=0): ?>
              <tr><th>Kartongröße:</th><td><?=$game["boxSizeLength"]?> cm Lang x <?=$game["boxSizeWidth"]?> cm Breit x <?=$game["boxSizeHeight"]?> cm Hoch</td></tr>
              <? endif ?>
              <? if ($game["added"]!='0000-00-00 00:00:00'): ?>
              <tr><th>Hinzugefügt:</th><td>am <?=$game["added"]?></td></tr>
              <? endif ?>
              <? if ($game["changed"]!='0000-00-00 00:00:00'): ?>
              <tr><th>Zuletzt geändert:</th><td>am <?=$game["changed"]?></td></tr>
              <? endif ?>
            </table>
          </p>
        </div>
      </div>
      <!--
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Eigenschaften</h3>
            </div>
            <div class="panel-body">
              lorem
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Besitzer</h3>
            </div>
            <div class="panel-body">
              Ipsum
            </div>
          </div>
        </div>
      </div>
      -->
    </div>