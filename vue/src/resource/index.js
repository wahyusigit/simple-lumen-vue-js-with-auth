import Vue from 'vue'

export default{
    methods:{
        setHeaders(token){
            // Vue.http.headers.common['Authorization'] = 'Bearer ' + token;
            return token
        }
    }
}