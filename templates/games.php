    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-header">Spieleliste:</h1>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="list-group">
            <? foreach ($usergames as $game): ?>
            <a class="list-group-item" href="game.php?id=<? echo $game["id"]; ?>">
              <span class="badge"><?=$game["minPlayer"]?> bis <?=$game["maxPlayer"]?> Spieler</span>
              <h4 class="list-group-item-heading"><?=$game["name"]?></h4>
              <p class="list-group-item-text"><?=$game["description"]?></p>
              <p class="list-group-item-text"><?=$game["minPlayer"]?> bis <?=$game["maxPlayer"]?> Spieler</p>
            </a>
            <? endforeach; ?>
          </div>
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