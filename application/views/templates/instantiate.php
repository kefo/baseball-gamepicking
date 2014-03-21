        <div class="container">
            <?php
                if ($games_table) {
                    echo '<div class="alert alert-info">Games table created successfully.</div>';
                } else {
                    echo '<div class="alert alert-warning">Games table NOT created. Problem.  Check settings</div>';
                }
                
                if ($shareholders_table) {
                    echo '<div class="alert alert-info">Shareholders table created successfully.</div>';
                } else {
                    echo '<div class="alert alert-warning">Shareholders table NOT created. Problem.  Check settings</div>';
                }
                
                if ($games_table && $shareholders_table) {
                    echo '<div class="alert alert-success">Tables created successfully.</div>';
                } else {
                    echo '<div class="alert alert-danger">Some tables NOT created. Problem. Check settings</div>';
                }
            ?>
        </div>