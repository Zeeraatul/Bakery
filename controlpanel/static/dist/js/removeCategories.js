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

    $catForms = $('.category-forms');

    $catForms.each((index, item) => {
        $removeBut = $(item).find('.delete-category-button').on('click', (e) => {
            $catForm = $(e.target).closest('.category-forms');
            IdCategory = $catForm.find(".form-with-id").val();

            $.ajax({
                type: "POST",
                url: "/controlpanel/categories/removeCategory",
                data: {
                    removeId: IdCategory
                }
            }).done((msg) => {
                switch (msg) {
                    case "REMOVE_SUCCSESS": {
                        showPopupWindow("Категория удалена", 'success')
                        break;
                    }
                    case "REMOVE_FAILURE": {
                        showPopupWindow("Удаление не возможно", 'danger')
                        break;
                    }
                }

                $removeBut.closest('.category-card').remove(); 
            })
        })
    })
})