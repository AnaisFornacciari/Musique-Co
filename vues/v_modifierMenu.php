<script type="text/javascript">
    var $TABLE = $('#table');
    var $BTN = $('#export-btn');
    var $EXPORT = $('#export');

    $('.table-add').click(function () {
    var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $TABLE.find('table').append($clone);
    });

    $('.table-remove').click(function () {
    $(this).parents('tr').detach();
    });

    $('.table-up').click(function () {
    var $row = $(this).parents('tr');
    if ($row.index() === 1) return; // Don't go above the header
    $row.prev().before($row.get(0));
    });

    $('.table-down').click(function () {
    var $row = $(this).parents('tr');
    $row.next().after($row.get(0));
    });

    // A few jQuery helpers for exporting only
    jQuery.fn.pop = [].pop;
    jQuery.fn.shift = [].shift;

    $BTN.click(function () {
    var $rows = $TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];
    
    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function () {
        headers.push($(this).text().toLowerCase());
    });
    
    // Turn all existing rows into a loopable array
    $rows.each(function () {
        var $td = $(this).find('td');
        var h = {};
        
        // Use the headers from earlier to name our hash keys
        headers.forEach(function (header, i) {
        h[header] = $td.eq(i).text();   
        });
    });
    });
</script>
<br>
<div id="band" class="container text-center">
  <h3><b>MODIFIER LE MENU</b></h3>
  <br><br>
  <p> Les menus "ACCUEIL", "NEWS" et "CONTACT" ne peuvent pas être modifiés.</p>
  <br>
  <li  class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Pour ajouter un sous menu suivez les instructions suivantes <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li>Ajouter une ligne de menu <span class="glyphicon glyphicon-plus"></span></li> 
    <li>Saisir dans "Menu" le nom du menu auquel vous voulez ajouter des sous menus</li>
    <li>Saisir dans "Sous menu" le nom du sous menu</li>
    <li>Renouveler l'opération si vous souhaitez plusieurs sous menus</li>
  </ul>
  </li>
<form>
  <div id="table" class="table-editable">
    <span class="table-add glyphicon glyphicon-plus"></span>
    <table class="table">
      <tr>
        <th>Menu</th>
        <th>Sous menu</th>
        <th>Archiver</th>
        <th>Position</th>
      </tr>
      <?php 
      foreach($lesMenus as $leMenu)
      {
        if($leMenu['nomMenu'] == "ACCUEIL" || $leMenu['nomMenu'] == "NEWS" || $leMenu['nomMenu'] == "CONTACT")
        {
            continue;
        }
        if(empty($leMenu['nomSousMenu']))
        {
            $contenueditable = "false";
        }
        else
        {
            $contenueditable = "true";
        }
        ?>
        <tr>
            <td contenteditable="true"><?php echo $leMenu['nomMenu'] ?></td>
            <td contenteditable=<?php echo $contenueditable ?>><?php if($leMenu['sousMenu']) { ?> <span class="caret"></span> <?php } else { echo $leMenu['nomSousMenu']; }?></td>
            <td>
            <span class="table-remove glyphicon glyphicon-remove"></span>
            </td>
            <td>
            <span class="table-up glyphicon glyphicon-arrow-up"></span>
            <span class="table-down glyphicon glyphicon-arrow-down"></span>
            </td>
        </tr>
        <?php
      }
      ?>
      <!-- This is our clonable table line -->
      <tr class="hide">
        <td contenteditable="true">non définis</td>
        <td contenteditable="true">null</td>
        <td>
          <span class="table-remove glyphicon glyphicon-remove"></span>
        </td>
        <td>
          <input type="submit"> <span class="table-up glyphicon glyphicon-arrow-up"></span> </input>
          <input type="submit"> <span class="table-down glyphicon glyphicon-arrow-down"></span> </input>
        </td>
      </tr>
    </table>
  </div>
  
    </form>
</div>