import Accordion from './Ui/Accordion.vue';
import Image from './Ui/Image.vue';
import Button from './Ui/Button.vue';
import Modal from './Ui/Modal.vue';
import Head from './App/Head.vue';
import InfoBox from './Ui/InfoBox.vue';

const plugin = {
    install(app: any) {
        /**
         * UI-Components
         */
        app.component('UiAccordion', Accordion);
        app.component('UiImage', Image);
        app.component('UiButton', Button);
        app.component('UiModal', Modal);
        app.component('UiInfoBox', InfoBox);
        /**
         * App-Components
         */
        app.component('AppHead', Head);
    },
};

export default plugin ;