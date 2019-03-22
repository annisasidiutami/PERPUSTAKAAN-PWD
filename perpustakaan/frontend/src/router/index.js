import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Buku from '@/components/Buku'
import BukuForm from '@/components/BukuForm'
import Peminjam from '@/components/Peminjam'
import PeminjamForm from '@/components/PeminjamForm'

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/buku',
      name: 'Buku',
      component: Buku
    },
    {
      path: '/buku/create',
      name: 'BukuCreate',
      component: BukuForm
    },
    {
      path: '/buku/:id',
      name: 'BukuEdit',
      component: BukuForm
    },
    {
      path: '/peminjam',
      name: 'Peminjam',
      component: Peminjam
    },
    {
      path: '/peminjam/create',
      name: 'BidangCreate',
      component: PeminjamForm
    },
    {
      path: '/peminjam/:id',
      name: 'PeminjamEdit',
      component: PeminjamForm
    }
  ]
})
