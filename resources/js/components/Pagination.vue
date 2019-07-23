<template>
    <div>
        <ul class="pagination pagination-sm no-margin pull-right">
            <li v-for="page in pages" v-bind:key="page" :class="{active: meta.current_page == page}">
                <a href="#" @click="navigate($event, page)">{{page}}</a>
            </li>
        </ul>
    </div>
</template>

<script>
    import {range} from 'lodash'

    export default {
        props : [
            'links',
            'meta'
        ],
        
        data() {
            return {
               pages: [] 
            }
        },

        methods: {
            navigate(ev, page) {
                ev.preventDefault();
                
                this.$emit('navigate', page)
            }
        },

        watch :{
            meta() {
                this.pages = range(1,this.meta.last_page + 1)
            }
        }
    }
</script>