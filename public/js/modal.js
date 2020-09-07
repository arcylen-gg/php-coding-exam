'use strict';

class Modal {

	constructor() {
		this.listeners();
    }
    
    listeners() {
        setTimeout(function() {
            const triggers = document.getElementsByClassName('delete-modal');

            Object.keys(triggers).forEach(el => {
                let songId = triggers[el].getAttribute('song-id');
                triggers[el].onclick = function(ele) {
                    document.getElementById('form-delete').setAttribute('action', '/song/'+ songId);
                }
            });
        }, 100);
    }

}

new Modal();
