<div class="modal fade" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="cardModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cardModalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class='row'>
        <div class='col-md-6 card_members'></div>
        <div class='col-md-6 card_edit_members'></div>
      </div>
      <div class="modal-body">
        <div class='row'>
          <div class='col-md-6'>
              <h5>Comments:</h5>
              <textarea name='comment'></textarea>
              <br>
              <input type='submit' value='add Comment' class='add_comment'>
              <div class='card_comments'></div>
          </div>
          <div class='col-md-6'>
              <h5>Lists:</h5>
              <div class='list_dropdown'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>