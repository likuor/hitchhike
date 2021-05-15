import './bootstrap'
import Vue from 'vue'
import SpotLike from './components/SpotLike'
import FollowButton from './components/FollowButton'

const app = new Vue({
    el: '#app',
    components: {
        SpotLike,
        FollowButton
    }
})
