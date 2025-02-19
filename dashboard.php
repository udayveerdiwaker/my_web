
<?php
include 'admin_panel.php';
?>


    
<div class="main-panel">
            <div class="content">
                <div class="page-inner ">
                   
<div class="row">
<div class="col-sm-6 col-md-3">
        <a href="" class="d-block">
            <div class="card card-stats bg-primary card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center text-light">
                            <i class="bi bi-bell-fill"></i>                           
                         </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category text-light">Subscribers</p>
                                <h4 class="card-title text-light">6</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
    
  

            
        </div>
    </div>
</div>
<!-- Send Mail Modal -->
<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Send Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ajaxEditForm" class="" action="https://websitebanaye.com/admin/quote/mail" method="POST" onsubmit="return false">
                    <input type="hidden" name="_token" value="CsDoygrDS4chOKG3nW5zOXd7y062RL1bM07EIyJE">                    <div class="form-group">
                        <label for="">Client Mail **</label>
                        <input id="inemail" type="text" class="form-control" name="email" value="" placeholder="Enter email">
                        <p id="eerremail" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Subject **</label>
                        <input id="insubject" type="text" class="form-control" name="subject" value="" placeholder="Enter subject">
                        <p id="eerrsubject" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Message **</label>
                        <textarea id="inmessage" class="form-control nic-edit" name="message" rows="5" cols="80" placeholder="Enter message"></textarea>
                        <p id="eerrmessage" class="mb-0 text-danger em"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="updateBtn" type="button" class="btn btn-primary">Send Mail</button>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
            <footer class="footer">
  <div class="container-fluid">
    <div class="d-block mx-auto">
      <p>Copyright © 2024. All rights reserved by Websitebanaye.com</p>
    </div>
  </div>
</footer>
        </div>
</body>
</html>