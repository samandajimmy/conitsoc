<div class="container">
    
    <?php
    if(isset ($notif)){
        echo '<p style="color:red">' . $notif . '</p>';
    }
    ?>

    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" method="POST" action="<?php echo $action; ?>" id="form">
                <fieldset>
                    <legend>Input User</legend>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" placeholder="Username" required />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Password" required />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input type="email" name="email" placeholder="E-mail" required />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Save</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

</div>
