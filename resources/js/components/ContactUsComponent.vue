<template>
    <div id="contact-form" class="contact-form">
        <h1 class="contact-form_title">Contact Form</h1>
        <div class="separator"></div>

        <form class="form" novalidate @submit.prevent="submitForm">
            <input required name="name" v-model='contact.name' placeholder="Name" type="text" autocomplete="off">
            <input required name="email" v-model="contact.email" placeholder="E-mail" type="email" autocomplete="off">
            <input required name="subject" v-model="contact.subject" placeholder="Subject" type="text" autocomplete="off">
            <textarea name="message" v-model="contact.message" rows="4" placeholder="Message"></textarea>
            <button class="button">Send</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "ContactUsComponent",
 data(){
        return{
                contact: {
                    name: '',
                    email: '',
                    subject :'',
                    message: '',
                },
        }
  },
    methods: {
        validate() {
            const form = [...arguments];
            const emailRegexp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            for (let index in form) {
                let field = form[index];
                if (field === "email" && !emailRegexp.test(this.contact[field])) {
                    return false;
                } else if (this.contact[field] === "") {
                    return false;
                }
            }
            return true;
        },
        submitForm(event) {
            event.target.classList.add("was-validated");
            if (this.validate("email", "name", "message", "subject")) {
                axios
                    .post("/api/submit", this.contact)
                    .then(response => {
                        alert("Message sent!");
                        this.contact = {};
                        event.target.classList.remove("was-validated");
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }



}
</script>

<style scoped>
body {
    background: #f1f1f1;
    font-family: 'Roboto', sans-serif;
}

.contact-form {
    font-family: 16px;
    margin: 0 auto;
    max-width: 600px;
    width: 100%;
}

.contact-form .separator {
    border-bottom: solid 1px #ccc;
    margin-bottom: 15px;
}

.contact-form .form {
    display: flex;
    flex-direction: column;
    font-size: 16px;
}

.contact-form_title {
    color: #333;
    text-align: left;
    font-size: 28px;
}

.contact-form input[type="email"],
.contact-form input[type="text"],
.contact-form textarea {
    border: solid 1px #e8e8e8;
    font-family: 'Roboto', sans-serif;
    padding: 10px 7px;
    margin-bottom: 15px;
    outline: none;
}

.contact-form textarea {
    resize: none;
}

.contact-form .button {
    background: #da552f;
    border: solid 1px #da552f;
    color: white;
    cursor: pointer;
    padding: 10px 50px;
    text-align: center;
    text-transform: uppercase;
}

.contact-form .button:hover {
    background: #ea532a;
    border: solid 1px #ea532a;
}

.contact-form input[type="email"],
.contact-form input[type="text"],
.contact-form textarea,
.contact-form .button {
    font-size: 15px;
    border-radius: 3px
}
</style>
