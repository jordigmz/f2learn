'use strict';

(() => {
    window.addEventListener('load', () => {
        let enlacesDelete = document.querySelectorAll('.deleteJson');

        enlacesDelete.forEach((enlace) => {
           enlace.addEventListener('click', function(event) {
                event.preventDefault();

                let url = this.href;
                let enlaceActual = this;

                fetch(url, {method: 'DELETE'}).then(response => response.json()).then(data => {
                    if(data.deleted === true) {
                        enlaceActual.parentNode.parentNode.parentNode.parentNode.remove();
                        Swal.fire(
                            'Good job!',
                            'Article successfully deleted.',
                            'success'
                        )
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You do not have sufficient permissions!'
                        })
                    }
                });
                return false;
           });
        });
    });
})();