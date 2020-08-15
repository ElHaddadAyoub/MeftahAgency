<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(article)">
            <i  class="fa fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(article)">
            <i  class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['article', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(article) {
                axios.post('/favorite/'+article)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(article) {
                axios.post('/unfavorite/'+article)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
