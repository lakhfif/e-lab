 <!-- Modal -->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">changer mot de passe</h4>
					      </div>
					      <div class="modal-body">
					        
						  <form id="form-change-password" role="form" method="POST" action="{{ route('changePassword') }}" novalidate class="form-horizontal">
							  <div class="col-md-9">             
							    <label for="current-password" class="col-sm-4 control-label">Current Password</label>
							    <div class="col-sm-8">
							      <div class="form-group">
							        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
							        <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
							      </div>
							    </div>
							    <label for="password" class="col-sm-4 control-label">New Password</label>
							    <div class="col-sm-8">
							      <div class="form-group">
							        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							      </div>
							    </div>
							    <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
							    <div class="col-sm-8">
							      <div class="form-group">
							        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
							      </div>
							    </div>
							  </div>
							  <div class="form-group">
							  </div>
							
						
						            
						               
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Save changes</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>