export default {
    name: 'TheLightboxComponent',

    props:['project'],

    template:
    `
    <section class="lightbox">



    <img @click="closeLB" src="images/close.png" class="lightbox_close">
    <!-- hero image on the left, text on the right -->
    <img :src='"images/" + project.bg' alt="preview image" class="propic">
    <!-- her image is a background image -->
    <article>
    <h3 class="lb_heading">{{project.name}}</h3>
    <p class="lb_text">
    {{project.bio}}
    </p>

</article>
</section>
    `,

    methods: {
        closeLB(){
            //debugger;
            this.$emit('closelb');
        }
    }
}