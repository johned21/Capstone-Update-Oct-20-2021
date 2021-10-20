<div class="modal fade" id="cropperModal" tabindex="-1" role="dialog" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cropperModalLabel">Photo Crop</h5>
          <button type="button" class="close-modal" data-dismiss="cropperModal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
              <div class="row">
                  <div class="col-md-8">
                      <img id="image" src="" style="width: 100%">
                  </div>
                  <div class="col-md-4">
                      <div class="preview"></div>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal"  data-dismiss="cropperModal">Cancel</button>
          <button type="button" class="btn btn-primary" id="crop">Crop</button>
        </div>
      </div>
    </div>
</div>