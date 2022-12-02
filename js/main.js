//components always goes on the top
import ProjectThumb from './components/ProjectThumbnail.js';
import lightbox from './components/TheLightboxComponents.js';
import { SendMail } from "./components/mailer.js";

(() => {
    // create vue instance here
    const { createApp } = Vue

    createApp({
        created() {
            //fetch calls always go here -> retreive any data you need
            fetch('./scripts/json.php') // go and get the remote data
            .then(res => res.json())// convert the json object to plain Js object
            .then(data => this.projectData = data) //store the data in the Vue instance
            .catch(error => console.error(error));//report any erroes
        },

        data() {
            return {
                projectData: {},
                lightboxdata:{},
                showLB: false
            }
        },
        methods: {
            loadlighbox(item) {
                //debugger;   
                this.lightboxdata = item;
                this.showLB = true; 
            }
        },

        components: {
            projectthumbnail: ProjectThumb,
            lightbox: lightbox
        }
    }).mount('#app')
 

    createApp({
        data() {
            return {
                message: 'Hello Vue!'
            }
        },

        methods: {
            processMailFailure(result) {
                // show a failure message in the UI
                let box = document.querySelector('.print1');
                box.classList.add("show");
                let box2 = document.querySelector('.print2');
                box2.classList.remove("show");
                // use this.$refs to connect to the elements on the page and mark any empty fields/inputs with an error class
                    
                // show some errors in the UI here to let the user know the mail attempt was successful
            },

            processMailSuccess(result) {
                // show a success message in the UI
                let box2 = document.querySelector('.print2');
                box2.classList.add("show");
                let btn = document.querySelector('.wrapper');
                btn.classList.remove("show");
                let box = document.querySelector('.print1');
                box.classList.remove("show");
                // show some UI here to let the user know the mail attempt was successful
            },

            processMail(event) {        
                // use the SendMail component to process mail
                SendMail(this.$el.parentNode)
                    .then(data => this.processMailSuccess(data))
                    .catch(err => this.processMailFailure(err));
            }
        }
    }).mount('#mail-form')
})()