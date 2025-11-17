import './bootstrap';
import { createApp } from 'vue';
import emailjs from '@emailjs/browser'; // Import EmailJS

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');

// EmailJS Integration
document.addEventListener('DOMContentLoaded', function() {
    const emailjsPublicKey = document.getElementById('emailjsPublicKey')?.value;
    const emailjsServiceId = document.getElementById('emailjsServiceId')?.value;
    const emailjsTemplateId = document.getElementById('emailjsTemplateId')?.value;
    const contactMessageRecipientEmail = document.getElementById('contactMessageRecipientEmail')?.value;
    const storeContactMessageRoute = document.getElementById('storeContactMessageRoute')?.value; // Retrieve the route URL

    if (emailjsPublicKey) {
        emailjs.init(emailjsPublicKey);
    }

    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            const formData = new FormData(contactForm);
            const templateParams = {
                from_name: formData.get('name'),
                from_email: formData.get('email'),
                phone: formData.get('phone'),
                subject: formData.get('subject'),
                message: formData.get('message'),
                to_email: contactMessageRecipientEmail 
            };

            if (emailjsServiceId && emailjsTemplateId) {
                emailjs.send(emailjsServiceId, emailjsTemplateId, templateParams)
                    .then(function(response) {
                        console.log('EmailJS Success!', response.status, response.text);
                        const tempForm = document.createElement('form');
                        tempForm.action = storeContactMessageRoute; 
                        tempForm.method = "POST";
                        tempForm.style.display = 'none';

                        const csrfToken = document.createElement('input');
                        csrfToken.type = 'hidden';
                        csrfToken.name = '_token';
                        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        tempForm.appendChild(csrfToken);

                        for (const [key, value] of formData.entries()) {
                            const hiddenField = document.createElement('input');
                            hiddenField.type = 'hidden';
                            hiddenField.name = key;
                            hiddenField.value = value;
                            tempForm.appendChild(hiddenField);
                        }

                        document.body.appendChild(tempForm);
                        tempForm.submit();
                    }, function(error) {
                        console.log('EmailJS Failed...', error);
                        alert('Failed to send message via EmailJS. Please try again later.');
                    });
            } else {
                console.error('EmailJS Service ID or Template ID is missing.');
                alert('Email sending is not configured. Please contact support.');
            }
        });
    }
});

