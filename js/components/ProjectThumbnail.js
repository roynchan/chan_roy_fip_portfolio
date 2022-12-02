export default {
    name: 'TheProjectThumb',

    props: {
        project: Object
    },

    template:
    `
    <li @click="loadlightboxdata">
        <img :src='"images/" + project.bg' alt="preview image">
       <!-- <div class="sprite"></div> -->
    </li>
    `,

    methods: {
        loadlightboxdata(){
            //pass the individual hero object back to the main UM instence
            this.$emit('loadlb', this.project);
        }
    }
}