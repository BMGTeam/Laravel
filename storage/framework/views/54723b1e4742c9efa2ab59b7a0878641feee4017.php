	<form   action="imageform" method ="post" enctype="multipart/form-data" >
		<div class="form-group" id="imageform" style="margin: 0 40%; ">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>   
                          

                    
                                <span class="btn default btn-file">
                                  

                                    <input type="file" name="image" id="image"> </span>
                  
                                
                                <input type="submit" class="btn default  fileinput-exists" name="submit" id="submit" value="Thêm"> </span>
                            </div>
                        </div>
</form>