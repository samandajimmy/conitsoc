<div class="container" style="padding-bottom: 20px;">

    <div class="row">
        <div class="span9 login-wrap">
            <div class="login">
				<div class="titleHeader clearfix">
                    <h3>SIGN IN CUSTOMER</h3>
                </div><!--end titleHeader-->
				
				<form method="POST" action="<?php echo site_url('page/login'); ?>" class="form-horizontal">
					<div class="control-group">
                    	<label class="control-label">Your Username <span class="text-error">*</span></label>
						<div class="controls">
                        	<input type="text" name="username" value="" placeholder="example@example.com">
						</div>
						</div>
						<div class="control-group">
		                	<label class="control-label">Your Password <span class="text-error">*</span></label>
							<div class="controls">
		                    	<input type="password" name="password" value="" placeholder="**************">
							</div>
						</div>
		                <div class="control-group">
							<div class="controls">
		                	<label class="checkbox">
		                    <input type="checkbox"> Check me out
		                    </label>
							</div>							
							<div style="clear: both"></div>
							<div class="btn-login">
							<button type="submit" class="btn btn-info">Login</button>
							</div>
		                </div>
				</form>
				
                <!--<table>
                    <tr>
                        <td width="50%">
                            <h3>New Customer</h3>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                            <a href="<?php echo site_url('page/register'); ?>" class="btn">Register</a>
                        </td>

                        <td width="50%">
                            <h3>Returning Customer</h3>
                            <form method="POST" action="<?php echo site_url('page/login'); ?>" class="">
                                <div class="controls">
                                    <label>Your Username: <span class="text-error">*</span></label>
                                    <input type="text" name="username" value="" placeholder="example@example.com">
                                </div>
                                <div class="controls">
                                    <label>Your Password: <span class="text-error">*</span></label>
                                    <input type="password" name="password" value="" placeholder="**************">
                                </div>
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="checkbox"> Check me out
                                    </label>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form><!--end form
                        </td>
                    </tr>
                </table>-->
            </div><!--end login-->
        </div><!--end span9-->

    </div><!--end row-->

</div><!--end conatiner-->
