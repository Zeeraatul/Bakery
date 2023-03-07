window.addEventListener("load", () => {

    var showPopupWindow = (message, type = 'primary') => {
        $modal = $(`<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-${type}" id="exampleModalLabel">${message}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>`);

        $modal.modal('show');
    }
    $optForms = $('.option-forms');
    $optForms.each((index, item) => {
        $removeBut = $(item).find('.delete-option-button').on('click', (e) => {
            $optForm = $(e.target).closest('.option-forms');
            IdOption = $optForm.find("input[name='id']").val();

            $.ajax({
                type: "POST",
                url: "/controlpanel/config/removeOption",
                data: {
                    removeId: IdOption
                }
            }).done((msg) => {
                switch (msg) {
                    case "REMOVE_SUCCSESS": {
                        $optForm.remove();
                        showPopupWindow("Опция удалена", 'success')
                        break;
                    }
                    case "REMOVE_FAILURE": {
                        showPopupWindow("Удаление не возможно", 'danger')
                        break;
                    }
                }
            })
        })
    })
})