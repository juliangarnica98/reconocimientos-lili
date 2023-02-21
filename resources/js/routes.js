import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes: [
        { path: '/', component: require('./components/modulos/dashboard/index').default },
        { path: '/colaboradores', component: require('./components/modulos/colaboradores/index').default },
        { path: '/reconocimientos', component: require('./components/modulos/reconocimientos/index').default },
        { path: '/reportes', component: require('./components/modulos/reportes/index').default },
    ],
    mode:'history'
})