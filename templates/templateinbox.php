    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-header">Mails</h1>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <?php $a='active'; foreach ($mails as $name => $folder): ?>
            <li role="presentation" class="<?=$a?>"><a href="#<?=$name?>" role="tab" data-toggle="tab"><?=isset($pretty[$name])?$pretty[$name]:$name?></a></li>
            <?php $a=''; endforeach ?>
            <li role="presentation"><a href="#add" role="tab"><span class="glyphicon glyphicon-plus"></span></a></li>
          </ul>
                    
          <!-- Tab panes -->
          <div class="tab-content">
            <?php $a='active'; foreach ($mails as $name => $folder): ?>
            <div role="tabpanel" class="tab-pane <?=$a?>" id="<?=$name?>">
              <table class="table table-striped table-hover">
                <tr>
                  <th style="width:10%">Status</th>
                  <th style="width:15%">Von</th>
                  <th style="width:15%">An</th>
                  <th style="width:40%">Betreff</th>
                  <th></th>
                <tr>                
                <?php foreach ($folder as $m): ?>
                <tr class="info"
                 data-from="<?=$m["fromuser"]?>"
                 data-to="<?=$m["touser"]?>"
                 data-subject="<?=$m["subject"]?>"
                 data-body="<?=$m["body"]?>"                 
                 onClick="t=$(this); 'from,to,body,subject'.split(',').forEach(function (i) { $('#mail_'+i).html(t.data(i)); }); $('#mail').modal('show');">
                  <td><span class="label label-info">New</span></td>
                  <td><?=$m["fromuser"]?></td>
                  <td><?=$m["touser"]?></td>
                  <td><?=$m["subject"]?></td>
                  <td class="text-right">
                    <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-retweet"></span></a>
                    <a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-folder-open"></span></a>
                    <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                <tr>
                <?php endforeach ?>
              </table>
            </div>
            <?php $a=''; endforeach ?>
            <div role="tabpanel" class="tab-pane" id="send">
              <ul class="list-group">
              <?php foreach ($mails["send"] as $m): ?>
                <li class="list-group-item"><?=$m["fromuser"]?> -> <?=$m["touser"]?><br><?=$m["subject"]?></li>
              <?php endforeach ?>
              </ul>
            </div>
          </div>
          
          <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-envelope"></span> Neue Mail verfassen</button>
          </p>
        </div>
      </div>
    </div>
    
<!-- Modal: Mail -->
<div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="mail" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <dl class="dl-horizontal" style="margin:0px">
          <dt>Von:</dt>    <dd id="mail_from">a</dd>
          <dt>An:</dt>     <dd id="mail_to">a</dd>
          <dt>Betreff:</dt><dd id="mail_subject">a</dd>
        </dl>
      </div>
      <div class="modal-body" id="mail_body">
        Dies ist ein Test
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="mail_close" data-dismiss="modal">Schließen</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal: New Mail -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Neue Mail</h4>
      </div>
      <div class="modal-body">
        <!--<div class="alert alert-danger alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
         <strong>Fehler!</strong> Nachricht konnte <strong>nicht gesendet</strong> werden.
        </div>-->
        <form role="form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Empfänger:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Nachricht:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="new_mail_cancel" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-primary" id="new_mail_send">Senden</button>
      </div>
    </div>
  </div>
</div>
