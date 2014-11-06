    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img class="img-responsive img-rounded" style="width:250px; height:250px; margin-top:20px; margin-bottom:20px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
        </div>
        <div class="col-md-9">
          <h1 class="page-header"><span class="glyphicon glyphicon-user"> <?=$iam["username"]?></h1>
          <p>
            <table class="table table-condensed">
              <tr><th>ID:</th><td><?=$iam["id"]?></td></tr>
              <tr><th>Name:</th><td><?=$iam["username"]?></td></tr>
              <tr><th>Status:</th><td><?=$iam["admin"]?"Administrator":"Benutzer"?></td></tr>
            </table>
          </p>
        </div>
      </div>
    </div>
