/**
 * Deletes the table's row
 * added for <button> : name="{id}"
 *
 * @param e
 * @param thisObj
 * @param message
 * @param inputUrl
 * @constructor
 */
function DeleteTableRow(e, thisObj, message, inputUrl) {
    e.preventDefault();
    if(!confirm(message)) return;
    var rowId = thisObj.attr('name');
    var url = inputUrl + '/' + rowId;
    $.ajax({
        url : url,
        type: "DELETE",
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(response)
        {
            thisObj.closest('tr').remove();
        }
    });
}