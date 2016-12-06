
<div class="container text-center">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-xs-12">
        
        <?php
            if($this->session->flashdata('message'))
            {
                echo "<div class='alert alert-success fade in'>";
                echo  $this->session->flashdata('message');
                echo '</div>';
            }


            if($this->session->flashdata('error'))
            {
                echo "<div class='alert alert-danger fade in'>";
                echo  $this->session->flashdata('error');
                echo "</div>";
            }
        
        ?>

            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Please Log In</h1>
                </div>
                <div class="panel-body">
                    <?php echo form_open('C_login/verify', 'role="form"'); ?>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="username" autofocus >
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" />
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"/>Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input name="submit" type="submit" value="Login" class="btn btn-lg btn-success btn-block"/> 
                        </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
