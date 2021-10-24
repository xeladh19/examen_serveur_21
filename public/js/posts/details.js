$(function () {
    $('.delete').click(function () {
        $.ajax({
            url: '?ajax=deleteOneById',
            dataType: 'json',
            method: 'get',

            success: function (reponsePHP) {
                if (reponsePHP == 1) {
                    //Je remets le contenu initial dedans via cette ligne (au niveau de la modification d'un titre/sousTitre).
                    notify('Post bien supprimé !', 'success');
                } else {
                    notify('Problème durant le delete !', 'danger');
                }
            },
            error: function () {
                alert('Problème durant la transaction !');
            },
        });
    });
});
