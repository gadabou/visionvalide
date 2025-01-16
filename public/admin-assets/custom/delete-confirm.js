$('.delete').click(function(event) {
    let form = $(this).closest("form");
    let name = $(this).data("name");
    event.preventDefault();
    swal({
            title: `Action irreversible `,
            text: "Êtes-vous sûr ? En supprimant cet enregistrement vous perdez d'importantes informations.",
            icon: "error",
            buttons: ['Annuler', 'Supprimer'],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Confirmer", {
                    icon: "success",
                    dangerMode: true,
                });
                setTimeout(() => {
                    form.submit();
                }, 350);
            }
        });
});