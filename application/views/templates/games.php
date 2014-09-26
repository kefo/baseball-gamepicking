        <div class="container">
            <?php
            if ($error == 1) {
                echo '<div class="alert alert-warning">Invalid selection ID.</div>';
                echo '<a href="/' . APPDIRNAME . '/games/">Return to schedule.</a>';
            } else if ($error == 2) {
                echo '<div class="alert alert-warning">Selection already made for this ID.</div>';
                echo '<a href="/' . APPDIRNAME . '/games/">Return to schedule.</a>';
            } else if ($error == 3) {
                echo '<div class="alert alert-warning">Not yet your turn!</div>';
                echo '<a href="/' . APPDIRNAME . '/games/">Return to schedule.</a>';
            } else if ($error == 4) {
                echo '<div class="alert alert-warning">It is currently your turn, no need to reset.</div>';
            } else {
                
                if ($message == 1) {
                    echo '<div class="alert alert-warning">Submission did not match valid selection ID.  You may have already voted for this turn.</div>';
                }
                if ($message == 2) {
                    echo '<div class="alert alert-success">Your submission has been saved and you should see that reflected below.  The next person has been emailed.  You have ' . $togo . ' selection(s) remaining.</div>';
                }
                if ($message == 3) {
                    echo '<div class="alert alert-success">Your submission has been reset.</div>';
                }
            
            ?>
            <table cellpadding="0" cellspacing="0" border="0" class="tablesorter-bootstrap table table-striped table-bordered <?php echo $extracssTable; ?>" id="gamesTable">
                <colgroup>
                    <col class="col-xs-1" />
                    <col class="col-xs-2" />
                    <col class="col-xs-2" />
                    <col class="col-xs-2" />
                    <col class="col-xs-3" />
                    <?php
                     if (isset($games[0]) && isset($games[0]["gamePrice"])) {
                        echo '<col class="col-xs-2" />'; 
                     }
                    ?>
                </colgroup>
                <thead>
                    <tr>
                        <th>Game No.</th>
                        <th>Date/Time</th>
                        <th>Sortable Date/Time</th>
                        <th>Opponent</th>
                        <th>Shareholder</th>
                        <?php
                            if (isset($games[0]) && isset($games[0]["gamePrice"])) {
                                echo '<th>Share Price</th>'; 
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($games as $g) {
                        echo '<tr id="gID-' . $g["gameID"] . '">';
                        echo "<td>" . $g["gameNum"] . "</td>";
                        echo "<td>" . date("D, d M @ g:i A", $g["gameTS"]) . "</td>";
                        echo "<td>" . date("Y-m-d H:i:s", $g["gameTS"]) . "</td>";
                        echo "<td>" . $g["gameOpponent"] . "</td>";
                        if ( isset($g["shareholder"]) ) {
                            echo "<td>" . $g["shareholder"] . "</td>";
                        } else {
                            echo "<td> </td>";
                        }
                        if (isset($g["gamePrice"])) {
                            echo "<td>" . $g["gamePrice"] . "</td>";
                        }
                    }
                ?>
                </tbody>
            </table>
            
                <?php 
                    if (isset($uHash)) { 
                ?>
            
                <div class="modal fade" id="gameModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Game selection</h4>
                            </div>
                            <div class="modal-body">
                                <p id="mBodyText"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">No, that's not right.</button>
                                <button type="button" class="btn btn-success">Yes, save my selection</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
            
                <form id="selectSubmission" name="ssubmit" action="/<?php echo APPDIRNAME; ?>/games/" method="POST">
                    <input type="hidden" name="uHash" value="<?php echo $uHash; ?>">
                    <input type="hidden" id="fgID" name="gID" value="">
                </form> 

            
                <script type="text/javascript">
                    $('#gamesTable tr').click(function() {
                        gid = $(this).attr('id');
                        date = $(this).find( "td:eq( 1 )" ).html();
                        opponent = $(this).find( "td:eq( 2 )" ).html();
                        $('#gameModal').modal('show');
                        $('#mBodyText').text("You have selected the " + opponent + " at Nationals on " + date + ".");
                        $('#gameModal .btn-success').on('click', function () {
                            $( "#fgID" ).attr("value", gid);
                            $( "#selectSubmission" ).submit();
                        });
                    });
                </script>
            
                <?php 
                    }
                ?>
            
            
            <?php } ?>
        </div>


                    