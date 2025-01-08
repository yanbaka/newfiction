// import 'magnific-popup/dist/magnific-popup.css';
import 'magnific-popup';

class Main {
    onDOMContentLoaded = () => {
        $('.photo').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {
                enabled:true
            }
            // other options
          });
    };
  }
  
  const main = new Main();
  window.addEventListener('DOMContentLoaded', main.onDOMContentLoaded);
  