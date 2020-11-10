<!-- here we will add modal template for reusablity and dynamic used of it -->

<div class="modal" tabindex="-1" role="dialog" id="infoModal">
  <div class="modal-dialog" role="document" id="infoModalDialog">
    <div class="modal-content">
      <div class="modal-header color-white bg-color-blue">
        <h5 class="modal-title" id="infoModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="infoModalBody">
        <p>Modal body text goes here.</p>
      </div>
      
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="confirmModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header color-white bg-color-blue">
        <h5 class="modal-title" id="confirmModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="confirmModalBody">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="confirmBtnYes">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>